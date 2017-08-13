@extends('layouts.admin')

@section('content')


    <type-tree-manager> </type-tree-manager>

@endsection


@section('scripts')
    {{ Html::script(mix('js/article/article.js')) }}
@endsection