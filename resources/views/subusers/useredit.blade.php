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
                <form action="/{{$sub->id}}/profile/update" method="POST">
                    @csrf
                    <h class="title">サブユーザープロフィール編集画面</h>
                    <p>変更前のアイコン</p>
                        <img src="{{asset('storage/icon/' . $sub->icon)}}" width ="50px" height="50px">
                    <p>アイコンアップロード</p>
                    <input type="file" name="icon" />
                    <p>name（英字8~20文字）<input type="text" id="name" name="user[name]" required minlength="8" maxlength="20" size=20 value={{$sub -> name}} /></p>
                    <p>プロフィール文<textarea name="user[profiletext]">{{$sub->profiletext}}</textarea></p>
                    <p>seacret(鍵垢)
                        <select name="user[seacret]" value={{$sub->seacret}}>
                            <option value=0>鍵垢off(全体公開)</option>
                            <option value=1>鍵垢on(相互フォロー限定公開)</option>
                            <option value=2 hidden desabled selected>選択してください</option>
                        </select>
                    </p>
                    <input type="submit" value="送信"/>
                </form>
            </body>
    </x-app-layout>
</html>
