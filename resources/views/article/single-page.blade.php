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
                <?php
$currentType = getTypeItem($id, 'id', $globalTypeList);
echo $currentType['content'];
?>

            </div>

        </div>
        <!--右侧内容区 end-->
    </div>


@endsection


@section('scripts')
    <script type="text/javascript" src="/ext/js/article-list.js"> </script>
@endsection