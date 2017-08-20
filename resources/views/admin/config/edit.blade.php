@extends('layouts.admin')

@section('content')

    <?php
    $breadName =  '网站配置' ;
    $idProp = key_exists('id', $_GET) && $_GET['id']? $_GET['id'] :0 ;
    ?>

    <?php

    $breadcrumb = [
        [
            'link' => '',
            'text' => $breadName,
            'active' => true,
        ],
    ];

    ?>

    <config-edit></config-edit>

@endsection



@section('scripts')

@endsection