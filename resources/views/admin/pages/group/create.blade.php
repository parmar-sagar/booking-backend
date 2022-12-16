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
                            <label for="no_of_vehicle" class="form-label">No Of Vehicles</label>
                            <input type="text" id="no_of_vehicle" class="form-control" name="no_of_vehicle" value="@if(isset($objData->no_of_vehicle) && $objData->no_of_vehicle){{ $objData->no_of_vehicle }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="discount" class="form-label">Discount (In Percentage)</label>
                            <input type="text" id="discount" class="form-control" name="discount" value="@if(isset($objData->no_of_vehicle) && $objData->no_of_vehicle){{ $objData->no_of_vehicle }}@endif" required>
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