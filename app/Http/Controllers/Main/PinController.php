<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Pin;
use App\Models\Saves;
use Illuminate\Http\Request;

class PinController extends Controller
{
    public function __invoke(Pin $pin)
    {
        $is_saved = Saves::query()
            ->where('user_id', auth()->id())
            ->where('pin_id', $pin->id)
            ->exists();

        return view('main.pin', compact('pin', 'is_saved'));
    }
}
