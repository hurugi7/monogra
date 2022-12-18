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
        <x-dropdown-link>持っているモノ</x-dropdown-link>
        <x-dropdown-link>欲しいモノ</x-dropdown-link>
      </x-slot>
    </x-dropdown>
  </nav>
</header>
