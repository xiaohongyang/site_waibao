<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{mix('/css/app.css')}}" rel="stylesheet">
    <link href="{{mix('/css/site.css')}}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    @include('UEditor::head')
</head>
<body>
    <div id="app">



        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/admin') }}">
                        管理后台
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="/" target="_blank">网站前台</a></li>

                        <!-- Authentication Links -->
                        @if (Auth::guard('admin')->guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else

                            {{--<li><a href="{{ route('home') }}">用户中心</a></li>--}}
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::guard('admin')->user()->name }}
                                    @can('isAdmin', 'App\User')
                                        管理员
                                    @endcan
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">


            <div class="row">
                <div class="col-sm-3">
                    @component('component.admin_nav')
                    @endcomponent
                </div>
                <div class="col-sm-9" id="layout-app">
                    <div class="bs-example" data-example-id="simple-breadcrumbs">

                        <ol class="breadcrumb">
                            <li><a href="/admin">后台首页</a></li>

                            @if (isset($breadcrumb) && is_array($breadcrumb) && count($breadcrumb))
                                @foreach($breadcrumb as $bread)
                                    <li><a href="{{$bread['link']}}" class="<?=$bread['active'] ? 'active' : ''?>">{{$bread['text']}}</a></li>
                                @endforeach
                            @endif
                        </ol>
                    </div>
                    <div class="">

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ mix('js/app.js') }}"></script>


    <script src="{{ mix('js/site.js') }}"></script>


    <!--include socket.io.js-->
    <!--<script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>-->



    @yield('scripts')

</body>
</html>
