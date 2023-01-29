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
                @if(isset($objData->id))
                    <input type="hidden" value="{{ $objData->id }}" name="id">
                @endif
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="@if(isset($objData->name) && $objData->name){{ $objData->name }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" required rows="4">@if(isset($objData->description) && $objData->description){{ $objData->description }}@endif</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="min_age" class="form-label">Minimum Age</label>
                            <input type="number" min="1" id="min_age" class="form-control" name="min_age" value="@if(isset($objData->min_age) && $objData->min_age){{ $objData->min_age }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="convoy_leader" class="form-label">Convoy Leader</label>
                            <input type="text" id="convoy_leader" class="form-control" name="convoy_leader" value="@if(isset($objData->convoy_leader) && $objData->convoy_leader){{ $objData->convoy_leader }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="tour_guide" class="form-label">Tour Guide</label>
                            <input type="text" id="tour_guide" class="form-control" name="tour_guide" value="@if(isset($objData->tour_guide) && $objData->tour_guide){{ $objData->tour_guide }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="pickup_and_drop" class="form-label">Pickup & Drop off </label>
                            <input type="text" id="pickup_and_drop" class="form-control" name="pickup_and_drop" value="@if(isset($objData->pickup_and_drop) && $objData->pickup_and_drop){{ $objData->pickup_and_drop }}@endif" placeholder="ex- Dubai to Sharjah" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="time_ids" class="form-label">Times</label>
                            <select  class="select2 form-control select2-multiple" data-toggle="select2" id="time_ids" multiple="multiple" data-placeholder="Choose ..." name="time_ids[]" required>
                                @foreach($times as $value)
                                    <option value="{{$value->id}}"@if(isset($objData->time_ids) && in_array($value->id, $objData->time_ids)) selected @endif>{{$value->time."  ".$value->type}}</option>
                                @endforeach    
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="location_id" class="form-label">Location</label>
                            <select class="form-control select2" data-toggle="select2" id="location_id" name="location_id" required>
                                <option>Select</option>
                                @foreach($locations as $value)
                                    <option value="{{$value->id}}" @if(isset($objData->location_id) && $objData->location_id == $value->id) selected @endif>{{$value->name}}</option>
                                @endforeach    
                            </select>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="safety_gear_ids" class="form-label">Safety Gears</label>
                            <select class="select2 form-control select2-multiple" id="safety_gear_ids" data-toggle="select2" name="safety_gear_ids[]" multiple="multiple" data-placeholder="Choose ...">
                                @foreach($safetyGears as $value)
                                <option value="{{$value->id}}" @if(isset($objData->safety_gear_ids) && in_array($value->id, $objData->safety_gear_ids)) selected @endif>{{$value->title}}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="refreshments_ids" class="form-label">Refreshments</label>
                            <select class="select2 form-control select2-multiple" id="refreshments_ids" data-toggle="select2" name="refreshments_ids[]" multiple="multiple" data-placeholder="Choose ...">
                                @foreach($refreshments as $value)
                                <option value="{{$value->id}}" @if(isset($objData->refreshments_ids) && in_array($value->id, $objData->refreshments_ids)) selected @endif>{{$value->title}}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" id="image" class="form-control" name="image" @if(!isset($objData)) required @endif>
                            @if(isset($objData->image))
                                <img src="{{ asset('admin/uploads/tour/' . $objData->image) }}" width="50" class="mt-3">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="banner_img" class="form-label">Banner Image</label>
                            <input type="file" id="banner_img" class="form-control" name="banner_img" @if(!isset($objData)) required @endif>
                            @if(isset($objData->banner_img))
                                <img src="{{ asset('admin/uploads/tour/' . $objData->banner_img) }}" width="50" class="mt-3">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="sequence" class="form-label">Sequence</label>
                            <input type="text" id="sequence" class="form-control" name="sequence" value="@if(isset($objData->sequence) && $objData->sequence){{ $objData->sequence }}@endif">
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
</script>
 