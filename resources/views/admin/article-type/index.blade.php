@extends('layouts.admin')

@section('content')

    <xhy-hello title="32321title"></xhy-hello>

    <Ueditor></Ueditor>
@endsection


@section('scripts')
    {{ Html::script(mix('js/article/article.js')) }}
@endsection