<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>カテゴリーで検索</title>
</head>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('検索') }}
            </h2>
        </x-slot>
        <p><a href="/{{$sub->id}}/index">ホーム画面へ戻る</a></p>
            <body>
                @foreach($categories as $category)
                    <p style = "padding: 10px 20px;"><a href="/{{$sub->id}}/search/{{$category->id}}">{{$category->name}}</a></p>
                @endforeach
            </body>
    </x-app-layout>
</html>
