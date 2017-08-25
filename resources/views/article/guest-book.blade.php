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

            <div class="newsWord news-company ">
                <p class="title">{{$currentType['name']}}</p>
                <!--搜索部分开始-->
                <form onsubmit="return false;">
                    <table width="100%" align="center" class='bordered' cellpadding="2" cellspacing="0">
                            <tbody><tr>
                              <td width="281" height="25" align="right" class="conts"><font color="#cc0000">*</font>主题：</td>
                              <td width="687"><input class="TextBox" id="column01" maxlength="100" size="40" name="column01"></td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="conts"><font color="#cc0000">*</font>&nbsp;内容：</td>
                              <td><textarea class="TextBox" name="MesContent" id="column10" rows="8" cols="60"></textarea></td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="conts"><font color="#cc0000">*</font>&nbsp;公司名称：</td>
                              <td><input class="TextBox" id="column02" maxlength="100" size="40" name="Company"></td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="conts"><font color="#cc0000">*</font>&nbsp;姓名：</td>
                              <td><input class="TextBox" id="column03" maxlength="100" size="40" name="LinkName"></td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="conts"><font color="#cc0000">*</font>&nbsp;电话：</td>
                              <td><input class="TextBox" id="column04" maxlength="100" size="40" name="Telephone"></td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="conts"><font color="#cc0000">*</font>&nbsp;电邮：</td>
                              <td><input class="TextBox" id="column05" maxlength="100" size="40" name="Email"></td>
                            </tr>
                            <tr>
                              <td height="40">&nbsp;</td>
                              <td>
                              <input type="hidden" name="emails" id="emails" value="admin@szyeszing.com">
                              <input class="ef03" type="submit" value="提交" name="Submit" style="margin-left: 30px;">
                            &nbsp;&nbsp;&nbsp;
                            <input class="ef03" type="reset" value="重填" name="reset">
                            &nbsp;&nbsp;&nbsp;
                            <!-- <input class="ef03" type="button" value="隐私承诺" name="reset2" onclick="window.location.href='http://www.jdltop.com/cn.htm'">    --></td>
                            </tr>
                        <tr>
                        </tr>
                        </tbody></table>
                    </form>

                <!-- <div class="shzi   " id='xhyPage'> </div> -->

            </div>

        </div>
        <!--右侧内容区 end-->
    </div>

    <input type="hidden" name="type_id" value="{{$id}}" />
@endsection


@section('scripts')
    <script type="text/javascript" src="/ext/js/guest-book.js"> </script>
@endsection