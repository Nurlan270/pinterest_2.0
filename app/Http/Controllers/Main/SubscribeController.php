<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Pin;
use App\Models\Subscribers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SubscribeController extends Controller
{
    public function subscribe(User $author, Pin $pin): void
    {
        Gate::authorize('subscribe', $pin);
        $author->subscribers()->attach(auth()->id());
    }

    public function unsubscribe(User $author, Pin $pin): void
    {
        Gate::authorize('unsubscribe', $pin);
        $author->subscribers()->detach(auth()->id());
    }

    public function subscribeAuthor(User $author): void
    {
        Gate::authorize('subscribe', $author);
        $author->subscribers()->attach(auth()->id());
    }

    public function unsubscribeAuthor(User $author): void
    {
        Gate::authorize('unsubscribe', $author);
        $author->subscribers()->detach(auth()->id());
    }
}
