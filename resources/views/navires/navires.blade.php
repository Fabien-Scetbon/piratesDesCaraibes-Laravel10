@extends('layouts.master')

@section('content')
<section class="intro">
    <div class="bg-image h-100" style="background-image: url('https://mdbootstrap.com/img/Photos/new-templates/tables/img2.jpg');">
        <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0,0,0,.25);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-18">
                        <div class="card bg-dark shadow-2-strong">
                            <div class="card-body">
                                <div class="table-responsive">
                                <h1 style="color:white;text-align:center">NAVIRES</h1>
                                    <table class="table table-dark table-borderless mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">NOM</th>
                                                <th scope="col">BOIS DE CONSTRUCTION</th>
                                                <th scope="col">ETAT GLOBAL</th>
                                                <th scope="col">NOMBRE D'HOMMES D'EQUIPAGE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($navires as $navire)
                                            <tr>
                                                <th scope="row">{{ $navire->nom }}</th>
                                                <td>{{ $navire->bois }}</td>
                                                @if ($navire->etat < 20) <td style="color:red">{{ $navire->etat }} / 100</td>
                                                @elseif ($navire->etat < 50) <td style="color:orange">{{ $navire->etat }} / 100</td>
                                                @else <td>{{ $navire->etat }} / 100</td>
                                                @endif
                                                <td>{{ $navire->count }}</td>
                                            </tr>
                                            @empty
                                            <p>Pas de navire disponible</p>
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