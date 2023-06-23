@extends('layouts.master')

@section('content')
<section class="intro">
    <div class="bg-image h-100" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img2.jpg');">
        <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.25);">
            <div class="container">
            <h1 style="color:white; text-align:center">NAVIRE {{ $navire->nom }}</h1>
                <div class="row justify-content-center">
                    <div class="col-18">
                        <div class="card bg-dark shadow-2-strong">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-dark table-borderless mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">BOIS DE CONSTRUCTION</th> 
                                                @foreach ($navire->getFillable() as $index => $item)
                                                    @if ($index >= 2)
                                                        <th scope="col">{{ ucfirst($item) }}</th>
                                                    @endif
                                                @endforeach
                                                <th scope="col">ETAT GLOBAL</th>
                                                <th scope="col">NOMBRE D'HOMMES D'EQUIPAGE</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $navire->bois }}</td>

                                                @foreach ($navire->getFillable() as $item)   
                                                    @if (is_int($navire->$item))
                                                        @if ($navire->$item <= 2) <td style="color:red">{{ $navire->$item }} / 10</td>
                                                        @elseif ($navire->$item < 5) <td style="color:orange">{{ $navire->$item }} / 10</td>
                                                        @else <td>{{ $navire->$item }} / 10</td>
                                                        @endif
                                                    @endif
                                                @endforeach

                                                @if ($etat < 20) <td style="color:red">{{ $etat }} / 100</td>
                                                @elseif ($etat < 50) <td style="color:orange">{{ $etat }} / 100</td>
                                                @else <td>{{ $etat }} / 100</td>
                                                @endif
                                                
                                                <td>{{ $count }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 style="color:white; text-align:center" 3>Ressources</h2>
                <div class="row justify-content-center">
                    <div class="col-18">
                        <div class="card bg-dark shadow-2-strong">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-dark table-borderless mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Quantité</th> 
                                                <th scope="col">Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if (count($navire->ressources) != 0)
                                            @foreach($navire->ressources as $ressource)
                                                <tr>
                                                    <th scope="row">{{ $ressource->nom }}</th>
                                                    <td>{{ $ressource->quantite }} Kg</td>
                                                    <td>{{ $ressource->type }}</td>
                                                </tr>   
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>
                                                    aucune
                                                </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 style="color:white; text-align:center" 3>Trésors</h2>
                <div class="row justify-content-center">
                    <div class="col-18">
                        <div class="card bg-dark shadow-2-strong">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-dark table-borderless mb-0">
                                    <thead>
                                            <tr>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Description</th> 
                                                <th scope="col">Valeur en pièces d'or</th>
                                                <th scope="col">Poids</th>
                                                <th scope="col">Etat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if (count($navire->tresors) != 0)
                                            @foreach($navire->tresors as $tresor)
                                                <tr>
                                                    <th scope="row">{{ $tresor->nom }}</th>
                                                    <td>{{ $tresor->description }}</td>
                                                    <td>{{ $tresor->prix }}</td>
                                                    <td>{{ $tresor->poids }} Kg</td>
                                                    <td>{{ $tresor->etat }}</td>
                                                </tr>   
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>
                                                    aucun
                                                </td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th scope="row">TOTAL</th>
                                            <td></td>
                                            <td>{{ $totalPrix }}</td>
                                            <td>{{ $totalPoids }} Kg</td>
                                            <td></td>
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