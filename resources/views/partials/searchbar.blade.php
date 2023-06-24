<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
        <form class="" action="/searchSpecialite/{{ $navire->id }}" method="post">
            @csrf
            <select class="" name="specialite">
                <option value="">Quelle spécialité ?</option>
                @foreach ($specialites as $specialite)
                    <option value="{{ $specialite->id }}">{{ $specialite->nom }}</option>
                @endforeach
            </select>
            <button type="submit">Rechercher</button>
        </form>
    </div>
</nav>