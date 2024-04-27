<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/posts.css" type="text/css">
    <title>サブアカウント プロフィール画面</title>
</head>
    <x-app-layout>
        <x-slot>
        </x-slot>
            <body>
                <div class="header">
                    <p>
                        <img src="{{$subview -> icon}}" alt="アイコン" />
                        {{$subview->profiletext}}
                    </p>
                    @if($tf==FALSE)
                        <form method="post" name="form1" action="/{{$sub->id}}/follow/{{$subview->id}}">
                            @csrf
                            <a href="javascript:form1.submit()">フォローする</a>
                        </form>
                    @else
                        <form method="post" name="form2" action="/{{$sub->id}}/delfollow/{{$subview->id}}">
                            @csrf
                            @method('DELETE')
                            <a href="javascript:form2.submit()">フォロー解除する</a>
                        </form>
                    @endif
                    <a href="/{{$sub->id}}/index">ホーム画面へ</a>
                </div>
                <div>
                    <p></p>
                    <div class="post">
                        <p>
                            @foreach($posts as $post)
                                <p style = "padding: 10px 10px;" class="post border-b-4">{{$post -> content}}</p>
                            @endforeach
                        </p>
                    </div>
                    <p></p>
                </div>
            </body>
    </x-app-layout>
</html>
