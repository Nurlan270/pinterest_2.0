<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class SendResetLinkController extends Controller
{
    public function __invoke(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate(['email' => 'required|email|exists:users']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['notification_msg' => 'Reset link was sent to provided email'])
            : back()->withErrors(['email' => $status]);
    }
}
