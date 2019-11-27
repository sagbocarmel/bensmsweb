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
                            <li class="breadcrumb-item active" aria-current="page">Importer un fichier csv ou Excel de SMS</li>
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
                <h5 class="card-header">Importer des sms pour envoie</h5>
                <div class="card-body">
                    @if (session('import_success'))
                        <div class="alert alert-success" role="alert" >
                            {{ session('import_success') }}
                        </div>
                    @endif
                    <form action="{{ url('/ben/sms/import') }}" method="POST" name="importform"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control">
                        <br>
                        <button class="btn btn-success">Importer Fichier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
