<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\User;
class ProfileController extends Controller
{
    public function profile_photo_upload(Request $request){
        // echo 'done';
        $request->validate([
            'profile_pic'=> 'image|required'
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
}
