<?php

use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\LogoutUserController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Dashboard\ChangePasswordController;
use App\Http\Controllers\Dashboard\DeleteAccountController;
use Illuminate\Support\Facades\Route;

//      Main page
Route::view('/', 'home')->name('home');

//      Auth pages
Route::view('register', 'auth.register')->middleware('guest')->name('register');
Route::view('login', 'auth.login')->middleware('guest')->name('login');

//      Auth actions
Route::post('register', RegisterUserController::class)->middleware('guest')->name('register_user');
Route::post('login',LoginUserController::class)->middleware('guest')->name('login_user');
Route::get('logout', LogoutUserController::class)->middleware('auth')->name('logout_user');

//      Dashboard (Routes related to user)
Route::view('profile', 'dashboard.profile')->middleware('auth')->name('profile');
Route::view('settings', 'dashboard.settings')->middleware('auth')->name('settings');

Route::post('change_password', ChangePasswordController::class)->middleware('auth')->name('change_password');
Route::post('delete_account', DeleteAccountController::class)->middleware('auth')->name('delete_account');
