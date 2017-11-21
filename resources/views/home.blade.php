<?php
$homeType = getTypeItem('首页信息', 'name');
?>
@extends('layouts.app')

@section('title') [易算土方官网]_首页 @endsection

@section('content')
<div class="content home-page">
    <div class="row">
        <div class="col-md-12">

            <?=getShowContent($homeType['content'])?>
        </div>
    </div>
</div>
@endsection
