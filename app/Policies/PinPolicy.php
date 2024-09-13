<?php

namespace App\Policies;

use App\Models\Pin;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PinPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, Pin $pin): bool
    {
        return $user->id === $pin->user_id;
    }

    public function save(User $user, Pin $pin): bool
    {
        return $user->id !== $pin->user_id;
    }

    public function subscribe(User $user, Pin $pin): bool
    {
        return $user->id !== $pin->user_id;
    }

    public function unsubscribe(User $user, Pin $pin): bool
    {
        return $user->id !== $pin->user_id;
    }
}
