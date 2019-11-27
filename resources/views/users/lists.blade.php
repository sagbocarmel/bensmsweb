@extends('layouts.master')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">École utilisateurs</h2>
                <p class="pageheader-text"></p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Utilisateur</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liste des utilisateurs</li>
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
                <h5 class="card-header">Liste des Écoles et leurs utilisateurs</h5>
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
                                <th scope="col">Nom d'utilisateur</th>
                                <th scope="col">École</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Téléphone</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($schools as $key=>$school)
                                <tr>
                                    <td>{{$key +1 }}</td>
                                    <td>{{$school->username }}</td>
                                    <td>{{$school->school_name }}</td>
                                    <td>{{$school->email }}</td>
                                    <td>{{$school->phone_number }}</td>
                                    <td>
                                        {!! link_to_route('show_user', 'Voir', [$school->id], ['class' => 'btn btn-sm btn-success']) !!}
                                    </td>
                                    <td>
                                        {!! link_to_route('edit_user', 'Modifier', [$school->id], ['class' => 'btn btn-sm btn-warning']) !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['delete_user', $school->id]]) !!}
                                            {!! Form::submit('Supprimer', ['class' => 'btn btn-sm btn-sm btn-danger', 'onclick' => 'return confirm(\'Vraiment supprimer cet utilisateur ?\')']) !!}
                                        {!! Form::close() !!}
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
