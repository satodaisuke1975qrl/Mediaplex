<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between">
            <a href="https://www.tv-asahi.co.jp/" target="_blank" class="w-30 h-20"><img src="https://seekvectorlogo.com/wp-content/uploads/2022/01/tv-asahi-vector-logo.png" class="w-30 h-20" /></a>

            {{-- 管理者権限 --}}
            @can('admin')
            <form action="{{ route('tvshow.create') }}">
                <button
                    class="flex mx-auto text-white bg-red-500 border-0 py-2 px-20 focus:outline-none hover:bg-red-600 rounded text-md">新規入力</button>
            </form>
            @endcan

            {{-- 一般ユーザー --}}
            @can('general')
            <a href="{{ route('tvshow.bbs')}}">
                <img src="{{ asset('img/photo.jpg') }}" class="w-40 h-30">
            </a>
            @endcan

        </div>
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            5/31（水）番組一覧
        </h2>
    </x-slot>

    <table class="table-auto w-full text-left">

        <thead>
            <tr>
                <th class="px-4 py-3 title-font tracking-wider font-bold text-gray-900 text-sm bg-gray-100">放送時間</th>
                <th class="px-4 py-3 title-font tracking-wider font-bold text-gray-900 text-sm bg-gray-100">番組名</th>
                <th class="px-4 py-3 title-font tracking-wider font-bold text-gray-900 text-sm bg-gray-100">ジャンル</th>
                <th class="px-4 py-3 title-font tracking-wider font-bold text-gray-900 text-sm bg-gray-100"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tvs as $tv)
                <tr>
                    <td class="px-4 py-3">{{ $tv->time }}</td>

                    @if ($tv->url =='nullable')
                    <td class="px-4 py-3">{{ $tv->title }}</td>
                    @else
                    <td class="px-4 py-3">
                        <div class="flex flex-row">
                            <div>{{ $tv->title }}</div>
                            <div><a href="{{$tv->url}}"><img src="{{asset('img/link2.png')}}" class="ml-2 w-4 h-7"></a></div>
                        </div>
                        </td>
                    @endif

                    <td class="px-4 py-3">{{ $tv->genre->genrename }}</td>
                    <td class="text-center">
                        <form action="{{ route('tvshow.show', $tv->id) }}" method="get">
                            <button
                                class="flex mx-auto text-white bg-blue-500 border-0 py-2 px-4 focus:outline-none hover:bg-blue-600 rounded text-md">詳細表示</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
</x-app-layout>
