@extends('layouts.admin')

@section('content')

    <?php

$breadcrumb = [
	[
		'link' => route('admin.articleType'),
		'text' => '类别管理',
		'active' => false,
	], [
		'link' => '',
		'text' => '新建333',
		'active' => true,
	],
];

?>
    <article-type-create id-prop=<?= key_exists('id', $_GET) && $_GET['id']? $_GET['id'] :0?> id=3333 :id=44444></article-type-create>

@endsection


@section('scripts')

@endsection