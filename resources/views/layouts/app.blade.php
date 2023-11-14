<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
{{--    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">--}}
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/toastr/toastr.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('themes/backend/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('themes/backend/dist/css/adminlte.min.css') }}">
    <style>
        @media (min-width: 768px){
            .col-form-label{
                text-align: right;
            }
        }

        .form-group.has-error label {
            color: #378903;
        }
        .form-group.has-error .form-control, .form-group.has-error .input-group-addon {
            border-color: #378903;
            box-shadow: none;
        }
        .form-group.has-error .help-block {
            color: red;
        }
        .help-block {
            display: block;
            margin-top: 5px;
            margin-bottom: 10px;
        }
        .toast{
            min-width: 300px;
        }
        .select2{
            width: 100% !important;
        }
        .form-group.has-error .select2-container span.selection span.select2-selection.select2-selection--single {
            border-color: #378903;
            box-shadow: none;
        }
        .input-group.date-time.has-error .form-control {
            border-color: #378903;
            box-shadow: none;
        }

        .input-group.date-time.has-error > .help-block {
            color: red;
        }
        .content-header h1 {
            font-size: 1.5rem;
        }
        .content-header {
            padding: 5px .5rem;
        }
        .brand-link {
            line-height: 1.9;
        }

        .card-primary.card-outline {
            border-top: 3px solid #378903;
        }
        .btn-primary {
            background-color: #378903;
            border-color: #378903;
        }
        .btn-primary:hover{
            background-color: #378903;
            border-color: #378903;
        }

        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
            background-color: #378903;
        }
        a {
            color: #378903;
        }
        .brand-link {
            line-height: 1.5;
        }
        .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
            background-color: #378903;
            border-color: #378903;
        }
        .navbar-light .navbar-nav .nav-link {
            color: rgb(0 159 75);
        }
        .dropdown-item.active, .dropdown-item:active {
            background-color: #378903;
        }
        .navbar-light .navbar-nav .nav-link:focus, .navbar-light .navbar-nav .nav-link:hover {
            color: rgb(0 159 75);
        }

        .bg-gradient-primary {
            background: #378903 linear-gradient(180deg,#378903,#378903) repeat-x!important;
            color: #fff;
        }
        .bg-gradient-primary.btn.active, .bg-gradient-primary.btn:active, .bg-gradient-primary.btn:not(:disabled):not(.disabled).active, .bg-gradient-primary.btn:not(:disabled):not(.disabled):active {
            background: #378903 linear-gradient(180deg,#378903,#378903) repeat-x!important;
            border-color: #378903;
        }
        .bg-gradient-primary.btn:hover {
            background: #378903 linear-gradient(180deg,#378903,#378903) repeat-x!important;
            border-color: #378903;
        }
        .btn-primary.focus, .btn-primary:focus {
            background-color: #378903;
            border-color: #378903;
            box-shadow: 0 0 0 0 rgb(0 159 75);
        }
        .select2-container--default .select2-results__option--highlighted[aria-selected], .select2-container--default .select2-results__option--highlighted[aria-selected]:hover {
            background-color: #378903;
        }
        .datepicker table tr td.active, .datepicker table tr td.active.disabled, .datepicker table tr td.active.disabled:hover, .datepicker table tr td.active:hover {
            background-color: #378903;
            background-image: -moz-linear-gradient(to bottom,#378903,#378903);
            background-image: -ms-linear-gradient(to bottom,#378903,#378903);
            background-image: -webkit-gradient(linear,0 0,0 100%,from(#378903),to(#378903));
            background-image: -webkit-linear-gradient(to bottom,#378903,#378903);
            background-image: -o-linear-gradient(to bottom,#378903,#378903);
            background-image: linear-gradient(to bottom,#378903,#378903);
            background-repeat: repeat-x;
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#08c', endColorstr='#0044cc', GradientType=0);
            border-color: #378903 #378903 #378903;
            border-color: rgb(0 159 75) rgb(2, 160, 76) rgb(2, 160, 76);
            filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
            color: #fff;
            text-shadow: 0 -1px 0 rgb(2, 160, 76);
        }

        .datepicker table tr td.active.active, .datepicker table tr td.active.disabled, .datepicker table tr td.active.disabled.active, .datepicker table tr td.active.disabled.disabled, .datepicker table tr td.active.disabled:active, .datepicker table tr td.active.disabled:hover, .datepicker table tr td.active.disabled:hover.active, .datepicker table tr td.active.disabled:hover.disabled, .datepicker table tr td.active.disabled:hover:active, .datepicker table tr td.active.disabled:hover:hover, .datepicker table tr td.active.disabled:hover[disabled], .datepicker table tr td.active.disabled[disabled], .datepicker table tr td.active:active, .datepicker table tr td.active:hover, .datepicker table tr td.active:hover.active, .datepicker table tr td.active:hover.disabled, .datepicker table tr td.active:hover:active, .datepicker table tr td.active:hover:hover, .datepicker table tr td.active:hover[disabled], .datepicker table tr td.active[disabled] {
            background-color: #378903;
        }

        fieldset {
            display: block;
            margin-inline-start: 2px;
            margin-inline-end: 2px;
            padding-block-start: 0.35em;
            padding-inline-start: 0.75em;
            padding-inline-end: 0.75em;
            padding-block-end: 0.625em;
            min-inline-size: min-content;
            border-width: 2px;
            border-style: groove;
            border-color: threedface;
            border-image: initial;
            padding-bottom: 0;
        }
        legend {
            width: auto;
            margin-bottom: 0;
        }
        table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before, table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control:before {
            background-color: #378903;
        }
        [class*=sidebar-dark] .brand-link, [class*=sidebar-dark] .brand-link .pushmenu {
            color: rgb(0 159 75);
            background: #fff;
        }
        [class*=sidebar-dark] .brand-link .pushmenu:hover, [class*=sidebar-dark] .brand-link:hover {
            color: #378903;
        }
        .nav-link {
            padding: .5rem .5rem;
        }
        .layout-navbar-fixed .wrapper .sidebar-dark-primary .brand-link:not([class*=navbar]) {
            background-color: #ffffff;
        }
        body{
            overflow-x: hidden;
        }
        .img-circle {
            border-radius: 0%;
        }
        .navbar-light .navbar-nav .nav-link {
            color: #378903;
        }
        .navbar-light .navbar-nav .nav-link:focus, .navbar-light .navbar-nav .nav-link:hover {
            color: #378903;
        }
        [class*=sidebar-dark] .brand-link, [class*=sidebar-dark] .brand-link .pushmenu {
            color: #378903;
            background: #fff;
        }
        [class*=sidebar-dark] .brand-link .pushmenu:hover, [class*=sidebar-dark] .brand-link:hover {
            color: #378903;
        }
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
            background-color: #378903;
        }
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
            background-color: #378903;
        }
        .bg-gradient-primary {
            background: #378903 linear-gradient(
                180deg
                ,#378903,#378903) repeat-x!important;
            color: #fff;
        }
        .btn-primary {
            background-color: #378903;
            border-color: #378903;
        }
        .bg-gradient-primary.btn:hover {
            background: #378903 linear-gradient(
                180deg
                ,#378903,#378903) repeat-x!important;
            border-color: #378903;
        }
        .bg-gradient-primary.btn.active, .bg-gradient-primary.btn:active, .bg-gradient-primary.btn:not(:disabled):not(.disabled).active, .bg-gradient-primary.btn:not(:disabled):not(.disabled):active {
            background: #378903 linear-gradient(
                180deg
                ,#378903,#378903) repeat-x!important;
            border-color: #378903;
        }
        .btn-primary:hover {
            background-color: #378903;
            border-color: #378903;
        }
        .card-primary.card-outline {
            border-top: 3px solid #378903;
        }
        .btn-success {
            color: #fff;
            background-color: #378903;
            border-color: #378903;
            box-shadow: none;
        }
        .btn-success:hover {
            color: #fff;
            background-color: #378903;
            border-color: #378903;
        }
        .page-item.active .page-link {
            background-color: #378903!important;
            border-color: #378903!important;
        }
        a {
            color: #378903;
        }
        .bg-success {
            background-color: #378903!important;
        }
        .dropdown-item.active, .dropdown-item:active {
            background-color: #378903;
        }
        .btn-primary:not(:disabled):not(.disabled).active, .btn-primary:not(:disabled):not(.disabled):active, .show>.btn-primary.dropdown-toggle {
            background-color: #378903!important;
            border-color: #378903!important;
        }
        .brand-text{
            margin-left: 25px;
        }

    </style>
    @yield('style')
</head>
<body class="sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <h3  class="nav-link font-weight-bold active" style="color: #378903;font-size: 22px;margin: 0">
                    {{ config('app.name') }}
                </h3>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                     {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="dropdown-item"  onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('dashboard') }}" class="brand-link">

            <span class="brand-text font-weight-light"><b>{{config('app.name')}}</b></span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <?php
                    $subMenu = [
                        'warehouse', 'warehouse.add', 'warehouse.edit','unit','unit.add','unit.edit','company-branch','company-branch.add','company-branch.edit'
                    ];
                    ?>
                    <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Administrator
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php
                            $subSubMenu = [
                                'warehouse', 'warehouse.add', 'warehouse.edit',
                            ];
                            ?>
                            <li class="nav-item">
                                <a href="{{route('warehouse')}}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                    <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                    <p>Warehouse</p>
                                </a>
                            </li>
                            <?php
                            $subSubMenu = [
                                'unit','unit.add','unit.edit'
                            ];
                            ?>
                            <li class="nav-item">
                                <a href="{{route('unit')}}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                    <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                    <p>Unit</p>
                                </a>
                            </li>
                            <?php
                            $subSubMenu = [
                                'company-branch','company-branch.add','company-branch.edit'
                            ];
                            ?>
                            <li class="nav-item">
                                <a href="{{route('company-branch')}}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                    <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                    <p>Company Branch</p>
                                </a>
                            </li>


                        </ul>
                    </li>
                    <?php
                    $subMenu = [
                        'bank', 'bank.add', 'bank.edit', 'branch', 'branch.add', 'branch.edit',
                        'bank_account', 'bank_account.add', 'bank_account.edit','cash'
                    ];
                    ?>
                    <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Bank & Account
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php
                            $subSubMenu = [
                                'bank', 'bank.add', 'bank.edit',
                            ];
                            ?>
                            <li class="nav-item">
                                <a href="{{route('bank')}}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                    <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                    <p>Bank</p>
                                </a>
                            </li>
                            <?php
                            $subSubMenu = [
                                 'branch', 'branch.add', 'branch.edit',
                            ];
                            ?>
                            <li class="nav-item">
                                <a href="{{route('branch')}}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                    <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                    <p>Branch</p>
                                </a>
                            </li>
                            <?php
                            $subSubMenu = [
                                'bank_account', 'bank_account.add', 'bank_account.edit','cash'
                            ];
                            ?>
                            <li class="nav-item">
                                <a href="{{route('bank_account')}}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                    <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                    <p>Account</p>
                                </a>
                            </li>


                        </ul>
                    </li>




                    <?php
                            $subMenu = [
                                'account_head', 'account_head.add', 'account_head.edit','section_number_of_tds','section_number_of_tds.add','section_number_of_tds.edit',
                                'balance_transfer', 'balance_transfer.add', 'balance_transfer.edit', 'balance_transfer_voucher_details', 'balance_transfer_receipt_details',
                                'bank_voucher', 'bank_voucher.create', 'bank_voucher.edit', 'bank_voucher_details','cash_voucher', 'cash_voucher.create', 'cash_voucher.edit', 'cash_voucher_details',
                                'cheque_receipt', 'cheque_receipt.create', 'cheque_receipt.edit', 'cheque_receipt_details','cash_receipt', 'cash_receipt.create','cash_receipt.edit', 'cash_receipt_details',
                                'journal_voucher', 'journal_voucher.create', 'journal_voucher.edit', 'journal_voucher_details','report.ledger','report.trail_balance','report.receive_and_payment'
                            ];
                            ?>

                        <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                                    <i class="nav-icon fa fa-columns"></i>
                                    <p>
                                        Accounts
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <?php
                                    $subSubMenu = [
                                        'account_head', 'account_head.add', 'account_head.edit'
                                    ];
                                    ?>
                                    <li class="nav-item">
                                        <a href="" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                            <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                            <p>Account Heads</p>
                                        </a>
                                    </li>
                                    <?php
                                    $subMenu = ['balance_transfer', 'balance_transfer.add', 'balance_transfer.edit', 'balance_transfer_voucher_details', 'balance_transfer_receipt_details'];
                                    ?>
                                    <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
                                        <a href="#"
                                           class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                                            <i class="nav-icon fas fa-receipt"></i>
                                            <p>
                                                Balance Transfer
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <?php
                                            $subSubMenu = ['balance_transfer.add'];
                                            ?>
                                            <li class="nav-item">
                                                <a href=""
                                                   class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                                    <i class="far  {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                                    <p>Add Balance Transfer</p>
                                                </a>
                                            </li>
                                            <?php
                                            $subSubMenu = ['balance_transfer', 'balance_transfer.edit'];
                                            ?>
                                            <li class="nav-item">
                                                <a href=""
                                                   class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                                    <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                                    <p>Balance Transfer List</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>
                        <?php
                        $subMenu = [
                            'user.all', 'user.edit', 'user.add','user.activity'
                        ];
                        ?>
                        <li class="nav-item {{ in_array(Route::currentRouteName(), $subMenu) ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{ in_array(Route::currentRouteName(), $subMenu) ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        User Management
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <?php
                                    $subSubMenu = [
                                        'user.all', 'user.edit', 'user.add','user.activity'
                                    ];
                                    ?>
                                    <li class="nav-item">
                                        <a href="{{route('user.all')}}" class="nav-link {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'active' : '' }}">
                                            <i class="far {{ in_array(Route::currentRouteName(), $subSubMenu) ? 'fa-check-circle' : 'fa-circle' }} nav-icon"></i>
                                            <p>Users</p>
                                        </a>
                                    </li>

                                </ul>
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
                        <h1 class="m-0"> @yield('title') </h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Design & Developed By <a target="_blank" href="https://techandbyte.com">Tech@Byte</a>
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2022-{{ date('Y') }} <a href="{{ route('dashboard') }}">{{ config('app.name') }}</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('themes/backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('themes/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Select2 -->
<script src="{{ asset('themes/backend/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('themes/backend/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('themes/backend/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('themes/backend/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('themes/backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('themes/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('themes/backend/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('themes/backend/plugins/toastr/toastr.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('themes/backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('themes/backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- bootstrap datepicker -->
<script src="{{ asset('themes/backend/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>


<script src="{{ asset('themes/backend/dist/js/sweetalert2@9.js') }}"></script>
<script>
    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var message = '{{ session('message') }}';
        var error = '{{ session('error') }}';

        if (!window.performance || window.performance.navigation.type != window.performance.navigation.TYPE_BACK_FORWARD) {
            if (message != '')
                $(document).Toasts('create', {
                    icon: 'fas fa-envelope fa-lg',
                    class: 'bg-success',
                    title: 'Success',
                    autohide: true,
                    delay: 2000,
                    body: message
                })

            if (error != '')
                $(document).Toasts('create', {
                    icon: 'fas fa-envelope fa-lg',
                    class: 'bg-danger',
                    title: 'Error',
                    autohide: true,
                    delay: 2000,
                    body: error
                })
        }
    });
    function jsNumberFormat(yourNumber) {
        //Seperates the components of the number
        var n= yourNumber.toString().split(".");
        //Comma-fies the first part
        n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        //Combines the two sections
        return n.join(".");
    }
</script>

<script>
    $(function () {

        //Date picker
        $('.date-picker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
        });

        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd-mm-yyyy', { 'placeholder': 'dd-mm-yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm-dd-yyyy', { 'placeholder': 'mm-dd-yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Date and time picker
        $('.date-time').datetimepicker({
            format: 'DD-MM-YYYY hh:mm A',
            icons: { time: 'far fa-clock' }
        });
        //Date and time picker
        $('.date,.start_date,.end_date').datetimepicker({
            format: 'DD-MM-YYYY',
        });
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM-DD-YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })
</script>
<script>
    $(function () {

        //Date picker
        $( ".date-picker" ).datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
        });
        //Date picker

        // $('.month-picker').MonthPicker({
        //     Button: false,
        // });

        $("#financial_year").change(function(){
            let FYear = $(this).val();
            if (FYear !== ''){
                fiscalYearDateRange(FYear)
                $('.date-picker-fiscal-year').prop('readonly', false);
                $('.date-picker-fiscal-year').attr("placeholder", "Enter Date");
            }else{
                $('.date-picker-fiscal-year').prop('readonly', true);
                $('.date-picker-fiscal-year').val(" ");
                $('.date-picker-fiscal-year').attr("placeholder", "Enter Date");
            }
        })
        $("#financial_year").trigger('change');
        //Initialize Select2 Elements
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })


        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()
        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()
        $('.my-colorpicker2').on('colorpickerChange', function (event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })
        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })
    function fiscalYearDateRange(year){

        $( ".date-picker-fiscal-year" ).datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            minDate: '01-07-'+year,
            maxDate: '30-06-'+(parseFloat(year) + 1)
        });
    }
    function jsNumberFormat(yourNumber) {
        //Seperates the components of the number
        var n= yourNumber.toString().split(".");
        //Comma-fies the first part
        n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        //Combines the two sections
        return n.join(".");
    }
    function formSubmitConfirm(btnIdName){
        $('body').on('click', '#'+btnIdName, function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure to save?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#343a40',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Save It!'

            }).then((result) => {
                if (result.isConfirmed) {
                    $('form').submit();
                }
            })

        });
    }
    function customDateInit(){
        $( ".date-picker" ).datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
        });
    }
    function customSelect2Init(){
        $('.select2').select2()
    }
</script>
@yield('script')
<!-- AdminLTE App -->
<script src="{{ asset('themes/backend/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
