<!DOCTYPE html>
<html>

<head>
    <title>Pirates</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

        body {
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }

        .navbar-laravel {
            box-shadow: 0 2px 4px rgba(0, 0, 0, .04);
        }

        .navbar-brand,
        .nav-link,
        .my-form,
        .login-form {
            font-family: Raleway, sans-serif;
        }

        .my-form {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .my-form .row {
            margin-left: 0;
            margin-right: 0;
        }

        .login-form {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .login-form .row {
            margin-left: 0;
            margin-right: 0;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#">Pirates des Caraïbes</a>
            <div>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('navires') }}">Voir les navires</a>
                    </li>
                    @guest
                        @if (Request::path() == 'registration')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Monter à bord</a>
                            </li>
                        @endif
                        @if (Request::path() == 'login')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">S'engager</a>
                        </li>
                        @endif
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Débarquer</a>
                    </li>
                    @endguest
                </ul>

            </div>
        </div>
    </nav>

    @yield('content')

</body>

</html>