<div class="col-xl-6">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-3">Change Password</h4>
                <div id="basicwizard">
                    <ul class="nav nav-pills nav-justified form-wizard-header mb-4">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link rounded-0 py-2 goBack" > <i class="mdi mdi-face-man-profile font-18 align-middle me-1"></i> Close</a>
                        </li>
                    </ul>
                    <form id="submit-profile" action="{{ $action }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                    <div class="tab-pane" id="basictab2">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="id">
                        <div class="row">
                            <div class="col-12">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="password"> Password</label>
                                    <div class="col-md-9">
                                        <input type="password" id="password" name="password" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="confirm">Re Password</label>
                                    <div class="col-md-9">
                                        <input type="password" id="confirm" name="confirm" class="form-control" value="">
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        <div class="col-auto">
                            <button type="submit" class="btn btn-success mb-2">Submit</button>
                        </div>
                    </div>
                    </form>
                </div> <!-- tab-content -->
            </div> <!-- end #basicwizard-->
    </div> <!-- end card-body -->
</div> <!-- end card-->
</div> <!-- end col -->