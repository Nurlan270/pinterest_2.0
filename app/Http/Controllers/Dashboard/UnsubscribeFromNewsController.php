<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\UnsubscribedFromNews;
use Illuminate\Support\Facades\Notification;

class UnsubscribeFromNewsController extends Controller
{
    public function __invoke()
    {
        try {
            Notification::route('mail', auth()->user()->subscription_email)
                ->notify(new UnsubscribedFromNews());

            auth()->user()->update(['subscription_email' => null]);

            session()->flash('notification_msg', "You've unsubscribed from our news.");
        } catch (\Throwable $e) {
            session()->flash('error_msg', 'An error occurred while unsubscribing, please try again later.');
        }
    }
}
