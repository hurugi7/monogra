<x-guest-layout>
  <x-header :user="$user"/>
  <div class="my-2 sm:my-5 mx-2 border-solid border-gray-300 rounded-lg border shadow-sm">
    <div class="flex justify-between items-center border-solid border-gray-300 border-b">
      <a href="{{ route('have_item.index' ,['category' => $current_category_id, 'sub_category' => $current_sub_category_id]) }}" class="ml-2 mr-6">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </a>
      <div class="py-3">アイテム詳細</div>
      <div class="px-2 sm:px-4">
        <a href="{{ route('have_item.edit', ['category' => $current_category_id, 'sub_category' => $current_sub_category_id, 'item' => $current_item->id]) }}">
          <button class="text-right text-xs sm:text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
            <i class="fa-solid fa-pen-to-square"></i>
            編集
          </button>
        </a>
      </div>
    </div>
    <div class="mx-4 my-3">
      <div>
      <div class="block text-xs sm:text-sm text-gray-900 mb-1">アイテム名</div>
      <div class="p-1 mb-3 text-lg sm:text-xl">{{ $current_item->item_name }}</div>
      </div>
      <div class="mb-5">
        <div class="block text-xs sm:text-sm text-gray-900 mb-1">
          アイテム写真
        </div>
        <div class="responsive flex m-2 mb-5 w-full h-full">
          @if($current_item->photos()->where('item_id', $current_item->id)->exists())
            @foreach($photos as $photo)
              <img src="{{ asset('storage/' . $photo->path) }}" class="w-48 h-48 object-cover rounded-lg">
            @endforeach
          @else
            <img src="{{ asset('storage/20200505_noimage.png') }}" alt="" class="w-full h-full object-cover">
          @endif
        </div>
      </div>
      <div>
        <div class="block text-xs sm:text-sm text-gray-900 mb-1">
          値段
        </div>
        <div class="p-1 mb-3 text-lg sm:text-xl">￥{{ $current_item->price }}</div>
      </div>
      <div>
        <div class="block text-xs sm:text-sm text-gray-900 mb-1">
          個数
        </div>
        <div class="p-1 mb-3 text-lg sm:text-xl">{{ $current_item->item_num }}</div>
      </div>
      <div>
        <div class="block text-xs sm:text-sm text-gray-900 mb-1">
          購入日
        </div>
        <div class="p-1 mb-3 text-lg sm:text-xl">{{ $current_item->purchased_at }}</div>
      </div>
      <div>
        <div class="block text-xs sm:text-sm text-gray-900 mb-1">
          購入場所
        </div>
        <div class="p-1 mb-3 text-lg sm:text-xl break-all">
          {!! nl2br(e($current_item->purchased_in)) !!}
        </div>
      </div>
      <div>
        <div class="block text-xs sm:text-sm text-gray-900 mb-1">
          ノート
        </div>
        <div class="p-1 mb-3 text-lg sm:text-xl break-all">
          {!! nl2br(e($current_item->note)) !!}
        </div>
      </div>
    </div>
  </div>

  <script>
    $('.responsive').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      adaptiveHeight:true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: false,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
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
