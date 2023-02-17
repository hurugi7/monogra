<x-app-layout>
  <section class="bg-white">
    <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
      <section
        class="relative flex h-32 items-end bg-gray-900 lg:col-span-5 lg:h-full xl:col-span-6"
      >
        <img
          alt="Night"
          src="{{ asset('storage/23462211.jpg') }}"
          class="absolute inset-0 h-full w-full object-cover"
        />

        <div class="hidden lg:relative lg:block lg:px-12 lg:pb-20">
          <h2 class="mt-6 text-2xl font-bold sm:text-3xl md:text-4xl">
            <span class="text-5xl">monogra</span>へようこそ！
          </h2>

          <p class="mt-4 leading-relaxed sm:text-lg md:text-xl">
            monograで持ち物を管理して、自分が何を持っているか把握しませんか？
          </p>
        </div>
      </section>

      <main
        aria-label="Main"
        class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:py-12 lg:px-16 xl:col-span-6"
      >
        <div class="max-w-xl lg:max-w-3xl">
          <div class="relative block lg:hidden">
            <h1
              class="mt-2 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl"
            >
              <span class="text-4xl">monogra</span>へようこそ！
            </h1>

            <p class="mt-4 leading-relaxed">
              monograで持ち物を管理して、自分が何を持っているか把握しませんか？
            </p>
          </div>

          <x-auth-validation-errors :errors="$errors" />

          <form action="{{ route('register') }}" class="mt-8 grid grid-cols-6 gap-6" method="POST">
            @csrf
            <div class="col-span-6 sm:col-span-3">
              <label
                for="name"
                class="block text-sm font-medium text-gray-700"
              >
                名前
              </label>

              <input
                type="text"
                id="name"
                name="name"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                value="{{ old('name') }}"
              />
            </div>

            <div class="col-span-6">
              <label for="email" class="block text-sm font-medium text-gray-700">
                メールアドレス
              </label>

              <input
                type="email"
                id="email"
                name="email"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                value="{{ old('email') }}"
              />
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label
                for="password"
                class="block text-sm font-medium text-gray-700"
              >
                パスワード
              </label>

              <input
                type="password"
                id="password"
                name="password"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
              />
            </div>

            <div class="col-span-6 sm:col-span-3">
              <label
                for="password_confirmation"
                class="block text-sm font-medium text-gray-700"
              >
                パスワードの確認
              </label>

              <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
              />
            </div>

            <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
              <button
                class="inline-block shrink-0 rounded-md border border-blue-600 bg-blue-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-blue-600 focus:outline-none focus:ring active:text-blue-500"
              >
                アカウントを作成
              </button>

              <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                アカウントをお持ちの場合
                <a href="{{ route('login') }}" class="text-red-500 underline ml-2">ログイン</a>
              </p>
            </div>
          </form>
        </div>
      </main>
    </div>
  </section>
</x-app-layout>
