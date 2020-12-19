<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('image/logo.png') }}" type="image/icon type">
    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-header shadow-sm">
            <div class="container">
                <a class="navbar-brand style-title" href="{{ url('/') }}">
                    <img src="{{ asset('image/logo.png') }}" width="45" height="45" class="d-inline-block align-top" alt="" loading="lazy">
                    PHizza Hut
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="style-nav">
                                <a class="nav-link border-right pr-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="style-nav">
                                    <a class="nav-link pl-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if (Auth::user()->role_id == 1)
                                <li class="style-nav border-right pr-1">
                                    @php $user_id = Auth::user()->id @endphp
                                    <a href="/transaction/history/{{ $user_id }}" class="nav-link">All User Transaction</a>
                                </li>
                                <li class="style-nav border-right pl-1 pr-1">
                                    <a href="/all/user" class="nav-link">All User</a>
                                </li>
                            @endif
                            @if (Auth::user()->role_id == 2)
                                <li class="style-nav border-right pr-1">
                                    @php $user_id = Auth::user()->id @endphp
                                    <a href="/transaction/history/{{ $user_id }}" class="nav-link">Transaction History</a>
                                </li>
                                <li class="style-nav border-right pl-1 pr-1">
                                    @php $user_id = Auth::user()->id @endphp
                                    <a href="/cart/{{ $user_id }}" class="nav-link">Cart</a>
                                </li>
                            @endif
                            <li class="style-nav dropdown pl-1">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right dropdown-color" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item dropdown-color" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer>
            <span>Copyright &copy; 2020. <a href="/">Andreas Chendra</a> | <a href="/">Aitisen</a></span>
        </footer>
    </div>
</body>
</html>
