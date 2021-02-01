<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('work.index') }}">
                    ProjecT
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                {{__('menu.description')}}
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Authentication Links -->
                        @guest
                            <li class="mt-2 mr-2 nav-item">
                                <span class="fa fa-user"></span>
                            </li>
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('menu.login') }}</a>
                                </li>
                            @endif
                                        <span class="mt-2">|</span>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('menu.register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown mr-2">
                                <i class="fa fa-user d-inline"></i>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle d-inline" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" title="{{__('menu.my_ads')}}" href="{{route('work.userWorks',Auth::user()->id)}}">{{__('menu.my_ads')}}</a>
                                    <a class="dropdown-item" title="{{__('menu.registration_as_master_hover')}}" href="{{route('master.show',Auth::user()->id)}}">{{__('menu.registration_as_master')}}</a>
                                    <a class="dropdown-item" title="{{__('menu.setting_user_hover')}}" href="{{route('user.show',Auth::user()->id)}}">{{__('menu.setting_user')}}</a>
                                    <a class="dropdown-item" title="{{__('menu.logout_user_hover')}}" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('menu.logout_user') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li>
                                <a href="{{route('work.create')}}" class="text-dark ml-1" ><i class="fa fa-sticky-note mr-2"></i>{{ __('menu.add_ads') }}</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
{{--        @include('inc.header-bottom')кийин шилтеме страницалар даяр болгондо кошулат--}}
        <main class="py-4 container content shadow rounded">

            @yield('content')
        </main>
    </div>
</body>
</html>
