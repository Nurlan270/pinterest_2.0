<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Pin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class DeletePinController extends Controller
{
    public function __invoke(Pin $pin): \Illuminate\Http\RedirectResponse
    {
        Gate::authorize('delete', $pin);

        Storage::delete('pins/'.$pin->image);
        $pin->delete();

        return redirect()->route('my_pins')
            ->with('notification_msg', 'Pin deleted successfully');
    }
}
