<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategory;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\User;
use App\Models\SubCategory;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Auth;

class HaveCategoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = Auth::user()->categories()->get();

        return view('category.category_index', [
            'user' => $user,
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        $user = Auth::user();
        return view('category.category_create',[
            'user' => $user,
        ]);
    }

    public function store(CreateCategory $request)
    {
        $category = new Category();

        $category->category_name = $request->category_name;

        Auth::user()->categories()->save($category);

        return redirect()->route('have_category.index');
    }

    public function edit(Category $category)
    {
        $user = Auth::user();


        return view('category.category_edit', [
            'category' => $category,
            'user' => $user,
        ]);
    }

    public function update(CreateCategory $request, Category $category)
    {
        $category->category_name = $request->category_name;

        Auth::user()->categories()->save($category);

        return redirect()->route('have_category.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('have_category.index');
    }
}
