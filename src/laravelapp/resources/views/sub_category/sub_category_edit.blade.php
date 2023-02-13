<x-guest-layout>
  <x-header :user="$user"/>
  <div class="mx-4 mt-4 border-solid border-gray-300 rounded-lg border shadow-sm">
    <div class="flex px-2 py-3 border-solid border-gray-300 border-b">
      <a href="{{ route('have_sub_category.index', ['category' => $current_category_id]) }}" class="ml-2 mr-6">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </a>
      <div class="font-semibold">サブカテゴリ編集</div>
    </div>
    @if($errors->any())
      <div class="mx-8 my-3 p-3 bg-red-200 rounded">
        <ul>
          @foreach($errors->all() as $message)
            <li class="text-red-600">{{ $message }}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="{{ route('have_sub_category.update', ['category' => $current_category_id, 'sub_category' => $sub_category->id]) }}" method="post" class="mx-8 my-3">
      @csrf
      @method('put')
      <label for="category_name" class="block text-sm font-bold text-gray-900 mb-2">
        サブカテゴリ名
      </label>
      <input type="text" class="block w-full p-4 mb-5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500" name="sub_category_name" id="sub_category_name" value="{{ old('sub_category_name')?: $sub_category->sub_category_name }}">
      <div class="text-right">
        <a href="{{ route('have_category.update', ['category' => $current_category_id, 'sub_category' => $sub_category->id]) }}">
          <button class="text-right bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg text-xs sm:text-sm">
            編集する
          </button>
        </a>
      </div>
    </form>
  </div>
</x-guest-layout>
