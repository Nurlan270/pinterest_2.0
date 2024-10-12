<?php

use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\LogoutUserController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SendResetLinkController;
use App\Http\Controllers\Dashboard\ChangePasswordController;
use App\Http\Controllers\Dashboard\DeleteAccountController;
use App\Http\Controllers\Dashboard\MyPinsController;
use App\Http\Controllers\Dashboard\SavesController;
use App\Http\Controllers\Dashboard\SubscribeToNewsController;
use App\Http\Controllers\Dashboard\UnsubscribeFromNewsController;
use App\Http\Controllers\Dashboard\UploadAvatarController;
use App\Http\Controllers\Dashboard\UploadPinController;
use App\Http\Controllers\Main\DeletePinController;
use App\Http\Controllers\Main\DownloadPinController;
use App\Http\Controllers\Main\HomePinsController;
use App\Http\Controllers\Main\PinController;
use App\Http\Controllers\Main\SavePinController;
use App\Http\Controllers\Main\SubscribeController;
use App\Http\Controllers\Main\UserProfileController;
use App\Notifications\SubscribedToNews;
use App\Notifications\UnsubscribedFromNews;
use Illuminate\Support\Facades\Route;

//      Main page
Route::get('/', HomePinsController::class)->name('home');


//      Auth pages
Route::view('register', 'auth.register')->middleware('guest')->name('register');
Route::view('login', 'auth.login')->middleware('guest')->name('login');
Route::view('forgot-password', 'auth.forgot-password')->middleware('guest')->name('password.request');

Route::get('reset-password', function () {
    return view('auth.reset-password', ['token' => request('token')]);
})->middleware('guest')->name('password.reset');


//      Auth actions
Route::post('register', RegisterUserController::class)->middleware('guest')->name('register_user');
Route::post('login', LoginUserController::class)->middleware('guest')->name('login_user');
Route::post('forgot-password', SendResetLinkController::class)->middleware('guest')->name('password.email');
Route::post('reset-password', ResetPasswordController::class)->middleware('guest')->name('password.update');
Route::get('logout', LogoutUserController::class)->middleware('auth')->name('logout_user');


//      Dashboard (Routes related to user)
Route::middleware('auth')->group(function () {

    //      Views
    Route::view('profile', 'dashboard.profile')->name('profile');
    Route::view('settings', 'dashboard.settings')->name('settings');
    Route::view('pins/create', 'dashboard.create-pin')->name('create_pin');

    Route::post('change/password', ChangePasswordController::class)->name('change_password');
    Route::post('delete/account', DeleteAccountController::class)->name('delete_account');

    Route::post('pins/upload', UploadPinController::class)->name('upload_pin');
    Route::post('avatars/upload', UploadAvatarController::class)->name('upload_avatar');

    Route::get('pins/mine', MyPinsController::class)->name('my_pins');

    Route::post('pins/{pin}/save', [SavePinController::class, 'save'])->name('save_pin');
    Route::post('pins/{pin}/unsave', [SavePinController::class, 'unsave'])->name('unsave_pin');

    Route::get('pins/saved', SavesController::class)->name('saves');

    Route::post('author/{author}/{pin}/subscribe', [SubscribeController::class, 'subscribe'])->name('subscribe');
    Route::post('author/{author}/{pin}/unsubscribe', [SubscribeController::class, 'unsubscribe'])->name('unsubscribe');

    Route::post('author/{author}/subscribe', [SubscribeController::class, 'subscribeAuthor'])->name('subscribe_author');
    Route::post('author/{author}/unsubscribe', [SubscribeController::class, 'unsubscribeAuthor'])->name('unsubscribe_author');

    Route::delete('pins/{pin}', DeletePinController::class)->name('delete_pin');

    Route::post('subscribe-to-news', SubscribeToNewsController::class);
    Route::post('unsubscribe-from-news', UnsubscribeFromNewsController::class);
});

Route::get('pins/{pin}/download', DownloadPinController::class)->name('download_pin');
Route::get('pins/{pin}', PinController::class)->name('pin');

Route::get('users/{user}', UserProfileController::class)->name('user');

Route::view('/mail', 'mail.reset-password');
