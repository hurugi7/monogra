<x-guest-layout>
  <x-header :user="$user"/>
  <div class="bg-white items-center mx-auto">
    <div class="flex py-5 px-5 items-center bg-gray-200">
      <a href="{{ route('have_sub_category.index', ['category' => $current_category_id]) }}" class="py-3 mr-6">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </a>
      <div>アイテム一覧</div>
      <div class="ml-auto">
        <a href="{{ route('have_item.create', ['category' => $current_category_id, 'sub_category' => $current_sub_category_id]) }}" class="shadow-lg px-2 py-1  bg-yellow-300 text-white font-sm rounded  hover:bg-yellow-400 hover:shadow-sm hover:translate-y-0.5 transform transition">アイテム追加</a>
      </div>
    </div>
    <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
          <div class="overflow-hidden">
            <table class="min-w-full text-left">
              <thead class="border-b bg-gray-100">
                <tr>
                  <th scope="col" colspan="" class="text-sm font-medium text-gray-900 px-6 py-4">
                    アイテム名
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    アイテム数
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    値段
                  </th>
                  <th scope="col" colspan="3" class="text-sm font-medium text-gray-900 px-6 py-4">
                    オプション
                  </th>
                </tr>
              </thead class="border-b">
              <tbody>
                @foreach($items as $item)
                <tr class="bg-white border-b">
                  <td class="flex items-center px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    @if($item->photos()->where('item_id', $item->id)->exists())
                      <img src="/item/{{ $item->photos()->first()->path }}" alt="" class="w-16 h-16 object-cover rounded-md border-2 mr-5">
                    @else
                      <img src="/item/photos/20200505_noimage.png" alt="" class="w-16 h-16 object-cover rounded-md border-2 mr-5">
                    @endif
                    <div>{{ $item->item_name }}</div>
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $item->item_num }}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $item->price }}円
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('have_item.show', ['category' => $current_category_id, 'sub_category' => $current_sub_category_id, 'item' => $item->id]) }}">
                      <button class="shadow-lg px-2 py-1  bg-green-300 text-white font-sm rounded  hover:bg-green-400 hover:shadow-sm hover:translate-y-0.5 transform transition ">
                        詳細
                      </button>
                    </a>
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('have_item.edit', ['category' => $current_category_id, 'sub_category' => $current_sub_category_id, 'item' => $item->id]) }}">
                      <button class="shadow-lg px-2 py-1  bg-blue-300 text-white font-sm rounded  hover:bg-blue-400 hover:shadow-sm hover:translate-y-0.5 transform transition ">
                        編集
                      </button>
                    </a>
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <div x-data="{ open: false }">
                      <button class="shadow-lg px-2 py-1  bg-red-300 text-white font-sm rounded  hover:bg-red-400 hover:shadow-sm hover:translate-y-0.5 transform transition " @click="open = true">
                        削除
                      </button>
                      <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center z-10" style="background-color: rgba(0,0,0,.5);" x-show="open">
                        <div class="text-left bg-white h-auto p-4 md:max-w-xl md:p-6 lg:p-8 shadow-xl rounded mx-2 md:mx-0" @click.away="open = false">
                          <h2 class="text-2xl">削除の確認</h2>
                          <p class="p-3">「{{ $item->item_name }}」を削除しますか？</p>
                          <div class="flex justify-center mt-8">
                            <button class="bg-gray-700 text-white px-4 py-2 rounded no-outline focus:shadow-outline select-none mx-3" @click="open = false">
                              キャンセル
                            </button>
                            <form action="{{ route('have_item.destroy', ['category' => $current_category_id, 'sub_category' => $current_sub_category_id, 'item' => $item->id]) }}" method="post" class="mx-3">
                              @csrf
                              @method('delete')
                              <input type="submit" value="削除" class="shadow-lg px-4 py-2  bg-red-300 text-white font-sm rounded  hover:bg-red-400 hover:shadow-sm hover:translate-y-0.5 transform transition">
                            </form>
                          </div>
                          </div>
                        </div>
                      </div>
                  </td>
                </tr class="bg-white border-b">
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-guest-layout>
