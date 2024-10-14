<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pin;
use App\Models\Saves;
use App\Models\Subscribers;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteAccountController extends Controller
{
    public function __invoke(): \Illuminate\Http\RedirectResponse
    {
        // Delete User
        User::query()->where('id', auth()->id())->delete();

        // Delete all related data
        Pin::query()->where('user_id', auth()->id())->delete();

        Saves::query()->where('user_id', auth()->id())->delete();

        Subscribers::query()
            ->where('author_id', auth()->id())
            ->orWhere('subscriber_id', auth()->id())
            ->delete();

        auth()->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('home')
            ->with('notification_msg', 'You was logged out, and your account was deleted successfully!');
    }
}
