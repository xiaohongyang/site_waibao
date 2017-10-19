@extends('layouts.app')
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

    <div class="guest-book">


        <div class="row ">

            <!--右侧内容区 begin-->
            <div class="main-l col-sm-12">
                @component('component.breadcrumbs', ['type_id'=>$id])
                @endcomponent

                <div class="newsWord news-company ">
                    <p class="title">
                        <span class="btn btn-sm btn-primary" onclick="if($('.guest-book form').hasClass('hide'))$('.guest-book form').css({'height':'0'}).removeClass('hide').animate({ 'height': '215px'
                        })">我要留言</span>
                    </p>
                    <!--搜索部分开始-->
                    <form onsubmit="return false;" class="hide">
                        <table width="100%" align="center" class='bordered' cellpadding="2" cellspacing="0">
                                <tbody>
                                <tr>
                                  <td width="281" height="25" align="right" class="conts"><font color="#cc0000">*</font>您的称呼：</td>
                                  <td width="687"><input class="TextBox" id="column01" maxlength="100" size="40" name="column01"></td>
                                </tr>

                                <tr class="margin-top-10" style="margin-top: 10px; height: 40px;">
                                    <td height="25" align="right" class="conts"><font color="#cc0000">*</font>&nbsp;联系方式：</td>
                                    <td><input class="TextBox" id="column02" maxlength="100" size="40" name="Company"></td>
                                </tr>
                                <tr class="margin-top-10" style="margin-bottom: 10px; height: 60px;">
                                  <td height="25" align="right" class="conts"><font color="#cc0000">*</font>&nbsp;留言内容：</td>
                                  <td><textarea class="TextBox" name="MesContent" id="column10" rows="8" cols="50" style="width: 340px; height: 70px;"></textarea></td>
                                </tr>

                                <tr class="check-code margin-top-10" style="height: 40px;">
                                    <td height="25" align="right" class="conts"><font color="#cc0000">*</font>&nbsp; 验证码：</td>

                                    <td>
                                        <img src=""  style="cursor: pointer"   />
                                        <input type="text" id="code" style="width: 66px" class="text-center">
                                    </td>
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


        <div class="row list">
        <div class="col-sm-12">

            @foreach($listData as $item)
                    <table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" style="font-size:12px">
                        <tbody><tr>
                            <td width="60%" height="24" valign="middle" bgcolor="#E5F6CA"><font color="green"> <b>&nbsp;作者：
                                        {{$item['column01']}}</b></font></td>

                            <td width="40%" align="right" valign="middle" bgcolor="#E5F6CA">时间：<font class="green">{{$item['created_at']}}</font>  <font color="green">IP地址已记录</font></td>

                        </tr>
                        <tr>
                            <td height="10px"></td>
                            <td align="right"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table width="100%" border="0" cellspacing="4" cellpadding="0">
                                    <tbody>
                                    <tr>
                                        <td width="100%" valign="top" style="font-size:12px;padding-left: 0;">
                                            <div><b class="spiffy"><b class="spiffy1"><b></b></b><b
                                                            class="spiffy2"><b></b></b>
                                                    <b class="spiffy3"></b><b class="spiffy4"></b><b
                                                            class="spiffy5"></b></b>

                                                @if ($item['verified'])
                                                    <div class="spiffyfg">   {{$item['column10']}}</div>
                                                @else
                                                    <div class="spiffyfg not-valid">   本条留言正在审核</div>
                                                @endif
                                                <b class="spiffy"><b class="spiffy5"></b> <b class="spiffy4"></b> <b
                                                            class="spiffy3"></b><b class="spiffy2"><b></b></b><b
                                                            class="spiffy1"><b></b></b></b></div>
                                        </td>
                                    </tr>
                                    </tbody></table>
                            </td>
                        </tr>
                        <tr>
                            <td height="10px"></td>
                            <td align="right"></td>
                        </tr>

                        </tbody></table>
            @endforeach
        </div>
    </div>
    </div>

    <input type="hidden" name="type_id" value="{{$id}}" />
@endsection


@section('scripts')
    <script src="{{ mix('js/guestbook.js') }}"></script>
@endsection