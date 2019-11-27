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
                            <li class="breadcrumb-item active" aria-current="page">Mis à jour</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- ============================================================== -->
        <!-- valifation types -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Mettre à jour une école</h5>
                <div class="card-body">

                    @if (session('password_error'))
                        <div class="alert alert-danger" role="alert" >
                            {{ session('password_error') }}
                        </div>
                    @endif
                    @if (session('email_error'))
                        <div class="alert alert-danger" role="alert" >
                            {{ session('email_error') }}
                        </div>
                    @endif
                    @if (session('phone_error'))
                        <div class="alert alert-danger" role="alert" >
                            {{ session('phone_error') }}
                        </div>
                    @endif
                    @if (session('username_error'))
                        <div class="alert alert-danger" role="alert" >
                            {{ session('username_error') }}
                        </div>
                    @endif
                {!! Form::model($user, ['route' => ['update_user', $user->id, $userRole->id], 'method' => 'put']) !!}
                    @csrf
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Nom d'utilisateur</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="username" type="text" value="{{$user->username}}" required="true" placeholder="Username" class="form-control">
                            {!! $errors->first('username', '<small class="help-block text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">École</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="school_name" type="text" value="{{$user->school_name}}" required="true" data-parsley-minlength="8" placeholder="Nom de l'école" class="form-control">
                            {!! $errors->first('school_name', '<small class="help-block text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">E-Mail</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="email" type="email" value="{{$user->email}}" required="true" data-parsley-type="email" placeholder="Entrer un e-mail valide" class="form-control">
                            {!! $errors->first('email', '<small class="help-block text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Téléphone</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="phone_number" value="{{$user->phone_number}}" type="tel" required="true" placeholder="Doit commencer par 229" class="form-control">
                            {!! $errors->first('phone_number', '<small class="help-block text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Adresse</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                            <input name="address"  type="text" value="{{$user->address}}" required="true" placeholder="Adresse" class="form-control">
                            {!! $errors->first('address', '<small class="help-block text-danger">:message</small>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-sm-3 col-form-label text-sm-right">Mot de passe </label>
                        <div class="col-sm-4 col-lg-3 mb-3 mb-sm-0">
                            <input name="password" id="pass2" type="password" required="true" placeholder="Password" class="form-control">
                            {!! $errors->first('password', '<small class="help-block text-danger">:message</small>') !!}
                        </div>
                        <div class="col-sm-4 col-lg-3">
                            <input name="confirm_password" type="password" required="true" data-parsley-equalto="#pass2" placeholder="Re-Type Password" class="form-control">

                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('confirm_password') }}</strong>
                                </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-sm-right">Role</label>
                        <div class="col-sm-6">
                            <div class="custom-controls-stacked">
                                @foreach($roles as $role)
                                    @if($role->id == $userRole->role_id)
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" checked="true" name="id_role" class="custom-control-input" value="{{$role->id}}"><span class="custom-control-label">{{$role->name}}</span>
                                        </label>
                                    @else
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="id_role" class="custom-control-input" value="{{$role->id}}"><span class="custom-control-label">{{$role->name}}</span>
                                        </label>
                                    @endif

                                @endforeach
                                {!! $errors->first('id_role', '<small class="help-block text-danger">:message</small>') !!}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row text-right">
                        <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                            <button type="submit" class="btn btn-space btn-primary">Mettre à jour</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end valifation types -->
        <!-- ============================================================== -->
    </div>
@endsection

