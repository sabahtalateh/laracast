<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coupon Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body class="container">

<div id="app">
    <component is="@{{ currentView }}"></component>
</div>

<script src="/js/app.js?v{{ date('Ymdhis') }}"></script>

</body>
</html>