<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>King Shoes</title>
    <style>
        body {
            background-image: url("assets/images/background.png");
            background-position: center;
            background-size: cover;
            position: relative;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.cs') }}s">
    <!-- CSS Custom -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- Font Setting -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>

<body>
    @include('includes.navbar')
    @yield('content')

    @include('includes.footer')
    <script src="{{ asset('/js/bootstrap.js') }}"></script>
</body>

</html>