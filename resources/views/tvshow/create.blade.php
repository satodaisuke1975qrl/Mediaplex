<x-app-layout>
    <x-slot name="header">
        <a href="https://www.tv-asahi.co.jp/" target="_blank"><img src="https://seekvectorlogo.com/wp-content/uploads/2022/01/tv-asahi-vector-logo.png" class="w-30 h-20" /></a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            新規登録
        </h2>
    </x-slot>

<form action="{{ route('tvshow.store') }}" method="post">
    @csrf
    <div>
        <label for="title">番組タイトル</label>
        <input type="text" size="40" id="title" name="title" value="{{ old('title')}}">
        @if ($errors->has('title'))
        <p class="error">*{{ $errors->first('title') }}</p>
       @endif
    </div>
    <div>
        <label for="time">放送時間</label>
        <input type="time" id="time" name="time" value="{{ old('time')}}">
        @if ($errors->has('time'))
        <p class="error">*{{ $errors->first('time') }}</p>
       @endif
    </div>
    <div>
        <label for="content">番組情報</label>
        <textarea type="textbox" id="content" name="content" value="{{ old('content')}}"></textarea>
        @if ($errors->has('content'))
        <p class="error">*{{ $errors->first('content') }}</p>
       @endif
    </div>
    <div class="flex justify-around">
        <form action="{{ route('tvshow.index' )}}">
            <button class="flex mx-auto text-white bg-green-500 border-0 py-2 px-20 focus:outline-none hover:bg-green-600 rounded text-md">送信</button>
        </form>

    <input type="button" value="戻る" onclick="location.href='{{ route('tvshow.index')}}'" class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-20 focus:outline-none hover:bg-blue-600 rounded text-md">

    {{-- <input type="submit" value="送信"> --}}
    </div>
</form>

</x-app-layout>
