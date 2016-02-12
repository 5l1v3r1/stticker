<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset("assets/css/app.css") }}">

    <script src="{{ asset("assets/js/pre.js") }}"></script>
</head>
<body>

@yield("body")

<script src="{{ asset("assets/js/vendor.js") }}"></script>
<script src="{{ asset("assets/js/app.js") }}"></script>
@yield("scripts")
</body>
</html>