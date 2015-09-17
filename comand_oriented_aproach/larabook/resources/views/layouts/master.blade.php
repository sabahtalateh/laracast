<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
          crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css"/>
</head>
<body>

<div class="container">
    @include('flash::message')
    @yield('content')
</div>

<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
        integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ=="
        crossorigin="anonymous"></script>
<script>

    $('#flash-overlay-modal').modal();

    $('.comment__create-form').on('keydown', function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            $(this).submit();
        }
    })
</script>
@include('layouts.partials.navbar')

</body>
</html>