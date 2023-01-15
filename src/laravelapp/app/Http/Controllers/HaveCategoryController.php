<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class HaveCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('subCategories')->get();

        $items = SubCategory::withCount('items')->get();

        return view('category.category_index', [
            'categories' => $categories,
            'items' => $items,
        ]);
    }

    public function create()
    {
        return view('category.category_create');
    }

    public function store(Request $request)
    {
        $category = new Category();

        $category->category_name = $request->category_name;

        $category->save();

        return redirect()->route('category.category_index');
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
