<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>たいとる</title>
</head>
    <x-app-layout>
        <x-slot>
        </x-slot>
            <body>
                <form action=/sub/edit/update method="Post" enctype="multipart/form-data">
                    <div>
                        <p>アイコンアップロード</p>
                        <input type="file" name="img" />
                        <p>変更前のアイコン</p>
                        <img src="{{asset('storage/icon/' . $sub->icon)}}" width ="50px" height="50px">
                    </div>
                    <div>
                        <textarea name=user['profiletext'] rows=10 cols=20 required value={{$sub->prodiletext}}></textarea>
                    </div>
                    <input type="submit" value="送信"/>
                </form>
            </body>
    </x-app-layout>
</html>