<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class LoginUserController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->validated();

        $loginField = filter_var($credentials['email_or_login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        $errors = new MessageBag();

        if (Auth::attempt([
            $loginField => $credentials['email_or_login'],
            'password' => $credentials['password']
        ], isset($credentials['remember_me']))) {
            return redirect()->route('home')
                ->with('auth_msg', 'You logged in successfully!');
        } else {
            $errors->add('email_or_login', "User with this credentials doesn't exist, or credentials is invalid.");
            return back()->withErrors($errors);
        }
    }
}
