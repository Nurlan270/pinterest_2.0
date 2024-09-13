<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Pin;
use App\Models\User;

class SavePinController extends Controller
{
    public function save(Pin $pin): void
    {
        auth()->user()->saved_pins()->attach($pin);
    }

    public function unsave(Pin $pin): void
    {
        auth()->user()->saved_pins()->detach($pin);
    }
}
