<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Item;

class HaveSubCategoryController extends Controller
{
    public function index(int $category, int $sub_category)
    {
        $categories = Category::all();

        $current_category = Category::find($category);

        $sub_categories = SubCategory::where('category_id', $current_category->id)->get();

        return view('have_category_index',[
            'categories' =>  $categories,
            'current_category_id' => $current_category->id,
            'sub_categories' => $sub_categories,
        ]);
    }
}
