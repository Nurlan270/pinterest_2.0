<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Pin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadPinController extends Controller
{
    public function __invoke($pin)
    {
        dd($pin, Storage::download('storage/pins/'.$pin)->isEmpty());
        return Storage::exists('pins/'.$pin)
            ? Storage::download('pins/'.$pin, \request()->input('name'))->send()
            : back();
    }
}
