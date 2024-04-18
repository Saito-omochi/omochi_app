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
                    <p><a href="/{{$sub->id}}/showallposts">全ユーザーの投稿を最新順で表示</a></p>
                    <p><a href="/{{$sub->id}}/search">カテゴリー検索へ</a></p>
                </div>
                <div style="padding: 10px 14px;">
                    <p>
                        @foreach($posts as $post)
                            <div style = "padding: 10px 10px;">
                                <small style="padding: 5px 7px;"><a href="/{{$sub->id}}/profile/{{$post->sub->id}}">{{$post->sub->name}}</a></small>
                                <p style = "padding: 1px 20px;">{{$post -> content}}</p>
                                @if($post->sub_id == $sub->id)
                                    <form action="/{{$sub->id}}/delpost/{{$post->id}}" id="form_{{ $post->id }}" method="POST">
                                        <button type="button" onclick="deletePost({{ $post->id }})">↑この投稿を削除</button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </p>
                </div>
                <script>
                    function deletePost(id) {
                        'use strict'
                        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                        }
                    }
                </script>
            </body>
    </x-app-layout>
</html>
