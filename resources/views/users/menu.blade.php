<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-top: 20px;">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach($subs as $sub)
                        <p class="underline" style="padding 1px 10px;"><a href="/{{$sub->id}}/index">{{$sub->name}}のホームへ</a></p>
                    @endforeach
                </div>
                <small>作ったサブユーザーのホーム画面へ移動するにはここから</small>
            </div>
        </div>
    </div>
    
    <div>
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-top: 20px;">
                    <div class="p-6 text-gray-900">
                        <p class="underline"><a href="/profile">親プロフィール編集</a></p>
                        <small>自分のサブユーザーを管理するための最初に登録した情報を変更するページ</small>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-top: 20px;">
                    <div class="p-6 text-gray-900">
                        <p class="underline"><a href=/profile/subregister>新規サブユーザー登録</a></p>
                        <small>投稿をするためのアカウントはここから作る</small>
                    </div>
                </div>
            </div>
        </div>      
    
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-top: 20px;">
                    <div class="p-6 text-gray-900">
                        <p class="underline"><a href=/profile/show>自分の投稿統合一覧</a></p>
                        <small>自分のサブユーザーの投稿を一覧してみることができるページ</small>
                    </div>
                </div>
            </div>
        </div>
        
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-top: 20px;">
                    <div class="p-6 text-gray-900">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
