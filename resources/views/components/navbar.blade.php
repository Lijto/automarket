<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}"><h1>{{config('app.name')}}</h1></a>
        <div
            class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/user-announcements') }}"
                           class="text-sm text-gray-700 dark:text-gray-500 underline">{{__('Личный кабинет')}}</a>
                    @else
                        <a href="{{ route('login') }}"
                           class="text-sm text-gray-700 dark:text-gray-500 underline">{{__('Вход')}}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">{{__('Регистрация')}}</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
</nav>
