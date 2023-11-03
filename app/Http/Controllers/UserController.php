<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\NewAdminMail;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = User::where('role','admin')->get();
        return view('dashboard.admin_users')->with([
            'admins'=>$admin
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $random = Str::random(10);
        $request->validate([
            'name'=> 'required',
            'email'=> 'unique:App\Models\User,email'
        ]);
        user::insert([
            'name' => $request->name,
            'email' => $request->email,
            'created_at' => Carbon::now(),
            'role'=> 'admin',
            'password' => Hash::make($random),
        ]);
        Mail::to($request->email)->send(new NewAdminMail(auth()->user()->name,$request->email,$random));
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id',$id)->delete();
        return back();
    }
}
