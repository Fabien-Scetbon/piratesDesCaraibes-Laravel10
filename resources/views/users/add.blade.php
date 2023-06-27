@extends('layouts.master')

@section('content')
<section class="intro">
    <div class="bg-image h-100" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img2.jpg');">
        <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.25);">
            <div class="container">
                <div class="row justify-content-center">
                    <h1>Ajout d'un marin sur {{ $navire_nom }}</h1>
                    <div class="col-18">
                        <div class="card bg-dark shadow-2-strong">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <p style="color:orange; text-align:center">
                                    @if ($errors->any())
                                        {{ $errors }}
                                    @endif
                                    </p>
                                    <form action="/user/create" method="post">
                                        @method('post')
                                        @csrf
                                        <table class="table table-dark table-borderless mb-0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nom</th>
                                                    <th scope="col">Prénom</th>
                                                    <th scope="col">Pseudo</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Mot de passe</th>
                                                    <th scope="col">Age</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Spécialites</th>
                                                    <th scope="col">Capitaine</th>
                                                    <th scope="col">Valider</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="text" name="nom" value="{{ old('nom') }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="prenom" value="{{ old('prenom') }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="pseudo" value="{{ old('pseudo') }}">
                                                    </td>
                                                    <td>
                                                        <input type="email" name="email" value="{{ old('email') }}">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="password" value="{{ old('password') }}">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="age" value="{{ old('age') }}">
                                                    </td>
                                                    <td>
                                                        <input type="textarea" name="description" value="{{ old('description') }}">
                                                    </td>
                                                    <td>
                                                        <p>Quelles spécialités ?</p>
                                                        @foreach ($specialites as $specialite)
                                                        <input type="checkbox" name="$specialites[]" value="{{ $specialite->id }}"> {{ $specialite->nom }}<br>
                                                        @endforeach
                                                        <input type="text" name="new_specialite" placeholder="ajouter">
                                                    </td>
                                                    <td>
                                                        <input type="number" name="is_capitaine" value="0">
                                                    </td>
                                                    <td>
                                                        <button type="submit">
                                                            <i style="font-size: 1.3em;padding:0.2em" class="fas fa-edit"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection