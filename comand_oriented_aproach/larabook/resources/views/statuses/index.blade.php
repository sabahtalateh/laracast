@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @include('layouts.partials.errors')

            @include('statuses.partials.publish-status-form')

            @include('statuses.partials.statuses')
        </div>
    </div>
@endsection