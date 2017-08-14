@extends('layouts.admin')

@section('content')

<?php
	$breadName = key_exists('id', $_GET) && $_GET['id']? $_GET['id'] ? '添加' : '编辑'
	$idProp = key_exists('id', $_GET) && $_GET['id']? $_GET['id'] :0?>  
?>

    <?php

$breadcrumb = [
	[
		'link' => route('admin.articleType'),
		'text' => '类别管理',
		'active' => false,
	], [
		'link' => '',
		'text' => $breadName,
		'active' => true,
	],
];

?>
    <article-type-create id-prop=<?=$idProp?>  ></article-type-create>

@endsection


@section('scripts')

@endsection