<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォロー一覧</title>
</head>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('フォロー一覧') }}
            </h2>
        </x-slot>
            <body>
                <p>
                    @foreach($following as $follow)
                        <div style="padding: 10px 20px;">
                            <img src="{{$follow->sub->icon}}" alt="画像が読み込めません" width ="50px" height="50px" />
                            <p>{{$follow->sub->name}}</p>
                        </div>
                    @endforeach
                </p>
            </body>
    </x-app-layout>
</html>
