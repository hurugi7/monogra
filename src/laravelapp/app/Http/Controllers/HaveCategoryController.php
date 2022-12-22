<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HaveCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('have_category_index',[
            'categories' =>  $categories,
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
