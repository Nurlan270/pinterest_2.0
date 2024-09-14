<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Pin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeletePinController extends Controller
{
    public function __invoke(Pin $pin): \Illuminate\Http\RedirectResponse
    {
        Gate::authorize('delete', $pin);

        $pin->delete();

        return redirect()->route('my_pins')
            ->with('notification_msg', 'Pin deleted successfully');
    }
}
