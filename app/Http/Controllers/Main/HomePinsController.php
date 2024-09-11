<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Pin;
use App\Models\Saves;
use Illuminate\Http\Request;

class HomePinsController extends Controller
{
    public function __invoke()
    {
        $pins = Pin::query()
            ->where('user_id', '!=', auth()->id())
            ->inRandomOrder()
            ->paginate(30, ['id', 'user_id', 'title', 'image'], 'p');

        $saves = Saves::query()->where('user_id', auth()->id())->get('pin_id');

        return view('main.home', compact('pins', 'saves'));
    }
}
