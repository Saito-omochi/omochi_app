<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サブユーザー選択画面</title>
</head>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('サブユーザー選択画面') }}
            </h2>
        </x-slot>
            <body>
                <h1>（選択するユーザーの名前をクリックしてください）</h1>
                <div style="padding: 10px 50px;">
                    @foreach($subs as $sub)
                        <img src="{{$sub->icon}}" alt="画像が読み込めません" width ="50px" height="50px" />
                        <div style="padding: 10px 5px;"><x-primary-button class="ml-3"><a href="/{{$sub->id}}/index">{{$sub->name}}</a></x-primary-button></div>
                    @endforeach
                </div>
            </body>
    </x-app-layout>
</html>
