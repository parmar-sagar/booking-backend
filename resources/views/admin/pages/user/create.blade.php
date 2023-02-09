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
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" id="first_name" class="form-control" name="first_name" value="@if(isset($objData->first_name) && $objData->first_name){{ $objData->first_name }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" id="last_name" class="form-control" name="last_name" value="@if(isset($objData->last_name) && $objData->last_name){{ $objData->last_name }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" name="email" value="@if(isset($objData->email) && $objData->email){{ $objData->email }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="number" id="mobile" class="form-control" name="mobile" value="@if(isset($objData->mobile) && $objData->mobile){{ $objData->mobile }}@endif" required>
                        </div>
                    </div>
                    @if(!isset($objData))
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" name="password" required>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input type="file" id="photo" class="form-control" name="photo" @if(!isset($objData)) required @endif>
                            @if(isset($objData->photo))
                                <img src="{{ asset('admin/uploads/users/' . $objData->photo) }}" width="50" class="mt-3">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="active" name="status" class="form-check-input" value="1" checked>
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="inactive" name="status" class="form-check-input" value="0">
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