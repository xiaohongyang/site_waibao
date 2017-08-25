@extends('layouts.admin')

@section('content')

    <?php
$breadcrumb = [
	[
		'text' => '留言管理',
		'active' => true,
		'link' => '',
	],
];
?>

	<guestbook-index typeId={{$type_id}}></guestbook-index>

@endsection


@section('scripts')
@endsection