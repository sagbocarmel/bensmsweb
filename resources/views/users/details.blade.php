@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">École utilisateurs</h2>
                <p class="pageheader-text"></p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Utilisateur</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Nouveau</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
               <h5 class="card-header">Fiche d'utilisateur (École)</h5>
                <div class="card-body">
                    <div >
                        <p>
                            <span class="col-4  text-dark font-weight-bold">
                                École :
                            </span>
                            <span class="col-8">
                                {{ $user->school_name }}
                            </span>
                        </p>
                        <p>
                            <span class="col-4  text-dark font-weight-bold">
                                Email :
                            </span>
                            <span class="col-8">
                                {{ $user->email }}
                            </span>
                        </p>
                        <p>
                            <span class="col-4  text-dark font-weight-bold">
                               Téléphone :
                            </span>
                            <span class="col-8">
                               {{ $user->phone_number }}
                            </span>
                        </p>
                        <p>
                            <span class="col-4  text-dark font-weight-bold">
                                Adresse :
                            </span>
                            <span class="col-8">
                               {{ $user->address}}
                            </span>
                        </p>
                        <p>
                            <span class="col-4  text-dark font-weight-bold">
                               Nom d'utilisateur :
                            </span>
                            <span class="col-8">
                                {{ $user->username }}
                            </span>
                        </p>
                        <br>
                        <div class="text-danger ml-3 font-weight-bold">
                            @if($user->hasRole('Admin'))
                                Administrateur
                            @endif
                        </div>
                    </div>
                    <a href="javascript:history.back()" class="ml-2 mt-5 btn btn-primary">
                        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                    </a>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection