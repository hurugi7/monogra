<x-guest-layout>
  <x-header :user="$user"/>
  <div class="my-2 sm:my-5 mx-2 border-solid border-gray-300 rounded-lg border shadow-sm bg-white">
  <div class="">
    <div class="flex items-center px-2 py-3 border-solid border-gray-300 border-b">
      <a href="{{ route('have_item.edit' ,['category' => $current_category_id, 'sub_category' => $current_sub_category_id, 'item' => $current_item_id]) }}" class="py-3 px-2 mr-6">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </a>
      <div class="py-3 font-bold">アイテム写真の編集</div>
    </div>
    <div class="mx-8 my-3">
      <div class="mb-5">
        <div class="block text-sm sm:text-base text-gray-900 mb-2">
          アイテム写真
        </div>
        @if($item_photos->isNotEmpty())
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-2 mb-5 w-auto h-auto">
            @foreach($item_photos as $item_photo)
              <div class="basis-full">
                <div class="group relative h-64 flex justify-end items-end bg-gray-100 overflow-hidden rounded-lg shadow-lg">
                    <img src="{{ Storage::disk('s3')->url($item_photo->path) }}" class="w-full h-full object-cover object-center absolute inset-0 group-hover:scale-105 transition duration-200">
                    <div x-data="{ open: false }">
                      <div class="hidden group-hover:block">
                        <button type="submit" class="inline-block text-gray-200 text-xs md:text-sm border border-gray-500 rounded-lg backdrop-blur hover:bg-gray-800 relative px-2 md:px-3 py-1 mr-3 mb-3" @click="open = true">
                          <i class="fa fa-times" aria-hidden="true"></i>
                        </button>
                      </div>
                      <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center" style="background-color: rgba(0,0,0,.5);" x-show="open">
                        <div class="text-left bg-white h-auto p-4 md:max-w-xl md:p-6 lg:p-8 shadow-xl rounded mx-2 md:mx-0" @click.away="open = false">
                          <h2 class="text-2xl">削除の確認</h2>
                          <p class="p-3">この画像を削除しますか？</p>
                          <div class="flex justify-center mt-8">
                            <button class="bg-gray-700 text-white px-4 py-2 rounded no-outline focus:shadow-outline select-none mx-3" @click="open = false">
                              キャンセル
                            </button>
                            <form action="{{ route('item_photo.destroy', ['category' => $current_category_id, 'sub_category' => $current_sub_category_id, 'item' => $current_item_id, 'item_photo' => $item_photo->id ]) }}" method="post">
                              @csrf
                              @method('delete')
                              <input type="submit" value="削除" class="shadow-lg px-4 py-2  bg-red-300 text-white font-sm rounded  hover:bg-red-400 hover:shadow-sm hover:translate-y-0.5 transform transition">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            @endforeach
          </div>
        @else
          <div class="w-6/12 h-6/12 mx-auto">
            <img src="{{ asset('storage/20200505_noimage.png') }}" alt="" class="w-full h-full object-cover">
          </div>
        @endif
      </div>
    </div>
  </div>
</x-guest-layout>
