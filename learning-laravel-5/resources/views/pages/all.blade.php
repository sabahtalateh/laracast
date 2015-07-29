@extends('app')

@section('content')
    @include('partials.lessons', ['lessons' => $catalog])
@stop