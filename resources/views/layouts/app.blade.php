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
    <link href="{{ asset('css/app_header.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm ">
            <div class="container">
                <a class="navbar-brand " href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <div class = "performance">
            web小説が {{ \App\Http\Controllers\HomeController::getMyCount() }}作品登録されています
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse" id="navbarSupportedContent">
                <form class="navbar-form">
                    <div class="form-group">
                        <button type="submit" class="btn search_btn">検索</button>
                        <input type="text" class="search_key" placeholder="キーワード">
                    </div>
                </form>
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    
                    </ul>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="header_nav navbar-nav ml-auto ">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link " href="{{ url('/') }}">{{ __('操作説明') }}</a>
                        </li>
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif
                        
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}<span class="caret"></span>
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
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
            <nav class="navbar container_header">
            <div class="container_nav">
      
        <!-- 3.リストの配置 -->
        <ul class="header_list">
            <li><a href="home">ホーム</a></li>
            <!-- <li type = "button" onclick = "favorite()"> -->
            <li id = "bookmark" onclick = "favorite()">お気に入り</li>
            <li><a href="#">閲覧履歴</a></li>
            <li><a href="#">ランキング</a></li>
            <li id = "posting" onclick = "post()">投稿</li>
        </ul>
        <script>
            function favorite() {
                document.getElementById("bookmark").innerHTML= "<div class = 'pulldown'><a href='home'>お気に入りのタイトル</a><br><a href='home'>お気に入りのユーザー</a></div>";
            }
            function post() {
                document.getElementById("posting").innerHTML= "<div class = 'pulldown'><a href='home'>新規投稿</a><br><a href='home'>続編投稿</a></div>";
            }
        </script>
         </div>
            </nav>
        <main class="main">
        @if(session('success'))
            <div class="alert alert-success" role="alert">
              {{ session('success') }}
            </div>
        @endif
              @yield('content')
        </main>
    </div>
    @yield('footer')
</body>
</html>
