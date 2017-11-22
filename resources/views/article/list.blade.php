@extends('layouts.app')
<?php
$typeArr = ['关于我们', '服务指南', '新闻资讯', '检测能力', '网上业务', '联系我们'];
$rootId = $id;
foreach ($typeArr as $typeName) {

	$types = getTypeList($typeName, 'name');
	if (count($types)) {
		foreach ($types as $item) {
			if ($item['id'] == $rootId) {
				$rootId = $types[0]['id'];
			}

		}
	}
}

$types = getTypeList($rootId, 'id');
if (count($types) > 1) {
	$rootType = getTypeItem($rootId, 'id', $globalTypeList);
	$currentType = getTypeItem($id, 'id', $globalTypeList);
} else {

	$rootId = 17;
	foreach ($typeArr as $typeName) {

		$types = getTypeList($typeName, 'name');
		if (count($types)) {
			foreach ($types as $item) {
				if ($item['id'] == $rootId) {
					$rootId = $types[0]['id'];
				}

			}
		}
	}
	$rootType = getTypeItem($rootId, 'id', $globalTypeList);
	$currentType = getTypeItem($id, 'id', $globalTypeList);
}

?>


@section('title') [易算土方官网]_{{$currentType['name']}} @endsection


@section('content')



    <div class="row">

        <!--右侧内容区 begin-->
        <div class="main-l col-sm-12 main-list-{{$current_type->show_type}}">
            @component('component.breadcrumbs', ['type_id'=>$id])
            @endcomponent

            <div class="newsWord news-company">
                {{--<p class="title">{{$currentType['name']}}</p>--}}
                <!--搜索部分开始-->

                {{--@component('component.search')
                @endcomponent--}}
                <div id="dataInfo">



                    <!--这是翻页的开始-->
                        <div class="shzi   hide">

                            <a href="javascript:;" class="past to-prev">&nbsp;</a>
                            <span>
                            <a href="javascript:initList(1)" data="1" class="cur-page">1</a>
                            <a href="javascript:initList(2)">2</a>
                            <a href="javascript:initList(3)">3</a>
                            <a href="javascript:initList(4)">4</a>
                            <a href="javascript:initList(5)">5</a>
                            <a href="javascript:initList(6)">6</a>
                            <a href="javascript:initList(7)">7</a>
                            <a href="javascript:initList(8)" style="display: none;">8</a>

                            </span>


                            <a href="javascript:initList(2)" class="next tp-next">&nbsp;</a>
                            &nbsp;&nbsp;&nbsp;
                            共<span class="total_number">49</span>页
                            &nbsp;&nbsp;&nbsp;
                            到第
                            <input type="text" id="page" name="page" style="width: 30px;border: 1px solid #e4e4e4;">
                            页
                            &nbsp;&nbsp;&nbsp;
                            <a href="javascript:;" id="pageSubmit" style="width: 50px;">确定</a>

                        </div>

                </div>

                <div class="shzi   " id='xhyPage'> </div>

            </div>

        </div>
        <!--右侧内容区 end-->
    </div>

    <input type="hidden" name="type_id" value="{{$id}}" />
@endsection


@section('scripts')
    <script src="{{ mix('js/article-list.js') }}"></script>
    <style type="text/css">
        .container .content-wrapper .main-list-1 .list-wrapper .time{
            width: 170px !important;
        }
        .container .content-wrapper .main-list-1 .list-wrapper .info {
            line-height: 5px !important;
        }
    </style>
@endsection