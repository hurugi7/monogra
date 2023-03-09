<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $category = $user->categories()->first();

        session(['checkPointURL' => url()->current()]);

        if(is_null($category)) {
            return view('home', [
                'user' => $user,
            ]);
        }

        return redirect()->route('have_category.index', [
            'user' => $user,
        ]);

    }
}
