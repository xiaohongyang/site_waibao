@extends('layouts.front')


@section('content')

    <div class="main_by main_by1" >

        <div class="float no_marginLeft float1"  id="show_ul">
            <div class="choose choose1">
                <?php
if (is_array($channels) && count($channels)) {
	foreach ($channels as $key => $channel) {
		if ($key < 1) {
			?>
                                <a id="service_list" href="javascript:;" class="<?=$key == 0 ? 'cur border_radius_left' : ($key == 2 ? 'border_radius_right' : '')?> ">{{$channel['name']}}</a>
                                {{--<a id="service_list" href="javascript:;" class="cur border_radius_left">按行业</a>
                                <a id="profession_list" href="javascript:;">按服务</a>
                                <a id="plan_list" href="javascript:;" class="border_radius_right">推荐方案</a>--}}
                <?php
}
	}
}
?>
            </div>
            <?php
if (is_array($channels) && count($channels)) {
	foreach ($channels as $key => $channel) {
		if ($key < 1) {
			?>
                            <div class="show_ul <?=$key == 0 ? 'cur' : ''?> cl">
                                <div class="show_ul_wrap cl">
            <?php
if (count($channel['article_list'])) {
				foreach ($channel['article_list'] as $article) {

					?>
                                            <li><i></i><a href="{{route('article_detail', ['id'=>$article['id']])}}" title="{{$article['title']}}">{{mb_substr($article['title'],0,30)}}</a></li>
            <?php
}
			}
			?>
                                </div>
                            </div>
            <?php
}
	}
}
?>
        </div>


        <div class="float float2">
            <div class="choose choose_news">
                <?php
if (is_array($channels) && count($channels)) {
	foreach ($channels as $key => $channel) {
		if (in_array($channel['id'], [36])) {
			?>
                            <a id="news_list" href="javascript:;" class="{{$channel['id'] == 36?'cur':''}} border_radius_left">{{$channel['name']}}</a>
                        <?php
}
	}
}
?>
            </div>


            <?php
if (is_array($channels) && count($channels)) {
	foreach ($channels as $key => $channel) {
		if ($channel['id'] == 36) {
			?>
                        <div class="main_pic_all  <?=$channel['id'] == 36 ? 'cur' : ''?>">
                            <?php
if (count($channel['article_list'])) {
				foreach ($channel['article_list'] as $key_02 => $article) {
					if ($key_02 == 0) {
						?>
                                        <div class="main_pic">
                                            <img src="{{showPic($article['thumb'])}}" width="150px" height="92px"/>
                                            <div class="fl_right">
                                                <em title={{$article['title']}}>{{mb_substr($article['title'],0,10)}}
                                                </em>
                                                <p title="{{mb_substr($article['title'],0,30)}}"> {{mb_substr(strip_tags($article['content']),0,30)}}
                                                </p>
                                                <a href="{{route('article_detail', ['id'=>$article['id']])}}">[详细]</a>
                                            </div>
                                        </div>
                                        <ul class="green">
                            <?php
} else {

						?>
                                        <li><i></i><a href="{{route('article_detail', ['id'=>$article['id']])}}" title="{{$article['title']}}">{{mb_substr($article['title'],0,22)}}...</a></li>
                            <?php
}
				}
				echo '</ul>';
			}
			?>
                        </div>
            <?php
}
	}
}
?>





            {{--<div class="main_pic_all">
                <div class="main_pic">
                    <img src="/tpl/hcPicture/News1/C/201707101731407284.jpg" width="150px" height="92px"/>
                    <div class="fl_right">
                        <em title="SVHC候选物质清单正式更新为174种">
                            SVHC候选物质清...
                        </em>
                        <p title="2017年7月7日，ECHA发布决议正式将PFHxS加入SVHC候选清单，同时增加BPA的SVHC内分泌干扰属性，BPA因其具有生殖毒性已被加入了第16批SVHC候选清单，至此，SVHC候选清单共包括17批174种物质。">
                            2017年7月7日，ECHA发布决议正式将PFH...
                        </p>
                        <a href="#">[详细]</a>
                    </div>
                </div>
                <ul class="green">
                    <li><i></i><a href="#">
                            欧盟RoHS2.0修订附件III中第9及第13条关于铅和镉的豁免</a></li>
                    <li><i></i><a href="#">
                            第17批SVHC候选清单物质评议结果快讯</a></li>
                    <li><i></i><a href="#">
                            REACH法规限制篇新增PFOA限制条款</a></li>
                    <li><i></i><a href="#">
                            台湾BSMI 将于2017年7月对六种产品实施RoHS管控</a></li>
                    <li><i></i><a href="#">
                            你知道吗？IEC62321又更新啦</a></li>
                    <li><i></i><a href="#">
                            RAPEX发布2016年年度违规产品分析报告</a></li>
                </ul>
            </div>--}}


        </div>

        <?php
if (is_array($channels) && count($channels)) {
	foreach ($channels as $key => $channel) {
		if ($channel['id'] == 29) {
			?>
                    <div class="float index_tree no_marginLeft float1" id="show_ul" style="width:235px; margin-left: 20px">
                        <div class="choose choose1"><a id="service_list" href="javascript:;" class="cur border_radius_left">{{$channel['name']}}</a>
                        </div>
                        <div class="show_ul cur cl">
                            <div class="show_ul_wrap cl">
                    <?php
if (count($channel['article_list'])) {
				foreach ($channel['article_list'] as $key_02 => $article) {

					?>
                            <li><i></i><a href="<?=$article['attach_file']?>"
                                          target = "_blank"
                                          title="{$article['title']}"><?=$article['title']?></a></li>
                        <?php

				}
				echo '</ul>';
			}
			?>
                            </div>
                        </div>
                    </div>
        <?php
}
	}
}
?>


        <div class="float main_three hide">


            <!--登录框-->
            <div class="userServerSystem">
                <h2 class="uss-title">报告查询</h2>
                <div class="uss-from">
           				<span class="free-input">
           					<i class="uss-icon1"></i>
			                <input type="text" value="" name="" id="service_name" placeholder="用户名">
		           		 </span>
                    <span class="free-input">
           					<i class="uss-icon2"></i>
			                <input type="password" value="" id="service_pass" name="" placeholder="密码">
		           		</span>
                    <div class="uss-button cl">
                        <a href="#" class="uss-btn-two">免登录验证报告</a>
                        <a href="#" class="uss-btn-one">登录</a>
                    </div>
                </div>
            </div>
            <div class="userServerSystem2">
                <h2 class="uss-title2">证书查询</h2>
                <div class="uss-from2">
                    <div class="uss-button2 cl">
                        <a href="#" class="uss-btn-three">证书查询</a>
                    </div>
                </div>
            </div>
            <!--/登录框-->
            <p class="main_three_img"><a href="#"><img src="/tpl/hcPicture/201608161556274532.png" width="243px" height="65px"><em></em></a></p>
        </div>
        <!-------------->

        <!--右侧内容区 end-->
    </div>
@endsection


@section('scripts')
    <script type="text/javascript" src="/ext/js/index.js"> </script>

@endsection