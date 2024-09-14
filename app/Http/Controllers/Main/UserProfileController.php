<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Saves;
use App\Models\Subscribers;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function __invoke(User $user)
    {
        $saves = Saves::query()->where('user_id', auth()->id())->get('pin_id');

        $is_subscribed = Subscribers::query()
            ->where('subscriber_id', auth()->id())
            ->where('author_id', $user->id)
            ->exists();

        return view('main.user-profile', compact('user', 'saves', 'is_subscribed'));
    }
}
