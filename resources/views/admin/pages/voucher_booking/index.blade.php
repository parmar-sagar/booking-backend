<x-admin.master-layout>
    <!-- start page title -->
    <x-slot name="pageName">
        {{ $pageName }}
    </x-slot>
    <!-- end page title -->
    <div class="row" id="content-table">
    <div class="row">
                <div class="col-sm-3">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-account-multiple widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Total No Of Voucher Booking</h5>
                            <h3 class="mt-3 mb-3">{{$totalVbooking}}</h3>
                            <!-- <p class="mb-0 text-muted">
                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                                <span class="text-nowrap">Since last month</span>  
                            </p> -->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
    
                <div class="col-sm-3">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Total Redeem Voucher</h5>
                            <h3 class="mt-3 mb-3">{{$redeemedVoucher}}</h3>
                            <!-- <p class="mb-0 text-muted">
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p> -->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-sm-3">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Today Redeemed</h5>
                            <h3 class="mt-3 mb-3">{{$todayRedeemed}}</h3>
                            <!-- <p class="mb-0 text-muted">
                                <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 1.08%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p> -->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
                <div class="col-sm-3">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="mdi mdi-account-multiple widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Unredeem Voucher</h5>
                            <h3 class="mt-3 mb-3">{{$unRedeemVoucher}}</h3>
                            <!-- <p class="mb-0 text-muted">
                                <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                                <span class="text-nowrap">Since last month</span>  
                            </p> -->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- Filter -->
        <div class="col-lg-3">
        <label for="example-date" class="form-label">Voucher Status</label>
            <select name="filter" id="filter" class="select2 form-control">
                <option value="">All</option>
                <option value="2">Redeemed</option>
                <option value="1">Unredeemed</option>
               
            </select>
        </div>
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="example-date" class="form-label">Start Date</label>
                <input type="date" name="startDate" class="form-control" id="start-date" value="">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="example-date" class="form-label">End Date</label>
                <input type="date" name="EndDate" class="form-control" id="end-date" value="">
            </div>
        </div>
        <div class="col-lg-3 d-flex align-items-center">
            <div class="mb-0 mt-2">
            <button type="submit" id="submit-filter" class="btn btn-success mb-2">Submit</button>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-centered w-100 dt-responsive nowrap" id="dataTable" data-table-ajax="true" data-table-href="{{ $dataTables }}" data-edit-href="">
                            <thead class="table-light">
                                <tr>
                                    <th>Booking Id</th>
                                    <th>Number of People </th>
                                    <th>Ammount</th>
                                    <th>Payment Status</th>
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
<div class="modal fade" id="myModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered" id="modelData">
    
  </div>
</div>

    <!-- end row -->   
    <x-slot name="scripts">
    <script src="{{ asset('admin/js/voucher_bookings.js') }}"></script>
@if(Session::get('error'))
<script>toastr.error("{{Session::get('error')}}")</script>
@endif
@if(Session::get('success'))
<script>toastr.success("{{Session::get('success')}}")</script>
@endif
        <!-- Custom App js -->
        <script>$(document).ready(function(){
            $('body').on('click','#redeem',function(){
                 var id = $(this).data('id');
                 $.ajax({
                        type:'post',
                        url:'voucher-bookings/voucher-details',
                        data:{id:id,  _token: "{{ csrf_token() }}"},
                        success:function(data){
                            $('#myModal').modal('show'); 
                            $('#modelData').html(data);
                           
                        }
                    });
           });
       });
        /* Submit Code Using Ajax */
$(document).on('submit','#submit-code',function(e){
    e.preventDefault();
    
    $.ajax({
        type: $(this).prop('method'),
        url: $(this).prop('action'),
        data:new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            if((response.error)){
                toastr.error(response.error)
            }else{
                $('#content-form, #content-table').toggle();
                $('#myModal').modal('hide'); 
                location.reload();
                toastr.success(response.success)
            }
        },error: function (error){
            toastr.error("Something is wrong")
        }
    });
});
</script>

    </x-slot>    
</x-admin.master-layout>