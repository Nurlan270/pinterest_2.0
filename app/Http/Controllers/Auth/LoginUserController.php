<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $credentials = $request->validated();

        $loginField = filter_var($credentials['email_or_login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        if (Auth::attempt([
            $loginField => $credentials['email_or_login'],
            'password' => $credentials['password']
        ])) {
            return redirect()->route('for_you')
                ->with('auth_msg', 'You logged in successfully!');
        }

        return back()->withInput();
    }
}
