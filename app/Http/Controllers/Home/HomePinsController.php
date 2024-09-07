<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Pin;
use Illuminate\Http\Request;

class HomePinsController extends Controller
{
    public function __invoke()
    {
        $pins = Pin::query()->latest()->paginate(30, ['id', 'title', 'description', 'image'], 'p');

        return view('home', compact('pins'));
    }
}
