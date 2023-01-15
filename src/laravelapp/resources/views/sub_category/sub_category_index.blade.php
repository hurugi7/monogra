<x-guest-layout>
  <x-header/>
  <div class="bg-white mx-auto">
    <div class="flex justify-between py-5 px-5">
      <a href="{{ route('have_category.index') }}">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </a>
      <div>{{ $current_category->category_name }}</div>
    </div>
    <div class="flex py-5 justify-between bg-gray-100">
      <div>サブカテゴリ一覧</div>
      <div>
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
    </div>
    @foreach($sub_categories as $sub_category)
      <div>
        <a href="{{ route('have_item.index', ['category' => $current_category_id, 'sub_category' => $sub_category->id]) }}" class="flex justify-between hover:bg-indigo-500 hover:text-white">
          <div class="block text-lg py-3 px-5">{{ $sub_category->sub_category_name }}</div>
          <div class="block text-lg py-3 px-5">{{ $items[0]->items_count }}</div>
        </a>
      </div>
    @endforeach
  </div>
</x-guest-layout>
