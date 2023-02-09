<x-admin.master-layout>
    <!-- start page title -->
    <x-slot name="pageName">
        {{ $pageName }}
    </x-slot>
    <!-- end page title -->
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ asset('assets/admin/images/users/avatar-1.jpg') }}" class="rounded-circle avatar-lg img-thumbnail"
                    alt="profile-image">

                    <h4 class="mb-0 mt-2">{{ Auth::user()->name }}</h4>
                    <p class="text-muted font-14">Super Admin</p>

                    <div class="text-start mt-4">
                        
                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">{{ Auth::user()->name }}</span></p>

                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2 ">{{ Auth::user()->email }}</span></p>
                    </div>

                </div> <!-- end card-body -->
            </div> <!-- end card -->

        </div> <!-- end col-->

        <div class="col-xl-8 col-lg-7">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                        <li class="nav-item">
                            <a href="#profile" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#change-password" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                                Change Password
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane  show active" id="profile">
                            <form id="submit-form" class="submit-form" action="{{ $action }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" placeholder="Enter Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="Enter Email" required>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                </div>
                            </form>
                        </div> <!-- end tab-pane -->
                        <!-- end profile section content -->

                        <div class="tab-pane" id="change-password">
                            <form id="submit-form-password" class="submit-form" action="{{ $action2 }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Change Password</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="confirm_password" class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter Confirm Password" required>
                                        </div>
                                    </div>
                                </div> <!-- end row -->

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Change Password</button>
                                </div>
                            </form>
                        </div>
                        <!-- end change password content-->
                    </div> <!-- end tab-content -->
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <x-slot name="scripts">
        <script src="{{ asset('admin/js/account.js') }}"></script>
    </x-slot>
</x-admin.master-layout>