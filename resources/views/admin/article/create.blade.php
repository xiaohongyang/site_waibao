@extends('layouts.admin')

@section('content')

<?php
	$breadName = key_exists('id', $_GET) && $_GET['id'] ? '编辑':'添加' ;
	$idProp = key_exists('id', $_GET) && $_GET['id']? $_GET['id'] :0;
?>

    <?php

$breadcrumb = [
	[
		'link' => route('admin.article'),
		'text' => '文章管理',
		'active' => false,
	], [
		'link' => '',
		'text' => $breadName,
		'active' => true
	],
];

?>
    <article-create id-prop=<?=$idProp?> ></article-create>

@endsection


@section('scripts')

@endsection