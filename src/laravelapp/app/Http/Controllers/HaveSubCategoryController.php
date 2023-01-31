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
    public function index(int $category)
    {
        $current_category = Category::find($category);

        $sub_categories = SubCategory::where('category_id', $current_category->id)->withCount('items')->get();

        return view('sub_category.sub_category_index',[
            'current_category' => $current_category,
            'current_category_id' => $current_category->id,
            'sub_categories' => $sub_categories,
        ]);
    }

    public function create(int $category)
    {
        $current_category = Category::find($category);

        return view('sub_category.sub_category_create', [
            'current_category_id' => $current_category->id,
        ]);
    }

    public function store(CreateSubCategory $request, int $category)
    {
        $current_category = Category::find($category);

        $sub_category = new SubCategory();

        $sub_category->sub_category_name = $request->sub_category_name;
        $sub_category->user_id = Auth::user()->id;

        $current_category->subCategories()->save($sub_category);


        return redirect()->route('have_sub_category.index', [
            'category' => $current_category->id,
        ]);
    }

    public function destroy(int $category, int $sub_category)
    {
        $current_category = Category::find($category);

        $sub_category = SubCategory::where('category_id', $current_category->id)->get()->find($sub_category);

        $sub_category->delete();

        return redirect()->route('have_sub_category.index', [
            'category' => $current_category->id,
        ]);
    }

    public function edit(int $category, int $sub_category)
    {
        $current_category = Category::find($category);

        $sub_category = SubCategory::where('category_id', $current_category->id)->get()->find($sub_category);

        return view('sub_category.sub_category_edit', [
            'current_category_id' => $current_category->id,
            'sub_category' => $sub_category,
        ]);
    }

    public function update(CreateSubCategory $request, int $category, int $sub_category)
    {
        $current_category = Category::find($category);

        $sub_category = SubCategory::where('category_id', $current_category->id)->get()->find($sub_category);

        $sub_category->sub_category_name = $request->sub_category_name;

        $current_category->subCategories()->save($sub_category);

        return redirect()->route('have_sub_category.index', [
            'category' => $current_category->id,
        ]);
    }
}
