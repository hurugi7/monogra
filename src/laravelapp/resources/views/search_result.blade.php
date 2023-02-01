<x-guest-layout>
<x-header/>
  <div class="">
    <div class="m-3 flex items-center">
      <i class="fas fa-search mr-1"></i>
      <div class="text-lg font-semibold">検索結果一覧</div>
    </div>
    <div class="">「{{ $search }}」の検索結果</div>
    <div class="">
      <div class="mt-2">
        @foreach($items as $item)
          <a href="{{ route('have_item.show', ['category' => $item->subCategory->category_id, 'sub_category' => $item->sub_category_id, 'item' => $item->id]) }}" class="container mx-auto">
            <div class="">{{ $item->item_name }}</div>
          </a>
        @endforeach
      </div>
    </div>
  </div>
    {{ $items->appends(request()->input())->links() }}
</x-guest-layout>
