<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ Session::get('basicInfo')['title'] }}</title>

    {{-- summernote --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    {{-- summernote End --}}

    <link rel="icon" href="{{ asset('public/upload/' . Session::get('basicInfo')['favIcon']) }}">

    <!-- DataTables -->
    <link rel="stylesheet"
        href="{{ asset('public/admin_assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('public/admin_assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('public/admin_assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> --}}
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/admin_assets') }}/dist/css/adminlte.min.css">
    <!-- Normalization -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
        integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    <!-- fontwasome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/admin_assets') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet"
        href="{{ asset('public/admin_assets') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

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
                    <a href="#" class="nav-link"></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                        </li>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white-600 small">
                                    <b>
                                    </b>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('public/admin_assets') }}/dist/img/avatar5.png" height="30"
                                    width="30">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                    href="{{ asset('public/admin_assets') }}/../Admin_Login/login-form-20/index.html"
                                    data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalexampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Are you sure you want to logout</div>
                    <div class="modal-footer">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" :href="route('logout')"
                                onclick="event.preventDefault();this.closest('form').submit();">Logout</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#02182a;">
            {{-- background-color:#062541; --}}
            <!-- Brand Logo -->
            <a href="#" class="brand-link bg-info">
                <img src="{{ asset('public/admin_assets') }}/dist/img/avatar5.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">
                    {{ session()->get('userData')[0]->name }}
                </span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item menu-open">
                            <a href="{{ url('/dashboard') }}" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('menu') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-bars"></i>
                                <p>Top Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('sub-menu') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-caret-down"></i>
                                <p>Sub-Menu Manage</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/home_feature') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-arrows-to-circle"></i>
                                <p>Home Feature</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('homepagemanage') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-arrows-to-circle"></i>
                                <p>Content Manage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('albume') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-image"></i>
                                <p>Albume Manage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('gallary') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-images"></i>
                                <p>Gallery Manage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('video') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-video"></i>
                                <p>Video Manage</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('teacher_category') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-user-tie"></i>
                                <p>Teacher Designation List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('teacher_list') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-user-tie"></i>
                                <p>Teacher List Manage</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ url('class_time') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-credit-card"></i>
                                <p>Class Timetable Manage </p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ url('student_info') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-user-graduate"></i>
                                <p>Student List Manage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('calender-event') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-calendar"></i>
                                <p>Calender Event Manage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('area') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-location-dot"></i>
                                <p>Area Manage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('sub-area') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-location-dot"></i>
                                <p>Sub-Area Manage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('marketing') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-circle-info"></i>
                                <p>Marketing Info</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('marketing-login') }}" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Marketing Login Info</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('franchise-form') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-list"></i>
                                <p>Franchise Form Info</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('franchise-list') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-clipboard"></i>
                                <p>Franchise List Info</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('message-list') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-message"></i>
                                <p>Message List Info</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('compition-regi-info') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-message"></i>
                                <p>Compition Regi Info</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('compition-category') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-message"></i>
                                <p>Compition Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('competition-status') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-message"></i>
                                <p>Competition Status</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('game-time') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-message"></i>
                                <p>Game Time Manage</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-copy"></i>
                              <p>
                                Competion Game Category
                                <i class="fas fa-angle-left right"></i>
                               
                              </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                              <li class="nav-item">
                                <a href="{{ url('special-category') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Special Category A1</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('special-category-a2') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Special Category A2</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('category-b1-level1') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category B1 Level1</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('category-b2-level1') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category B2 Level1</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('competition-category-level2') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category C Level 2</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('category-d-level3') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category D Level 3</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('category-e-level4') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category E Level 4</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('competition-category-level5') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category F Level 5</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('competition-category-level6') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category G Level 6</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('category-h-level7') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category H Level 7</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('category-i-level8') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category I Level 8</p>
                                </a>
                              </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-copy"></i>
                              <p>
                                Visual Competition Result
                                <i class="fas fa-angle-left right"></i>
                               
                              </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                              <li class="nav-item">
                                <a href="{{ url('visual-special-a1') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Special Category A1</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('visual-special-a2') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Special Category A2</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('visual-b1-level1') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category B1 Level1</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('visual-b2-level1') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category B2 Level1</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('visual-c-level2') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category C Level2</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('visual-d-level3') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category D Level3</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('visual-e-level4') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category E Level4</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('visual-f-level5') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category F Level5</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('visual-g-level6') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category G Level6</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('visual-h-level7') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category H Level7</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('visual-i-level8') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Category I Level8</p>
                                </a>
                              </li>

                             
                             
                            </ul>
                        </li>
                     
                        {{-- <li class="nav-item">
                            <a href="{{ url('visual-competition-result') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-message"></i>
                                <p>Visual Competition Result</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ url('flash-competition-category') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-message"></i>
                                <p>Flash Competition Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                              <i class="nav-icon fas fa-copy"></i>
                              <p>
                                Flash Competition Result
                                <i class="fas fa-angle-left right"></i>
                               
                              </p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                              <li class="nav-item">
                                <a href="{{ url('flash-group-a-result') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Flash Group A Result</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('flash-group-b-result') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Flash Group B Result</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="{{ url('flash-group-c-result') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Flash Group C Result</p>
                                </a>
                              </li>
                             
                             
                            </ul>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ url('flash-competition-result') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-message"></i>
                                <p>Flash Competition Result</p>
                            </a>
                        </li> --}}
                      

                     
                        @if (Auth::guard('web')->user()->roleid == 1)
                            <li class="nav-item">
                                <a href="{{ url('usermanage') }}" class="nav-link">
                                    <i class="nav-icon fa-solid fa-users"></i>
                                    <p>User Manage</p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ url('basicinfo') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-gear"></i>
                                <p>Basic Info Manage</p>
                            </a>
                        </li>

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            @yield('content')
            <!-- /.content -->
        </div>
        <footer class="main-footer justify-content-center">
            <div class="row">
                {{-- <div class="col-1"></div>
                <div class="float-center d-none d-sm-inline-block" style="margin: auto">
                    <strong class="justify-content-center">Copyright &copy; 2022-2023 <a href="http://www.sawebsoft.com/" target="_blank">SA Websoft Ltd.</a></strong>
                    All rights reserved.
                </div> --}}
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
    <script src="{{ asset('public/admin_assets') }}/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('public/admin_assets') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 4 -->
    <script src="{{ asset('public/admin_assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('public/admin_assets') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <!-- AdminLTE App -->
    <script src="{{ asset('public/admin_assets') }}/dist/js/adminlte.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('public/admin_assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('public/admin_assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('public/admin_assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js">
    </script>
    <script src="{{ asset('public/admin_assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
    </script>
    <script src="{{ asset('public/admin_assets') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('public/admin_assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('public/admin_assets') }}/plugins/pdfmake/vfs_fonts.js"></script>

    {{-- Normalization Script --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script>
        // Noramlization
        $('.normalize').selectize();
        //End Normalization

        $(function() {
            $("#example1").DataTable({
                "responsive": false,
                "lengthChange": true,
                "autoWidth": true
            });
        });
    </script>
</body>
@yield('script')

</html>
