<?php

use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\LogoutUserController;
use App\Http\Controllers\Auth\RegisterUserController;
use Illuminate\Support\Facades\Route;

//      Main page
Route::view('/', 'for-you')->name('for_you');

//      Auth pages
Route::view('register', 'auth.register')->name('register');
Route::view('login', 'auth.login')->name('login');

//      Auth actions
Route::post('register', RegisterUserController::class)->name('register_user');
Route::post('login',LoginUserController::class)->name('login_user');
Route::get('logout', LogoutUserController::class)->name('logout_user');
