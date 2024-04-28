<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>サブユーザー編集画面</title>
</head>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('サブユーザー編集画面') }}
            </h2>
        </x-slot>
            <body>
                <div style = "padding: 10px 20px;">
                    <form action="/{{$sub->id}}/profile/update" method="POST" enctype="multipart/form-data">
                        @csrf
                        <p>アイコンアップロード</p>
                        <p>
                            現在のアイコン
                            <img src="{{$sub->icon}}" alt="画像が読み込めません" width ="100px" height="100px"/>
                        </p>
                        <div class="img">
                            <input type="file" name="img" />
                        </div>
                        <p style = "padding: 10px 20px;">name(20文字以内)<input type="text" id="name" name="user[name]" required maxlength="20" size=20 value={{$sub -> name}} /></p>
                        <p style = "padding: 10px 20px;">プロフィール文<textarea name="user[profiletext]">{{$sub->profiletext}}</textarea></p>
                        <p>seacret(鍵垢)
                            <select name="user[seacret]" value={{$sub->seacret}}>
                                <option value=0>鍵垢off(全体公開)</option>
                                <option value=1>鍵垢on(相互フォロー限定公開)</option>
                                <option value=2 hidden desabled selected>選択してください</option>
                            </select>
                        </p>
                        <x-primary-button class="ml-3">
                            <input type="submit" value="送信"/>
                        </x-primary-button>
                    </form>
                </div>
                <x-primary-button class="ml-3">
                    <p><a href="/{{$sub->id}}/index">ホーム画面へ戻る</a></p>
                </x-primary-button>
            </body>
    </x-app-layout>
</html>
