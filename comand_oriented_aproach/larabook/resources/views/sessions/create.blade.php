@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h1>Sign In!</h1>

            {!! Form::open(['route' => 'login_path']) !!}

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::input('password', null, null, ['class' => 'form-control', 'type' => 'password', 'id' =>
                'password', 'name' => 'password', 'required' => 'required']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Sign In', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection


