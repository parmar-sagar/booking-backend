<div class="leftside-menu">

    <!-- Logo Light -->
    <a href="index-2.html" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets/admin/images/logo.png')}}" alt="logo" height="22">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/admin/images/logo-sm.png')}}" alt="small logo" height="22">
        </span>
    </a>

    <!-- Logo Dark -->
    <a href="index-2.html" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('assets/admin/images/logo-dark.png')}}" alt="dark logo" height="22">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/admin/images/logo-dark-sm.png')}}" alt="small logo" height="22">
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <button type="button" class="bg-transparent button-sm-hover p-0" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </button>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="javascript:void(0)">
                <img src="{{ asset('assets/admin/images/users/avatar-1.jpg')}}" alt="user-image" height="42"
                    class="rounded-circle shadow-sm">
                <span class="leftbar-user-name">{{ Auth::user()->name }}</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a href="{{ url('admin/dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Apps</li>

            <li class="side-nav-item">
                <a href="{{ url('admin/users') }}" class="side-nav-link">
                    <i class="uil-users-alt"></i>
                    <span> Users </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a href="{{ url('admin/tours') }}" class="side-nav-link">
                    <i class="ri-t-box-fill"></i>
                    <span> Tours </span>
                </a>
            </li>            
            {{-- <li class="side-nav-title side-nav-item mt-1">Modules</li> --}}

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarManageVehicles" aria-expanded="false" aria-controls="sidebarManageVehicles"
                    class="side-nav-link">
                    <i class="ri-takeaway-fill"></i>
                    <span> Manage Vehicles </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarManageVehicles">
                    <ul class="side-nav-second-level">
                        <li class="side-nav-item">
                            <a href="{{ url('admin/includes') }}" class="side-nav-link">
                                <i class="ri-anticlockwise-2-line"></i>
                                <span> Includes </span>
                            </a>
                        </li>
            
                        <li class="side-nav-item">
                            <a href="{{ url('admin/highlights') }}" class="side-nav-link">
                                <i class="ri-magic-fill"></i>
                                <span> Highlights </span>
                            </a>
                        </li>
            
                        <li class="side-nav-item">
                            <a href="{{ url('admin/warnings') }}" class="side-nav-link">
                                <i class="ri-body-scan-fill"></i>
                                <span> Warnings </span>
                            </a>
                        </li>
            
                        <li class="side-nav-item">
                            <a href="{{ url('admin/vehicles') }}" class="side-nav-link">
                                <i class="ri-motorbike-fill"></i>
                                <span> Vehicles </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="{{ url('admin/coupons') }}" class="side-nav-link">
                    <i class="ri-shield-user-line"></i>
                    <span> Coupons </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ url('admin/times') }}" class="side-nav-link">
                    <i class="ri-time-line"></i>
                    <span> Times </span>
                </a>
            </li>
        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>