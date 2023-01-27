<x-guest-layout>
  <x-header/>
  <div class="mt-16 mx-16 border-solid border-gray-300 rounded-lg border shadow-sm bg-gray-200">
    <div class="flex justify-between items-center px-2 py-3 border-solid border-gray-300 border-b">
      <a href="{{ route('have_item.index' ,['category' => $current_category_id, 'sub_category' => $current_sub_category_id]) }}" class="py-3 px-2 mr-6">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </a>
      <div class="py-3">アイテム詳細</div>
      <div class="px-2">
        <a href="{{ route('have_item.edit', ['category' => $current_category_id, 'sub_category' => $current_sub_category_id, 'item' => $current_item->id]) }}">
          <button class="text-right bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
            編集する
          </button>
        </a>
      </div>
    </div>
    <div class="mx-8 my-3">
      <div>
      <div class="block text-sm font-bold text-gray-900 mb-2">アイテム名</div>
      <div class="p-2 mb-5">{{ $current_item->item_name }}</div>
      </div>
      <div class="mb-5">
        <div class="block text-sm font-bold text-gray-900 mb-2">
          アイテム写真
        </div>
        <div class="responsive flex p-2 mb-5 w-auto h-auto">
          @foreach($photos as $photo)
              <div class="basis-full">
                <div class="relative overflow-hidden pt-60% my-2.5 mx-1">
                  <img src="/item/{{ $photo->path }}" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full object-cover">
                </div>
              </div>
          @endforeach
        </div>
      </div>
      <div>
        <div class="block text-sm font-bold text-gray-900 mb-2">
          値段
        </div>
        <div class="p-2 mb-5">{{ $current_item->price }}円</div>
      </div>
      <div>
        <div class="block text-sm font-bold text-gray-900 mb-2">
          個数
        </div>
        <div class="p-2 mb-5">{{ $current_item->item_num }}</div>
      </div>
      <div>
        <div class="block text-sm font-bold text-gray-900 mb-2">
          購入日
        </div>
        <div class="p-2 mb-5">{{ $current_item->purchased_at }}</div>
      </div>
      <div>
        <div class="block text-sm font-bold text-gray-900 mb-2">
          購入場所
        </div>
        <div class="p-2 mb-5">{{ $current_item->purchased_in }}</div>
      </div>
      <div>
        <div class="block text-sm font-bold text-gray-900 mb-2">
          ノート
        </div>
        <div class="p-2 mb-5">{{ $current_item->note }}</div>
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
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
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
