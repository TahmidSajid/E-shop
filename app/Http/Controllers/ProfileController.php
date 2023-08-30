<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\verifications;
use Carbon\Carbon;

use function PHPSTORM_META\elementType;

class ProfileController extends Controller
{
    public function profile_page()
    {
        if(Verifications::where('user_id',auth()->user()->id)->exists()){
            $usr_id = Verifications::where('user_id',auth()->user()->id)->first()->user_id;
            return view('profile',compact('usr_id'));
        }
        else{
            $usr_id = false;
            return view('profile',compact('usr_id'));
        }
        // if(Verifications::where('user_id',auth()->user()->id)->exists()){
        //     if(Verifications::where('user_id',auth()->user()->id)->first()->user_id==auth()->user()->id){
        //         $check_id = 1;
        //         return view('profile',compact('check_id'));
        //     }
        //     else{
        //         $check_id = 0;
        //     }

        // }
        // else{
        //     $check_id = 0;
        //     return view('profile',compact('check_id'));
        // }
    }
    public function profile_photo_upload(Request $request){
        // echo 'done';
        $request->validate([
            'profile_pic'=> 'image|required',
        ]);

        // return $request->file('profile_pic');
        $new_name = auth()->user()->id.".".$request->file('profile_pic')->getClientOriginalExtension();
        $img = Image::make($request->file('profile_pic'))->resize(300,200);
        $img->save(base_path('public/uploads/profile_pictures/'.$new_name),80);
        User::find(auth()->id())->update([
            'profile_photo'=> $new_name,
        ]);
        return back();
    }

    public function password_update(Request $request){
        $request->validate([
            'old_password'=> 'required',
            'password'=> 'required|confirmed',
            'password_confirmation'=> 'required',
        ]);
        $new_password = Hash::make($request->password);

        if(Hash::check($request->old_password,auth()->user()->password)){
            User::find(auth()->id())->update([
                'password'=> $new_password,
            ]);
            return back()->with('success','password changed');
        }
        else{
            return back()->with('unsuccess','your current password is invalid');
        }

    }
    public function phone_number_add(Request $request){
        $request->validate([
            'phone_number'=>'required'
        ]);
        $phone_number = $request->phone_number;
        User::find(auth()->id())->update([
            'number'=>$phone_number,
        ]);
        return back()->with('add_number','phone number added successfully');
    }
    public function phone_number_verify(){
         $random_otp = rand(100,400);

        $text = "your otp code is".$random_otp;
        $number = auth()->user()->number;
        $url = "http://66.45.237.70/api.php";
        $data= array(
        'username'=>"01834833973",
        'password'=>"TE47RSDM",
        'number'=>"$number",
        'message'=>"$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendstatus = $p[0];


        $user_id = auth()->user()->id;
        $phn_number = auth()->user()->number;
        $created = Carbon::now();
        Verifications::insert([
            'user_id'=> $user_id,
            'number'=> $phn_number,
            'OTP'=> $random_otp,
            'created_at'=> $created,
        ]);
        return back()->with('otp_sent','3 digit otp sent to your number');

    }
    public function otp_verify(Request $request){
        echo "1";
        $request->validate([
            'otp_number'=>'required'
        ]);
        $otp_no = $request->otp_number;
        if(Verifications::where('user_id',auth()->user()->id)->first()->OTP==$otp_no){
            User::find(auth()->id())->update([
                'status'=> 'verified',
            ]);
            return back();
        }
        else{
            return back();
        }
    }
    public function update_phone_number(){
        User::find(auth()->user()->id)->update([
            'number'=>null,
            'status'=> 'unverified',
            'update_limit'=> 0,
        ]);
        Verifications::where('user_id',auth()->user()->id)->delete();
        return back();
    }
}
