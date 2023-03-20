<x-guest-layout>
<x-header :user="$user"/>
  <div class="mt-4">
    <div class="flex items-center mt-8 p-2 sm:p-4 font-bold bg-[#faf3d4]">
      <div class="mr-5">
        <a href="{{ session('checkPointURL') }}">
          <i class="fa fa-arrow-left" aria-hidden="true"></i>
        </a>
      </div>
      <div class="text-sm sm:text-base">検索結果一覧</div>
    </div>
    <div class="bg-white">
      <div class="mt-4 ml-2 text-sm sm:text-base">「{{ $search }}」の検索結果</div>
      <div class="ml-2">
        <div class="mt-2">
          @if(count($items) >= 1)
            @foreach($items as $item)
              <div class="hover:bg-slate-200">
                <a href="{{ route('have_item.show', ['category' => $item->subCategory->category_id, 'sub_category' => $item->sub_category_id, 'item' => $item->id]) }}" class="block basis-11/12 px-4 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                  <div class="flex justify-between items-center">
                    <div class="flex items-center">
                      @if($item->photos()->where('item_id', $item->id)->exists())
                        <img src="{{ Storage::disk('s3')->url($item->photos()->first()->path) }}" alt="" class="w-16 h-16 object-cover rounded-md border-2 mr-5">
                      @else
                        <img src="{{ Storage::disk('s3')->url('images/20200505_noimage.png') }}" alt="" class="w-16 h-16 object-cover rounded-md border-2 mr-5">
                      @endif
                      <div class="text-lg font-medium">{{ $item->item_name }}</div>
                    </div>
                    <div>
                      <i class="fa-solid fa-angle-right fa-lg"></i>
                    </div>
                  </div>
                </a>
              </div>
            @endforeach
          @else
            <div class="mt-3">
            「{{ $search }}」に一致するアイテムはみつかりませんでした。
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
    {{ $items->appends(request()->input())->links() }}
</x-guest-layout>
