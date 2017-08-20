@extends('layouts.front')
<?php
$typeArr = ['关于我们', '服务指南', '新闻资讯', '检测能力', '网上业务', '联系我们'];
$rootId = $id;
foreach ($typeArr as $typeName) {

	$types = getTypeList($typeName, 'name');
	if (count($types)) {
		foreach ($types as $item) {
			if ($item['id'] == $id) {
				$rootId = $types[0]['id'];
			}

		}
	}
}

$types = getTypeList($rootId, 'id');
$rootType = getTypeItem($rootId, 'id', $globalTypeList);
$currentType = getTypeItem($id, 'id', $globalTypeList);

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
                        <li class="<?=$type['id'] == $id ? 'cur' : ''?>">
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
        <div class="main-l about-hon">
            @component('component.breadcrumbs', ['type_id' => $id])
            @endcomponent

            <div class="bk-nav cl about-honour"><a id="zizhi" href="javascript://" style="width:100%" class="">{{$currentType['name']}}</a>
            <!-- <a id="rongyu" href="javascript://" class="cur">企业荣誉</a> --></div>
            <!--荣誉图片-->
            <div class="honourPicture about-honour-c">
                <input type="text" style="display: none;" id="name" value="">
                <input type="text" style="display: none;" id="column_id" value="30">
                <div class="icon3 anniu pl icon4 hide">
                    <!--文本框 begin-->
                    <span class="free-input anInput ">
			                <label id="search" for="input-1" style="display: inline;">关键字</label>
			                <input type="text" value="" name="" class="icon3 icon4" id="input-1">
			            </span>
                    <!--文本框 end-->
                    <a href="javascript:confirm()" class="ana ana1 icon3">确认</a>
                </div>
                <div id="dataInfo"><div class="tupian  cur hon_li_word">
                        <ul>

                        </ul>
                    </div>

                    <div class="shzi " id="xhyPage">


                    </div>



                </div>
            </div>
            <!--荣誉图片结束-->

            <!--荣誉文字-->
            <div class="honourWord hide">
                <div class="honourWord">
                    <div class="zzry">
                        <h3 class="honTitle">
                            获得资质		</h3>作为中国最大的第三方检测验证机构， CTI依据ISO/IEC 17025建立实验室管理体系，依据ISO/IEC 17020建立检查机构管理体系，具有中国合格评定国家认可委员会CNAS认可及计量认证CMA资质，取得CQC中国质量认证中心授权，并获得英国皇家认可委员会UKAS、美国消费品安全委员会CPSC、新加坡SPRING等诸多国际认证机构认可，检测报告具有国际公信力。	</div>
                    <div class="zzry">
                        <h3 class="honTitle">
                            参与制定标准		</h3>与此同时，CTI积极开展新项目的研究、新标准的起草，参与到国内外各项标准的制定工作，先后成为中国电子信息产品标准化工作组成员、国家发展和改革委员
                        会汽车回收利用和环保材料工作组成员，并不断加强与ANSI、ECHA、SAC 等国际机构的密切合作，作为中国代表参加IEC/TC111/WG3 工作会议等等，为中国行业标准的发
                        展和推广做出了积极贡献.	</div>
                    <div>
                        <ul class="height"><li>
                            </li><li>
                                中国电子信息产品标准化工作组成员			</li><li>
                            </li><li>
                                ——参与起草产品的拆分及检测标准、重点管理目录；			</li><li>
                            </li><li>
                                深圳市"电子信息产品有害物质公共检验平台"			</li><li>
                            </li><li>
                                ——被列入2007年度国家火炬计划			</li><li>
                            </li><li>
                                国家发展和改革委员会汽车回收利用和环保材料工作组成员			</li><li>
                            </li><li>
                                ——中国汽车材料数据库。			</li><li>
                            </li><li>
                                《车内空气污染物浓度限值及测量方法》标准编制组成员			</li><li>
                            </li><li>
                                ——参与国家环保总局《车内空气污染物浓度限值及测量方法》标准的制定			</li><li>
                            </li><li>
                                《糕点质量检验方法》国家标准起草单位			</li><li>
                            </li><li>
                                ——参与了《沙琪玛》、《果酱》推荐性国家标准的审定工作			</li><li>
                            </li><li>
                                中国玩具标准修订工作组成员			</li><li>
                            </li><li>
                                中国玩具协会技术专家组成员			</li><li>
                            </li></ul>
                    </div></div></div>
            <!--荣誉文字结束-->


        </div>

        <!--右侧内容区 end-->
    </div>

    <input type="hidden" name="type_id" value="{{$id}}" />
@endsection


@section('scripts')
    <script type="text/javascript" src="/ext/js/image-list.js"> </script>
@endsection