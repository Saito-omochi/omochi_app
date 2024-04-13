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
                <div class="header">
                    <p>
                        <img src="{{$subview -> icon}}" alt="アイコン" />
                        {{$subview->profiletext}}
                    </p>
                    <form method="post" name="form1" action="/{{$sub->id}}/follow/{{$subview->id}}">
                        @csrf
                        <a href="javascript:form1.submit()">フォローする</a>
                    </form>
                </div>
                <div>
                    <p></p>
                    <p>
                        @foreach($posts as $post)
                            <p>{{$post -> content}}</p>
                        @endforeach
                    </p>
                    <p></p>
                </div>
            </body>
    </x-app-layout>
</html>
