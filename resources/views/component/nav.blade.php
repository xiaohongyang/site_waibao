<div class="nav-w pl">
    <!--导航 begin-->
    <ul class="nav cl">
        <li class="  nav_title_two_three">
            <a href="/" class="nav_title_a">网站首页</a>
            <!--
            <div class="sub_nav_child ">
                <div class="sub_float">
                    <h3>按行业</h3>
                    <ul class="cate">
                        <li><a href="#" title="船舶">

                                船舶</a></li>
                        <li><a href="#" title="电子电气">

                                电子电气</a></li>
                        <li><a href="#" title="计量校准及尺寸">

                                计量校准及尺寸</a></li>
                        <li><a href="#" title="食品药品农产品及保化">

                                食品药品农产品...
                            </a></li>
                        <li><a href="#" title="轻工及玩具">

                                轻工及玩具</a></li>
                        <li><a href="#" title="汽车材料及零部件">

                                汽车材料及零部件</a></li>
                        <li><a href="#" title="纺织品、鞋类及皮革">

                                纺织品、鞋类及...
                            </a></li>
                        <li><a href="#" title="建材与工程">

                                建材与工程</a></li>
                        <li><a href="#" title="金属材料及零部件">

                                金属材料及零部件</a></li>
                        <li><a href="#" title="新能源风电">

                                新能源风电</a></li>
                        <li><a href="#" title="半导体及相关领域">

                                半导体及相关领域</a></li>
                        <li><a href="#" title="奢侈品">

                                奢侈品</a></li>
                        <li><a href="#" title="电子商务">

                                电子商务</a></li>
                        <li><a href="#" title="生物医学">

                                生物医学</a></li>
                    </ul>
                </div>
                <div class="sub_float sub_float_two">
                    <h3>按服务</h3>
                    <ul>
                        <li><a href="#" title="测试">
                                测试</a></li>
                        <li><a href="#" title="认证">
                                认证</a></li>
                        <li><a href="#" title="审核">
                                审核</a></li>
                        <li><a href="#" title="验货">
                                验货</a></li>
                        <li><a href="#" title="能力验证">
                                能力验证</a></li>
                        <li><a href="#" title="培训">
                                培训</a></li>
                        <li><a href="#" title="环境">
                                环境</a></li>
                        <li><a href="#" title="安评">
                                安评</a></li>
                        <li><a href="#" title="标准物质/标准样品">
                                标准物质/标准...
                            </a></li>
                        <li><a href="#" title="职业安全与卫生">
                                职业安全与卫生</a></li>
                        <li><a href="#" title="职业健康检查与健康体检">
                                职业健康检查与...
                            </a></li>
                        <li><a href="#" title="司法鉴定">
                                司法鉴定</a></li>
                        <li><a href="#" title="实验室技术服务">
                                实验室技术服务</a></li>
                    </ul>
                </div>
                <div class="sub_float sub_float_three">
                    <h3>推荐方案</h3>
                    <ul>
                        <li><a href="#" title="电器产品检测与认证">
                                电器产品检测与...
                            </a></li>
                        <li><a href="#" title="工程检测">
                                工程检测</a></li>
                        <li><a href="#" title="农产品认证及检测">
                                农产品认证及检测</a></li>
                        <li><a href="#" title="日化产品检测">
                                日化产品检测</a></li>
                        <li><a href="#" title="实验室设计规划">
                                实验室设计规划</a></li>
                        <li><a href="#" title="食品检测">
                                食品检测</a></li>
                        <li><a href="#" title="生活饮用水检测">
                                生活饮用水检测</a></li>
                        <li><a href="#" title="珠宝鉴定">
                                珠宝鉴定</a></li>
                    </ul>
                </div>
                <p class="service1_more"><a href="#">更多 >></a></p>
            </div>
            -->
        </li>

        <?php
$typeArr = ['关于我们', '服务指南', '新闻资讯', '检测能力', '网上业务', '联系我们'];
foreach ($typeArr as $typeName) {
	?>
        <?php
$types = getTypeList($typeName, 'name');
	$navTitleClass = $typeName == '检测能力' ? '' : 'nav_title';
	?>
                @if(count($types))

                    <?php
switch ($types[0]['name']) {
	case '服务指南':
		$width = '150px';
		break;
	case '网上业务':
		$width = '80px';
		break;
	default:
		$width = '64px';
		break;
	}

	switch ($types[0]['name']) {
	case '关于我们':
		$height = '190px';
		break;

	default:
		$height = '110px';
		break;
	}

	?>
                    <li class="{{$navTitleClass}} nav_title_two">
                        <a href="{{$types[0]['name']=='检测能力' ? route('article_list',['type_id'=>$types[0]['id']]) : '#'}}" class="nav_title_a"> {{$types[0]['name']}} </a>
                        <div class="sub_nav_child nav_title_new" <?="style='width:{$width}; max-height:{$height}'"?>>
                            @if(count($types)>1)
                                <div class="sub_float">
                                    <ul>
                                        @foreach($types as $item)
                                            @if($item['level']==2)
                                                <li class="cur" <?=strlen($item['name']) > 10 ? 'style="width: 180px"' : ''?>><a href="{{route('article_list',['type_id'=>$item['id']])}}">{{$item['name']}}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {{--<div class="sub_float sub_float_two">
                                <a href="#"><img src="/tpl/hcPicture/AboutCTI/201504171258293495.jpg" width="240px" height="137px"/></a>
                                <h2><a href="#">公司新闻</a></h2>
                                <p>获取企业最新动态</p>
                            </div>
                            <div class="sub_float sub_float_three">
                                <a href="#"><img src="/tpl/hcPicture/AboutCTI/201504171258304921.jpg" width="240px" height="137px"/></a>
                                <h2><a href="#">行业快讯</a></h2>
                                <p>掌握行业热点资讯</p>
                            </div>--}}
                        </div>
                    </li>
                @endif
        <?php
}
?>

    </ul>
    <!--导航 end-->
    <!--站点跳转 begin-->
    <!--<div class="global-websites pl" id="global-websites-wp">
        <div class="tl cl" id="global-websites-tl">
            <i class="icon i-earth"></i>Global Websites<i class="i-arrow-b"></i>
        </div>
        <div class="con dn">
            <div id="global-websites" class="co" style="width:454px;*width:500px;">
                <ul>
                <li><a href="#"><img src="/tpl/hcPicture/201505071342291588.png" width="45px" height="30px"/>中国大陆</a></li>
                    <li><a href="#"><img src="/tpl/hcPicture/201505071342285672.png" width="45px" height="30px"/>中国香港</a></li>
                    <li><a href="#"><img src="/tpl/hcPicture/AboutCTI/201505071338402024.png" width="45px" height="30px"/>美国</a></li>
                    <li><a href="#"><img src="/tpl/hcPicture/201505071319545957.png" width="45px" height="30px"/>英国</a></li>
                    </ul>
                   <p><a href="#">更多 >></a></p>
            </div>
        </div>
    </div>-->
    <!--站点跳转 begin-->
</div>



<script type='text/javascript'>
    $(function(){
        $('body').on('click', '.first_level_nav', function(){
            $('.first_level_nav').removeClass('active')
            $(this).addClass('active');
        })



        $('body').on('click', 'a.ana', function(){
            var year = $('.select-input').val();
            var search = $("input[name='paramMap.title']").val()
            var type_id = $('input[name=type_id]').val()
            window.location.href = '/list/' + type_id + '?list_search=' + search + '&list_year=' + year
        })

        var list_search = $('input[name=list_search]').val();
        var list_year = $('input[name=list_year]').val();
        if(list_search){
            $("input[name='paramMap.title']").val(list_search)
        }
        if(list_year) {
            $('li[data-id='+ list_year +']').trigger('click')
        }
    })





</script>



<input type='hidden' name='list_search' value="<?=key_exists('list_search', $_REQUEST) && $_REQUEST['list_search'] ? $_REQUEST['list_search'] : ''?>" />
<input type='hidden' name='list_year' value="<?=key_exists('list_search', $_REQUEST) && $_REQUEST['list_year'] ? $_REQUEST['list_year'] : ''?>" />