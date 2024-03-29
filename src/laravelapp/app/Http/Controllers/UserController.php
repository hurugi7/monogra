<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditUser;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    private const GUEST_USER_ID = 2;

    public function edit() {
        $user = Auth::user();

        return view('user.edit', [
            'user' => $user,
        ]);
    }

    public function update(EditUser $request)
    {
        $user = Auth::user();

        if($user->id == self::GUEST_USER_ID) {
            return redirect()->back()->withErrors(['guest' => 'ゲストユーザーのため、プロフィール編集はできません。']);
        }

        $user->name = $request->name;

        if($request->file('user_profile_img')) {
            $path = Storage::disk('s3')->putFile('images', $request->file('user_profile_img'), 'public');
            $user->profile_img_path = Storage::disk('s3')->url($path);
        }

        $user->save();

        return redirect()->route('user.edit', [
            'user' => $user,
        ]);
    }
}
