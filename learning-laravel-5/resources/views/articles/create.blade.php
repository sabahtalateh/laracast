@extends('app')

@section('content')
    <h1>Write an Article</h1>

    <hr/>

    {!! Form::model($article = new App\Article, ['url' => 'articles']) !!}
        @include('partials.form', ['submitButtonText' => 'Add an Article'])
    {!! Form::close() !!}

    @include('errors.list')

@stop