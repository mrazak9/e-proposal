<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>
            @yield('template_title') | e-Proposal
        </title>
        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css"
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome-animation.css') }}" />
        <!-- Nucleo Icons -->
        <link href="{{ asset('material/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('material/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <!-- CSS Files -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
        <link id="pagestyle" href="{{ asset('material/assets/css/material-dashboard.css') }}" rel="stylesheet" />
        <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>
        @stack('custom-scripts')

        <script>
            tinymce.init({
                selector: '#tinymce'
            });
        </script>
    </head>

    <body class="g-sidenav-show  bg-gray-200">
        <link href="{{ asset('/css/bootstrap-datepicker.css') }}" rel="stylesheet">
        <script src="{{ asset('/js/jquery.js') }}"></script>
        <script src="{{ asset('/js/jquery.mask.js') }}"></script>
        <script src="{{ asset('/js/bootstrap-datepicker.js') }}"></script>
        @include('partials.menu')
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            @include('partials.navbar')
            <div class="container-fluid py-4">
                @yield('content')


                <footer class="footer py-4  ">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <div class="copyright text-center text-sm text-muted text-lg-start">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script>,
                                    made with <i class="bi bi-cup-fill"></i> by
                                    <a href="https://www.linkedin.com/in/gunadhip/" class="font-weight-bold"
                                        target="_blank">MIS
                                        LPKIA</a>
                                    for a better productivity.
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </main>
        <!--   Core JS Files   -->
        <script src="{{ asset('material/assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('material/assets/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('material/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('material/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script src="{{ asset('material/assets/js/plugins/chartjs.min.js') }}"></script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('material/assets/js/material-dashboard.min.js?v=3.0.2') }}"></script>
        @yield('scripts')
        @yield('javascript')
    </body>

</html>
