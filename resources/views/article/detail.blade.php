@extends('layouts.app')

<?php
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

?>
@section('content')

    <div class="row">

        <!--右侧内容区 begin-->
        <div class="main-l col-sm-12 recourceApply newsDetailWord newsDetail_ding" name="top">
            @component('component.breadcrumbs', ['type_id'=>$model->type_id, 'id'=>$model->id])
            @endcomponent
            <div id="doctitle">
                <div class="newLeft">
                    <h3 class="newLeft-title">{{$model->title}}</h3>
                    <h3 class="newLeft-title">{{$model->updated_at}}</h3>
                    <?php
                        if($model->articleType->show_type == \App\Models\ArticleTypeModel::SHOW_TYPE_UPLOAD)  {
                    ?>
                    <div class="row">
                        <div class="col-sm-12">
                            今日下载：{{$model->todayDownCount ? count($model->todayDownCount) : 0}} &nbsp;&nbsp;&nbsp;
                            总下载：{{$model->allDownCount ? count($model->allDownCount) : 0}}
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <p></p>
                    <?php
                    echo "$model->content";
                    ?>

                </div>
            </div>

        </div>
        <!--右侧内容区 end-->
    </div>


@endsection


@section('scripts')
    <script type="text/javascript" src="/ext/js/article-list.js"> </script>
@endsection