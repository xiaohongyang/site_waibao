@extends('layouts.admin')

@section('content')

    <?php
$breadcrumb = [
	[
		'text' => '满意调查管理',
		'active' => true,
		'link' => '',
	],
];

$columnList = [
	['data' => 'id', "title" => "标题"],
	['data' => 'column01', "title" => "单位名称"],
	['data' => 'column02', "title" => "工程名称"],
	['data' => 'column03', "title" => "填表人姓名"],
	['data' => 'column04', "title" => "日期"],
	['data' => 'column05', "title" => "联系电话"],
	['data' => 'column06', "title" => "技术能力"],
	['data' => 'column07', "title" => "检测工作"],
	['data' => 'column08', "title" => "人员是否廉洁自律"],
	['data' => 'column10', "title" => "意见和建议"],
	['data' => 'created_at', "title" => "添加时间"],
];

?>

	<guestbook-index type-id=2 column-list=<?=json_encode($columnList)?>></guestbook-index>

@endsection


@section('scripts')
@endsection