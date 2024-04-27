<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿作成画面</title>
</head>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('投稿作成画面') }}
            </h2>
        </x-slot>
            <body>
                <div style = "padding: 10px 20px;">
                    <form action="/{{$sub->id}}/store" method="POST">
                        @csrf
                        <div>
                            <p>今選択しているユーザー</p>
                            <p><img src="{{$sub->icon}} "alt="default_icon" width ="50px" height="50px" />{{$sub->name}}</p>
                        </div>
                        <p>投稿内容</p>
                        <p><textarea required name="post[content]" maxlength="300"/></textarea></p>
                        <p style="padding: 10px 20px;">
                            <p>カテゴリー選択</p>
                            <select name="post[category_id]">
                                @foreach($categories as $categories)
                                <option value={{$categories->id}}>{{$categories->name}}</option>
                                @endforeach
                            </select>
                        </p>
                        <input type="submit" value="送信"/>
                    </form>
                    <p style="padding: 50px 20px;"><a href="/{{$sub->id}}/index">ホーム画面へ戻る</a></p>
                </div>
            </body>
    </x-app-layout>
</html>
