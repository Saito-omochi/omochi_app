<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォロー一覧</title>
</head>
    <x-app-layout>
        <x-slot>
        </x-slot>
            <body>
                <p>
                    @foreach($following as $follow)
                        <p>{{$follow->sub->name}}</p>
                    @endforeach
                </p>
            </body>
    </x-app-layout>
</html>
