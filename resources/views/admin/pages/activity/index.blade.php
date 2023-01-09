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
                        <p><span style="color:red">Note : </span> {{ $pageName }} that can be performed with the Vehicle</p>
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
                                    <th>Price</th>
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
    <x-slot name="scripts">
        <!-- Custom App js -->
        <script src="{{ asset('admin/js/include.js') }}"></script>
    </x-slot>    
</x-admin.master-layout>