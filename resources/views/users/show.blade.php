<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/posts.css" type="text/css">
    <title>自分の投稿統合一覧</title>
</head>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('自分の投稿統合一覧') }}
            </h2>
        </x-slot>
            <body>
                <div style="padding: 10px 14px;">
                    <p>
                        @foreach($posts as $post)
                            <div style = "padding: 10px 10px;" class="post border-b-4">
                                <img src="{{$post->sub->icon}}" alt="画像が読み込めません" width ="50px" height="50px" />
                                <small style="padding: 5px 7px;"><a href="/{{$post->sub->id}}/profile/{{$post->sub->id}}">{{$post->sub->name}}</a></small>
                                <p style="padding: 5px 7px;">{{$post -> content}}</p>
                            </div>
                        @endforeach
                    </p>
                </div>
                <div class='paginate'>
                    {{ $posts->links() }}
                </div>
            </body>
    </x-app-layout>
</html>
