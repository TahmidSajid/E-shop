<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\verifications;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserRegisterController extends Controller
{
    public function user_register(){
        return view('frontend.user-register');
    }
    public function user_account_register(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'email'=>'required',
            'number'=>'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        $user_password = Hash::make($request->password);
        User::insert([
            'name'=>$request->username,
            'email'=>$request->email,
            'password'=>$user_password,
            'number'=>$request->number,
            'role'=>'user',
            'created_at'=>Carbon::now(),
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $random_otp = rand(100,400);

            $text = "your otp code is ".$random_otp;
            $number = auth()->user()->number;
            // $url = "http://66.45.237.70/api.php";
            // $data= array(
            // 'username'=>"01834833973",
            // 'password'=>"TE47RSDM",
            // 'number'=>"$number",
            // 'message'=>"$text"
            // );

            // $ch = curl_init(); // Initialize cURL
            // curl_setopt($ch, CURLOPT_URL,$url);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // $smsresult = curl_exec($ch);
            // $p = explode("|",$smsresult);
            // $sendstatus = $p[0];


            $user_id = auth()->user()->id;
            $phn_number = auth()->user()->number;
            $created = Carbon::now();
            Verifications::insert([
                'user_id'=> $user_id,
                'number'=> $phn_number,
                'OTP'=> $random_otp,
                'created_at'=> $created,
            ]);
            if(Verifications::where('user_id',auth()->user()->id)->exists()){
                // $OTP_sent = '3 digit otp sent to your number';
                return redirect()->route('user_otp_verify')->with('OTP_sent', '3 digit otp sent to your number');
            }
        }
    }
    public function user_account_verify(Request $request){
        $request->validate([
            'OTP'=>'required'
        ]);
        $otp_no = $request->OTP;
        if(Verifications::where('user_id',auth()->user()->id)->first()->OTP==$otp_no){
            User::find(auth()->id())->update([
                'status'=> 'verified',
            ]);
            Auth::logout();
            // echo auth()->user()->id;
            return redirect()->route('user_register')->with('account_created','Your account have been created successfully. Enter your email and password');
        }
        else{
            return back();
        }
    }
    public function user_login(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=>'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,])) {
            if(auth()->user()->status == "unverified"){
                return redirect()->route('user_otp_verify');
            }
            else{
                return redirect()->route('index');
            }
        }
        else{
            return "login failed";
        }






        // return($request);
        // if(is_numeric($request->email)){
        //     if (Auth::attempt(['number' => $request->email, 'password' => $request->password,])) {
        //         return redirect()->route('index');
        //     }
        // }
        // else{
        //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password,])) {
        //         return redirect()->route('index');
        //     }
        // }

    }

}
