<div class="sidebar">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">
                网站菜单
            </h4>
        </div>

        <div class="panel-body">
            <ul class="nav">
                <li><a href="/">首页</a></li>

                @if(isset($header_nav) && count($header_nav))
                @foreach($header_nav as $nav)
                    <li><a href="{{route('article_list', $nav['id'])}}">{{$nav['name']}}</a></li>
                @endforeach
                @endif
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
                    @if(isset($friend_list) && count($friend_list))
                    @foreach( $friend_list as $link )
                        <a href="{{$link['link']}}" target="_blank">{{$link['title']}}</a>
                    @endforeach
                    @endif

                </li>
            </ul>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">访问统计</h4>
        </div>
        <div class="panel-body">
            <ul class="nav">
                <li>今日访问: <?=\App\Http\Service\VisitCounterService::getTodayWebVisitCount()?></li>
                <li> 总访问: <?=\App\Http\Service\VisitCounterService::getWebVisitCount()?> </li>
                <li class="hide">总下载: <?=\App\Http\Service\VisitCounterService::getWebDownCount()?></li>
            </ul>
        </div>
    </div>

</div>