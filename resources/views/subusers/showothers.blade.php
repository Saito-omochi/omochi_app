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
                <div>
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-top: 20px;">
                            <div class="p-6 text-gray-900">
                                <div class="header" >
                                    <p  class="border-b-4">
                                        <img src="{{$subview->icon}}" alt="画像が読み込めません" width ="50px" height="50px" />
                                        {{$subview->profiletext}}
                                    </p>
                                    <x-primary-button class="ml-3"><p>
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
                                    </p></x-primary-button>
                                    <x-primary-button class="ml-3"><p><a href="/{{$sub->id}}/index">ホーム画面へ</a></p></x-primary-button>
                                </div>                
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="post">
                        <p>
                            @foreach($posts as $post)
                            <div style = "padding: 10px 10px;" class="post border-b-4">
                                <img src="{{$post->sub->icon}}" alt="画像が読み込めません" width ="50px" height="50px" />
                                <small class="underline" style="padding: 5px 7px;"><a href="/{{$sub->id}}/profile/{{$post->sub->id}}">{{$post->sub->name}}</a></small>
                                <p style="padding: 5px 7px;">{{$post -> content}}</p>
                            </div>
                            @endforeach
                        </p>
                    </div>
                    <p></p>
                </div>
            </body>
    </x-app-layout>
</html>
