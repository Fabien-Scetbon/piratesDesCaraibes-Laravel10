@extends('layouts.master')

@section('content')
<section class="intro">
    <div class="bg-image h-100" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img2.jpg');">
        <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.25);">
            <div class="container">
                <div class="row justify-content-center">
                    <h1>Ajout d'un marin sur {{ $navire }}</h1>
                    <div class="col-18">
                        <div class="card bg-dark shadow-2-strong">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-dark table-borderless mb-0">
                                        <thead>
                                            <tr>      
                                                <th scope="col">Nom</th>
                                                <th scope="col">Prénom</th>
                                                <th scope="col">Pseudo</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Age</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Spécialites</th>
                                                <th scope="col">Navire</th>
                                                <th scope="col">Capitaine</th>
                                                <th scope="col">Date d'arrivée</th>
                                                <th scope="col">Editer</th>
                                                <th scope="col">Supprimer</th>
                                            </tr>
                                        </thead>
                                        <form action="/user/add/{{ $user->nickname }}" method="post">

                                        <tbody>
                                            <tr>                                                
                                                <td>{{ $user->nom ?? 'inconnu' }}</td>
                                                <td>{{ $user->prenom ?? 'inconnu' }}</td>
                                                <td>{{ $user->pseudo }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->age ?? 'inconnu' }}</td>
                                                <td>{{ $user->description ?? 'inconnue' }}</td>
                                                <td>
                                                @if (count($user->specialites) != 0)
                                                    @foreach($user->specialites as $specialite)
                                                        {{ $specialite->nom }}</br>
                                                    @endforeach
                                                @else
                                                    inconnues
                                                @endif
                                                </td>
                                                <td>{{ $user->navireUser->nom }}</td>
                                                <td>
                                                @if($user->is_capitaine)
                                                    oui
                                                @else
                                                    non
                                                @endif
                                                </td>
                                                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                                <td>
                                                    <a href='#'>
                                                        <i style="font-size: 1.3em;padding:0.2em" class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href='#'>
                                                        <i style="font-size: 1.3em;padding:0.2em" class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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