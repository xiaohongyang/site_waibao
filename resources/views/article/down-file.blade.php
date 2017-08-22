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
        <div class="main-l">
            @component('component.breadcrumbs', ['type_id'=>$id])
            @endcomponent

            <div class="newsWord news-company">
                <p class="title">{{$currentType['name']}}</p>
                <!--搜索部分开始-->
                <div class="researchSearch pl">
                    <!--文本框 begin-->
                    <span class="free-input anInput ">
			           <label for="input-1" style="display: inline;">关键字</label>
			           <input type="text" value="" name="paramMap.title" class="icon3" id="input-1">
			      </span>
                    <!--文本框 end-->
                    <a href="javascript:initList(1)" class="ana icon3">确认</a>

                    <!--下拉框 begin-->
                    <div class="select select-two" id="free-select3" style="z-index: 9; width: 187px;">
                        <div class="selected">
                            <input type="hidden" value="" name="paramMap.time" id="time">
                            <p id="time1" style="width: 140px; color: rgb(102, 102, 102);">2017</p>
                            <input type="text" class="select-input" value="请选择年份" data-search-input="dateDataList.do" style="width: 140px; color: rgb(102, 102, 102);">
                            <i class="icon i-selected-arrow arrow"></i>
                            <i class="ra ra-lt ra-sl-lt"></i>
                            <i class="ra ra-lb ra-sl-lb"></i>
                        </div>
                        <div class="option" style="width: 187px; background-color: rgb(245, 245, 245); display: none;">
                            <ul id="1502890398015" style="width: 187px;">
                                <li data-id="2017" style="width: 187px; color: rgb(102, 102, 102);">2017</li><li data-id="2016" style="width: 187px; color: rgb(102, 102, 102);">2016</li><li data-id="2015" style="width: 187px; color: rgb(102, 102, 102);">2015</li><li data-id="2014" style="width: 187px; color: rgb(102, 102, 102);">2014</li><li data-id="2013" style="width: 187px; color: rgb(102, 102, 102);">2013</li><li data-id="2012" style="width: 187px; color: rgb(102, 102, 102);">2012</li><li data-id="2011" style="width: 187px; color: rgb(102, 102, 102);">2011</li><li data-id="2010" style="width: 187px; color: rgb(102, 102, 102);">2010</li><li data-id="2009" style="width: 187px; color: rgb(102, 102, 102);">2009</li><li data-id="2008" style="width: 187px; color: rgb(102, 102, 102);">2008</li><li data-id="2007" style="width: 187px; color: rgb(102, 102, 102);">2007</li><li data-id="2006" style="width: 187px; color: rgb(102, 102, 102);">2006</li><li data-id="2005" style="width: 187px; color: rgb(102, 102, 102);">2005</li><li data-id="2004" style="width: 187px; color: rgb(102, 102, 102);">2004</li><li data-id="2003" style="width: 187px; color: rgb(102, 102, 102);">2003</li><li data-id="2002" style="width: 187px; color: rgb(102, 102, 102);">2002</li><li data-id="2001" style="width: 187px; color: rgb(102, 102, 102);">2001</li></ul>
                        </div>
                    </div>
                    <!--下拉框 end-->
                </div>
                <div id="dataInfo">
                    @if(count($listData))
                        @foreach($listData as $row)
                        <div class="newsFloat">

                        </div>
                        @endforeach
                    @endif


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
                            <a href="javascript:initList(9)" style="display: none;">9</a>
                            <a href="javascript:initList(10)" style="display: none;">10</a>
                            <a href="javascript:initList(11)" style="display: none;">11</a>
                            <a href="javascript:initList(12)" style="display: none;">12</a>
                            <a href="javascript:initList(13)" style="display: none;">13</a>
                            <a href="javascript:initList(14)" style="display: none;">14</a>
                            <a href="javascript:initList(15)" style="display: none;">15</a>
                            <a href="javascript:initList(16)" style="display: none;">16</a>
                            <a href="javascript:initList(17)" style="display: none;">17</a>
                            <a href="javascript:initList(18)" style="display: none;">18</a>
                            <a href="javascript:initList(19)" style="display: none;">19</a>
                            <a href="javascript:initList(20)" style="display: none;">20</a>
                            <a href="javascript:initList(21)" style="display: none;">21</a>
                            <a href="javascript:initList(22)" style="display: none;">22</a>
                            <a href="javascript:initList(23)" style="display: none;">23</a>
                            <a href="javascript:initList(24)" style="display: none;">24</a>
                            <a href="javascript:initList(25)" style="display: none;">25</a>
                            <a href="javascript:initList(26)" style="display: none;">26</a>
                            <a href="javascript:initList(27)" style="display: none;">27</a>
                            <a href="javascript:initList(28)" style="display: none;">28</a>
                            <a href="javascript:initList(29)" style="display: none;">29</a>
                            <a href="javascript:initList(30)" style="display: none;">30</a>
                            <a href="javascript:initList(31)" style="display: none;">31</a>
                            <a href="javascript:initList(32)" style="display: none;">32</a>
                            <a href="javascript:initList(33)" style="display: none;">33</a>
                            <a href="javascript:initList(34)" style="display: none;">34</a>
                            <a href="javascript:initList(35)" style="display: none;">35</a>
                            <a href="javascript:initList(36)" style="display: none;">36</a>
                            <a href="javascript:initList(37)" style="display: none;">37</a>
                            <a href="javascript:initList(38)" style="display: none;">38</a>
                            <a href="javascript:initList(39)" style="display: none;">39</a>
                            <a href="javascript:initList(40)" style="display: none;">40</a>
                            <a href="javascript:initList(41)" style="display: none;">41</a>
                            <a href="javascript:initList(42)" style="display: none;">42</a>
                            <a href="javascript:initList(43)" style="display: none;">43</a>
                            <a href="javascript:initList(44)" style="display: none;">44</a>
                            <a href="javascript:initList(45)" style="display: none;">45</a>
                            <a href="javascript:initList(46)" style="display: none;">46</a>
                            <a href="javascript:initList(47)" style="display: none;">47</a>
                            <a href="javascript:initList(48)" style="display: none;">48</a>
                            <a href="javascript:initList(49)" style="display: none;">49</a>
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
    <script type="text/javascript" src="/ext/js/down-file.js"> </script>

@endsection