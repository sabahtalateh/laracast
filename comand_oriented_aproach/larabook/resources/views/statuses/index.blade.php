@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8">
            @include('layouts.partials.errors')

            @include('statuses.partials.publish-status-form')

            @include('statuses.partials.statuses')
        </div>
    </div>
@endsection