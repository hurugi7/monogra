<x-guest-layout>
  <x-header :user="$user"/>
  <div class="bg-white items-center mx-auto">
    <div class="flex justify-between py-5 px-5 items-center bg-gray-200">
      <div>カテゴリ一覧</div>
      <div>
        <a href="{{ route('have_category.create') }}" class="shadow-lg px-2 py-1  bg-yellow-300 text-white font-sm rounded  hover:bg-yellow-400 hover:shadow-sm hover:translate-y-0.5 transform transition">カテゴリ追加</a>
      </div>
    </div>
    <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
          <div class="overflow-hidden">
            <table class="min-w-full text-left">
              <thead class="border-b bg-gray-100">
                <tr>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    カテゴリ名
                  </th>
                  <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
                    アイテム数
                  </th>
                  <th scope="col" colspan="3" class="text-sm font-medium text-gray-900 px-6 py-4">
                    オプション
                  </th>
                </tr>
              </thead class="border-b">
              <tbody>
                @foreach($categories as $category)
                <tr class="bg-white border-b">
                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $category->category_name }}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{-- 数の計算の実装 --}}
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('have_sub_category.index', ['category' => $category->id]) }}">
                      <button class="shadow-lg px-2 py-1  bg-green-300 text-white font-sm rounded  hover:bg-green-400 hover:shadow-sm hover:translate-y-0.5 transform transition ">
                        サブカテゴリ一覧へ
                      </button>
                    </a>
                  </td>
                  <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('have_category.edit', ['category' => $category->id]) }}">
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
                      <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center" style="background-color: rgba(0,0,0,.5);" x-show="open">
                        <div class="text-left bg-white h-auto p-4 md:max-w-xl md:p-6 lg:p-8 shadow-xl rounded mx-2 md:mx-0" @click.away="open = false">
                          <h2 class="text-2xl">削除の確認</h2>
                          <p class="p-3">「{{ $category->category_name }}」を削除しますか？</p>
                          <div class="flex justify-center mt-8">
                            <button class="bg-gray-700 text-white px-4 py-2 rounded no-outline focus:shadow-outline select-none mx-3" @click="open = false">
                              キャンセル
                            </button>
                            <form action="{{ route('have_category.destroy', ['category' => $category->id]) }}" method="post" class="mx-3">
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
