<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サブユーザープロフィール</title>
</head>
    <x-app-layout>
        <x-slot>
        </x-slot>
            <body>
                <dev>
                    <p>
                        <img src="{{$user->icon}}" alt="デフォルトアイコン">
                        {{$user->profiletext}}
                    </p>
                </dev>
                <dev class="post">
                    @foreach
                        <p></p>
                        <p>{{$post->content}}</p>
                        <p></p>
                    @endforeach
                </dev>
                <dev class="fotter">
                    <a href="/create">新規投稿作成画面</a>
                </dev>
            </body>
    </x-app-layout>
</html>
