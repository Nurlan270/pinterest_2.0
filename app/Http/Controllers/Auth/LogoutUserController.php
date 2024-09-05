<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutUserController extends Controller
{
    public function __invoke()
    {
//        Auth::logoutOtherDevices();

        auth()->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('home')
            ->with('auth_msg', 'You logged out successfully!');
    }
}
