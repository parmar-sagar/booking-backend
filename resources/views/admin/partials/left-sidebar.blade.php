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
                    <span> Manage Users </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#mngTours" aria-expanded="false" aria-controls="mngTours"
                    class="side-nav-link">
                    <i class="ri-hammer-fill"></i>
                    <span> Manage Tours </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="mngTours">
                    <ul class="side-nav-second-level">
                        <li class="side-nav-item">
                            <a href="{{ url('admin/tours') }}" class="side-nav-link">
                                <span> Tours </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('admin/tours/vehicles') }}" class="side-nav-link">
                                <span> Vehicles </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#mngSafari" aria-expanded="false" aria-controls="mngSafari"
                    class="side-nav-link">
                    <i class="ri-roadster-fill"></i>
                    <span> Manage Safari </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="mngSafari">
                    <ul class="side-nav-second-level">
                        <li class="side-nav-item">
                            <a href="{{ url('admin/safaris') }}" class="side-nav-link">
                                <span> Safari </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('admin/safaris/vehicles') }}" class="side-nav-link">
                                <span> Vehicles </span>
                            </a>
                        </li>
                    </ul>
                </div>
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
                            <a href="{{ url('admin/vehicles/includes') }}" class="side-nav-link">
                                <span> Includes </span>
                            </a>
                        </li>
            
                        <li class="side-nav-item">
                            <a href="{{ url('admin/vehicles/highlights') }}" class="side-nav-link">
                                <span> Not Includes </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('admin/vehicles/safety-gears') }}" class="side-nav-link">
                                <span> Safety Gears </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('admin/vehicles/refreshments') }}" class="side-nav-link">
                                <span> Refreshments </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('admin/vehicles/warnings') }}" class="side-nav-link">
                                <span> Must Know Befor You Book </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('admin/vehicles/activities') }}" class="side-nav-link">
                                <span> Extra Activities </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('admin/vehicles/additional-info') }}" class="side-nav-link">
                                <span> Additional Info </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#mngHomepage" aria-expanded="false" aria-controls="mngHomepage"
                    class="side-nav-link">
                    <i class="ri-home-3-line"></i>
                    <span> Manage Home </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="mngHomepage">
                    <ul class="side-nav-second-level">
                        <li class="side-nav-item">
                            <a href="{{ url('admin/home/tours') }}" class="side-nav-link">
                                <span> Home Tours </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('admin/home/sliders') }}" class="side-nav-link">
                                <span> Home Sliders </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#mngMaster" aria-expanded="false" aria-controls="mngMaster"
                    class="side-nav-link">
                    <i class="ri-npmjs-line"></i>
                    <span> Manage Master </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="mngMaster">
                    <ul class="side-nav-second-level">
                        <li class="side-nav-item">
                            <a href="{{ url('admin/locations') }}" class="side-nav-link">
                                {{-- <i class="ri-map-pin-2-line"></i> --}}
                                <span> Locations </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('admin/times') }}" class="side-nav-link">
                                {{-- <i class="ri-time-line"></i> --}}
                                <span> Times </span>
                            </a>
                        </li>
                        <li class="side-nav-item">
                            <a href="{{ url('admin/time-slotes') }}" class="side-nav-link">
                                {{-- <i class="ri-time-line"></i> --}}
                                <span> Times Slotes </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="{{ url('admin/coupons') }}" class="side-nav-link">
                    <i class="ri-coupon-2-line"></i>
                    <span> Coupons </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ url('admin/deals') }}" class="side-nav-link">
                    <i class="ri-shield-user-line"></i>
                    <span> Deals </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ url('admin/group-discount') }}" class="side-nav-link">
                    <i class="ri-shape-fill"></i>
                    <span> Group Discount </span>
                </a>
            </li>
        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>