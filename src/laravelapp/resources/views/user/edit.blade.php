<x-guest-layout>
  <div class="bg-gray-400">
    <div class="flex items-center">
      <a href="{{ session('checkPointURL') }}" class="py-4 mr-6 ml-4">
        <i class="fa fa-arrow-left" aria-hidden="true"></i>
      </a>
      <div class="text-xl">アカウント</div>
    </div>
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
  <div class="mx-4">
    <form method="post" action="{{ route('user.update') }}" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="profile flex items-center justify-between">
        <div class="profile-img sm:flex sm:items-center">
          <div class="flex items-center">
            <div class="mt-2 sm:mt-0">
              @if(!is_null($user->profile_img_path))
                <img src="{{ $user->profile_img_path }}" alt="profile_img" class="w-24 h-24 object-cover rounded-full border-2">
              @else
                <img src="{{ Storage::disk('s3')->url('images/icon-of-a-person-7.jpg') }}" alt="profile_img" class="w-24 h-24 object-cover rounded-full border-2">
              @endif
            </div>
            <div class="ml-2">
              <div class="text-2xl font-semibold">{{ $user->name }}</div>
              <div>{{ $user->email }}</div>
            </div>
          </div>
          <div class="sm:ml-8 w-28">
            <label class="block text-center py-2 rounded bg-green-600 hover:bg-green-700 text-white text-sm cursor-pointer mt-2 sm:mt-0">
              <i class="fa-solid fa-plus"></i>
              画像を選択
              <input type="file" name="user_profile_img" class="hidden" onchange="loop(event, 'item1')">
            </label>
          </div>
        </div>
        <div class="preview-img items-center text-center border-l-2 pl-3 mt-2">
          <div class="my-1 pt-1 pb-1 text-xs  text-white bg-amber-300 rounded">
            プレビュー
          </div>
          <div id="preview-item1" class="flex w-24 h-24"></div>
        </div>
      </div>
      <div class="mt-2 border-t-2">
        <label for="name" class="block pt-4 pb-2 text-sm font-bold text-gray-900">ユーザー名</label>
        <div>
          <input type="text" name="name" value="{{ $user->name }}" class="block w-7/12 sm:w-5/12 p-3 mb-5 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-md focus:ring-blue-500 focus:border-blue-500">
        </div>
      </div>
      <div class="text-right">
        <button class="text-right bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-3 rounded-md">
          編集する
        </button>
      </div>
    </form>
  </div>
  <script>
    var cnt = 0;
    var tmpId = 'tmp-' + cnt;
    function loop(event, id){
        for (let file of event.target.files)
        {
            imgPreView(file, id);
        }
        tmpId = 'tmp-' + ++cnt;
    }
    function imgPreView(file, id){
        let preview = document.getElementById("preview-"+ id);
        let previewImages = document.getElementsByClassName(tmpId);
        let reader = new FileReader();

        if(previewImages != null) {
            for(let img of previewImages){
                preview.removeChild(img);
            }
        }

        reader.onload = function(event) {
            var img = document.createElement("img");
            img.setAttribute("src", reader.result);
            img.setAttribute("id", "previewImage-" + id);
            img.setAttribute("class", tmpId);
            preview.appendChild(img);
        };

        reader.readAsDataURL(file);
    }
  </script>
</x-guest-layout>
