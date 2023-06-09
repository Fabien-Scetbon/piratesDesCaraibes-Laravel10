@extends('layouts.master')

@section('content')
<section class="intro">
    <div class="bg-image h-100" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img2.jpg');">
        <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.25);">
            <div class="container">
                <div class="row justify-content-center">
                    <h1>Profil de {{ $user->pseudo }}</h1>
                    <div class="col-18">
                        <div class="card bg-dark shadow-2-strong">
                            <div class="card-body">
                                <div class="table-responsive">
                                @if (isset($message))
                                    <p style="color:green; text-align:center">
                                        {{ $message }}
                                    </p>
                                @endif
                                @if ($message = Session::get('message'))
                                    <p style="color:orange; text-align:center">
                                        {{ $message }}
                                    </p>
                                @endif
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
                                                @if(Auth::user()->id == $user->id || Auth::user()->is_capitaine == 1)
                                                    <th scope="col">Editer</th>
                                                @endif
                                                @if(Auth::user()->is_capitaine == 1)
                                                    <th scope="col">Supprimer</th>
                                                @endif
                                            </tr>
                                        </thead>
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
                                                @if(Auth::user()->id == $user->id || Auth::user()->is_capitaine == 1)
                                                    <td>
                                                        <a href="{{ route('edituser',$user->id) }}">
                                                            <i style="font-size: 1.3em;padding:0.2em" class="fas fa-edit"></i>
                                                        </a>
                                                    </td>
                                                @endif
                                                @if(Auth::user()->is_capitaine == 1)
                                                    <td>
                                                        <form action="{{ route('deleteuser',$user->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                            <button type="submit">
                                                                <i style="font-size: 1.3em;padding:0.2em;color:red" class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                @endif
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