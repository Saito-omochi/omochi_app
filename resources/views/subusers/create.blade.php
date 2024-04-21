<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿作成画面</title>
</head>
    <x-app-layout>
        <x-slot>
        </x-slot>
            <body>
                <form action="/{{$sub->id}}/store" method="POST">
                    @csrf
                    <h class="title">投稿作成画面</h>
                    <div>
                        <p>今選択しているユーザー</p>
                        <p><img src="{{$sub->icon}} "alt="default_icon" width ="50px" height="50px" />{{$sub->name}}</p>
                        <p><a href=/profile/select>ユーザー選択画面へ</a></p>
                        <p><a href="/{{$sub->id}}/profile/{{$sub->id}}">プロフィール画面へ</a></p>
                    </div>
                    <p>投稿内容</p>
                    <p><textarea required name="post[content]" maxlength="300"/></textarea></p>
                    <p>
                        <select name="post[category_id]">
                            @foreach($categories as $categories)
                            <option value={{$categories->id}}>{{$categories->name}}</option>
                            @endforeach
                        </select>
                    </p>
                    <input type="submit" value="送信"/>
                </form>
            </body>
    </x-app-layout>
</html>
