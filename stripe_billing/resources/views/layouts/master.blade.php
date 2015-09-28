<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="publishable-key" content="{{ Config::get('stripe.publishable_key') }}"/>
</head>
<body>

@if($errors->any())
    @foreach($errors->all() as $error)
        <h4>{{ $error }}</h4>
    @endforeach
@endif

<div class="container">
    @yield('content')
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

@yield('footer')

</body>
</html>