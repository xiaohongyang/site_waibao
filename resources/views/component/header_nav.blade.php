<?php
    $url = Route::getCurrentRequest()->url();


    $typeId = isset($current_type_id) &&  $current_type_id ? $current_type_id : null;


    $is_home = isset($is_home) ? true :false;

?>
            <!--nav start-->
            <div class="row margin-top-0" >
                <div class="col-sm-12">


                    <div class="collapse navbar-collapse text-center" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav center-block">
                            &nbsp;
                            <li {{$is_home ? 'class=active' : ''}} ><a href="/" >首页</a></li>
                            @if( isset($header_nav) && count($header_nav))
                            @foreach($header_nav as $nav)
                                <li {{$nav['id']==$typeId ? 'class=active' : ''}}><a href="{{route('article_list', $nav['id'])}}" >{{$nav['name']}}</a></li>
                            @endforeach
                            @endif
                        </ul>

                    </div>
                </div>
            </div>
            <!-- nav end-->