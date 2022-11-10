<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                    <li class="breadcrumb-item active">Data Tables</li>
                </ol>
            </div>
            {{-- <h4 class="page-title">Data Tables</h4> --}}
        </div>
    </div>   
    <div class="container">
        <div class="btn-holder">
            <a href="javascript:void(0)" class="btn btn-primary font-weight-bolder loadMainPage"><i class="la la-plus"></i>Back</a>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">{{$pageName}}</h4>
                <div class="tab-content">
                    <div class="tab-pane show active">
                        <form  method="POST" action="{{$action}}" id="submitForm">
                            @csrf   
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Name</label>
                                <input type="text" class="form-control" id="name" name='name' required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Image</label>
                                <input class="form-control" type="file" name="image" accept=".png, .jpg, .jpeg" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustomUsername">Short Description</label>
                                    <input type="text" class="form-control" id="short_description" name="short_description" aria-describedby="inputGroupPrepend" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom03">Description</label>
                                <input type="text" class="form-control" id="description" name="description" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="status" value="" @if(isset($ObjData) && $ObjData->status == 'ACTIVE')) checked @endif>
                                </div>  
                            </div>
                            <button class="btn btn-primary" type="submit" id="submitButton" >Submit</button>
                        </form>                        
                    </div> <!-- end preview-->
                </div> <!-- end tab-content-->
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div> 