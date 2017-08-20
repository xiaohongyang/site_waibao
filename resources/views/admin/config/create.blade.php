@extends('layouts.admin')

@section('content')

<?php
	$breadName = key_exists('id', $_GET) && $_GET['id']?  '编辑':'添加';
	$idProp = key_exists('id', $_GET) && $_GET['id']? $_GET['id'] :0 ;
?>

    <?php

$breadcrumb = [
	[
		'link' => route('admin.articleType'),
		'text' => '网站配置',
		'active' => false,
	], [
		'link' => '',
		'text' => $breadName,
		'active' => true,
	],
];

?>
    <config-create id-prop=<?=$idProp?>  ></config-create>

@endsection


@section('scripts')

@endsection