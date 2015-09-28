@extends('layouts.master')

@section('content')
    <h1>Buy for 1$</h1>
    {!! Form::open(['id'=>'billing-form']) !!}
    <div class="form-row">
        <label>
            <span>Email:</span>
            <input type="text" id="email" name="email"/>
        </label>
    </div>

    <div class="form-row">
        <label>
            <span>Card Number:</span>
            <input type="text" data-stripe="number"/>
        </label>
    </div>
    <div class="form-row">
        <label>
            <span>CVC:</span>
            <input type="text" data-stripe="cvc"/>
        </label>
    </div>
    <div class="form-row">
        <label>
            <span>Expiration Date:</span>
            {!! Form::selectMonth(null, null, ['data-stripe' => 'exp-month']) !!}
            {!! Form::selectYear(null, date('Y'), date('Y') + 10, null, ['data-stripe' => 'exp-year']) !!}
        </label>
    </div>
    <div class="form-row">
        {!! Form::submit('Buy now') !!}
    </div>

    <div class="payment-errors"></div>

    {!! Form::close() !!}
@endsection

@section('footer')
    <script src="/js/billing.js"></script>
@endsection
