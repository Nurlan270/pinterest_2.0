<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $credentials = $request->validated();

        $user = User::query()->create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ]);

        auth()->login($user);

        return redirect()->route('home')
            ->with('auth_msg', 'You registered successfully!');
    }
}
