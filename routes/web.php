<?php

use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\LogoutUserController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Dashboard\ChangePasswordController;
use App\Http\Controllers\Dashboard\DeleteAccountController;
use App\Http\Controllers\Dashboard\UploadAvatarController;
use App\Http\Controllers\Dashboard\UploadPinController;
use Illuminate\Support\Facades\Route;

//      Main page
Route::view('/', 'home')->name('home');

//      Auth pages
Route::view('register', 'auth.register')->middleware('guest')->name('register');
Route::view('login', 'auth.login')->middleware('guest')->name('login');

//      Auth actions
Route::post('register', RegisterUserController::class)->middleware('guest')->name('register_user');
Route::post('login', LoginUserController::class)->middleware('guest')->name('login_user');
Route::get('logout', LogoutUserController::class)->middleware('auth')->name('logout_user');

//      Dashboard (Routes related to user)
Route::middleware('auth')->group(function () {

    Route::view('profile', 'dashboard.profile')->name('profile');
    Route::view('settings', 'dashboard.settings')->name('settings');
    Route::view('my-pins', 'dashboard.my-pins')->name('my_pins');
    Route::view('create-new-pin', 'dashboard.create-pin')->name('create_pin');

    Route::post('change_password', ChangePasswordController::class)->name('change_password');
    Route::post('delete_account', DeleteAccountController::class)->name('delete_account');

    Route::post('upload-pin', UploadPinController::class)->name('upload_pin');
    Route::post('upload-avatar', UploadAvatarController::class)->name('upload_avatar');

});
