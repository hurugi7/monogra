<x-guest-layout>
  <x-header :user="$user"/>
  <div class="h-full w-full" style="background-image:url({{ Storage::disk('s3')->url('images/23462211.jpg') }})">
    <div class="w-full h-full backdrop-blur flex flex-col items-center justify-center py-48">
      <h2 class="mt-6 text-xl font-bold sm:text-2xl md:text-3xl drop-shadow-md">
        <span class="text-3xl sm:text-4xl md:text-5xl text-[#d77f5e]">monogra</span>へようこそ！
      </h2>
      <div class="mt-2 font-semibold text-sm sm:text-base md:text-lg">
        まずはカテゴリを作成しましょう!</div>
      <div class="mt-12">
        <a href="{{ route('have_category.create') }}">
          <button type="submit" class="inline-block shrink-0 rounded-md border border-[#6c9cd2] bg-[#6c9cd2] px-4 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-[#6c9cd2] focus:outline-none focus:ring active:text-[#6c9cd2] drop-shadow-md">
            カテゴリを作成
          </button>
        </a>
      </div>
    </div>
  </div>
</x-guest-layout>
