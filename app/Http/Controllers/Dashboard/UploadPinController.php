<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UploadPinRequest;
use App\Models\Pin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadPinController extends Controller
{
    public function __invoke(UploadPinRequest $request)
    {
        $data = $request->validated();

        $image = $request->file('image');
        $imgName = time().'_'.$image->hashName();

        Storage::disk('pins')->putFileAs('/', $image, $imgName);

        Pin::query()->create([
            'user_id' => auth()->id(),
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $imgName,
        ]);

        return redirect()->route('my_pins')
            ->with('notification_msg', 'Your pin was uploaded');
    }
}
