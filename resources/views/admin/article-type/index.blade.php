@extends('layouts.admin')

@section('content')

    <article-type-create> </article-type-create>

@endsection


@section('scripts')
    {{ Html::script(mix('js/article/article.js')) }}
@endsection