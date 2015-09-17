@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1>Reset your password</h1>
            @include('layouts.partials.errors')
            {!! Form::open(['route' => 'password_reset_path']) !!}
            {!! Form::hidden('token', $token) !!}
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::input('password', null, null, ['class' => 'form-control', 'type' => 'password', 'id' =>
                'password',
                'name' => 'password']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password_confirmation', 'Password Confirmation') !!}
                {!! Form::input('password', null, null, ['class' => 'form-control', 'id' =>
                'password_confirmation',
                'name' => 'password_confirmation']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
