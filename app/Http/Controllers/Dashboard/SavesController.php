<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pin;
use App\Models\Saves;
use Illuminate\Http\Request;

class SavesController extends Controller
{
    public function __invoke()
    {
        $saved_pins = auth()->user()->pins()->with('user')->get();

        return view('dashboard.saved-pins', compact('saved_pins'));
    }
}
