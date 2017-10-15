<?php
$homeType = getTypeItem('首页信息', 'name');
?>
@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">

            <?=getShowContent($homeType['content'])?>
        </div>
    </div>
</div>
@endsection
