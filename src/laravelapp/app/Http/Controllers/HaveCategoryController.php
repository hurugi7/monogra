<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategory;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;

class HaveCategoryController extends Controller
{
    public function index()
    {
        $categories = Auth::user()->categories()->withCount('subCategories')->get();

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

    public function store(CreateCategory $request)
    {
        $category = new Category();

        $category->category_name = $request->category_name;

        Auth::user()->categories()->save($category);

        return redirect()->route('have_category.index');
    }

    public function edit(int $category)
    {
        $category = Category::find($category);

        return view('category.category_edit', [
            'category' => $category,
        ]);
    }

    public function update(CreateCategory $request, int $category)
    {
        $category = Category::find($category);

        $category->category_name = $request->category_name;

        Auth::user()->categories()->save($category);

        return redirect()->route('have_category.index');
    }

    public function destroy(int $category)
    {
        $category = Category::find($category);
        $category->delete();
        return redirect()->route('have_category.index');
    }
}
