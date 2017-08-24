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

                 <div class="right_main r_table">
                         <div style="line-height:25px;">

                 </div>
                 <span style="line-height:2;">尊敬的客户：&nbsp;</span><br>
                 <span style="line-height:2;">&nbsp; &nbsp; &nbsp; 您好！&nbsp;</span><br>
                 <span style="line-height:2;">&nbsp; &nbsp; &nbsp;首先，感谢您和贵公司对本公司工作的大力支持和协助！&nbsp;</span><br>
                 <span style="line-height:2;">&nbsp; &nbsp; &nbsp;倾听每位客户的心声，真正做客户之所想，是我们对工作的永恒追求。如果您致力于工作的同时，能在下表相应栏中填写您的心声，它们将会成为我们改进检测工作的重要资讯，以便我们更好为您提供高质量的检测工作和优质的服务。</span><br>
                 <form onsubmit="return false;">
                           <input type="hidden" value="szyeszing@163.com " name="sendemail">
                           <input type="hidden" value="Customer feedback" name="subject">
                           <input type="hidden" value="满意度调查表" name="questionary">
                           <table width="100%"  class="bordered" cellspacing="0" cellpadding="0">
                   <tbody><tr>
                     <td width="142"><span>单位名称</span></td>
                     <td colspan="3"><span><input name="companyName2" id="column01" size="30"></span></td>
                     <td width="104"><span>工程名称</span></td>
                     <td width="182"><span><input name="ProjectName" id="column02" size="25"></span></td>
                   </tr>
                   <tr>
                     <td width="142"><span>填表人姓名</span></td>
                     <td width="100"><span><input name="name" size="10" id="column03"></span></td>
                     <td width="100"><span>日 期</span></td>
                     <td width="100"><span><input name="date" size="10" id="column04"></span></td>
                     <td width="104"><span>联系电话</span></td>
                     <td><span><input name="tel" size="25" id="column05"></span></td>
                   </tr>
                   <tr>
                     <td width="142" valign="middle"><span>服务态度</span></td>
                     <td width="100" valign="middle"><span>
                       <input name="column06" id="column06" type="radio" class="radio" value="满意" checked="checked"><label for="column06">满意</label>
                 </span></td>
                     <td colspan=2 width="100" valign="middle"><span><input type="radio" class="radio" name="column06" id="column061" value="一般"><label for="column061">一般</label>
                 </span> </td>
                     <td colspan=2 width="100" valign="middle"><span><input type="radio" class="radio" name="column06" id="column062" value="不满意"><label for="column062">不满意</label>
                 </span></td>

                   </tr>
                   <tr>
                     <td width="142" valign="middle"><span>技术能力</span></td>
                     <td width="100" valign="middle"><span><input name="column07" id="column07" type="radio" class="radio" value="满意" checked="checked"><label for="column07">满意</label>
                 </span></td>
                     <td colspan=2 width="100" valign="middle"><span><input type="radio" class="radio" name="column07" id="column072" value="一般"><label for="column072">一般</label>
                 </span> </td>
                     <td colspan=2 width="100" valign="middle"><span><input type="radio" class="radio" name="column07" id="column073" value="不满意"><label for="column073">不满意</label>
                 </span> </td>

                   </tr>
                   <tr>
                     <td width="142" valign="middle"><span>检测工作</span></td>
                     <td width="100" valign="middle"><span><input name="column08" id="column08" type="radio" class="radio" value="满意" checked="checked"><label for="column08">满意</label>
                 </span></td>
                     <td colspan=2 width="100" valign="middle"><span><input type="radio" class="radio" name="column08" id="column082" value="一般"><label for="column082">一般</label>
                 </span></td>
                     <td colspan=2 width="100" valign="middle"><span><input type="radio" class="radio" name="column08" id="column083" value="不满意"><label for="column083">不满意</label>
                 </span> </td>

                   </tr>
                   <tr>
                     <td width="142" valign="middle"><span>人员是否廉洁自律</span></td>
                     <td width="100" valign="middle"><span><input name="column09" id="column09" type="radio" class="radio" value="满意" checked="checked"><label for="column09">满意</label>
                  </span></td>
                     <td colspan=2 width="100" valign="middle"><span><input type="radio" class="radio" name="column09" id="column092" value="一般"><label for="column092">一般</label>
                 </span> </td>
                     <td colspan=2 width="100" valign="middle"><span><input type="radio" class="radio" name="column09" id="column093" value="不满意"><label for="column093">不满意</label>
                 </span> </td>

                   </tr>
                   <tr>
                     <td colspan="6"><span>您对我们的意见和建议</span> </td>
                   </tr>
                   <tr>
                     <td colspan="6"><span><textarea name="column10" rows="8" datatype="*" nullmsg="请填写您对我们的意见和建议"></textarea><span class="Validform_checktip"></span></span></td>
                   </tr>
                   <tr style="display:none">
                     <td colspan="6"><span>分析：</span></td>
                   </tr>
                   <tr style="display:none">
                     <td colspan="6"><span><textarea name="Analysis" rows="8"></textarea></span></td>
                   </tr>
                   <tr style="display:none">
                     <td colspan="6"><span>管理部门：
                       <input name="department" size="17">
                 调查执行人：
                 <input name="enforcement" size="17">
                 日期：
                 <input name="year" size="7">
                 年
                 <input name="month" size="5">
                 月
                 <input name="day" size="5">
                 日 </span></td>
                   </tr>
                   <!-- <tr>
                     <td colspan="6"><span>验证码：
                       <input name="txt_check" type="text" size="6" maxlength="4" class="t444">
                     <img src="checkcode.asp " alt="Verification code, can not see clearly? Please click refresh code" height="20" style="cursor : pointer;" onclick="this.src='checkcode.asp?t='+(new Date().getTime());"></span></td>
                   </tr>-->
                   <tr>
                     <td colspan="6"><span><input name="submit" type="submit" class="submit" value="发送">
                     <input name="reset" type="reset" class="reset" value="清除"></span></td>
                   </tr>
                 </tbody></table>

                         </form>
                 <link href="css/formcheck.css" rel="stylesheet">


                       </div>

                <!-- <div class="shzi   " id='xhyPage'> </div> -->

            </div>

        </div>
        <!--右侧内容区 end-->
    </div>

    <input type="hidden" name="type_id" value="{{$id}}" />
@endsection


@section('scripts')
    <script type="text/javascript" src="/ext/js/survey.js"> </script>
@endsection