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
                            <label for="sequence" class="form-label">Sequence</label>
                            <input type="text" id="sequence" class="form-control" name="sequence" value="@if(isset($objData->sequence) && $objData->sequence){{ $objData->sequence }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" id="link" class="form-control" name="link" value="@if(isset($objData->link) && $objData->link){{ $objData->link }}@endif">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" id="image" class="form-control imgVdo" name="image" @if(!isset($objData)) required @endif>
                            @if(isset($objData->image))
                            <img src="{{ asset('admin/uploads/slider/' . $objData->image) }}" width="320" class="mt-3">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="video" class="form-label">Video</label>
                            <input type="file" id="video" class="form-control imgVdo" name="video" @if(!isset($objData)) required @endif>
                            @if(isset($objData->video))
                            <video width="320" height="240" controls>
                                <source src="{{ asset('admin/uploads/slider/' . $objData->video) }}" type="video/mp4">
                            </video>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="typeImg" name="type" class="form-check-input" value="image" @if(isset($objData) && $objData->type == 'image')) checked @endif checked>
                                    <label class="form-check-label" for="active">Image</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="typeVdo" name="type" class="form-check-input" value="video" @if(isset($objData) && $objData->type == 'video')) checked @endif>
                                    <label class="form-check-label" for="inactive">Video</label>
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success mb-2">Submit</button>
                        </div>
                    </div>
            </form>
            <!-- end row--> 
        </div> <!-- end card-body -->
    </div> <!-- end card -->
</div><!-- end col -->
