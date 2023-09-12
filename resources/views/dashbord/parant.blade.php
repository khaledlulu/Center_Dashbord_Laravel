<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPC | @yield('Title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('dashbord/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('dashbord/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('dashbord/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('dashbord/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dashbord/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('dashbord/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('dashbord/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('dashbord/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @yield('styles')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('Home') }}" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('dashbord/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        {{-- @if(auth('admin')->check())
                        {{ asset('/storage/images/admin/'.auth('admin')->user()->images) }}
                    @elseif(auth('employee')->check())
                        {{ asset('/storage/images/employee/'.auth('employee')->user()->images) }}
                    @elseif(auth('studant')->check())
                        {{ asset('/storage/images/studant/'.auth('studant')->user()->images) }}
                    @endif --}}
                        <img src="{{ asset('dashbord/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        {{-- @if(auth('admin')->check())  Admin : {{ auth('admin')->user()->first_name.' '.auth('admin')->user()->last_name }}
                        @elseif (auth('employee')->check())  Employee : {{ auth('employee')->user()->first_name.' '.auth('employee')->user()->last_name }}
                        @elseif (auth('studant')->check())  Studant : {{ auth('studant')->user()->first_name.' '.auth('studant')->user()->last_name }}
                        @endif --}}
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        {{-- Home --}}
                        <li class="nav-item ">
                            <a href="{{ route('Home') }}" class="nav-link ">
                                <i class="nav-icon fas fa-home"></i>

                                <p>
                                    Home

                                </p>
                            </a>
                        </li>

                        {{-- Permission --}}
                        @canAny(['Index-Permission', 'Create-Permission'])
                            <li class="nav-header">Roles & Permissions</li>
                            <li class="nav-item">
                                <a href="#" class="nav-link ">
                                    <i class="nav-icon fas fa-user-lock"></i>
                                    <p>
                                        Permission
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-Permission')
                                        <li class="nav-item">
                                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                                <i class=" nav-icon fas fa-list-ul"></i>
                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-Permission')
                                        <li class="nav-item">
                                            <a href="{{ route('permissions.create') }}" class="nav-link">
                                                <i class="nav-icon fas fa-plus-circle"></i>
                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcanAny

                        {{-- roles --}}
                        @canAny(['Index-Role', 'Create-Role'])
                            <li class="nav-item">
                                <a href="#" class="nav-link ">
                                    <i class="nav-icon fas fa-user-shield"></i>
                                    <p>
                                        Roles
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-Role')
                                        <li class="nav-item">
                                            <a href="{{ route('roles.index') }}" class="nav-link">
                                                <i class=" nav-icon fas fa-list-ul"></i>


                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-Role')
                                        <li class="nav-item">
                                            <a href="{{ route('roles.create') }}" class="nav-link">
                                                <i class="nav-icon fas fa-plus-circle"></i>
                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcanAny

                        @canany(['Index-Admin', 'Create-Admin', 'Index-Employee','Create-Employee','Create-Studant','Index-Studant'])

                        <li class="nav-header">Human Mangment</li>
                        @endcanany
                        {{-- Admin --}}
                        @canAny(['Index-Admin', 'Create-Admin'])
                            {{--  --}}
                            <li class="nav-item">
                                <a href="#" class="nav-link ">
                                    <i class="nav-icon fas fa-user-circle"></i>

                                    <p>
                                        Admin
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-Admin')
                                        <li class="nav-item">
                                            <a href="{{ route('admins.index') }}" class="nav-link">
                                                <i class=" nav-icon fas fa-list-ul"></i>
                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-Admin')
                                        <li class="nav-item">
                                            <a href="{{ route('admins.create') }}" class="nav-link">
                                                <i class="nav-icon fas fa-plus-circle"></i>
                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcanAny

                        {{-- Employee --}}
                        @canAny(['Index-Employee', 'Create-Employee'])
                                                        <li class="nav-item">
                                            <a href="#" class="nav-link ">
                                                <i class="nav-icon fas fa-user-tie"></i>

                                                <p>
                                                    Employee
                                                    <i class="fas fa-angle-left right"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                @can('Index-Employee')
                                                    <li class="nav-item">
                                                        <a href="{{ route('employees.index') }}" class="nav-link">
                                                            <i class=" nav-icon fas fa-list-ul"></i>
                                                            <p>Index</p>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('Create-Employee')
                                                    <li class="nav-item">
                                                        <a href="{{ route('employees.create') }}" class="nav-link">
                                                            <i class="nav-icon fas fa-plus-circle"></i>
                                                            <p>Create</p>
                                                        </a>
                                                    </li>
                                                @endcan
                                            </ul>
                                        </li>
                        @endcanAny

                            {{-- studant --}}
                        @canAny(['Index-Studant', 'Create-Studant'])

                            <li class="nav-item">
                                <a href="#" class="nav-link ">
                                    <i class="nav-icon fas fa-user-graduate"></i>
                                    <p>
                                        Studant
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-Studant')
                                        <li class="nav-item">
                                            <a href="{{ route('studants.index') }}" class="nav-link">
                                                <i class=" nav-icon fas fa-list-ul"></i>
                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-Studant')
                                        <li class="nav-item">
                                            <a href="{{ route('studants.create') }}" class="nav-link">
                                                <i class="nav-icon fas fa-plus-circle"></i>
                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcanAny

                        <li class="nav-header">Human Resoruce</li>

                        {{-- City --}}
                        @canAny(['Index-City', 'Create-City'])
                            <li class="nav-item">
                                <a href="#" class="nav-link ">
                                    <i class="nav-icon fas fa-city"></i>
                                    <p>
                                        City
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-City')
                                        <li class="nav-item">
                                            <a href="{{ route('cities.index') }}" class="nav-link">
                                                <i class=" nav-icon fas fa-list-ul"></i>


                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-City')
                                        <li class="nav-item">
                                            <a href="{{ route('cities.create') }}" class="nav-link">
                                                <i class="nav-icon fas fa-plus-circle"></i>
                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcanAny

                        {{-- Room --}}

                        @canAny(['Index-Room', 'Create-Room'])
                            <li class="nav-item">
                                <a href="#" class="nav-link ">
                                    <i class="nav-icon fas fa-university"></i>
                                    <p>
                                        Room
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-Room')
                                        <li class="nav-item">
                                            <a href="{{ route('rooms.index') }}" class="nav-link">
                                                <i class=" nav-icon fas fa-list-ul"></i>
                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-Room')
                                        <li class="nav-item">
                                            <a href="{{ route('rooms.create') }}" class="nav-link">
                                                <i class="nav-icon fas fa-plus-circle"></i>
                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcanAny

                        {{-- diploma --}}
                        @canAny(['Index-Diploma', 'Create-Diploma'])
                            <li class="nav-item">
                                <a href="#" class="nav-link ">
                                    <i class="nav-icon fas fa-sitemap"></i>
                                    <p>
                                        Diploma
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-Diploma')
                                        <li class="nav-item">
                                            <a href="{{ route('diplomas.index') }}" class="nav-link">
                                                <i class=" nav-icon fas fa-list-ul"></i>
                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('Create-Diploma')
                                        <li class="nav-item">
                                            <a href="{{ route('diplomas.create') }}" class="nav-link">
                                                <i class="nav-icon fas fa-plus-circle"></i>
                                                <p>Create</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcanAny

                        {{-- group --}}
                        @canAny(['Index-Group', 'Create-Group'])
                            <li class="nav-item">
                                <a href="#" class="nav-link ">
                                    <i class="nav-icon fas fa-layer-group"></i>
                                    <p>
                                        Group
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-Group')
                                        <li class="nav-item">
                                            <a href="{{ route('groups.index') }}" class="nav-link">
                                                <i class=" nav-icon fas fa-list-ul"></i>
                                                <p>Index</p>
                                            </a>
                                        </li>
                                    @endcan
                                    {{-- @can('Create-Group') --}}
                                        {{-- <li class="nav-item">
                                            <a href="{{ route('createGroup') }}" class="nav-link">
                                                <i class="nav-icon fas fa-plus-circle"></i>
                                                <p>Create</p>
                                            </a>
                                        </li> --}}
                                    {{-- @endcan --}}
                                </ul>
                            </li>

                        @endcanAny


                        {{-- country --}}
                        {{-- @canAny(['Index-Country', 'Create-Country'])
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-globe-europe"></i>

                                <p>
                                    Country
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('Index-Country')

                                    <li class="nav-item">
                                        <a href="pages/tables/simple.html" class="nav-link">
                                            <i class=" nav-icon fas fa-list-ul"></i>
                                            <p>Index</p>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('Create-Country')

                                    <li class="nav-item">
                                        <a href="pages/tables/data.html" class="nav-link">
                                            <i class="nav-icon fas fa-plus-circle"></i>
                                    <p>Create</p>
                                        </a>
                                    </li>
                                @endcan
                                </ul>
                            </li>
                        @endcanAny --}}


                        <li class="nav-header">Settings</li>

                        {{-- change Password --}}
                        <li class="nav-item">
                            <a href="{{ route('editpassword.dashbord') }}" class="nav-link">
                                <i class="nav-icon fas fa-key"></i>
                                <p class="text">Chang Password</p>
                            </a>
                        </li>
                        {{-- Edit Profile --}}
                        <li class="nav-item">
                            <a href="{{ route('editprofile.dashbord') }}" class="nav-link">
                                <i class="nav-icon fas fa-user-edit"></i>
                                <p>Edit Profile</p>
                            </a>
                        </li>
                        {{-- Logout --}}
                        <li class="nav-item">
                            <a href="{{ route('logout.dashbord') }}" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Logout</p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('MainTitle')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route('Home') }}">Home</a></li>
                                <li class="breadcrumb-item active">@yield('subtitle')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->

            @yield('content')

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; {{ now()->year }}-{{ now()->year + 1 }} <a
                    href="https://adminlte.io">{{ env('APP_NAME') }}</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> {{ env('APP_Version') }}
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('dashbord/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('dashbord/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('dashbord/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('dashbord/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('dashbord/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="p{{ asset('dashbord/lugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('dashbord/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('dashbord/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('dashbord/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('dashbord/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('dashbord/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('dashbord/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('dashbord/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dashbord/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dashbord/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dashbord/dist/js/pages/dashboard.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('dashbord/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('dashbord/js/crud.js') }}"></script>
    <script src="{{ asset('dashbord/js/felidpassword.js') }}"></script>
    @yield('scripts')
</body>

</html>
