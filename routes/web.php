<?php

use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\LogoutUserController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Dashboard\ChangePasswordController;
use App\Http\Controllers\Dashboard\DeleteAccountController;
use App\Http\Controllers\Dashboard\MyPinsController;
use App\Http\Controllers\Dashboard\SavesController;
use App\Http\Controllers\Dashboard\UploadAvatarController;
use App\Http\Controllers\Dashboard\UploadPinController;
use App\Http\Controllers\Main\DownloadPinController;
use App\Http\Controllers\Main\HomePinsController;
use App\Http\Controllers\Main\PinController;
use App\Http\Controllers\Main\SavePinController;
use Illuminate\Support\Facades\Route;

//      Main page
Route::get('/', HomePinsController::class)->name('home');


//      Auth pages
Route::view('register', 'auth.register')->middleware('guest')->name('register');
Route::view('login', 'auth.login')->middleware('guest')->name('login');



//      Auth actions
Route::post('register', RegisterUserController::class)->middleware('guest')->name('register_user');
Route::post('login', LoginUserController::class)->middleware('guest')->name('login_user');
Route::get('logout', LogoutUserController::class)->middleware('auth')->name('logout_user');



//      Dashboard (Routes related to user)
Route::middleware('auth')->group(function () {

    //      Views
    Route::view('profile', 'dashboard.profile')->name('profile');
    Route::view('settings', 'dashboard.settings')->name('settings');
    Route::view('create-new-pin', 'dashboard.create-pin')->name('create_pin');

    Route::post('change_password', ChangePasswordController::class)->name('change_password');
    Route::post('delete_account', DeleteAccountController::class)->name('delete_account');

    Route::post('upload-pin', UploadPinController::class)->name('upload_pin');
    Route::post('upload-avatar', UploadAvatarController::class)->name('upload_avatar');

    Route::get('my-pins', MyPinsController::class)->name('my_pins');

    Route::post('pins/{pin}/save-pin', [SavePinController::class, 'save'])->name('save_pin');
    Route::post('pins/{pin}/unsave-pin', [SavePinController::class, 'unsave'])->name('unsave_pin');

    Route::get('/saved-pins', SavesController::class)->name('saves');

});

Route::get('pins/{pin}/download',DownloadPinController::class)->name('download_pin');
Route::get('pins/{pin}', PinController::class)->name('pin');
