<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guestbook</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <meta id="token" name="toke" value="{{ csrf_token() }}">
    <style>
        body {
            padding: 2em 0;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body class="container">


<div id="guestbook">

    <form method="POST" v-on="submit: onSubmitForm">

        <div class="form-group">
            <label for="name">
                Name:
                <span class="error" v-if="! newMessage.name">*</span>
            </label>

            <input type="text" name="name" id="name" class="form-control" v-model="newMessage.name">
        </div>

        <div class="form-group">
            <label for="body">
                Message:
                <span class="error" v-if="! newMessage.body">*</span>
            </label>
            <textarea type="text" name="body" id="body" class="form-control" v-model="newMessage.body"></textarea>
        </div>

        <div class="form-group" v-if="! submitted">
            <button type="submit" class="btn btn-default" v-attr="disabled: errors">Sign Guestbook</button>
        </div>
        <div class="alert alert-success" v-if="submitted">Thanks!</div>
    </form>

    <hr>

    <article v-repeat="messages">
        <h3>@{{ name }}</h3>

        <div class="body">@{{ body }}</div>
    </article>



</div>


<script src="/js/vendor.js"></script>
<script src="/js/guestbook.js"></script>
</body>
</html>