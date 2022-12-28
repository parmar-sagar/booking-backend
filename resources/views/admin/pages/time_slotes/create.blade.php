<div class="col-12">
    <div class="card">
        <div class="card-body">
            {{-- <div>
                <p><span style="color:red">Note : </span> Time can be managed here that is to be shown in safari and tour module. These can be added, removed and modified</p>
            </div> --}}
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
                            <label for="text" class="form-label">Time</label>
                            <input type="text" id="time" class="form-control" name="text" value="@if(isset($objData->text) && $objData->text){{ $objData->text }}@endif" required>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="time_type" name="time_type" class="form-check-input" value="Minutes" @if(isset($objData->time_type) && $objData->time_type == 'Minutes') checked @endif checked>
                                    <label class="form-check-label" for="Minutes">Minutes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="time_type" name="time_type" class="form-check-input" value="Hours" @if(isset($objData->time_type) && $objData->time_type == 'Hours') checked @endif>
                                    <label class="form-check-label" for="Hours">Hours</label>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success mb-2">Submit</button>
                </div>
            </form>
            <!-- end row--> 
        </div> <!-- end card-body -->
    </div> <!-- end card -->
</div><!-- end col -->