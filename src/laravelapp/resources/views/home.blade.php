<x-guest-layout>
  <x-header :user="$user"/>
  <div class="h-full w-full" style="background-image:url({{ asset('storage/23462211.jpg') }})">
    <div class="w-full h-full backdrop-blur flex flex-col items-center justify-center py-48">
      <h2 class="mt-6 text-xl font-bold sm:text-2xl md:text-3xl">
        <span class="text-3xl sm:text-4xl md:text-5xl">monogra</span>へようこそ！
      </h2>
      <div class="mt-2 font-semibold text-sm sm:text-base md:text-lg">
        まずはカテゴリを作成しましょう</div>
      <div class="mt-12">
        <a href="{{ route('have_category.create') }}">
          <button type="submit" class="inline-block shrink-0 rounded-md border border-blue-600 bg-blue-600 px-4 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500">
            カテゴリを作成
          </button>
        </a>
      </div>
    </div>
  </div>
</x-guest-layout>
