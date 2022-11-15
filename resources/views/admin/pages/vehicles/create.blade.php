<link href="{{ asset('assets/admin/vendor/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
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
                            <label for="name" class="form-label">Shot Name</label>
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
                            <label for="description" class="form-label">Tour Name</label>
                            <select class="form-control select2" data-toggle="select2" name="tour_id">
                                <option>Select</option>
                                @foreach($tourName as $tours)
                                    <option value="{{$tours->id}}" @if(isset($objData->tour_id) && $objData->tour_id == $tours->id) selected @endif>{{$tours->name}}</option>
                                @endforeach    
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="description" class="form-label">Times</label>
                            <select  class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." name="time_ids[]">
                                @foreach($time as $time_tour)
                                    <option value="{{$time_tour->id}}"@if(isset($selctdTime)) @foreach($selctdTime as $Times) @if($Times == $time_tour->id) selected @endif @endforeach @endif>{{$time_tour->time}}</option>
                                @endforeach    
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="description" class="form-label">Includes</label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" name="includes_ids[]" multiple="multiple" data-placeholder="Choose ...">
                                @foreach($include as $include_)
                                <option value="{{$include_->id}}" @if(isset($selctdIncludes)) @foreach($selctdIncludes as $selctdInclude) @if($selctdInclude == $include_->id) selected @endif @endforeach @endif>{{$include_->title}}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="description" class="form-label">Highlights</label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" name="highlight_ids[]" multiple="multiple" data-placeholder="Choose ...">
                                @foreach($include as $include_)
                                <option value="{{$include_->id}}" @if(isset($selctdHighlight)) @foreach($selctdHighlight as $selctdHighlights) @if($selctdHighlights == $include_->id) selected @endif @endforeach @endif>{{$include_->title}}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="description" class="form-label">Warning</label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" name="warning_ids[]" multiple="multiple" data-placeholder="Choose ...">
                                @foreach($include as $include_)
                                <option value="{{$include_->id}}" @if(isset($selctdWarning)) @foreach($selctdWarning as $selctdWarnings) @if($selctdWarnings == $include_->id) selected @endif @endforeach @endif>{{$include_->title}}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="active" name="status" class="form-check-input" value="1" @if(isset($objData) && $objData->status ==1)) checked @endif checked>
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="inactive" name="status" class="form-check-input" value="0" @if(isset($objData) && $objData->status ==0)) checked @endif>
                                    <label class="form-check-label" for="inactive">InActive</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" id="image" class="form-control" name="image" @if(!isset($objData)) required @endif>
                            @if(isset($objData->image))
                            <img src="{{ asset('storage/' . $objData->image) }}" width="50" class="mt-3">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="image" class="form-label">Banner Image</label>
                            <input type="file" id="banner_img" class="form-control" name="banner_img" @if(!isset($objData)) required @endif>
                            @if(isset($objData->banner_img))
                            <img src="{{ asset('storage/' . $objData->banner_img) }}" width="50" class="mt-3">
                            @endif
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success mb-2">Submit</button>
                    </div>
                </div>
            </form>
            <!-- end row--> 
        </div> <!-- end card-body -->
    </div> <!-- end card -->
</div><!-- end col -->
<script>
    $('.select2').select2();
</script>