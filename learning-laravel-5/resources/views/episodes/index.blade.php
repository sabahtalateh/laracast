@extends('app')

@section('content')
    @include('partials.lessons', ['lessons' => $episodes])
@stop