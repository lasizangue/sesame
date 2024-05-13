@extends('layouts.auth')

@section('form')

    <div class=" login-box bg-warning" >
        
            <div  class="row" >
                <div class="col-12">
                        <div>
                            <img src="{{ Vite::asset('resources/images/LOGO.jpg') }}" width="700px", height="180px" class="img-fluid">
                        </div>
                </div>
            </div>
            
            <div class="login-logo">
                <a><b>Admin</b>SESAME<b> V2.0</b></a>
            </div>

        <div class="card">
        
            <div class="card-body login-card-body bg-dark">
                    <p class="login-box-msg">Démarrer votre session svp ! </p>
                    
                <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="container m-auto ">
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control" @error('email') is-invalid @enderror  name="email" required value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">

                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input id="password" type="password" class="form-control" @error('password') is-invalid @enderror name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                    
                        <div  class="row" >
                            <div class="col-12">
                                <button type="submit" class="btn btn-success btn-block">Se connecter</button>
                            </div>

                        </div>
                        
                    </div>
                </form>
                @endsection

                @section("titre-auth")
                   Sesame - Login
                @endsection
                
                