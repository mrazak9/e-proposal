<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material/assets/img/apple-icon.png') }}">
  <title>
    e-Proposal - IDE LPKIA
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
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
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1519389950473-47ba0277781c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Login with</h4>
                  <div class="row mt-3">                    
                    <div class="col-12 text-center me-auto">
                      <a class="btn btn-link px-3" href="{{ url('auth/google') }}">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
				  <div align="center"><h4>or</h4></div>
				  @if(\Session::has('message'))
                        <p class="alert alert-info">
                            {{ \Session::get('message') }}
                        </p>
                @endif
                <form class="text-start" method="POST" action="{{ route('login') }}" >
					{{ csrf_field() }}
                  <div class="input-group input-group-outline my-3">
                    <input type="email" name="email" class="form-control" value="{{ old('email', null) }}" placeholder="mail@mail.com">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <input type="password" name="password" class="form-control" placeholder="********">
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                    <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
					  <input type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2" value="login">                    
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Forgot Password?
                    <a href="{{ route('password.request') }}" class="text-primary text-gradient font-weight-bold">Reset Password</a>
                  </p>
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
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-grin" aria-hidden="true"></i> by
                <a href="https://linkedin/in/gunadhip" class="font-weight-bold text-white" target="_blank">MIS LPKIA</a>
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