<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カテゴリーで検索</title>
</head>
    <x-app-layout>
        <x-slot name="header">
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('カテゴリー表示') }}
            </h1>
        </x-slot>
            <body>
                <p><a href="/{{$sub->id}}/index">ホーム画面へ</a></p>
                <p><a href="/{{$sub->id}}/search">カテゴリー検索画面に戻る</a></p>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{$category->name}}_カテゴリー</h1>
                <div style="padding: 10px 14px;">
                    <p>
                        @foreach($posts as $post)
                            <img src="{{$post->sub->icon}} "alt="default_icon" width ="50px" height="50px" />
                            <small style="padding: 5px 7px;"><a href="/{{$sub->id}}/profile/{{$post->sub->id}}">{{$post->sub->name}}</a></small>
                            <p style="padding: 5px 7px;">{{$post -> content}}</p>
                        @endforeach
                    </p>
                </div>
                <div class='paginate'>
                    {{ $posts->links() }}
                </div>
            </body>
    </x-app-layout>
</html>
