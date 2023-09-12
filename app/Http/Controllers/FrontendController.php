<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        // if(User::where('user_id',auth()->user()->id)->exists()){
        //     $customer_id = true;
        //     return view('frontend.index')->with(compact('customer_id'));
        // }
        // else{
        //     $customer_id = false;
        //     return view('frontend.index')->with(compact('customer_id'));
        // }
        $customer_id = false;
        return view('frontend.index')->with(compact('customer_id'));
    }
    public function about(){
        return view('frontend.about');
    }
    public function user_otp_verify(){
        return view('frontend.user_otp_verify');
    }
    public function user_dashboard(){
        return view ('frontend.user-dashboard');
    }
}
