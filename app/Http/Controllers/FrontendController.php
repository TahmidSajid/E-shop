<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\categories;

class FrontendController extends Controller
{
    public function index(){

        if(Auth::check()){
            if(auth()->user()->status == "unverified"){
                return redirect()->route('user_otp_verify');
            }
            else{
                return view('frontend.index')->with([
                    'categories'=>categories::all(),
                ]);;
            }
        }
        else{
            return view('frontend.index')->with([
                'categories'=>categories::all(),
            ]);;
        }
        // if(User::where('user_id',auth()->user()->id)->exists()){
        //     $customer_id = true;
        //     return view('frontend.index')->with(compact('customer_id'));
        // }
        // else{
        //     $customer_id = false;
        //     return view('frontend.index')->with(compact('customer_id'));
        // }
        // $customer_id = false;
        // return view('frontend.index')->with(compact('customer_id'));
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
