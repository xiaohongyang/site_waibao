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
?>

	<guestbook-index type-id=2></guestbook-index>

@endsection


@section('scripts')
@endsection