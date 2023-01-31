<x-guest-layout>
<x-header/>
  @foreach($items as $item)
  <a href="route('have_item.show', ['category' => $current_category_id, 'sub_category' => $current_sub_category_id, 'item' => $item->id])">
    {{ $item->item_name }}
  </a>
  @endforeach
    {{ $items->appends(request()->input())->links() }}
</x-guest-layout>
