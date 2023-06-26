<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pirates</title>
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"><link rel="preconnect" href="https://fonts.googleapis.com"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6b7f99e3c4.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('partials.navbar')
    @yield('content')
</body>
</html>