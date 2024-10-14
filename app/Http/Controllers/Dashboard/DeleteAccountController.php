<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteAccountController extends Controller
{
    public function __invoke(): \Illuminate\Http\RedirectResponse
    {
        User::query()->where('id', auth()->id())->delete();

        auth()->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('home')
            ->with('notification_msg', 'You was logged out, and your account was deleted successfully!');
    }
}
