<nav class="p-3 flex flex-wrap items-center bg-[#eae5e3] justify-between w-full z-10" x-data="{ isOpen: false }" @keydown.escape="isOpen = false" :class="{ 'shadow-lg bg-[#eae5e3]' : isOpen , 'bg-[#eae5e3]' : !isOpen}">
  <!-- タイトル -->
  <div class="items-center shrink-0 text-black">
    <span class="font-semibold text-lg text-[#d77f5e]">monogra</span>
  </div>
  <!-- 検索バー -->
  <form action="{{ route('search') }}" method="get" class="hidden sm:flex">
    <div class="xl:w-96">
      <div class="input-group relative flex items-stretch w-full">
        <input type="search" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-[#6c9cd2] focus:outline-none" placeholder="アイテムを検索" aria-label="Search" aria-describedby="button-addon2" name="search">
        <button class="btn inline-block px-6 py-2.5 bg-[#4185d1] text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-[#6c9cd2] hover:shadow-lg focus:bg-[#6c9cd2]  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-[#6c9cd2] active:shadow-lg transition duration-150 ease-in-out  items-center" type="submit" id="button-addon2">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
          </svg>
        </button>
      </div>
    </div>
  </form>
  <!-- ハンバーガーメニュー -->
  <button
        @click="isOpen = !isOpen"
        type="button"
        class="block px-2 text-gray-500 hover:text-[#fcfcf2] focus:outline-none focus:text-[#fcfcf2]"
        :class="{ 'transition transform-180': isOpen }"
      >
        <svg
          class="h-6 w-6 fill-current"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
        >
          <path
            x-show="isOpen"
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z"
          />
          <path
            x-show="!isOpen"
            fill-rule="evenodd"
            d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"
          />
        </svg>
  </button>
  <!--Menu-->
  <div
    class="w-full flex"
    :class="{ 'block shadow-3xl': isOpen, 'hidden': !isOpen }"
    @click.away="isOpen = false"
    x-show.transition="true"
    x-show="isOpen"
  >
    <ul
      class="pt-6 list-reset justify-end flex-1 items-center"
    >
      <li class="mr-3">
        <a
          class="inline-block py-2 px-4 no-underline text-center"
          href="{{ route('user.edit') }}"
          @click="isOpen = false"
          >
          @if(!is_null($user->profile_img_path))
          <img src="{{ $user->profile_img_path }}" alt="user_profile_img" class="w-16 h-16 object-cover rounded-full border-2">
          @else
          <img src="{{ Storage::disk('s3')->url('images/icon-of-a-person-7.jpg') }}" alt="user_profile_img" class="w-16 h-16 object-cover rounded-full border-2">
          @endif
          <div class="font-bold">{{ old('name')?: $user->name }}</div>
        </a>
      </li>
      <li class="mr-3">
        <a
          class="inline-block text-gray-600 no-underline hover:text-[#fcfcf2] hover:text-underline py-2 px-4"
          href="{{ route('logout') }}"
          @click="isOpen = false"
          >ログアウト
        </a>
      </li>
    </ul>
  </div>
</nav>
<!-- 検索バースマホ -->
<form action="{{ route('search') }}" method="get" class="m-2 sm:hidden">
    <div class="mx-2">
      <div class="input-group relative flex items-stretch w-full">
        <input type="search" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-[#6c9cd2] focus:outline-none" placeholder="アイテムを検索" aria-label="Search" aria-describedby="button-addon2" name="search">
        <button class="btn inline-block px-6 py-2.5 bg-[#4185d1] text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-[#6c9cd2] hover:shadow-lg focus:bg-[#6c9cd2]  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-[#6c9cd2] active:shadow-lg transition duration-150 ease-in-out flex items-center" type="submit" id="button-addon2">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
          </svg>
        </button>
      </div>
    </div>
  </form>
