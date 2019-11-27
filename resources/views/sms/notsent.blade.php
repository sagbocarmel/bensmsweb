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
                            <li class="breadcrumb-item active" aria-current="page">SMS non envoyés</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- ============================================================== -->
        <!-- valifation types -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Liste des sms non envoyés</h5>
                @if (session('success'))
                    <div class="alert alert-success" role="alert" >
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive table-bordered  table-striped">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">SMS</th>
                                <th scope="col">Matricule élève</th>
                                <th scope="col">Classe</th>
                                <th scope="col">Date programmée</th>
                                <th scope="col">Heure programmée</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Nombre de page</th>
                                <th scope="col">État</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($smss as $key=>$sms)
                                <tr>
                                    <td>{{$key +1 }}</td>
                                    <td>{{$sms->sms_sender }}</td>
                                    <td>{{$sms->sms_receiver }}</td>
                                    <td>{{$sms->sms_value }}</td>
                                    <td>{{$sms->student_matricule }}</td>
                                    <td>{{$sms->student_level }}</td>
                                    <td>{{$sms->sms_send_date }}</td>
                                    <td>{{$sms->sms_send_time }}</td>
                                    <td>{{$sms->sms_price }}</td>
                                    <td>{{$sms->nbr_page_sms }}</td>
                                    <td>
                                        Non envoyé
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
/