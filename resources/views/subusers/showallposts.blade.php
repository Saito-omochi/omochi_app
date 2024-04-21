<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サブアカウント プロフィール画面</title>
</head>
    <x-app-layout>
        <x-slot>
        </x-slot>
            <body>
                <a href="/{{$sub->id}}/index">ホーム画面へ</a>
                <div style="padding: 10px 14px;">
                    <p>
                        @foreach($posts as $post)
                            <img src="{{$post->sub->icon}}" alt="画像が読み込めません" width ="50px" height="50px" />
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
