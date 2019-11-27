@extends('layouts.master')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">SMS Board</h2>
                <p class="pageheader-text"></p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">SMS</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Crédit SMS Restant</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Crédit SMS Fastermessage</h5>
                <div class="card-body">
                    <div >
                        <p class="row">
                            <span class="col-3  text-dark font-weight-bold">
                                Crédit restant:
                            </span>
                            <span class="col-9">
                                {{ $result['balance'] }}
                            </span>
                        </p>
                        <p class="row">
                            <span class="col-3  text-dark font-weight-bold">
                                (Prix unitaire)/sms :
                            </span>
                            <span class="col-9">
                                {{ $result['unitPrice'] }}
                            </span>
                        </p>
                        <p class="row">
                            <span class="col-3 text-left text-dark font-weight-bold">
                               Device :
                            </span>
                            <span class="col-9">
                               {{ $result['devise']}}
                            </span>
                        </p>
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