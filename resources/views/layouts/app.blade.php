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

    <link href="{{mix('/css/tb_slide/tb_slide.css')}}" rel="stylesheet">

    <link href="{{mix('/css/site.css')}}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>


</head>
<body>
    <div id="app">


        @component('component.header')
        @endcomponent






        <div class="container">


            @component('component.header_nav')
            @endcomponent

            @if(isset($is_home))
            <!--advertiser-->
                <div class="row">
                    <div class="col-sm-12" style=' '>
                        @component('component.header_slide')
                        @endcomponent

                </div>
            </div>
            @endif
            <!--end advertisser-->



                <div class="row side-wrapper">

                    <div class="col-sm-2">

                        @component('component.side-wrapper')
                        @endcomponent

                    </div>

                    <div class="col-sm-10">
                        <div id="layout-app" class="content-wrapper">
                            @yield('content')
                        </div>
                    </div>


                </div>




        </div>

        <div class="container clear-padding">
            @component('component.footer')
            @endcomponent
        </div>
    </div>
    <!-- end app -->


    <script src="{{ mix('js/app.js') }}"></script>


    <script src="{{ mix('js/tb_slide/tb_slide.js') }}"></script>

    <script src="{{ mix('js/site.js') }}"></script>

    <!--include socket.io.js-->
    <!--<script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>-->



    @yield('scripts')

</body>
</html>
