<div class="d-flex justify-content-center">
    <form class="form-inline" action="/searchSpecialite/{{ $navire->id }}" method="post">
        @csrf
        <div class="form-group mb-2">
            <select name="specialite">
                <option value="">Quelle spécialité ?</option>
                @foreach ($specialites as $specialite)
                <option value="{{ $specialite->id }}">{{ $specialite->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-dark mb-2">Rechercher</button>
    </form>
</div>