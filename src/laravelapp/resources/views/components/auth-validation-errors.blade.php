@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="my-2 p-2 bg-red-200 rounded text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
