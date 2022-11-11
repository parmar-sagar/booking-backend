<x-admin.master-layout>
    <!-- start page title -->
    <x-slot name="pageName">
        {{ $pageName }}
    </x-slot>
    <!-- end page title -->

    <div class="row" id="content-table">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="javascript:void(0);" class="btn btn-danger mb-2 open-form" data-create-href={{ $create }}><i class="mdi mdi-plus-circle me-2"></i> Add {{ $pageName }}</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered w-100 dt-responsive nowrap" id="dataTable" data-table-ajax="true" data-table-href="{{ $dataTables }}" data-delete-href="{{ $delete }}" data-edit-href="{{ $edit }}">
                            <thead class="table-light">
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Date & Time</th>
                                    <th>Status</th>
                                    <th style="width: 85px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <div class="row" id="content-form">
        
    </div>
    <!-- end row -->   
    <x-slot name="styles">
        <!-- Datatable css -->
        <link href="{{ asset('assets/admin/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/admin/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Plugin css -->
        <link rel="stylesheet" href="{{ asset('assets/admin/vendor/jquery-toast-plugin/jquery.toast.min.css') }}">
    </x-slot> 
    <x-slot name="scripts">
        <!-- Datatable js -->
        <script src="{{ asset('assets/admin/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
        <script src="{{ asset('assets/admin/vendor/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Custom App js -->
        <script src="{{ asset('admin/js/user.js') }}"></script>
    </x-slot>    
</x-admin.master-layout>