@extends('layouts.master')

@section('content')
<section class="intro">
    <div class="bg-image h-100" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img2.jpg');">
        <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.25);">
            <div class="container">
                <h1>NAVIRE</h1>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card bg-dark shadow-2-strong">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-dark table-borderless mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">NOM</th>
                                                <th scope="col">BOIS DE CONSTRUCTION</th>
                                                <th scope="col">Coque</th>
                                                <th scope="col">Misaine</th>
                                                <th scope="col">Mat</th>
                                                <th scope="col">Cachots</th>
                                                <th scope="col">Cabines</th>
                                                <th scope="col">Gouvernail</th>
                                                <th scope="col">Voiles</th>
                                                <th scope="col">Pavillon</th>
                                                <th scope="col">Pont</th>
                                                <th scope="col">Canons</th>
                                                <th scope="col">ETAT GLOBAL</th>
                                                <th scope="col">NOMBRE D'HOMMES D'EQUIPAGE</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">{{ $navire->nom }}</th>
                                                <td>{{ $navire->bois }}</td>

                                                @foreach ($navire->getFillable() as $item)   
                                                    @if (is_int($navire->$item))
                                                        @if ($navire->$item <= 2) <td style="color:red">{{ $navire->$item }} / 10</td>
                                                        @elseif ($navire->$item < 5) <td style="color:orange">{{ $navire->$item }} / 10</td>
                                                        @else <td>{{ $navire->$item }} / 10</td>
                                                        @endif
                                                    @endif
                                                @endforeach

                                                @if ($navire->etat < 20) <td style="color:red">{{ $navire->etat }} / 100</td>
                                                @elseif ($navire->etat < 50) <td style="color:orange">{{ $navire->etat }} / 100</td>
                                                @else <td>{{ $navire->etat }} / 100</td>
                                                @endif
                                                
                                                <td>{{ $navire->count }}</td>
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