<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サブユーザー登録画面</title>
</head>
    <x-app-layout>
        <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('サブユーザー登録画面') }}
        </h2>
    </x-slot>
            <body>
                <div style = "padding: 10px 20px;">
                    <form action=/profile/subregister method="POST" enctype="multipart/form-data">
                        @csrf
                        <h class="title">サブユーザー登録画面</h>
                        <div style = "padding: 10px 20px;">
                            <p>あなたの親ユーザー</p>
                            <p>{{$user->id}}, {{$user->name}}</p>
                        </div>
                        <div class="img">
                            <input type="file" name="img">
                        </div>
                        <p style = "padding: 10px 20px;">name(20文字以内)<input type="text" id="name" name="user[name]" required maxlength="20" size=20 /></p>
                        <p>プロフィールテキスト</p>
                        <p style = "padding: 10px 20px;"><textarea name="user[profiletext]" required>sample text</textarea></p>
                        <p>seacret(鍵垢)
                            <select name="user[seacret]">
                                <option value=0>鍵垢off(全体公開)</option>
                                <option value=1>鍵垢on(相互フォロー限定公開)</option>
                            </select>
                        </p>
                        <x-primary-button class="ml-3">
                            <input type="submit" value="送信"/>
                        </x-primary-button>
                    </div>
                </form>
            </body>
    </x-app-layout>
</html>
