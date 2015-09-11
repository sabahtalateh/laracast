@extends('layouts.master')

@section('content')
    <div class="jumbotron">
        <h1>Welcome here!</h1>

        <p>You are here. You can sign up. Or not. Do wat you want. It is freedom baby. Cruel but so sweet. And now. Your
            turn. C'mon!</p>

        @if (! $currentUser)
            <a class="btn btn-lg btn-primary" href="{{ route('register_path') }}" role="button">Sign Up</a>
        @endif
        </p>
    </div>
@endsection
