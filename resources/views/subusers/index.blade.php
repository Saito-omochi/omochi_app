<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>
    <x-app-layout>
        <x-slot>
        </x-slot>
            <body>
                <div class="header">
                    <p>
                        <img src="{{$sub -> icon}}" alt="アイコン" />
                        {{$sub->profiletext}}
                    </p>
                    <p><a href="/{{$sub->id}}/create">新規投稿作成</a></p>
                    <p><a href="/{{$sub->id}}/profile/{{$sub->id}}">自分のプロフィール画面へ</a></p>
                </div>
                <div style="padding: 10px 14px;">
                    <p>
                        @foreach($posts as $post)
                            <div style = "padding: 10px 10px;">
                                <small style="padding: 5px 7px;">{{$post -> sub -> name}}</small>
                                <p style = "padding: 1px 20px;">{{$post -> content}}</p>
                            </div>
                        @endforeach
                    </p>
                </div>
            </body>
    </x-app-layout>
</html>
