<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サブアカウント プロフィール画面</title>
    <link rel="stylesheet" href="/public/css/posts.css" type="text/css">
</head>
    <x-app-layout>
        <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('プロフィール') }}
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
                                    <x-primary-button class="ml-3"><p><a href="/{{$sub->id}}/create">新規投稿作成</a></p></x-primary-button>
                                    <x-primary-button class="ml-3"><a href="/{{$sub->id}}/menu">サブユーザーメニュー・機能一覧へ</a></x-primary-button>
                                    <x-primary-button class="ml-3"><a href="/{{$sub->id}}/showfollows">フォロー一覧</a></x-primary-button>
                                    <x-primary-button class="ml-3"><a href="/{{$sub->id}}/index">ホーム画面へ</a></x-primary-button>
                                </div>                
                            </div>
                        </div>
                    </div>
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
