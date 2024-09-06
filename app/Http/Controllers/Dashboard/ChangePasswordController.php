<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class ChangePasswordController extends Controller
{
    public function __invoke(Request $request)
    {
        $data = Validator::validate($request->input(), [
            'new_password' => ['required', Password::min(6)]
        ]);

        User::query()->where('id', auth()->id())->update(['password' => bcrypt($data['new_password'])]);

        return back()->with('notification_msg', 'Your password changed successfully!');
    }
}
