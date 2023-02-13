<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditUser;

class UserController extends Controller
{
    public function edit() {
        $user = Auth::user();

        return view('user.edit', [
            'user' => $user,
        ]);
    }

    public function update(EditUser $request)
    {
        $user = Auth::user();

        $user->name = $request->name;

        if($request->file('user_profile_img')) {
            $user->profile_img_path = $request->file('user_profile_img')->store('profile', 'public');
        }

        $user->save();

        return redirect()->route('user.edit', [
            'user' => $user,
        ]);
    }
}
