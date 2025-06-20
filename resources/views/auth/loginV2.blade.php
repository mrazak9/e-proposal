<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description"
        content="e-Proposal - Institut Digital Ekonomi LPKIA. Pengajuan dan Persetujuan berbasis Elektronik bagi Organisasi Mahasiswa">
    <meta name="keywords" content="eproposal, electronic, lpkia, ide, institut, digital, ekonomi, bandung">
    <meta name="author" content="Sistem Informasi Manajemen - IDE LPKIA">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="{{ asset('images/thumb.jpg') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material/assets/img/apple-icon.png') }}">
    <title>
        e-Proposal - IDE LPKIA
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('material/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('material/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('material/assets/css/material-dashboard.css?v=3.0.2') }}" rel="stylesheet" />
</head>

<body class="bg-gray-200">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-image: url('/images/bg-login.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-info border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">e-Proposal</h4>
                                    <h6 class="text-white font-weight-bolder text-center mt-2 mb-0">Institut Digital
                                        Ekonomi LPKIA</h6>
                                    <div class="row mt-3">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (\Session::has('message'))
                                    <p class="alert alert-info">
                                        {{ \Session::get('message') }}
                                    </p>
                                @endif
                                <form class="text-start" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}
                                    <div class="input-group input-group-outline my-3">
                                        <input type="email" name="email"
                                            class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            value="{{ old('email', null) }}" autofocus placeholder="mail@mail.com"
                                            required>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                    <div class="input-group input-group-outline mb-3">
                                        <input type="password" name="password"
                                            class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            placeholder="********" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    <div class="text-center">
                                        <input type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2"
                                            value="login">
                                        <div class="col-12 text-center me-auto">
                                            <a class="btn btn-info px-3 w-100" href="{{ url('auth/google') }}">
                                                <i class="fa fa-google text-sm"></i> sign in with Fellow
                                            </a>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-12 col-md-6 my-auto">
                            <div class="copyright text-center text-sm text-white text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-grin" aria-hidden="true"></i> by
                                <a href="https://linkedin.com/in/gunadhip" class="font-weight-bold text-white"
                                    target="_blank">MIS LPKIA</a>
                                for a better web.
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
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('material/assets/js/material-dashboard.min.js?v=3.0.2') }}"></script>
</body>

</html>
