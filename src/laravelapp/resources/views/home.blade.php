<x-guest-layout>
  <x-header/>
  <div>
    <div>まずはカテゴリーを作成しましょう</div>
    <div>
      <a href="{{ route('category.category_create') }}">
        <button type="submit">カテゴリー作成ページへ</button>
      </a>
    </div>
  </div>
</x-guest-layout>