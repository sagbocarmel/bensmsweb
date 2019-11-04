@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <main role="main" class=" m-4 my-3 inner cover">
            <h1 class="cover-heading">SMS planifié</h1>
            <p class="lead">SMS To Parents permet de planifier et gérer l'envoie des SMS de notification aux parents d'élèves.
                <br> Fournir une assistance de qualité aux parents c'est réaliser un bien-être de plus.</p>
            <p class="lead">
                <a href="{{url('/sms/parent/about')}}" class="btn btn-md btn-light text-primary">Voir plus</a>
            </p>
        </main>
    </div>
</div>
@endsection


