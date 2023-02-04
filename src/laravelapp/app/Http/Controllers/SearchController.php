<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $user = Auth::user();

        $search = $request->input('search');

        $user_id = Auth::user()->id;
        $items = Item::all();

        $query = Item::query();

        if($search) {
            $query->where('item_name', 'like', '%'.$search.'%')->where('user_id', $user_id);
            $items = $query->paginate(10);
        } else {
            return back();
        }
        return view('search_result' ,[
            'items' => $items,
            'search' => $search,
            'user' => $user,
        ]);
    }
}
