@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tout est ok !</div>

                <div class="card-body">
                @auth
                    @if (session('success'))
                        <a href="{{ route('user' , Auth::user()->id) }}">
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        </a>
                    @endif
                @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection