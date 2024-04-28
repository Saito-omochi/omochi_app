<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SubMenu') }}
        </h2>
    </x-slot>
    <body>
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-top: 20px;">
                    <div class="p-6 text-gray-900">
                        <div class="header" >
                            <p  class="border-b-4">
                                <img src="{{$sub->icon}}" alt="画像が読み込めません" width ="50px" height="50px" />
                                {{$sub->profiletext}}
                            </p>
                        </div>                
                    </div>
                </div>
            </div>
        </div>
        <div style = "padding: 30px 50px;">
            <p class="underline" style = "padding: 10px 20px;"><a href="/{{$sub->id}}/index">ホーム画面へ</a></p>
            <p class="underline" style = "padding: 10px 20px;"><a href="/{{$sub->id}}/create">新規投稿作成</a></p>
            <p class="underline" style = "padding: 10px 20px;"><a href="/{{$sub->id}}/profile/{{$sub->id}}">自分のプロフィール画面へ</a></p>
            <p class="underline" style = "padding: 10px 20px;"><a href="/{{$sub->id}}/profile/edit">プロフィール編集画面へ</a></p>        
            <p class="underline" style = "padding: 10px 20px;"><a href="/{{$sub->id}}/showallposts">全ユーザーの投稿を最新順で表示</a></p>
            <p class="underline" style = "padding: 10px 20px;"><a href="/{{$sub->id}}/search">カテゴリー検索へ</a></p>
            <p class="underline" style = "padding: 10px 20px;"><a href="/{{$sub->id}}/showfollows">フォロー一覧</a></p>
        </div>
    </body>
</x-app-layout>
