<x-app-layout>
  <div class="flex h-screen w-full items-center justify-center bg-gray-900 bg-cover bg-no-repeat" style="background-image:url({{ asset('storage/23462211.jpg') }})">
    <div class="w-full h-screen flex justify-center items-center backdrop-blur-sm my-auto">
      <div class="rounded-xl bg-white px-16 py-10 shadow-lg max-sm:px-8">
        <div>
          <div class="mb-8 items-center">
            <h1 class="mb-2 text-3xl">monogra</h1>
          </div>

          <x-auth-validation-errors class="mb-4" :errors="$errors" />

          <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="mb-4 text-lg">
              <label for="email" class="block text-sm font-base text-gray-700">
                メールアドレス
              </label>
              <input class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" type="text" name="email" value="{{ old('email') }}"/>
            </div>
            <div class="mb-4 text-lg">
              <label for="password" class="block text-sm font-base text-gray-700">
                パスワード
              </label>
              <input class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" type="Password" name="password"/>
            </div>
            <div class="mt-8 flex flex-col justify-center items-center text-lg text-black">
              <button type="submit" class="inline-block shrink-0 rounded-md border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500">ログイン</button>
              <div class="mt-2">
                <a class="hover:underline text-sm text-blue-300 hover:text-blue-600" href="{{ route('password.request') }}">
                  パスワードを忘れた場合
                </a>
              </div>
            </div>
            <p class="mt-5 text-sm">
              アカウントをお持ちでない方
              <a href="{{ route('register') }}" class="text-red-500 hover:underline ml-2">登録する</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
