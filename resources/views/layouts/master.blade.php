<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
            {{ config('app.name', 'SMS To Parent') }}
        - Admin Dashboard </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/static/bootstrap/css/bootstrap.min.css') }}">
    <link href="{{ asset('assets/static/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/static/fonts/fontawesome/css/fontawesome-all.css') }}">
</head>
<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto navbar-right-top">
                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user mr-2"></i></a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name">
                                    {{ Auth::user()->school_name }}</h5>
                                <span class="status"></span><span class="ml-2">Connecté</span>
                            </div>
                            <a class="dropdown-item" href="{{route('show_user',Auth::user()->id)}}"><i class="fas fa-user mr-2"></i>Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i class="fas fa-power-off mr-2"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <div class="nav-left-sidebar sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-divider">
                            Menu
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link active" href="{{route('home')}}" ><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-user"></i>Utilisateur</a>
                            <div id="submenu-2" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    @if(Auth::user()->hasRole('Admin'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('create_user')}}">Nouveau <span class="badge badge-secondary"></span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('list_user')}}">Liste utilisateur</a>
                                        </li>
                                    @endif
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('show_user',Auth::user()->id)}}">Profil</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-envelope-open"></i>Sms</a>
                            <div id="submenu-3" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('import_sms')}}">Importer csv</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('credit_sms')}}">Crédit</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('list_sms')}}">Tout les sms</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('waiting_sms')}}">SMS en attente</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('scheduled_sms')}}">SMS en programé</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('delivered_sms')}}">SMS en délivré</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('rejected_sms')}}">SMS en rejeté</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('not_sent_sms')}}">SMS non envoyé</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <div class="footer ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        Copyright © 2019 SMS To Parent. All rights reserved. by LabAyifa</a>.
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
</div>
<!-- ============================================================== -->
<!-- end main wrapper -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<script src="{{ asset('assets/static/jquery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/static/bootstrap/js/bootstrap.bundle.js ') }}"></script>
<script src="{{ asset('assets/static/slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/libs/js/main-js.js') }}"></script>
</body>

</html>>