<header>
  <nav class="p-4 flex items-center flex-wrap bg-teal-500">
    <div class="flex items-center shrink-0 text-black">
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

    <form action="#" method="get" class="mr-4">
      <input type="search" name="search" placeholder="モノを検索">
      <button type="submit">検索</button>
    </form>

    <a href="#" class="mr-4">
      <i class="fa-solid fa-trash-can"></i>
    </a>
  </nav>
</header>
