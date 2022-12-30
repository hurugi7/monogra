<x-guest-layout>
  <x-header/>
  <div class="bg-white w-1/5 mx-auto">
    <div class="flex py-5 px-5 justify-between items-center bg-gray-200">
      <div>カテゴリ一覧</div>
      <x-dropdown>
        <x-slot name="trigger">
          <a href="#" class="hover:bg-gray-400 font-bold py-1 px-2 rounded">
            <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
          </a>
        </x-slot>
        <x-slot name="content">
          <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white drop-shadow-lg">追加</a>
          <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white drop-shadow-lg">削除</a>
          <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white drop-shadow-lg">編集</a>
        </x-slot>
      </x-dropdown>
    </div>
    @foreach($categories as $category)
    <div class="bg-slate-100">
      <a href="{{ route('have_sub_category.index', ['category' => $category->id]) }}" class="flex justify-between hover:bg-indigo-500 hover:text-white">
        <div class="block text-lg py-3 px-5">{{ $category->category_name }}</div>
        <div class="text-lg py-3 px-5">12</div>
      </a>
    </div>
    @endforeach
  </div>
  <div class="bg-white w-4/5 mx-auto">
    <div class="flex py-5 px-5 justify-between items-center bg-gray-100">
      <div>サブカテゴリ一覧</div>
      <x-dropdown>
        <x-slot name="trigger">
          <a href="#" class="hover:bg-gray-400 font-bold py-1 px-2 rounded">
            <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
          </a>
        </x-slot>
        <x-slot name="content">
          <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white drop-shadow-lg">追加</a>
          <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white drop-shadow-lg">削除</a>
          <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white drop-shadow-lg">編集</a>
        </x-slot>
      </x-dropdown>
    </div>
      @foreach($sub_categories as $sub_category)
      <div>
        <a href="#" class="flex justify-between hover:bg-indigo-500 hover:text-white">
          <div class="block text-lg py-3 px-5">{{ $sub_category->sub_category_name }}</div>
          <div class="text-lg py-3 px-5">12</div>
        </a>
      </div>
        @foreach($items as $item)
        <div>
          <div>{{ $item->item_name }}</div>
        </div>
        @endforeach
      @endforeach
  </div>
</x-guest-layout>
