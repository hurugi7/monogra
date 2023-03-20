<x-guest-layout>
  <x-header :user="$user"/>
  <div class="mx-4 mt-4 border-solid border-gray-300 rounded-lg border shadow-sm bg-white">
    <div class="flex px-2 py-3 border-solid border-gray-300 border-b">
      <a href="{{ route('have_category.index') }}" class="mr-6 ml-2">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </a>
      <div class="font-bold">カテゴリ追加</div>
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
    <form action="{{ route('have_category.store') }}" method="post" class="mx-8 my-3">
      @csrf
      <label for="category_name" class="block text-sm font-bold text-gray-900 mb-2">
        カテゴリ名
      </label>
      <input type="text" class="block w-full p-4 mb-5 text-gray-900 border border-gray-300 rounded-lg bg-white sm:text-md focus:ring-[#6c9cd2] focus:border-[#6c9cd2]" name="category_name" id="category_name" value="{{ old('category_name') }}">
      <div class="text-right">
        <a href="{{ route('have_category.store') }}">
          <button class="text-right bg-[#4185d1] hover:bg-[#6c9cd2] text-white font-bold py-2 px-4 rounded-lg text-xs sm:text-sm">
            追加する
          </button>
        </a>
      </div>
    </form>
  </div>
</x-guest-layout>
