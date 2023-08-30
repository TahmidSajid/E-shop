<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile_page'])->name('profile_page');
Route::post('/profile/photo/upload',[App\Http\Controllers\ProfileController::class, 'profile_photo_upload']);
Route::post('/password/update',[App\Http\Controllers\ProfileController::class, 'password_update']);
Route::post('/add/phone/number',[App\Http\Controllers\ProfileController::class, 'phone_number_add']);
Route::get('/verify/phone/number',[App\Http\Controllers\ProfileController::class, 'phone_number_verify']);
Route::post('/verify/otp',[App\Http\Controllers\ProfileController::class, 'otp_verify']);
Route::get('/update/phone/number',[App\Http\Controllers\ProfileController::class, 'update_phone_number']);
