@extends('layouts.admin')

@section('content')

    <?php
$breadcrumb = [
	[
		'text' => '文章管理',
		'active' => true,
		'link' => '',
	],
];
?>

	<article-index></article-index>

@endsection


@section('scripts')
@endsection