<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Item;

class HaveItemController extends Controller
{
    public function index(int $category, int $sub_category)
    {
        $categories = Category::all();

        $current_category = Category::find($category);

        $sub_categories = SubCategory::where('category_id', $current_category->id)->get();

        $current_sub_category = SubCategory::find($sub_category);

        $items = Item::where('sub_category_id', $current_sub_category->id)->get();

        return view('item.item_index',[
            'categories' =>  $categories,
            'current_category_id' => $current_category->id,
            'sub_categories' => $sub_categories,
            'current_sub_category' => $current_sub_category,
            'current_sub_category_id' => $current_sub_category->id,
            'items' => $items,
        ]);
    }
}
