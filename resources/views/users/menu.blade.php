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
                        <p><a href="/{{$sub->id}}/index">{{$sub->name}}のホームへ</a></p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <div>
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-top: 20px;">
                    <div class="p-6 text-gray-900">
                        <p><a href="/profile">親プロフィール編集</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-top: 20px;">
                    <div class="p-6 text-gray-900">
                        <p><a href=/profile/subregister>新規サブユーザー登録</a></p>
                    </div>
                </div>
            </div>
        </div>      
    
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" style="margin-top: 20px;">
                    <div class="p-6 text-gray-900">
                        <p><a href=/profile/show>自分の投稿統合一覧</a></p>
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
