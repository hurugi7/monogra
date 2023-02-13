<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateSubCategory;
use App\Models\Category;
use App\Models\User;
use App\Models\SubCategory;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class HaveSubCategoryController extends Controller
{
    public function index(Category $category)
    {
        $user = Auth::user();



        return view('sub_category.sub_category_index',[
            'current_category' => $category,
            'current_category_id' => $category->id,
            'sub_categories' => $sub_categories,
            'user' => $user,
        ]);
    }

    public function create(Category $category)
    {
        $user = Auth::user();


        return view('sub_category.sub_category_create', [
            'current_category_id' => $category->id,
            'user' => $user,
        ]);
    }

    public function store(CreateSubCategory $request, Category $category)
    {
        $sub_category = new SubCategory();

        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->user_id = Auth::user()->id;

        $category->subCategories()->save($sub_category);

        return redirect()->route('have_sub_category.index', [
            'category' => $category->id,
        ]);
    }

    public function destroy(Category $category, subCategory $sub_category)
    {
        $sub_category->delete();

        return redirect()->route('have_sub_category.index', [
            'category' => $category->id,
        ]);
    }

    public function edit(Category $category, subCategory $sub_category)
    {
        $user = Auth::user();


        return view('sub_category.sub_category_edit', [
            'current_category_id' => $category->id,
            'sub_category' => $sub_category,
            'user' => $user,
        ]);
    }

    public function update(CreateSubCategory $request, Category $category, subCategory $sub_category)
    {
        $sub_category->sub_category_name = $request->sub_category_name;

        $category->subCategories()->save($sub_category);

        return redirect()->route('have_sub_category.index', [
            'category' => $category->id,
        ]);
    }
}
