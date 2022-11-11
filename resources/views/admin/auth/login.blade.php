<!DOCTYPE html>
<html lang="en" data-layout-mode="detached" data-topbar-color="dark" data-sidenav-color="light" data-sidenav-user="true">
    <head>
        <meta charset="utf-8" />
        <title>Login | {{ config('app.name') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">
        
        <!-- Theme Config Js -->
        <script src="{{ asset('assets/admin/js/hyper-config.js') }}"></script>

        <!-- Icons css -->
        <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{ asset('assets/admin/css/app-modern.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    </head>
    
    <body class="authentication-bg">
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">

                            <!-- Logo -->
                            <div class="card-header pt-4 pb-4 text-center bg-primary">
                                <a href="index-2.html">
                                    <span><img src="{{ asset('assets/admin/images/logo.png') }}" alt="logo" height="22"></span>
                                </a>
                            </div>

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                                    <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
                                </div>

                                <form method="POST" action="{{ route('admin.login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <x-admin.input-label for="email" :value="__('Email')" />

                                        <x-admin.text-input id="email" type="email" name="email" :value="old('email')" required autofocus />

                                        <x-admin.input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <div class="mb-3">
                                        @if (Route::has('password.request'))
                                            <a class="text-muted float-end" href="{{ route('password.request') }}">
                                                <small>Forgot your password?</small>
                                            </a>
                                        @endif
                                        <x-admin.input-label for="password" :value="__('Password')" />
                                        
                                        <div class="input-group input-group-merge">
                                            <x-admin.text-input type="password" id="password" type="password"
                                            name="password" required autocomplete="current-password"/>
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>

                                        <x-admin.input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <div class="mb-3 mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="mb-3 mb-0 text-center">
                                        <x-admin.primary-button>
                                            {{ __('Log in') }}
                                        </x-admin.primary-button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <footer class="footer footer-alt">
            2022 - <script>document.write(new Date().getFullYear())</script> © {{ config('app.name') }}
        </footer>
        <!-- Vendor js -->
        <script src="{{ asset('assets/admin/js/vendor.min.js') }}"></script>
        
        <!-- App js -->
        <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>

    </body>
</html>
