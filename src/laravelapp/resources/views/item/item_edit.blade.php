<x-guest-layout>
  <x-header :user="$user"/>
  <div class="my-2 sm:my-5 mx-2 border-solid border-gray-300 rounded-lg border shadow-sm">
    <div class="flex items-center border-solid border-gray-300 border-b">
      <a href="{{ route('have_item.show' ,['category' => $current_category_id, 'sub_category' => $current_sub_category_id, 'item' => $current_item->id]) }}" class="ml-2 mr-6">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </a>
      <div class="py-3">アイテム編集</div>
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
    <form action="{{ route('have_item.update' ,['category' => $current_category_id, 'sub_category' => $current_sub_category_id, 'item' => $current_item->id]) }}" method="post" enctype="multipart/form-data" class="mx-8 my-3">
      @csrf
      @method('put')
      <div>
        <label for="item_name" class="block text-xs sm:text-sm text-gray-900 mb-1">
          アイテム名
        </label>
        <input type="text" class="block w-full p-4 mb-5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500" name="item_name" id="item_name" value="{{ old('item_name')?: $current_item->item_name }}">
      </div>
      <div class="mb-5">
        <div class="flex justify-between items-center">
          <label for="image_path" class="block text-xs sm:text-sm text-gray-900 mb-1">
            アイテム写真（{{ $current_item->photos()->count() }}/5）
          </label>
          <!-- 画像の編集ボタン -->
          @if($current_item->photos()->exists())
            <a href="{{ route('item_photo.index', ['category' => $current_category_id, 'sub_category' => $current_sub_category_id, 'item' => $current_item->id]) }}" class="inline-block">
              <i class="fa-regular fa-pen-to-square bg-blue-500 hover:bg-blue-700 text-white text-xs sm:text-sm py-2 px-2 rounded-lg"></i>
            </a>
          @endif
        </div>
        <!-- 画像が五枚より多かった時 -->
        @if(session()->has('warning'))
        <div class="mx-8 my-3 p-3 bg-red-200 rounded">
          <p class="text-red-600">{{ session('warning') }}</p>
        </div>
        @endif
        <div class="responsive flex m-2 mb-5 w-full h-full">
          @if($current_item->photos()->where('item_id', $current_item->id)->exists())
            @foreach($photos as $photo)
              <img src="{{ $photo->path }}" class="w-48 h-48 object-cover rounded-lg">
            @endforeach
          @else
            <div class="basis-full">
              <div class="relative overflow-hidden pt-60% my-2.5 mx-1">
                <img src="{{ Storage::disk('s3')->url('images/20200505_noimage.png') }}" alt="" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full object-cover">
              </div>
            </div>
          @endif
        </div>
        @if ($current_item->photos()->count() !== 5)
        <div id="box">
          <label class="py-2 px-2 rounded bg-green-600 hover:bg-green-700 text-white text-sm cursor-pointer">
            <i class="fa-solid fa-plus"></i>
            写真を追加
            <input type="file" name="files[][photo]" onchange="loop(event, 'item1')" multiple class="hidden">
          </label>
          <div id="preview-item1" class="flex flex-wrap mt-4"></div>
        </div>
        @else
        @endif
      </div>
      <div>
        <label for="price" class="block text-xs sm:text-sm text-gray-900 mb-1">
          値段
        </label>
        <input type="text" class="block w-full p-4 mb-5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500" name="price" id="price" value="{{ old('price')?: $current_item->price}}">
      </div>
      <div>
        <label for="item_num" class="block text-xs sm:text-sm text-gray-900 mb-1">
          個数
        </label>
        <input type="text" class="block w-full p-4 mb-5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500" name="item_num" id="item_num" value="{{ old('item_num')?: $current_item->item_num }}">
      </div>
      <div>
        <label for="purchased_at" class="block text-xs sm:text-sm text-gray-900 mb-1">
          購入日
        </label>
        <input type="text" class="block w-full p-4 mb-5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500" name="purchased_at" id="purchased_at" value="{{ old('purchased_at')?: $current_item->purchased_at }}">
      </div>
      <div>
        <label for="purchased_in" class="block text-xs sm:text-sm text-gray-900 mb-1">
          購入場所
        </label>
        <input type="text" class="block w-full p-4 mb-5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500" name="purchased_in" id="purchased_in" value="{{ old('purchased_in')?: $current_item->purchased_in }}">
      </div>
      <div>
        <label for="note" class="block text-xs sm:text-sm text-gray-900 mb-1">
          ノート
        </label>
        <textarea class="block w-full p-4 mb-5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500" name="note" id="note">
          {{ old('note')?: $current_item->note }}
        </textarea>
      </div>
      <div class="text-right">
        <a href="{{ route('have_item.update' ,['category' => $current_category_id, 'sub_category' => $current_sub_category_id, 'item' => $current_item->id]) }}">
          <button class="text-right bg-blue-500 hover:bg-blue-700 text-white text-xs sm:text-sm py-2 px-4 rounded-lg">
            編集する
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

    $('.responsive').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: false,
            dots: true,
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ],
      respondTo: 'slider'
    });
  </script>
</x-guest-layout>
