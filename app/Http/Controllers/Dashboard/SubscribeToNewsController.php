<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\SubscribedToNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpFoundation\Response;

class SubscribeToNewsController extends Controller
{
    public function __invoke(): \Illuminate\Http\JsonResponse
    {
        try {
            $email = \request()->input('email');

            auth()->user()->update(['subscription_email' => $email]);

            Notification::route('mail', $email)
                ->notify(new SubscribedToNews());

            session()->flash('notification_msg', "You've subscribed to our news.");
        } catch (\Throwable $e) {
            session()->flash('error_msg', 'An error occurred while subscribing, please try again later.');
        }
    }
}
