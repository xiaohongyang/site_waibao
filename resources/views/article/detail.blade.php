@extends('layouts.front')

<?php
$typeArr = ['关于我们', '服务指南', '新闻资讯', '检测能力', '网上业务', '联系我们'];

$type_id = $model->type_id;
$rootId = $type_id;
foreach ($typeArr as $typeName) {

	$types = getTypeList($typeName, 'name');
	if (count($types)) {
		foreach ($types as $item) {
			if ($item['id'] == $type_id) {

				$rootId = $types[0]['id'];
                $rootType = $item;
				break;
			}

		}
	}
}

$types = getTypeList($rootId, 'id');

?>
@section('content')

    <div class="main cl">
        <!--左侧导航 begin-->
        <div class="sub-nav pl">
            <h2>{{$rootType['name']}}</h2>
            <ul>
                @if(count($types))
                    @foreach($types as $type)
                        @if($type['level']==2)
                        <li class="<?=$type['id'] == $type_id ? 'cur' : ''?>">
                           <a href="{{route('article_list',['type_id'=>$type['id']])}}">{{$type['name']}}</a><i class="icon i-sub-arrow"></i>
                        </li>
                        @endif
                    @endforeach
                @endif

            </ul>
            <i class="ra ra-lt ra-sub-lt"></i>
            <i class="ra ra-rt ra-sub-rt"></i>
        </div>
        <!--左侧导航 end-->
        <!--右侧内容区 begin-->
        <div class="main-l recourceApply newsDetailWord newsDetail_ding" name="top">
            @component('component.breadcrumbs', ['type_id'=>$model->type_id, 'id'=>$model->id])
            @endcomponent
            <div id="doctitle">
                <div class="newLeft">
                    <h3 class="newLeft-title">{{$model->updated_at}}</h3>
                    <h3 class="newLeft-title">{{$model->title}}</h3>

                    <p></p>
                    <?php
echo "<pre>$model->content</pre>";
?>

                    <div class="newLeft-other hide">

                        <p style="text-align:right;"><a class="print" href="javascript:;" onclick="printPage()">我要打印</a></p>
                        <p class="margin"></p>
                        <p><a href="queryNewsDetail.do?id=830&amp;news_type=7">下一页：关于开展2017年度苏浙赣沪三省一市《土壤中重金属（铅、铜、锌、砷）含量的测定》项目能力验证的通知</a></p>
                        <div class="Serve" style="display: none;">
                            <div id="fuwu" style="display: none;">
                                <div class="serve pl"><span>相关服务</span><a href="ourServiceInit.do"></a></div>
                                <div>
                                    <p><a href="queryOurServiceByInit.do?id=" title="">
                                        </a></p>
                                </div>
                            </div>

                            <div id="peixun" style="display: none;">
                                <div class="serve serveSpan pl"><span>相关培训/研讨会</span><a href="newsCompanyInit.do?move_type=3&amp;news_type=9"></a></div>
                                <div>
                                    <p><a href="queryTrainDetail.do?id=&amp;news_type=-1" title="">
                                        </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="img so_app_right" id="bannerOne">
                <img src="/tpl/hcPicture/AboutCTI/20150403135800339.jpg">
                <div>
                    <p class="p_one"><i></i>深圳总部</p>
                    <p class="p_two"><i></i><?=globalConfig('联系电话')?></p>
                    <p class="p_three"><a href="mailto:<?=globalConfig('联系邮箱')?>"><i></i><?=globalConfig('联系邮箱')?></a></p>
                </div>
                <a href="#top" class="zhiding"></a>
            </div>
            <div class="img so_app_right" id="bannerTwo" style="display: none;">
                <img src="/tpl/hcPicture/AboutCTI/20150403135800339.jpg">
                <a href="#top" class="zhiding"></a>
            </div>
        </div>
        <!--右侧内容区 end-->
    </div>


@endsection


@section('scripts')
    <script type="text/javascript" src="/ext/js/article-list.js"> </script>
@endsection