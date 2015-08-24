<!doctype html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/css/all.css"/>

</head>
<body>

    @include('partials/navbar')


    <div class="container">
        @include('flash::message')

        @yield('content')
    </div>

    <script src="/js/all.js"></script>

    @yield('footer')



    <script>
//        $('div.alert').not('.alert-important').delay(3000).slideUp();

        $('#flash-overlay-modal').modal();

    </script>

</body>
</html>