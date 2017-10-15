            <!--nav start-->
            <div class="row margin-top-0" >
                <div class="col-sm-12">


                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                            <li><a href="/">首页</a></li>

                            @foreach($header_nav as $nav)
                                <li><a href="{{route('article_list', $nav['id'])}}">{{$nav['name']}}</a></li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
            <!-- nav end-->