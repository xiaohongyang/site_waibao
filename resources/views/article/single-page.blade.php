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

@section('title') [易算土方官网]_{{$currentType['name']}} @endsection


@section('content')

    <div class="row cl">

        <!--右侧内容区 begin-->
        <div class="main-l col-sm-12">
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