<?php
use App\Http\Service\ArticleService;
?>
@extends('layouts.front')

<?php

$service = new ArticleService();
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
$rootType = getTypeItem($rootId, 'id', $globalTypeList);
if (count($types) > 1) {

    $currentType = getTypeItem($id, 'id', $globalTypeList);
} else if($rootType['name'] == '检测能力'){
    $types = [ $rootType ];
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
@section('content')

    <style>
        .type_22 table{
            border-collapse: collapse;
        }
        .type_22 table tr td{
            border: 1px solid #000 !important;
        }

        .sub-nav ul li{
            padding: 0;
            text-indent: 12px;
        }



        .sub-nav ul li ul{
            border: 0;
        }
        .sub-nav ul li ul li{
            background: #eee;
        }
        .sub-nav ul li ul li.active{
            background: #ccc;
        }
        .sub-nav ul li ul li.active a{
            color: #000;
        }

        #doctitle pre img{
            max-width: 100%;
        }
    </style>

    <div class="main cl">
        <!--左侧导航 begin-->
        <div class="sub-nav pl">
            <h2>{{$rootType['name']}}</h2>

            <?php
                if($rootType['name'] == '检测能力'){
            ?>
            <?php
                if(in_array($rootType['name'], ['送检指南', '检测能力'])){
                $articleList = $service->getPageList(1, 1000000,null,'sort','desc', ['type_id' => $rootType['id']]);

                $articleList = $articleList->toArray();
                if (is_array($articleList) && count($articleList)) {
            ?>
                    <ul>
                        <?php
                        foreach ($articleList as $article) {
                        ?>
                        <li <?=$model->id == $article['id'] ? 'class="active"' : ''?>><a href="{{route('article_detail',['id'=> $article['id']])}}" title="{{$article['title']}}">{{$article['title']}}</a></li>
                        <?php
                        }
                        ?>
                    </ul>
            <?php
                    }
                }
            ?>
            <?php
                } else {
            ?>

                <ul>
                    @if(count($types))
                        @foreach($types as $type)
                            @if(key_exists('level', $type) && $type['level']==2)
                                <li class="<?=$type['id'] == $type_id ? 'cur' : ''?>">
                                    <a href="{{route('article_list',['type_id'=>$type['id']])}}" title="{{$type['name']}}">{{$type['name']}}</a><i class="icon i-sub-arrow"></i>

                                    <?php
                                    if(in_array($type['name'], ['送检指南', '检测能力'])){
                                    $articleList = $service->getPageList(1, 1000000,null,'sort','desc', ['type_id' => $type['id']]);
                                    $articleList = $articleList->toArray();
                                    if (is_array($articleList) && count($articleList)) {
                                    ?>
                                    <ul>
                                        <?php
                                        foreach ($articleList as $article) {
                                        ?>
                                        <li <?=$model->id == $article['id'] ? 'class="active"' : ''?>><a href="{{route('article_detail',['id'=> $article['id']])}}" title="{{$article['title']}}" >{{$article['title']}}</a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                    <?php
                                    }
                                    }
                                    ?>
                                </li>
                            @endif
                        @endforeach
                    @endif

                </ul>
            <?php
                }

            ?>


            <i class="ra ra-lt ra-sub-lt"></i>
            <i class="ra ra-rt ra-sub-rt"></i>
        </div>
        <!--左侧导航 end-->
        <!--右侧内容区 begin-->
        <div class="main-l recourceApply newsDetailWord newsDetail_ding type_<?=$model->type_id?>" name="top">
            @component('component.breadcrumbs', ['type_id'=>$model->type_id, 'id'=>$model->id])
            @endcomponent
            <div id="doctitle">
                <div class="newLeft" style="width: auto;">
                    <h3 class="newLeft-title">{{$model->updated_at}}</h3>
                    <h3 class="newLeft-title">{{$model->title}}</h3>

                    <p></p>
                    <?php
                        if($model->type_id==22) {

                            echo $model->content;
                        } else {
                            echo "<pre>$model->content</pre>";
                        }
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
            <div class="img so_app_right hide" id="bannerOne">
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