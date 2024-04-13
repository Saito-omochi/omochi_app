<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サブユーザー選択画面</title>
</head>
    <x-app-layout>
        <x-slot>
        </x-slot>
            <body>
                <h1>サブユーザー選択（選択するユーザーの名前をクリックしてください）</h1>
                <div>
                    @foreach($subs as $sub)
                        <a href="/{{$sub->id}}/index">{{$sub->name}}</a>
                    @endforeach
                </div>
            </body>
    </x-app-layout>
</html>
