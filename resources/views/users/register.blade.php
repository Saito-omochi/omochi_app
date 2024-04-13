<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サブユーザー登録画面</title>
</head>
    <x-app-layout>
        <x-slot>
        </x-slot>
            <body>
                <form action=/profile/subregister method="POST">
                    @csrf
                    <h class="title">サブユーザー登録画面</h>
                    <div>
                        <p>あなたの親ユーザー</p>
                        <p>{{$user->id}}, {{$user->name}}</p>
                    </div>
                    <p>name（英字8~20文字）<input type="text" id="name" name="user[name]" required minlength="8" maxlength="20" size=20 /></p>
                    <p><textarea name="user[profiletext]" required>sample text</textarea></p>
                    <p>seacret(鍵垢)
                        <select name="user[seacret]">
                            <option value=0>鍵垢off(全体公開)</option>
                            <option value=1>鍵垢on(相互フォロー限定公開)</option>
                        </select>
                    </p>
                    <input type="submit" value="送信"/>
                </form>
            </body>
    </x-app-layout>
</html>
