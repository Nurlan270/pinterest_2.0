<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Pin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadPinController extends Controller
{
    public function __invoke($pin): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        return Storage::download('storage/pins/'.$pin, \request()->input('name'));
    }
}
