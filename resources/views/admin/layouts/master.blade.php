<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-sidenav-color="light" data-sidenav-user="true">
<head>
        <meta charset="utf-8" />
        <title>Dashboard | Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico')}}">
        <!-- Theme Config Js -->
        <script src="{{ asset('assets/admin/js/hyper-config.js')}}"></script>
        <!-- Icons css -->
        <link href="{{ asset('assets/admin/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="{{ asset('assets/admin/css/app-modern.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Datatable css -->
        <link href="{{ asset('assets/admin/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/admin/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Plugin css -->
        <link rel="stylesheet" href="{{ asset('assets/admin/vendor/jquery-toast-plugin/jquery.toast.min.css') }}">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
      
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"> 

        <!-- Page Styles -->
        @if (isset($styles))
            {{ $styles }}
        @endif
        <style>
            .error{
                color:red;
                font-weight: bold;
            }
            .genrate {
                align-items: center;
                display: grid;
            }
            .genrate .mb-3{
                margin-bottom : 0px !important;
            }
            #myModal div#modelData {
                max-width: 100%;
                display: flex;
                justify-content: center;
            }
            #myModal .modal-content {
                width: 1000px;
            }
            #myModal .modal-body {
                padding: 20px 24px;
            }
            .result{
                background-color: green;
                color:#fff;
                padding:20px;
            }
            .row{
                display:flex;
            }
            /* 06-04-23 */
            div#reader {
                width: 100% !important;
            }
            div#reader__scan_region {
                font-size: 70px;
            }
            span#reader__status_span {
                display: none;
            }
            div#reader__dashboard_section button {
                background-color: #35b8e0;
                color: #fff;
                border: 1px solid;
                padding: 8px 8px;
                border-radius: 4px;
            }
            @media(max-width:600px){
            .modal-content tr {
                display: grid;
            }
            .modal-content table.table.mb-0 {
                display: flex;
            }
            .modal-content tbody tr {
                border: #fff;
            }
            }
        </style>
    </head>

    <body>
        <!-- Begin page -->
        <div class="wrapper">

            
            <!-- ========== Topbar Start ========== -->
            @include('admin.partials.topbar')
            <!-- ========== Topbar End ========== -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('admin.partials.left-sidebar')
            <!-- ========== Left Sidebar End ========== -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        @if(isset($pageName))
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box">
                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                                                <li class="breadcrumb-item active">{{ $pageName }}</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">{{ $pageName }}</h4>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{ $slot }}

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

                <!-- Footer Start -->
                @include('admin.partials.footer')
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->     
        
        <!-- Vendor js -->
        <script src="{{ asset('assets/admin/js/vendor.min.js')}}"></script>
        <!-- App js -->
        <script src="{{ asset('assets/admin/js/app.min.js')}}"></script>

        <!-- Datatable js -->
        <script src="{{ asset('assets/admin/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="{{ asset('assets/admin/vendor/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="{{ asset('admin/js/custom.js') }}"></script>
        <script src="{{ asset('admin/js/html5-qrcode.min.js') }}"></script>
        <!-- Page Scripts -->
        @if (isset($scripts))
            {{ $scripts }}
        @endif
    </body>

</html> 