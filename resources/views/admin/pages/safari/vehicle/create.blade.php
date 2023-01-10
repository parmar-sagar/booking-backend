<link href="{{ asset('assets/admin/vendor/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/vendor/quill/quill.core.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/admin/vendor/quill/quill.snow.css')}}" rel="stylesheet" type="text/css" />
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
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="@if(isset($objData->name) && $objData->name){{ $objData->name }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="short_name" class="form-label">Short Name</label>
                            <input type="text" id="short_name" class="form-control" name="short_name" value="@if(isset($objData->short_name) && $objData->short_name){{ $objData->short_name }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" required rows="4"> @if(isset($objData->description) && $objData->description){{ $objData->description }}@endif</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="tour_id" class="form-label">Tour Name</label>
                            <select class="form-control select2" id="tour_id" data-toggle="select2" name="tour_id">
                                <option>Select</option>
                                @foreach($tours as $value)
                                    <option value="{{$value->id}}" @if(isset($objData->tour_id) && $objData->tour_id == $value->id) selected @endif>{{$value->name}}</option>
                                @endforeach    
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="pickup_time" class="form-label">Pickup Time</label>
                            <input type="text" id="pickup_time" class="form-control" name="pickup_time" value="@if(isset($objData->pickup_time) && $objData->pickup_time){{ $objData->pickup_time }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="dropoff_time" class="form-label">Dropoff Time</label>
                            <input type="text" id="dropoff_time" class="form-control" name="dropoff_time" value="@if(isset($objData->dropoff_time) && $objData->dropoff_time){{ $objData->dropoff_time }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="no_of_persons" class="form-label">No Of Persons</label>
                            <input type="number" min="1" id="no_of_persons" class="form-control" name="no_of_persons" value="@if(isset($objData->no_of_persons) && $objData->no_of_persons){{ $objData->no_of_persons }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="includes_ids" class="form-label">Includes</label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" id="includes_ids" name="includes_ids[]" multiple="multiple" data-placeholder="Choose ...">
                                @foreach($includes as $value)
                                    <option value="{{$value->id}}" @if(isset($objData->includes_ids) && in_array($value->id,$objData->includes_ids)) selected @endif>{{$value->title}}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="highlight_ids" class="form-label">Not Includes</label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" name="highlight_ids[]" id="highlight_ids" multiple="multiple" data-placeholder="Choose ...">
                                @foreach($highlights as $value)
                                <option value="{{$value->id}}" @if(isset($objData->highlight_ids) && in_array($value->id, $objData->highlight_ids)) selected @endif>{{$value->title}}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="warning_ids" class="form-label">Must Know Befor You Book</label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" id="warning_ids" name="warning_ids[]" multiple="multiple" data-placeholder="Choose ...">
                                @foreach($warnings as $value)
                                    <option value="{{$value->id}}" @if(isset($objData->warning_ids) && in_array($value->id,$objData->warning_ids)) selected @endif>{{$value->title}}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="activities_ids" class="form-label">Extra Activities</label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" name="activities_ids[]" id="activities_ids" multiple="multiple" data-placeholder="Choose ...">
                                @foreach($activities as $value)
                                <option value="{{$value->id}}" @if(isset($objData->activities_ids) && in_array($value->id, $objData->activities_ids)) selected @endif>{{$value->title}}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="additional_info_ids" class="form-label">Additional Info</label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" name="additional_info_ids[]" id="additional_info_ids" multiple="multiple" data-placeholder="Choose ...">
                                @foreach($addInfos as $value)
                                    <option value="{{$value->id}}" @if(isset($objData->additional_info_ids) && in_array($value->id, $objData->additional_info_ids)) selected @endif>{{$value->title}}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="amount" class="form-label">Price</label>
                            <input type="number" id="amount" class="form-control" name="amount" value="@if(isset($objData->price->amount)){{ $objData->price->amount }}@endif" required>
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="tour_itenary" class="form-label">Tour Itenary</label>
                            <textarea id="summernote" name="tour_itenary">@if(isset($objData->tour_itenary) && $objData->tour_itenary){{ $objData->tour_itenary }}@endif</textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" id="image" class="form-control" name="image" @if(!isset($objData)) required @endif>
                            @if(isset($objData->image))
                                <img src="{{ asset('admin/uploads/vehicle/' . $objData->image) }}" width="50" class="mt-3">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="banner_img" class="form-label">Banner Image</label>
                            <input type="file" id="banner_img" class="form-control" name="banner_img" @if(!isset($objData)) required @endif>
                            @if(isset($objData->banner_img))
                                <img src="{{ asset('admin/uploads/vehicle/' . $objData->banner_img) }}" width="50" class="mt-3">
                            @endif
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

<script src="{{ asset('assets/admin/vendor/quill/quill.min.js')}}"></script>
<!-- quill Init js-->
<script src="{{ asset('assets/admin/js/pages/demo.quilljs.js')}}"></script>
<script>
    $('.select2').select2(); 
    $('#summernote').summernote({
        tabsize: 2,
        height: 200
      });  
</script>