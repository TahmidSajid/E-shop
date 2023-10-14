<?php

use App\Http\Controllers\CategoryController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// frontend routes
Route::get('/',[App\Http\Controllers\FrontendController::class,'index'])->name('index');
Route::get('/about',[App\Http\Controllers\FrontendController::class,'about'])->name('about');
Route::get('/user/register',[App\Http\Controllers\UserRegisterController::class,'user_register'])->name('user_register');
Route::post('/user/account/register',[App\Http\Controllers\UserRegisterController::class,'user_account_register'])->name('user_account_register');
Route::post('/user/account/verify',[App\Http\Controllers\UserRegisterController::class,'user_account_verify'])->name('user_account_verify');
Route::get('/user/otp/verify',[App\Http\Controllers\FrontendController::class,'user_otp_verify'])->name('user_otp_verify');
Route::post('/user/login',[App\Http\Controllers\UserRegisterController::class,'user_login'])->name('user_login');
Route::get('/user/dashboard',[App\Http\Controllers\FrontendController::class,'user_dashboard'])->name('user_dashboard');
Route::get('/contact/page',[App\Http\Controllers\FrontendController::class,'contact_page'])->name('contact');
Route::post('/contact/page/form',[App\Http\Controllers\FrontendController::class,'contact_page_form'])->name('contact_form');

// dashboard routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profile_page'])->name('profile_page');
Route::post('/profile/photo/upload',[App\Http\Controllers\ProfileController::class, 'profile_photo_upload']);
Route::post('/password/update',[App\Http\Controllers\ProfileController::class, 'password_update']);
Route::post('/add/phone/number',[App\Http\Controllers\ProfileController::class, 'phone_number_add']);
Route::get('/verify/phone/number',[App\Http\Controllers\ProfileController::class, 'phone_number_verify']);
Route::post('/verify/otp',[App\Http\Controllers\ProfileController::class, 'otp_verify']);
Route::get('/update/phone/number',[App\Http\Controllers\ProfileController::class, 'update_phone_number']);
Route::post('/products',[App\Http\Controllers\ProductController::class, 'products_page'])->name('products');

// category route package
Route::resource('category', CategoryController::class);
