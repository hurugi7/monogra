<x-app-layout>
  <div class="bg-[#fffde5]">
    <div class="relative">
      <div class="flex justify-between items-center p-2 sm:p-4 fixed top-0 left-0 right-0 bg-[#eae5e3]">
        <div class="ml-2 sm:ml-8 text-2xl font-bold text-[#d77f5e]">monogra</div>
        <div class="hidden sm:flex sm:mr-8 lg:mr-16">
          <a href="{{ route('login') }}">
            <button type="submit" class="inline-block shrink-0 rounded-md border border-[#6c9cd2] bg-[#6c9cd2] px-3 py-1 mr-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-[#6c9cd2] focus:outline-none focus:ring active:text-[#6c9cd2]">
              ログイン
            </button>
          </a>
          <a href="{{ route('register') }}">
            <button type="submit" class="inline-block shrink-0 rounded-md border border-[#61c1be] bg-[#61c1be] px-3 py-1 mr-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-[#61c1be] focus:outline-none focus:ring active:text-[#61c1be]">
              会員登録
            </button>
          </a>
        </div>
        <div x-data="{ open: false }" class="relative sm:hidden">
          <!-- ハンバーガーメニューボタン -->
          <button @click="open = !open" class="focus:outline-none z-20">
              <svg x-show="!open" class="w-6 h-6 text-gray-700" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4 6H20M4 12H20M4 18H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
              <svg x-show="open" class="w-6 h-6 text-gray-700" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M6 18L18 6M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
          </button>
          <!-- メニューアイテム -->
          <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform -translate-y-1" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform -translate-y-1" class="fixed top-20 left-0 right-0 bottom-0 bg-white">
              <ul class="h-full flex flex-col justify-center items-center space-y-4">
                  <li>
                      <a href="{{ route('login') }}">
                        <button class="inline-block rounded-md border border-[#6c9cd2] bg-[#6c9cd2] py-3 px-24 font-medium text-lg text-white transition hover:bg-transparent hover:text-[#6c9cd2] focus:outline-none focus:ring active:text-[#6c9cd2]">
                          ログイン
                        </button>
                      </a>
                  </li>
                  <li>
                      <a href="{{ route('register') }}">
                        <button class="inline-block rounded-md border border-[#61c1be] bg-[#61c1be] py-3 px-20 text-lg font-medium text-white transition hover:bg-transparent hover:text-[#61c1be] focus:outline-none focus:ring active:text-[#61c1be]">
                          会員登録
                        </button>
                      </a>
                  </li>
              </ul>
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="w-full pt-12 lg:pt-16" style="background-image:url({{ Storage::disk('s3')->url('images/23462211.jpg') }})">
        <div class="text-center pt-8 lg:pt-16 px-4 sm:px-8 lg:px-12 pb-8 lg:pb-16 bg-[#756556] bg-opacity-70">
          <div class="text-4xl lg:text-6xl font-bold mb-6 text-white"><span class="text-[#ed8b66]">monogra</span>へようこそ！</div>
          <div class="text-lg sm:text-xl mb-2 sm:mb-3 text-white"><span class="text-[#ed8b66] font-bold">monogra</span>は自分のモノを管理するためのWebアプリケーションです。</div>
          <div class="text-lg sm:text-xl text-white"><span class="text-[#ed8b66] font-bold">monogra</span>を使ってモノを管理して、必要なものや不要な物をいつでもわかるようにしましょう！</div>
          <div class="mt-6">
            <a href="{{ route('register') }}">
              <button type="submit" class="inline-block shrink-0 rounded-md border border-[#61c1be] bg-[#61c1be] px-5 py-2 text-sm font-medium text-white transition hover:bg-transparent hover:text-[#61c1be] focus:outline-none focus:ring active:text-[#61c1be]">
                会員登録して今すぐ始める
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
              </button>
            </a>
          </div>
        </div>
      </div>
      <div class="text-center mt-20 sm:mt-28 mx-4 sm:mx-16 lg:mx-24">
        <div class="text-3xl font-bold sm:text-5xl mb-4 sm:mb-3"><span class="text-[#d77f5e]">monogra</span>の使い方</div>
        <div class="lg:flex mt-8 lg:mt-16 justify-center">
          <div class="inline-block text-left mr-0 lg:mr-8">
            <div class="font-bold text-xl sm:text-2xl mb-2 sm:mb-3">アイテム登録</div>
            <div class="text-base w-80 lg:w-60">
              <div class="mb-2"><span class="text-[#d77f5e]">monogra</span>ではカテゴリ、サブカテゴリを作りその下にアイテムを登録します。</div>
              <div>例えばファッションに関するモノを管理したい場合、次のように登録できます。</div>
            </div>
          </div>
          <div class="lg:w-1/2">
            <img src="{{ Storage::disk('s3')->url('images/monogra210389893.png') }}" alt="" class="mb-4 border-[#d77f5e] border-2 border-dotted mt-3 shadow-lg">
            <img src="{{ Storage::disk('s3')->url('images/monogra_sub_category.png') }}" alt="" class="border-[#d77f5e] border-2 border-dotted mt-3 shadow-lg">
          </div>
        </div>
        <div class="lg:flex mt-3 justify-center">
          <div class="inline-block text-left mr-0 lg:mr-8">
            <div class="text-base mt-8 lg:mt-4 w-80 lg:w-60">
              <div class="mb-4 lg:mb-8">このようにしてカテゴリとサブカテゴリを作成したら、各サブカテゴリに自分のアイテムを登録していきましょう！</div>
              <div class="mb-1">
                また、アイテムにはアイテム名以外にも、アイテムの写真（5枚まで）、値段、個数、購入日、購入場所、ノートを登録することができます。
              </div>
              <div>これらの項目を登録することで各アイテムについての情報をより詳しく記録することができます。</div>
            </div>
          </div>
          <div class="lg:w-1/2">
            <img src="{{ Storage::disk('s3')->url('images/monogra_item_add.png') }}" alt="" class="mb-4 border-[#d77f5e] border-2 border-dotted mt-3 shadow-lg">
            <img src="{{ Storage::disk('s3')->url('images/monogra_item_show.png') }}" alt="" class="mb-4 border-[#d77f5e] border-2 border-dotted mt-3 shadow-lg">
          </div>
        </div>
        <div class="lg:flex mt-8 lg:mt-16 justify-center">
          <div class="inline-block text-left mr-0 lg:mr-8">
            <div class="font-bold text-xl sm:text-2xl mb-2 sm:mb-3 mt-12 lg:mt-4">編集と削除</div>
            <div class="text-base w-80 lg:w-60">
              <div class="mb-1">
                各カテゴリ、サブカテゴリ、アイテムの<span class="font-bold">編集と削除</span>は右端にある三点リーダーから行えます。
              </div>
              <div class="mb-3">アイテム写真の編集は写真項目の編集ボタンから行えます。</div>
              <div class="text-base mt-6">
                <div class="text-lg text-[#d77f5e] font-semibold mb-2">削除時の注意点</div>
                <div class="mb-1">親のカテゴリを削除すると子のカテゴリも削除されてしまうので注意してください。</div>
                <div>
                  例えば、ファッションカテゴリを削除する場合、それに属するアウターやパンツなどのサブカテゴリ、またそのサブカテゴリに属するアイテムも一緒に削除されてしまいます。
                </div>
              </div>
            </div>
          </div>
          <div class="lg:w-1/2">
            <img src="{{ Storage::disk('s3')->url('images/monogra_edit_delete.png') }}" alt="" class="mb-4 border-[#d77f5e] border-2 border-dotted mt-3 shadow-lg">
            <img src="{{ Storage::disk('s3')->url('images/monogra_item_photo_edit.png') }}" alt="" class="mb-12 border-[#d77f5e] border-2 border-dotted mt-3 shadow-lg">
          </div>
        </div>
        <div class="lg:flex mt-8 lg:mt-16 justify-center">
          <div class="inline-block text-left mr-0 lg:mr-8">
            <div class="font-bold text-xl sm:text-2xl mb-2 sm:mb-3 mt-12 lg:mt-4">プロフィールの編集</div>
            <div class="text-base w-80 lg:w-60">
              <div class="mb-1">
                皆さんが作成したアカウントはこちらのメニューからアイコン画像をクリックしてプロフィール画面に行き、確認できます。
              </div>
              <div>この画面ではアイコン画像とユーザーネームの変更ができます。</div>
            </div>
          </div>
          <div class="lg:w-1/2">
            <img src="{{ Storage::disk('s3')->url('images/monogra_user.png') }}" alt="" class="mb-4 border-[#d77f5e] border-2 border-dotted mt-3 shadow-lg">
            <img src="{{ Storage::disk('s3')->url('images/monogra_user_edit.png') }}" alt="" class="mb-12 border-[#d77f5e] border-2 border-dotted mt-3 shadow-lg">
          </div>
        </div>
        <div class="lg:flex pb-8 lg:pb-16 mt-8 lg:mt-16 justify-center">
          <div class="inline-block text-left mr-0 lg:mr-8">
            <div class="font-bold text-xl sm:text-2xl mb-2 sm:mb-3 mt-12 lg:mt-4">アイテム検索の仕方</div>
            <div class="text-base w-80 lg:w-60">
              <div class="mb-1">画面上部に設置している検索バーからアイテムの検索ができます。</div>
              <div class="mb-1">検索キーワードは、アイテム名に部分的に一致しているものが表示されるので、アイテム名をすべて入力する必要はありません。</div>
              <div>管理するモノが多くなってくるとアイテムを探すのも大変になってくるので、ぜひ検索を有効に活用してみてください。</div>
            </div>
          </div>
          <div class="lg:w-1/2">
            <img src="{{ Storage::disk('s3')->url('images/monogra_search.png') }}" alt="" class="border-[#d77f5e] border-2 border-dotted mt-3 shadow-lg">
          </div>
        </div>
        <div class="py-16">
          <div class="text-2xl font-bold sm:text-4xl mb-4 sm:mb-6"><span class="text-[#d77f5e]">monogra</span>の使い方はわかりましたか？</div>
          <div class="text-xl font-bold sm:text-3xl mb-4 sm:mb-6">それでは早速始めましょう！</div>
          <div class="mt-6">
            <a href="{{ route('register') }}">
              <button type="submit" class="inline-block shrink-0 rounded-md border border-[#61c1be] bg-[#61c1be] px-5 py-2 text-sm font-medium text-white transition hover:bg-transparent hover:text-[#61c1be] focus:outline-none focus:ring active:text-[#61c1be]">
                会員登録して今すぐ始める
                <i class="fa fa-arrow-right" aria-hidden="true"></i>
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
