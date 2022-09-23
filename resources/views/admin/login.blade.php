<!--
=========================================================
* Soft UI Dashboard PRO - v1.0.5
=========================================================

* Product Page:  https://www.creative-tim.com/product/soft-ui-dashboard-pro
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/admin/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/admin/img/favicon.png') }}">
    <title>
        Mukta
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/admin/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('assets/admin/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/admin/css/soft-ui-dashboard.css?v=1.0.5') }}" rel="stylesheet" />
    <style>
        .oblique {
            overflow: visible;
        }
    </style>
</head>

<body class="">

    <main class="main-content main-content-bg mt-0">
        <section>
            <div class="page-header" style="height: 100vh;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                @include('admin.inc.validation_message')
                                @include('admin.inc.auth_message')
                                <div class="card-header pb-0 text-start">
                                    <h3 class="font-weight-bolder text-info text-gradient">Welcome Admin!</h3>

                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.login') }}" method="post" class="text-start">
                                        @csrf
                                        <label>Email</label>
                                        <div class="mb-3">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Email" aria-label="Email">
                                        </div>
                                        <label>Password</label>
                                        <div class="mb-3">
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password" aria-label="Password">
                                        </div>

                                        <div class="flex items-center justify-end mt-4 align-middle ">
                                            <a href="{{ route('auth.google') }}">
                                                <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
                                            </a>
                                        </div>

                                        <div class="mb-3">
                                            <button class="btn"
                                                style="    background-color: #fd5a40;
                                            color: #fff;"
                                                type="submit">Submit</button>
                                        </div>
                                        {{-- <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="rememberMe"
                                                checked="">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div> --}}
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto z-index-0 ms-n6">
                                    <img class="w-100" src="{{ asset('public/logo/login-logo.jpg') }}" alt=""
                                        style="height:100vh;object-fit: cover;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <!--   Core JS Files   -->
    <script src="{{ asset('assets/admin/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <!-- Kanban scripts -->
    <script src="{{ asset('assets/admin/js/plugins/dragula/dragula.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/plugins/jkanban/jkanban.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/admin/js/soft-ui-dashboard.min.js?v=1.0.5') }}"></script>
</body>

</html>
