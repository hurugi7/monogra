<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class HaveCategoryController extends Controller
{
    public function index()
    {
        $user_1_categories = Category::where('user_id', 1)->get();

        $sub_categories = SubCategory::whereIn('category_id', [1, 2, 3, 4, 5, 6, 7, 8])->get();

        return view('have_category_index',[
            'user_1_categories' =>  $user_1_categories,
            'sub_categories' => $sub_categories,
        ]);
    }

    public function create()
    {
        return 'Hello, world!';
    }

    public function store()
    {
        return 'Hello, world!';
    }

    public function edit()
    {
        return 'Hello, world!';
    }

    public function update()
    {
        return 'Hello, world!';
    }

    public function destroy()
    {
        return 'Hello, world!';
    }
}
