<nav class="p-3 flex items-center flex-wrap bg-gray-300 justify-start gap-8 w-full">
  <div class="items-center shrink-0 text-black mr-10">
    <span class="font-semibold text-xl">monogra</span>
  </div>

  <x-dropdown>
    <x-slot name="trigger">
      <span class="font-semibold text-xl">持っているモノ</span>
      <i class="fa fa-caret-down"></i>
    </x-slot>
    <x-slot name="content">
      <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">持っているモノ</a>
      <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">欲しいモノ</a>
    </x-slot>
  </x-dropdown>

  <form action="#" method="get" class="ml-auto">
    <input type="search" name="search" placeholder="モノを検索" class="rounded-md">
    <button class="shadow-lg px-2 py-1  bg-blue-400 text-lg text-white font-semibold rounded  hover:bg-blue-500 hover:shadow-sm hover:translate-y-0.5 transform transition ">検索</button>
  </form>

  <x-dropdown>
    <x-slot name="trigger">
      <div class="">
        <img class="object-cover h-8 w-8 rounded-full overflow-hidden border-2 border-gray-600 focus:outline-none focus:border-white inline-block" src="#" alt="ユーザーアイコン">
        <i class="fa fa-caret-down inline-block align-middle"></i>
      </div>
    </x-slot>
    @if(Auth::check())
    <x-slot name="content">
      <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">
        ゴミ箱
        <i class="fa-solid fa-trash-can"></i>
      </a>
      <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">
        ユーザー情報
      </a>
      <form action="{{ route('logout') }}" method="post" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">
        @csrf
        <input type="submit" value="ログアウト">
      </form>
    </x-slot>
    @else
    <x-slot name="content">
      <a href="{{ route('login') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">ログイン</a>
      <a href="{{ route('register') }}" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white">会員登録</a>
    </x-slot>
    @endif
  </x-dropdown>
</nav>
