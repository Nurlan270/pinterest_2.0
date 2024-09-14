<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Pin;
use App\Models\User;
use Illuminate\Http\Request;

class MyPinsController extends Controller
{
    public function __invoke()
    {
        $pins = Pin::query()
            ->where('user_id', auth()->id())
            ->latest()
            ->get(['id', 'title', 'description', 'image']);

        return view('dashboard.my-pins', compact('pins'));
    }
}
