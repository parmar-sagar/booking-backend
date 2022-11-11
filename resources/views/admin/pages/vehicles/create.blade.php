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
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="@if(isset($objData->name) && $objData->name){{ $objData->name }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" required>@if(isset($objData->description) && $objData->description){{ $objData->description }}@endif</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="description" class="form-label">Tour Name</label>
                            <select class="form-control select2" data-toggle="select2" name="tour_id">
                                <option>Select</option>
                                @foreach($tourName as $tours)
                                    <option value="{{$tours->id}}">{{$tours->name}}</option>
                                @endforeach    
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="description" class="form-label">Features</label>
                            <select class="form-control select2" data-toggle="select2" name="features">
                                <option>Select</option>
                                @foreach($tourName as $tours)
                                    <option value="features">{{$tours->name}}</option>
                                @endforeach    
                            </select>
                        </div>
                    </div> --}}
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="description" class="form-label">Includes</label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" name="includes[]" multiple="multiple" data-placeholder="Choose ...">
                                @foreach($include as $include_)
                                <option value="{{$include_->name}}">{{$include_->name}}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    
                    {{-- <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" id="image" class="form-control" name="image" @if(!isset($objData)) required @endif>
                            @if(isset($objData->image))
                                <img src="{{ asset('storage/' . $objData->image) }}" width="50" class="mt-3">
                            @endif
                        </div>
                    </div> --}}
                    <div class="col-auto">
                        <button type="submit" class="btn btn-success mb-2">Submit</button>
                    </div>
                </div>
            </form>
            <!-- end row--> 
        </div> <!-- end card-body -->
    </div> <!-- end card -->
</div><!-- end col -->
    <script src="{{ asset('assets/admin/vendor/select2/js/select2.min.js')}}"></script>