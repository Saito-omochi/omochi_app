<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/posts.css" type="text/css">
    <title>自分の投稿統合一覧</title>
</head>
    <x-app-layout>
        <x-slot>
        </x-slot>
            <body>
                <div style="padding: 10px 14px;">
                    <p>
                        @foreach($posts as $post)
                            <div style = "padding: 10px 10px;" class="post border-b-4">
                                <small style="padding: 5px 7px;"><a href="/{{Auth::id()}}/profile/{{$post->sub->id}}">{{$post->sub->name}}</a></small>
                                <p style="padding: 5px 7px;">{{$post -> content}}</p>
                            </div>
                        @endforeach
                    </p>
                </div>
                <div class='paginate'>
                    {{ $posts->links() }}
                </div>
            </body>
    </x-app-layout>
</html>
