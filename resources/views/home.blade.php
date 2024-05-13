@extends("layouts.master")
@section('contenu')
 
    <div class="row">
    <div class="col-12 p-4">
        <div class="jumbotron text-center " style="transform: translateY(-70px)">
                <div>
                    <img src="{{ Vite::asset('resources/images/silhouette-de-navire.png') }}" width="350px", height="50px" class="img-fluid">
                </div>
                    <h1 class="display-3">Bienvenu(e), <strong>{{userFullName()}} </strong></h1>
                    <p ><h2 style="color: tomato;"><b>{{userFonction()}}</b></h2></p>
                    <p class="lead">Vous êtes sur notre plateforme digitale pour accomplir toutes vos opérations ou transactions.</p>
                    <hr class="my-4 mb-0">
                    <p>Pour nous contacter veuillez-écrire à l'adresse email : <a href="#" >it.support@tgr-ci.com</p>
                
                </div>
         </div>
</div>
@endsection

@section("titre")
    Sesame 2 | Starter  
@endsection


{{--@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection--}}
