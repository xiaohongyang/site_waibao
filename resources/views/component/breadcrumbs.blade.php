<?php
use \App\Http\Helpers\TreeHelper;
if(isset($type_id))
    $tree = TreeHelper::getInstance()->getPath($type_id, $globalTypeList);
?>
@if(!isset($id) && isset($type_id))
 
    <div class="main-nav">
        当前位置：
        <a href="/">首页</a>  &gt;&gt;
        @if(count($tree))
            @foreach($tree as $type)
                <a href="{{route('article_list',['type_id'=>$type['id']])}}" class="{{$type['id']==$type_id?'curr' : ''}}">{{$type['name']}}</a> &gt;&gt;
            @endforeach
        @endif
        {{--<a href="newsCompanyInit.do?move_type=1&amp;news_type=7">新闻资讯</a> &gt;&gt;
        <a href="#" class="curr">公司新闻</a>--}}
    </div>

@else

    <div class="main-nav">
        当前位置：
        <a href="/">首页</a>  &gt;&gt;
        @if(isset($title))
            {{$title}}
        @elseif(count($tree))
            @foreach($tree as $type)
                <a href="{{route('article_list',['type_id'=>$type['id']])}}" class="{{$type['id']==$type_id?'' : ''}}">{{$type['name']}}</a> &gt;&gt;
            @endforeach
            <a href="#" class="curr">详情</a>
        @endif
        {{--<a href="newsCompanyInit.do?move_type=1&amp;news_type=7">新闻资讯</a> &gt;&gt;--}}
        
    </div>
@endif