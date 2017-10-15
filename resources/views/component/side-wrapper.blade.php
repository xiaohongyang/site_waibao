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

                @foreach($header_nav as $nav)
                    <li><a href="{{route('article_list', $nav['id'])}}">{{$nav['name']}}</a></li>
                @endforeach
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
                    @foreach( $friend_list as $link )
                        <a href="{{$link['link']}}" target="_blank">{{$link['title']}}</a>
                    @endforeach

                </li>
            </ul>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">网站统计</h4>
        </div>
        <div class="panel-body">
            <ul class="nav">
                <li>
                    总访问: <?=\App\Http\Service\VisitCounterService::getWebVisitCount()?>
                </li>
                <li>总下载: <?=\App\Http\Service\VisitCounterService::getWebDownCount()?></li>
                <li>今日访问: <?=\App\Http\Service\VisitCounterService::getTodayWebVisitCount()?></li>
            </ul>
        </div>
    </div>

</div>