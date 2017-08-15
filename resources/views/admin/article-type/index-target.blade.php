@extends('layouts.admin')

@section('content')
<?php
    $id = key_exists('id', $_GET) ? $_GET['id'] : 0 ;
?>

    <type-tree-manager root-id="<?=$id?>"> </type-tree-manager>


@endsection


@section('scripts')
    {{ Html::script(mix('js/article/article.js')) }}
@endsection