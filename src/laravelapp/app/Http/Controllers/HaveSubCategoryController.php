<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Item;

class HaveSubCategoryController extends Controller
{
    public function index(int $category)
    {
        $categories = Category::all();

        $current_category = Category::find($category);

        $sub_categories = SubCategory::where('category_id', $current_category->id)->get();

        $items = SubCategory::withCount('items')->get();

        return view('sub_category.sub_category_index',[
            'categories' =>  $categories,
            'current_category' => $current_category,
            'current_category_id' => $current_category->id,
            'sub_categories' => $sub_categories,
            'items' => $items,
        ]);
    }
}
