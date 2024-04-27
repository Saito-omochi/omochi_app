<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SubMenu') }}
        </h2>
    </x-slot>
    <body>
        <div>
            <img src="{{$sub->icon}}" alt="画像が読み込めません" width ="50px" height="50px" />
            <p>{{$sub->name}}</p>
        </div>
        <div style = "padding: 30px 50px;">
            <p style = "padding: 10px 20px;"><a href="/{{$sub->id}}/index">ホーム画面へ</a></p>
            <p style = "padding: 10px 20px;"><a href="/{{$sub->id}}/create">新規投稿作成</a></p>
            <p style = "padding: 10px 20px;"><a href="/{{$sub->id}}/profile/{{$sub->id}}">自分のプロフィール画面へ</a></p>
            <p style = "padding: 10px 20px;"><a href="/{{$sub->id}}/profile/edit">プロフィール編集画面へ</a></p>        
            <p style = "padding: 10px 20px;"><a href="/{{$sub->id}}/showallposts">全ユーザーの投稿を最新順で表示</a></p>
            <p style = "padding: 10px 20px;"><a href="/{{$sub->id}}/search">カテゴリー検索へ</a></p>
            <p style = "padding: 10px 20px;"><a href="/{{$sub->id}}/showfollows">フォロー一覧</a></p>
        </div>
    </body>
</x-app-layout>
