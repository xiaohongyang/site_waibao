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



        <div class="container">
            <!-- <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-default navbar-static-top">
                        <div class="container">
                            <div class="navbar-header">
            
                                Collapsed Hamburger
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                                    <span class="sr-only">Toggle Navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
            
                                 
                            </div>
            
            
                        </div>
                    </nav>            
                </div>
            </div> -->

            <div class="row margin-top-0">
                <div class="col-sm-12" style='background:#fff; width: 100%; height: 100px;'>

                    <div class="header01">
                        <div class="logo"> <div style="float:left;"><a href="/"><img src="/images/yslogo.jpg" alt=""></a> </div>

                            <div style="float:left; padding-top:30px; padding-left:20px;">
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=106424196&amp;site=qq&amp;menu=yes">
                                    <img border="0" src="http://wpa.qq.com/pa?p=2:106424196:41 &amp;r=0.5010354385080462" alt="在线咨询" title="在线咨询">
                                </a>
                            </div>

                            <div style="float:right; padding-top:0px;">


                                <div class="hr01">
                                    <div class="hr0101"> <a href="#">服务电话: 13812287236</a></div>
                                    <div class="hr0102"> <a href="#">联系我们</a></div>
                                </div>
                                <br>
                                <br>
                            </div>


                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        

        <div class="container">

            
            <!--nav start-->
            <div class="row margin-top-0" >
                <div class="col-sm-12">
                    
                
                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                            <li><a href="">首页</a></li>
                            <li><a href="">技术文章</a></li>
                            <li><a href="">技术文章</a></li>
                            <li><a href="">技术文章</a></li>
                            <li><a href="">技术文章</a></li>
                            <li><a href="">技术文章</a></li>
                        </ul>

                    </div>
                </div>
            </div>
            <!-- nav end-->

            <!--advertiser-->
            <div class="row">
                <div class="col-sm-12" style=' '>
                    <div class="slider " id="MainPromotionBanner"> 
                        
                        <div id="SlidePlayer">
                                <ul class="Slides">
                              <li><a href="#" target="_blank">
                              <img class='img-responsive' border="0" alt="" src="http://image.youzhan.org/3/af/2693eb70cb7f2fd18e70dd70ffd3a.png!thumb">
                              </a></li>
                              <li><a href="#">
                              <img class='img-responsive' border="0" alt="#" src="http://www.ysgxf.com/image/img_74.jpg">
                              </a></li>
                              <li><a href="#">
                              <img class='img-responsive' border="0" alt="" src="http://www.ysgxf.com/image/img_75.jpg"></a>
                              </li></ul>
                       <ul class="SlideTriggers"><li class="">1</li><li class="Current">2</li><li class="">3</li></ul></div>    
                    </div>
                </div>
            </div>
            <!--end advertisser-->



            <div class="row">
                
                <div class="col-sm-3">
                    <div class="sidebar">

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    网站菜单
                                </h4>
                            </div>

                            <div class="panel-body">
                                <ul class="nav">
                                    <li>
                                        <a href="">链接</a>
                                        <a href="">链接</a>
                                        <a href="">链接</a>
                                        <a href="">链接</a>
                                        <a href="">链接</a>
                                        <a href="">链接</a>
                                    </li>
                                </ul>        
                            </div>
                        </div>
 

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">友情链接</h4>
                            </div>
                            <div class="panel-body">
                                <ul class="nav">
                                    <li>
                                        <a href="">链接</a>
                                        <a href="">链接</a>
                                        <a href="">链接</a>
                                        <a href="">链接</a>
                                        <a href="">链接</a>
                                        <a href="">链接</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        
                    </div>
                </div>

                <div class="col-sm-9">
                    <div id="layout-app">
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
    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>



    @yield('scripts')

</body>
</html>
