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
                            <label for="tourId" class="form-label">Tour Name</label>
                            <select class="form-control select2" data-toggle="select2" id="tourId" name="tourId" required>
                                <option>Select</option>
                                @foreach($tours as $value)
                                    <option value="{{$value->id}}" @if(isset($objData->id) && $objData->id == $value->id) selected @endif>{{$value->name}}</option>
                                @endforeach    
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="on_home_sequence" class="form-label">Sequance</label>
                            <input type="number" min="0" id="on_home_sequence" class="form-control" name="on_home_sequence" value="@if(isset($objData->on_home_sequence) && $objData->on_home_sequence){{ $objData->on_home_sequence }}@endif">
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