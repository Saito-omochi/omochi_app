<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サブアカウント プロフィール画面</title>
</head>
    <x-app-layout>
        <x-slot>
        </x-slot>
            <body>
                <div class="header">
                    <p>
                        <img src="{{asset('storage/icon/' . $sub->icon)}}" width ="50px" height="50px">
                        {{$sub->profiletext}}
                    </p>
                    <p><a href="/{{$sub->id}}/profile/edit">プロフィール編集画面へ</a></p>
                    <p><a href="/{{$sub->id}}/create">新規投稿作成</a></p>
                    <p><a href="/{{$sub->id}}/showfollows">フォロー一覧</a></p>
                    <p><a href="/{{$sub->id}}/index">ホーム画面へ</a></p>
                </div>
                <div style="padding: 10px 14px;">
                    <p>
                        @foreach($posts as $post)
                            <p style="padding: 5px 7px;">{{$post -> content}}</p>
                        @endforeach
                    </p>
                </div>
            </body>
    </x-app-layout>
</html>
