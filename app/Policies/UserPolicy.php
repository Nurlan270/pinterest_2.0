<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function subscribe(User $user, User $author): bool
    {
        return $user->id !== $author->id;
    }

    public function unsubscribe(User $user, User $author): bool
    {
        return $user->id !== $author->id;
    }
}
