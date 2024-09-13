<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Pin;
use App\Models\Saves;
use App\Models\Subscribers;
use Illuminate\Http\Request;

class PinController extends Controller
{
    public function __invoke(Pin $pin)
    {
        $is_saved = Saves::query()
            ->where('user_id', auth()->id())
            ->where('pin_id', $pin->id)
            ->exists();

        $is_subscribed = Subscribers::query()
            ->where('subscriber_id', auth()->id())
            ->where('author_id', $pin->user_id)
            ->exists();

        return view('main.pin', compact('pin', 'is_saved', 'is_subscribed'));
    }
}
