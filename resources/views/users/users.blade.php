@extends('layouts.master')

@section('content')
<section class="intro">
    <div class="bg-image h-100" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img2.jpg');">
        <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.25);">
            <div class="container">
                <div class="row justify-content-center">
                    <h1>MARINS</h1>
                    <div class="col-18">
                        <div class="card bg-dark shadow-2-strong">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-dark table-borderless mb-0">
                                        <thead>
                                            <tr>                                                
                                                <th scope="col">Navire</th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Prenom</th>
                                                <th scope="col">Pseudo</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Age</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Specialites</th>
                                                <th scope="col">Capitaine</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($users as $user)
                                            <tr>
                                                <th scope="row">{{ $user->navire_id }}</th>
                                                <td>{{ $user->nom }}</td>
                                                <td>{{ $user->prenom }}</td>
                                                <td>{{ $user->pseudo }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->age }}</td>
                                                <td>{{ $user->description }}</td>
                                                <td>specialites</td>
                                                <td>{{ $user->is_capitaine }}</td>
                                            </tr>
                                        @empty
                                            <p>Pas de marin disponible</p>
                                        @endforelse
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