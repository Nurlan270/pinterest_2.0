<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Pin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadPinController extends Controller
{
    public function __invoke($pin)
    {
        return Storage::download('pins/'.$pin, \request()->input('name'));
    }
}
