<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h4 class="header-title">{{ $pageName }}</h4>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-danger mb-2 goBack"><i class="mdi mdi-step-backward-2 me-2"></i>Back To Listing</button>
                </div>
            </div>
            <form id="submit-form" action="{{ $action }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @if(isset($objData))
                    <input type="hidden" value="{{ $objData->id }}" name="id">
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="@if(isset($objData) && $objData->name){{ $objData->name }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" required rows="4">@if(isset($objData) && $objData->description){{ $objData->description }}@endif</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="min_age" class="form-label">Minimum Age</label>
                            <input type="number" min="1" id="min_age" class="form-control" name="min_age" value="@if(isset($objData) && $objData->min_age){{ $objData->min_age }}@endif">
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="availability" class="form-label">Availability</label>
                            <input type="text" id="availability" class="form-control" name="availability" value="@if(isset($objData) && $objData->availability){{ $objData->availability }}@endif">
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="mb-3">
                            <input type="text" id="option1" class="form-control" name="option1" value="@if(isset($objData) && $objData->option1){{ $objData->option1 }}@endif">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <input type="text" id="option2" class="form-control" name="option2" value="@if(isset($objData) && $objData->option2){{ $objData->option2 }}@endif">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <input type="text" id="option3" class="form-control" name="option3" value="@if(isset($objData) && $objData->option3){{ $objData->option3 }}@endif">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                           <input type="text" id="option4" class="form-control" name="option4" value="@if(isset($objData) && $objData->option4){{ $objData->option4 }}@endif">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                          <input type="text" id="option5" class="form-control" name="option5" value="@if(isset($objData) && $objData->option5){{ $objData->option5 }}@endif">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                          <input type="text" id="option6" class="form-control" name="option6" value="@if(isset($objData) && $objData->option6){{ $objData->option6 }}@endif">
                        </div>
                    </div>
                    <!--original code begins-->
                    <!--<div class="col-lg-6">-->
                    <!--    <div class="mb-3">-->
                    <!--        <label for="convoy_leader" class="form-label">Convoy Leader</label>-->
                    <!--        <input type="text" id="convoy_leader" class="form-control" name="convoy_leader" value="@if(isset($objData->convoy_leader) && $objData->convoy_leader){{ $objData->convoy_leader }}@endif">-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-lg-6">-->
                    <!--    <div class="mb-3">-->
                    <!--        <label for="tour_guide" class="form-label">Tour Guide</label>-->
                    <!--        <input type="text" id="tour_guide" class="form-control" name="tour_guide" value="@if(isset($objData->tour_guide) && $objData->tour_guide){{ $objData->tour_guide }}@endif" >-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-lg-6">-->
                    <!--    <div class="mb-3">-->
                    <!--        <label for="pickup_and_drop" class="form-label">Pickup & Drop off </label>-->
                    <!--        <input type="text" id="pickup_and_drop" class="form-control" name="pickup_and_drop" value="@if(isset($objData->pickup_and_drop) && $objData->pickup_and_drop){{ $objData->pickup_and_drop }}@endif" placeholder="ex- Dubai to Sharjah">-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-lg-6">-->
                    <!--    <div class="mb-3">-->
                    <!--        <label for="time_ids" class="form-label">Times</label>-->
                    <!--        <select  class="select2 form-control select2-multiple" id="time_ids" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." name="time_ids[]">-->
                    <!--            @foreach($times as $value)-->
                    <!--                <option value="{{$value->id}}" @if(isset($objData->time_ids) && in_array($value->id,$objData->time_ids)) selected @endif>{{$value->time."  ".$value->type}}</option>-->
                    <!--            @endforeach    -->
                    <!--        </select>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-lg-6">-->
                    <!--    <label for="location_id" class="form-label">Location</label>-->
                    <!--        <select class="form-control select2" data-toggle="select2" id="location_id" name="location_id" required>-->
                    <!--            <option>Select</option>-->
                    <!--            @foreach($locations as $value)-->
                    <!--                <option value="{{$value->id}}" @if(isset($objData->location_id) && $objData->location_id == $value->id) selected @endif>{{$value->name}}</option>-->
                    <!--            @endforeach    -->
                    <!--        </select>-->
                    <!--</div>-->
                    <!--<div class="col-lg-6">-->
                    <!--    <div class="mb-3">-->
                    <!--        <label for="safety_gear_ids" class="form-label">Safety Gears</label>-->
                    <!--        <select class="select2 form-control select2-multiple" id="safety_gear_ids" data-toggle="select2" name="safety_gear_ids[]" multiple="multiple" data-placeholder="Choose ...">-->
                    <!--            @foreach($safetyGears as $value)-->
                    <!--            <option value="{{$value->id}}" @if(isset($objData->safety_gear_ids) && in_array($value->id, $objData->safety_gear_ids)) selected @endif>{{$value->title}}</option>-->
                    <!--            @endforeach  -->
                    <!--        </select>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--<div class="col-lg-6">-->
                    <!--    <div class="mb-3">-->
                    <!--        <label for="refreshments_ids" class="form-label">Refreshments</label>-->
                    <!--        <select class="select2 form-control select2-multiple" id="refreshments_ids" data-toggle="select2" name="refreshments_ids[]" multiple="multiple" data-placeholder="Choose ...">-->
                    <!--            @foreach($refreshments as $value)-->
                    <!--            <option value="{{$value->id}}" @if(isset($objData->refreshments_ids) && in_array($value->id, $objData->refreshments_ids)) selected @endif>{{$value->title}}</option>-->
                    <!--            @endforeach  -->
                    <!--        </select>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!--original code ends-->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" id="image" accept=".png, .jpg, .jpeg" class="form-control" name="image" @if(!isset($objData)) required @endif>
                            @if(isset($objData))
                                <img src="{{ asset('admin/uploads/tour/' . $objData->image) }}" width="50" class="mt-3">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="banner_img" class="form-label">Banner Image</label>
                            <input type="file" id="banner_img" accept=".png, .jpg, .jpeg" class="form-control" name="banner_img" @if(!isset($objData)) required @endif>
                            @if(isset($objData->banner_img))
                                <img src="{{ asset('admin/uploads/tour/' . $objData->banner_img) }}" width="50" class="mt-3">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="gallry_images" class="form-label">Gallery Image</label>
                            <input type="file" id="gallry_images" accept=".png, .jpg, .jpeg" class="form-control" name="gallry_images[]"  @if(!isset($objData)) required @endif multiple />
                            @if(isset($gallaryImages))
                                @foreach($gallaryImages as $tourGallary)
                                    <img src="{{ asset('admin/uploads/gallry_images/'.$tourGallary->gallry_images) }}" width="80" class="mt-3">
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="sequence" class="form-label">Sequence</label>
                            <input type="number" min="0" id="sequence" class="form-control" name="sequence" value="@if(isset($objData)){{ $objData->sequence }}@endif">
                        </div>
                    </div>
                     <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="location_id" class="form-label">Location</label>
                            <select class="form-control select2" data-toggle="select2" id="location_id" name="location_id" required>
                                <option>Select</option>
                                @foreach($locations as $value)
                                    <option value="{{$value->id}}" @if(isset($objData) && $objData->location_id == $value->id) selected @endif>{{$value->name}}</option>
                                @endforeach    
                            </select>
                        </div>
                    </div>
            
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="supplier_id" class="form-label">Select Supplier</label>
                            <select  class="select2 form-control select2-multiple" id="supplier_id" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." name="supplier_id">
                                @foreach($suppliers as $value)
                                    <option value="{{$value->id}}" @if(isset($objData) && $objData->supplier_id == $value->id) selected @endif>{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="active" name="status" class="form-check-input" value="1" @if(isset($objData) && $objData->status == 1) checked @endif checked>
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="inactive" name="status" class="form-check-input" value="0" @if(isset($objData) && $objData->status == 0) checked @endif>
                                    <label class="form-check-label" for="inactive">InActive</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Voucher Booking </label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="voucher-active" name="voucher_status" class="form-check-input" value="1" @if(isset($objData) && $objData->voucher_status == 1) checked @endif>
                                    <label class="form-check-label" for="voucher-active">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="voucher-inactive" name="voucher_status" class="form-check-input" value="0" @if(isset($objData) && $objData->voucher_status == 0) checked @endif>
                                    <label class="form-check-label" for="voucher-inactive">InActive</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 voucherGenrate" style="@if(isset($objData) && $objData->voucher_status == 1) ? 'display:block';'display:none'@endif display:none" >
                        <div class="mb-3">
                            <label for="status" class="form-label">Voucher Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="fixed_voucher_active" name="fixed_voucher_status" class="form-check-input" value="1" @if(isset($objData) && $objData->fixed_voucher_status == 1) checked @endif checked>
                                    <label class="form-check-label" for="fixed_voucher_active">Fixed Dated Voucher</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="fixed_voucher_inactive" name="fixed_voucher_status" class="form-check-input" value="0" @if(isset($objData) && $objData->fixed_voucher_status == 0) checked @endif>
                                    <label class="form-check-label" for="fixed_voucher_inactive">Open Dated Voucher</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row voucherGenrate"  style="@if(isset($objData) && $objData->voucher_status == 1) ? 'display:block';'display:none'@endif display:none" >
                        <div class="col-lg-4">
                            <div class="mb-3">
                              <label for="example-date" class="form-label">Voucher Expiry Date</label>
                              <input type="date" name="voucher_expiry_date" class="form-control" id="example-date" value="@if(isset($objData)){{ date('Y-m-d',strtotime($objData->voucher_expiry_date)) }}@endif">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="sequence" class="form-label">Voucher</label>
                                <input type="text" readonly id="voucherValue" name="voucher" class="form-control" value="@if(isset($objData) && $objData->voucher){{ $objData->voucher }}@endif">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="sequence" class="form-label">Security Code</label>
                                <input type="text" readonly id="securityValue" name="security_code" class="form-control" value="@if(isset($objData) && $objData->security_code){{ $objData->security_code }}@endif">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success mb-2">Submit</button>
                </div>
            </form>
            <!-- end row--> 
        </div> <!-- end card-body -->
    </div> <!-- end card -->
</div><!-- end col -->
<script>
$('.select2').select2();
$(document).ready(function(){
  $('#voucher-active').on('click',function(){
     $('.voucherGenrate').show();
     $.ajax({
           type:'POST',
           url:'tours/genrate-voucher',
           data: {
                "_token": "{{ csrf_token() }}",
                },
           success:function(data){
            console.log(data.voucherCode)
            $('#voucherValue').val(data.voucherCode);
            $('#securityValue').val(data.securityCode);
            $('#hidden').val(data);
           }
        });
  })
  $('#voucher-inactive').on('click',function(){
     $('.voucherGenrate').hide();
  })
});
</script>
 