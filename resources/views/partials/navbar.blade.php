<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <ul class="navbar-nav mr-auto">
        @if (Request::path() != 'navires')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('navires') }}">Voir navires</a>
            </li>
        @endif
        @auth

            @if (!Request::is('user/*')) <!-- user/? contenu dans url -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user',Auth::user()->id) }}">Voir profil</a>
                    </li>
            @endif

            @if (Request::is('user/*'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users',Auth::user()->navire_id) }}">Voir marins</a>
                    </li>
            @endif

        @endauth

        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">S'identifier</a>
            </li>
        @endguest
        </ul>
        <span class="navbar-brand mx-auto">Pirates des Caraĩbes</span>
        <ul class="navbar-nav ml-auto">
        @auth
        <li class="nav-item">
            <a class="nav-link" href="{{ route('navire',Auth::user()->navire_id) }}">Voir {{ Auth::user()->navireUser->nom}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}">Débarquer</a>
        </li>
        @endauth
        </ul>
    </div>
</nav>