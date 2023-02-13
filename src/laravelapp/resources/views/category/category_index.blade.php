<x-guest-layout>
  <x-header :user="$user"/>
  <div class="bg-white items-center mx-auto">
    <div class="flex justify-between items-center">
      <div class="text-xs sm:text-sm p-2 sm:p-4">カテゴリ一覧</div>
      <div class="p-2 sm:p-4">
        <a href="{{ route('have_category.create') }}" class="shadow-lg px-2 py-1  bg-yellow-300 text-white text-xs sm:text-sm rounded  hover:bg-yellow-400 hover:shadow-sm hover:translate-y-0.5 transform transition">
          カテゴリ追加
        </a>
      </div>
    </div>
    @foreach($categories as $category)
      <div class="flex hover:bg-slate-200">
        <a href="{{ route('have_sub_category.index', ['category' => $category->id]) }}" class="block basis-11/12 px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
          {{ $category->category_name }}
        </a>
        <div class="basis-1/12 text-sm text-gray-900 font-light px-4 py-2 whitespace-nowrap">
          <div class="flex">
            <div class="mr-3 py-2">{{ $category->items_count }}</div>
            <div x-data="{ isActive: false }">
              <div class="relative">
                <div class="p-2 rounded-full hover:bg-slate-300" x-on:click="isActive = !isActive">
                  <i class="fa fa-ellipsis-v text-slate-600" aria-hidden="true"></i>
                </div>
                <div class="absolute right-0 z-10 w-auto origin-top-right rounded-md border border-gray-100 bg-white shadow-lg"
                  role="menu"
                  x-cloak
                  x-transition
                  x-show="isActive"
                  x-on:click.away="isActive = false"
                  x-on:keydown.escape.window="isActive = false">
                  <a href="{{ route('have_category.edit', ['category' => $category->id]) }}" class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-200 hover:text-gray-700">
                    <i class="fa-regular fa-pen-to-square mr-1"></i>
                    編集する
                  </a>
                  <div x-data="{ open: false }">
                    <button class="rounded-lg px-4 py-2 text-sm text-red-700 hover:bg-red-100" @click="open = true">
                      <i class="fa fa-trash mr-2" aria-hidden="true"></i>
                      削除する
                    </button>
                    <div class="fixed top-0 left-0 w-full h-full flex items-center justify-center" style="background-color: rgba(0,0,0,.5);" x-show="open">
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</x-guest-layout>
