<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-sidenav-color="light" data-sidenav-user="true">
<head>
        <meta charset="utf-8" />
        <title>Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
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

        <!-- Page Styles -->
        @if (isset($styles))
            {{ $styles }}
        @endif
        <style>
            .error{
                color:red;
                font-weight: bold;
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

        <script src="{{ asset('admin/js/custom.js') }}"></script>
        <!-- Page Scripts -->
        @if (isset($scripts))
            {{ $scripts }}
        @endif
    </body>

</html> 