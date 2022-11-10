@extends('admin.layouts.master')
@section('title',$pageName)
@section('styles')
<!-- Datatables css -->
<link href="{{asset('assets/admin/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
  <!-- start page title -->
<div class="card-custom" id="kt_table_content">  
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Data Tables</li>
                    </ol>
                </div>
                {{-- <h4 class="page-title">Data Tables</h4> --}}
            </div>
        </div>
    </div>   
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <!--begin::Button-->
                <div class="container">
                    <div class="btn-holder">
                        <a href="javascript:void(0)" class="btn btn-primary font-weight-bolder openForm" data-url="{{$create}}"><i class="la la-plus"></i>New {{$pageName}}</a>
                    </div>
                </div>
                <!--end::Button-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="basic-datatable-preview">                                         
                            <table id="datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        {{-- <th>Sr.No</th> --}}
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
<div class="card card-custom" id="kt_table_form" style="display:none;">
</div>
@endsection

@section('scripts')
<!-- Datatables js -->
<script src="{{asset('assets/admin/vendor/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/admin/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('assets/admin/vendor/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/admin/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
<!-- Datatable Init js -->
<script src="{{asset('assets/admin/js/pages/demo.datatable-init.js')}}"></script>

<script type="text/javascript">
	var table = $('#datatable').DataTable({
		ordering: false,
		processing: true,
		serverSide: true,
		ajax: '{{$datatable}}',
		columns: [
			{data: 'name', name:'name' },
			{data: 'email', name:'email' },
            {data: 'mobile', name:'mobile' },
            {data: 'id', name:'id',searchable: false,class:'edit-list',
                    "render": function ( data, type, row, meta ) {
                        return '<a href="javascript:void(0)" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon mr-2 openForm" data-url="{{$edit}}/'+row.id+'" title="Edit details">\
                            <span class="svg-icon svg-icon-md"><i class="icon-md fas fa-edit">edit</i></span>\
                        </a>\
                        <a href="javascript:;" class="btn btn-sm btn-default btn-text-primary btn-hover-primary btn-icon delete" data-url="{{$delete}}/'+row.id+'" title="Delete">\
                            <span class="svg-icon svg-icon-md"><i class="icon-md fas fa-trash">delete</i></span>\
                        </a>';
                    }
                },
		],
	});
</script>

@endsection

