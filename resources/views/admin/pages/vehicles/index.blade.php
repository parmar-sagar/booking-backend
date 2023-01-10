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
                    <div>
                        <p><span style="color:red">Note : </span>Tour name can be selected as added before in tour Module. Time can be selected as added in manage master. Other details will 
                            be selected as added in manage vehicle module.</p>
                    </div>
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
                                    <th>Short Name</th>
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
        <link href="{{ asset('assets/admin/vendor/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    </x-slot> 
       
    <x-slot name="scripts">
        <!-- Custom App js -->
        <script src="{{ asset('admin/js/vehicles.js') }}"></script>
        <script src="{{ asset('assets/admin/vendor/select2/js/select2.min.js') }}"></script>
    </x-slot>    
</x-admin.master-layout>