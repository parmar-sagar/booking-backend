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
                            <label for="vehicleId" class="form-label">Vehicle</label>
                            <select class="form-control select2" data-toggle="select2" id="vehicleId" name="vehicleId">
                                <option>Select</option>
                                @foreach($vehicles as $vehicle)
                                    <option value="{{$vehicle->id}}" @if(isset($objData->id) && $objData->id == $vehicle->id) selected @endif>{{$vehicle->name}},(@if($vehicle->type == 'Tour') Tour @else Safari @endif)</option >
                                @endforeach    
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="discount" class="form-label">Discount (%)</label>
                            <input type="number" min="1" name="discount" class="form-control " id="discount" value="@if(isset($objData->discount) && $objData->discount){{ $objData->discount }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="sequence" class="form-label">Sequence</label>
                            <input type="number" min="0" name="sequence" class="form-control " id="sequence" value="@if(isset($objData->sequence) && $objData->sequence){{ $objData->sequence }}@endif">
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
    $("#expiryDate").datepicker({ 
        dateFormat: 'dd-mm-yy'
    });
</script>
 