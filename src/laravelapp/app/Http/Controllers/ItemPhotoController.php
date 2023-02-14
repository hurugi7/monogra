<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Item;
use App\Models\ItemPhoto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemPhotoController extends Controller
{
    public function index(Category $category, subCategory $sub_category, Item $item)
    {
        $this->checkRelation($category, $sub_category, $item);

        $user = Auth::user();

        $item_photos = ItemPhoto::where('item_id', $item->id)->get();

        session(['checkPointURL' => url()->current()]);

        return view('item_photo.item_photo_index', [
            'current_category_id' => $category->id,
            'current_sub_category_id' => $sub_category->id,
            'current_item_id' => $item->id,
            'item_photos' => $item_photos,
            'user' => $user,
        ]);
    }

    public function destroy(Category $category, subCategory $sub_category, Item $item, ItemPhoto $item_photo)
    {
        Storage::disk('public')->delete($item_photo->path);
        $item_photo->delete();

        return redirect()->route('item_photo.index', [
            'category' => $category->id,
            'sub_category' => $sub_category->id,
            'item' => $item->id,
        ]);
    }

    private function checkRelation(Category $category, SubCategory $sub_category, Item $item)
    {
        if ($category->id !== $sub_category->category_id || $sub_category->id !== $item->sub_category_id) {
            abort(404);
        }
    }
}
