<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サブアカウント プロフィール画面</title>
    <link rel="stylesheet" href="/public/css/posts.css" type="text/css">
</head>
    <x-app-layout>
        <x-slot>
        </x-slot>
            <body>
                <div class="header">
                    <p>
                        <img src="{{$sub->icon}}" alt="画像が読み込めません" width ="50px" height="50px" />
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
                            <div style = "padding: 10px 10px;" class="post border-b-4">
                                <p style="padding: 5px 7px;">
                                    <img src="{{$sub->icon}}" alt="画像が読み込めません" width ="50px" height="50px" style="white-space: nowrap;"/>
                                    {{$post -> content}}
                                </p>
                            
                                <form action="/{{$sub->id}}/delpost/{{$post->id}}" id="form_{{ $post->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="deletePost({{ $post->id }})">↑この投稿を削除</button>
                                </form>
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
