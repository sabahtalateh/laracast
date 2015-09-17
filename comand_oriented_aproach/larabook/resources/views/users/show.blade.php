@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-4">

            <div class="media">
                <div class="pull-left">
                    @include('users.partials.avatar', ['size' => 60])
                </div>
                <div class="media-body">
                    <h1 class="media-heading">{{ $user->username }}</h1>

                    <ul class="list-inline text-muted">
                        <li>{{ $user->present()->statusCount()}}</li>
                        <li>{{ $user->present()->fallowerCount() }}</li>
                    </ul>

                    @foreach($user->fallowers as $fallower)
                        @include('users.partials.avatar', ['size' => 25, 'user' => $fallower])
                    @endforeach

                </div>
            </div>


        </div>

        <div class="col-md-6">

            @unless($user->is($currentUser))
                @include('users.partials.fallow-form')
            @endunless

            @if ($user->is($currentUser))
                @include('statuses.partials.publish-status-form')
            @endif

            @include('statuses.partials.statuses', ['statuses' => $user->statuses])
        </div>
    </div>
@endsection
