<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Notifications\SubscribedToNews;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class SubscribeToNewsController extends Controller
{
    public function __invoke()
    {
        try {
            Notification::route('mail', \request()->input('email'))
                ->notify(new SubscribedToNews());
            return \response()->json(null, 200);
        } catch (\Throwable $e) {
            return \response()->json('Error occurred: '.$e, $e->getCode());
        }
    }
}
