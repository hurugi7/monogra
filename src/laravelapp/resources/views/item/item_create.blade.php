<x-guest-layout>
  <x-header/>
  <div class="mt-16 mx-60 border-solid border-gray-300 rounded-lg border shadow-sm">
    <div class="flex px-2 py-3 border-solid border-gray-300 border-b">
      <a href="{{ route('have_item.index' ,['category' => $current_category_id, 'sub_category' => $current_sub_category_id]) }}" class="py-3 mr-6">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </a>
      <div class="py-3">アイテムを追加する</div>
    </div>
    @if($errors->any())
      <div class="mx-8 my-3 p-3 bg-red-200 rounded">
        <ul>
          @foreach($errors->all() as $message)
            <li class="text-red-600">{{ $message }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="{{ route('have_item.store' ,['category' => $current_category_id, 'sub_category' => $current_sub_category_id]) }}" method="post" enctype="multipart/form-data" class="mx-8 my-3">
      @csrf
      <div>
        <label for="item_name" class="block text-sm font-bold text-gray-900 mb-2">
          アイテム名
        </label>
        <input type="text" class="block w-full p-4 mb-5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500" name="item_name" id="item_name" value="{{ old('item_name') }}">
      </div>
      <div class="mb-5">
        <label for="image_path" class="block text-sm font-bold text-gray-900 mb-2">
          アイテム写真（複数選択可）
        </label>
        <div id="box">
          <input type="file" name="files[][photo]" onchange="loop(event, 'item1')" multiple>
          <div id="preview-item1" class="flex mt-2 w-1/6"></div>
        </div>
      </div>
      <div>
        <label for="price" class="block text-sm font-bold text-gray-900 mb-2">
          値段
        </label>
        <input type="text" class="block w-full p-4 mb-5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500" name="price" id="price" value="{{ old('price') }}">
      </div>
      <div>
        <label for="item_num" class="block text-sm font-bold text-gray-900 mb-2">
          個数
        </label>
        <input type="text" class="block w-full p-4 mb-5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500" name="item_num" id="item_num" value="{{ old('item_num') }}">
      </div>
      <div>
        <label for="purchased_at" class="block text-sm font-bold text-gray-900 mb-2">
          購入日
        </label>
        <input type="text" class="block w-full p-4 mb-5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500" name="purchased_at" id="purchased_at" value="{{ old('purchased_at') }}">
      </div>
      <div>
        <label for="purchased_in" class="block text-sm font-bold text-gray-900 mb-2">
          購入場所
        </label>
        <input type="text" class="block w-full p-4 mb-5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500" name="purchased_in" id="purchased_in" value="{{ old('purchased_in') }}">
      </div>
      <div>
        <label for="note" class="block text-sm font-bold text-gray-900 mb-2">
          ノート
        </label>
        <textarea class="block w-full p-4 mb-5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500" name="note" id="note">
          {{ old('note') }}
        </textarea>
      </div>
      <div class="text-right">
        <a href="{{ route('have_item.store' ,['category' => $current_category_id, 'sub_category' => $current_sub_category_id]) }}">
          <button class="text-right bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
            追加する
          </button>
        </a>
      </div>
    </form>
  </div>
  <script>
    flatpickr('#purchased_at', {
      locale: "ja"
    });

    var cnt = 0; // アップロードカウント
    var tmpId = 'tmp-' + cnt; // 一時保存用のID
    //アップロードファイルの数だけプレビュー関数をループさせる
    function loop(event, id){
        for (let file of event.target.files)
        {
            imgPreView(file, id);
        }
        // 一時保存用のIDを更新
        tmpId = 'tmp-' + ++cnt;
    }
    //アップロードファイルのプレビューを表示
    function imgPreView(file, id){
        let preview = document.getElementById("preview-"+ id);
        let previewImages = document.getElementsByClassName(tmpId);
        let reader = new FileReader();

        if(previewImages != null) {
            for(let img of previewImages){
                preview.removeChild(img);
            }
        }

        reader.onload = function(event) {
            var img = document.createElement("img");
            img.setAttribute("src", reader.result);
            img.setAttribute("id", "previewImage-" + id);
            img.setAttribute("class", tmpId);
            preview.appendChild(img);
        };

        reader.readAsDataURL(file);
    }
  </script>
</x-guest-layout>
