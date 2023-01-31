<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Item;
use App\Models\ItemPhoto;
use App\Http\Requests\CreateItem;
use App\Http\Requests\CreateItemPhoto;
use Illuminate\Support\Facades\Auth;

class HaveItemController extends Controller
{
    public function index(int $category, int $sub_category)
    {
        $current_category = Category::find($category);

        $current_sub_category = SubCategory::find($sub_category);

        $items = Item::where('sub_category_id', $current_sub_category->id)->get();

        return view('item.item_index',[
            'current_category_id' => $current_category->id,
            'current_sub_category' => $current_sub_category,
            'current_sub_category_id' => $current_sub_category->id,
            'items' => $items,
        ]);
    }

    public function create(int $category, int $sub_category)
    {
        $current_category = Category::find($category);

        $current_sub_category = SubCategory::find($sub_category);

        return view('item.item_create', [
            'current_category_id' => $current_category->id,
            'current_sub_category_id' => $current_sub_category->id,
        ]);
    }

    public function store(CreateItem $request, int $category, int $sub_category)
    {
        $current_category = Category::find($category);

        $current_sub_category = SubCategory::find($sub_category);

        $item = new Item();

        $item->item_name = $request->item_name;
        $item->item_num = $request->item_num;
        $item->price = $request->price;
        $item->purchased_at = $request->purchased_at;
        $item->purchased_in = $request->purchased_in;
        $item->note = $request->note;
        $item->user_id = Auth::user()->id;

        $current_sub_category->items()->save($item);

        if($request->file('files')) {
            foreach($request->file('files') as $each_file) {
                //画像のオリジナルネームを取得
                $file_name = $each_file['photo']->getClientOriginalName();
                //大文字の拡張子だとファイル判定されないため、すべて小文字にする
                $file_name = mb_strtolower($file_name);
                // 画像を保存して、そのパスを$pathに保存
                $path = $each_file['photo']->storeAs('photos', $file_name);
                // photosメソッドにより、商品に紐付けられた画像を保存する
                $item->photos()->create(['path' => $path]);
            }
        }

        return redirect()->route('have_item.index', [
            'category' => $current_category->id,
            'sub_category' => $current_sub_category->id
        ]);

    }

    public function show(int $category, int $sub_category, int $item)
    {
        $current_category = Category::find($category);

        $current_sub_category = SubCategory::find($sub_category);

        $current_item = Item::find($item);

        $photos = $current_item->photos()->where('item_id', $current_item->id)->get();

        return view('item.item_show', [
            'current_category_id' => $current_category->id,
            'current_sub_category_id' => $current_sub_category->id,
            'current_item' => $current_item,
            'photos' => $photos,
        ]);
    }

    public function destroy(int $category, int $sub_category, int $item)
    {
        $current_category = Category::find($category);

        $current_sub_category = SubCategory::find($sub_category);

        $current_item = Item::find($item);

        $current_item->photos()->delete();

        $current_item->delete();

        return redirect()->route('have_item.index', [
            'category' => $current_category->id,
            'sub_category' => $current_sub_category->id,
        ]);
    }

    public function edit(int $category, int $sub_category, int $item)
    {
        $current_category = Category::find($category);

        $current_sub_category = SubCategory::find($sub_category);

        $current_item = Item::find($item);

        $photos = $current_item->photos()->where('item_id', $current_item->id)->get();

        return view('item.item_edit', [
            'current_category_id' => $current_category->id,
            'current_sub_category_id' => $current_sub_category->id,
            'current_item' => $current_item,
            'photos' => $photos,
        ]);
    }

    public function update(CreateItem $request, int $category, int $sub_category, int $item)
    {
        $current_category = Category::find($category);

        $current_sub_category = SubCategory::find($sub_category);

        $item = Item::find($item);

        $item->item_name = $request->item_name;
        $item->item_num = $request->item_num;
        $item->price = $request->price;
        $item->purchased_at = $request->purchased_at;
        $item->purchased_in = $request->purchased_in;
        $item->note = $request->note;

        $current_sub_category->items()->save($item);

        if($request->file('files')) {
            foreach($request->file('files') as $each_file) {
                //画像のオリジナルネームを取得
                $file_name = $each_file['photo']->getClientOriginalName();
                //大文字の拡張子だとファイル判定されないため、すべて小文字にする
                $file_name = mb_strtolower($file_name);
                // 画像を保存して、そのパスを$pathに保存
                $path = $each_file['photo']->storeAs('photos', $file_name);
                // photosメソッドにより、商品に紐付けられた画像を保存する
                $item->photos()->create(['path' => $path]);
            }
        }

        return redirect()->route('have_item.index', [
            'category' => $current_category->id,
            'sub_category' => $current_sub_category->id,
        ]);
    }
}
