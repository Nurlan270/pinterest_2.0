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
        return Storage::disk('pins')->exists($pin)
            ? Storage::disk('pins')->download($pin, \request()->input('name'))
            : back()->with('error_msg', 'Error while downloading, please try again later.');
    }
}
