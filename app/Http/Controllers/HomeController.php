<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Arrays;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role=='admin'){
            return view('dashboard.home');
        }
        else{
            Auth::logout();
            return back()->with('permission',"you are not an admin");
        }
    }
}
