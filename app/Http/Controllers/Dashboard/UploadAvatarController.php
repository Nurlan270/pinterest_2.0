<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UploadAvatarRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\ImageFile;
use function Termwind\renderUsing;

class UploadAvatarController extends Controller
{
    public function __invoke(Request $request, UploadAvatarRequest $uploadAvatarRequest)
    {
        $uploadAvatarRequest->validated();

        $avatar = $request->file('avatar');
        $avatarName = $avatar->hashName();
        $currentUserAvatar = User::query()->where('id', auth()->id())->first('avatar')['avatar'];

        if (! empty($currentUserAvatar)) {
            Storage::disk('avatars')->delete($currentUserAvatar);
        }

        Storage::disk('avatars')->putFileAs('/', $avatar, $avatarName);

        User::query()->where('id', auth()->id())->update(['avatar' => $avatarName]);

        return back()->with('notification_msg', 'Your avatar was updated');
    }
}
