@extends('layout')

@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Monter à bord du navire</div>
                    <div class="card-body">
                    @if ($message = Session::get('message'))
                        <p style="color:orange; text-align:center">
                            {{ $message }}
                        </p>
                    @endif
                        <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Mot de passe</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Se souvenir de moi
                                        </label>
                                    </div>
                                </div>
                            </div>
                            @if (session('success'))
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="text-danger" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    A l'abordage !
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection