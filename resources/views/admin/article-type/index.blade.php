@extends('layouts.admin')

@section('content')

    <xhy-hello title="32321title" contents-value="vvxxvvvvvvvvvvvv"></xhy-hello>

@endsection


@section('scripts')
    {{ Html::script(mix('js/article/article.js')) }}
@endsection