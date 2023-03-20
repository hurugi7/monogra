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
use Illuminate\Support\Facades\Storage;

class HaveItemController extends Controller
{
    public function index(Category $category, subCategory $sub_category)
    {
        $this->checkRelation1($category, $sub_category);

        $user = Auth::user();

        $items = Item::where('sub_category_id', $sub_category->id)->get();

        session(['checkPointURL' => url()->current()]);

        return view('item.item_index',[
            'current_category' => $category,
            'current_category_id' => $category->id,
            'current_sub_category' => $sub_category,
            'current_sub_category_id' => $sub_category->id,
            'items' => $items,
            'user' => $user,
        ]);
    }

    public function create(Category $category, subCategory $sub_category)
    {
        $this->checkRelation1($category, $sub_category);

        $user = Auth::user();

        session(['checkPointURL' => url()->current()]);

        return view('item.item_create', [
            'current_category_id' => $category->id,
            'current_sub_category_id' => $sub_category->id,
            'user' => $user,
        ]);
    }

    public function store(CreateItem $request, Category $category, subCategory $sub_category)
    {
        $this->checkRelation1($category, $sub_category);

        $item = new Item();

        $item->item_name = $request->item_name;
        $item->item_num = $request->item_num;
        $item->price = $request->price;
        $item->purchased_at = $request->purchased_at;
        $item->purchased_in = $request->purchased_in;
        $item->note = $request->note;
        $item->user_id = Auth::user()->id;

        $sub_category->items()->save($item);

        if($request->file('files')) {
            foreach($request->file('files') as $each_file) {
                $path = Storage::disk('s3')->putFile('images', $each_file['photo'], 'public');
                $item->photos()->create(['path' => $path]);
            }
        }

        return redirect()->route('have_item.index', [
            'category' => $category->id,
            'sub_category' => $sub_category->id
        ]);

    }

    public function show(Category $category, subCategory $sub_category, Item $item)
    {
        $this->checkRelation2($category, $sub_category, $item);

        $user = Auth::user();

        $photos = $item->photos()->get();

        session(['checkPointURL' => url()->current()]);


        return view('item.item_show', [
            'current_category_id' => $category->id,
            'current_sub_category_id' => $sub_category->id,
            'current_item' => $item,
            'photos' => $photos,
            'user' => $user,
        ]);
    }

    public function destroy(Category $category, subCategory $sub_category, Item $item)
    {
        $this->checkRelation2($category, $sub_category, $item);

        $photos = $item->photos()->get();

        // 画像の削除処理
        foreach($photos as $photo) {
            Storage::disk('s3')->delete($photo->path);
            $photo->delete();
        }

        $item->delete();

        return redirect()->route('have_item.index', [
            'category' => $category->id,
            'sub_category' => $sub_category->id,
        ]);
    }

    public function edit(Category $category, subCategory $sub_category, Item $item)
    {
        $this->checkRelation2($category, $sub_category, $item);

        $user = Auth::user();

        $photos = $item->photos()->get();

        session(['checkPointURL' => url()->current()]);

        return view('item.item_edit', [
            'current_category_id' => $category->id,
            'current_sub_category_id' => $sub_category->id,
            'current_item' => $item,
            'photos' => $photos,
            'user' => $user,
        ]);
    }

    public function update(CreateItem $request, Category $category, subCategory $sub_category, Item $item)
    {
        $this->checkRelation2($category, $sub_category, $item);

        $photo_num = 0;

        if($item->photos()->exists()){
            $photo_num = $item->photos()->count();
        }

        if($request->file('files')){
            $upload_photo_num = count($request->file('files'));
        }

        // 画像の合計が５枚以下の場合
        if($request->file('files') && ($photo_num + $upload_photo_num) < 6) {
            foreach($request->file('files') as $each_file) {
                $path = Storage::disk('s3')->putFile('images', $each_file['photo'], 'public');
                $item->photos()->create(['path' => $path]);
            }
        // 画像の合計が５枚より多い場合
        } elseif($request->file('files') && ($photo_num + $upload_photo_num) > 5) {
            return redirect()->back()->with('warning', '写真は最大5枚までです');
        }

        $item->item_name = $request->item_name;
        $item->item_num = $request->item_num;
        $item->price = $request->price;
        $item->purchased_at = $request->purchased_at;
        $item->purchased_in = $request->purchased_in;
        $item->note = $request->note;

        $sub_category->items()->save($item);

        return redirect()->route('have_item.show', [
            'category' => $category->id,
            'sub_category' => $sub_category->id,
            'item' => $item->id,
        ]);
    }

    private function checkRelation1(Category $category, SubCategory $sub_category)
    {
        if ($category->id !== $sub_category->category_id ) {
            abort(404);
        }
    }

    private function checkRelation2(Category $category, SubCategory $sub_category, Item $item)
    {
        if ($category->id !== $sub_category->category_id || $sub_category->id !== $item->sub_category_id) {
            abort(404);
        }
    }
}
