
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta content="{{ $konfigurasi->desc1 }}" name="description">
  <meta content="{{ $konfigurasi->keywords }}" name="keywords">
  <meta content="{{ $konfigurasi->author }}" name="author">

  <title>{{$konfigurasi->namaweb}} | Login</title>
<!-- Favicons -->
<link href="{{ asset('assets/landingpage/assets/img/favicon.png') }}" rel="icon">
<link href="{{ asset('assets/landingpage/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Custom fonts for this template-->
  <link href="{{asset('assets/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('assets/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center" style="margin-top: 150px;">

      <div class="col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Admin</h1>
                    @error('email')
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{$message}}
                        </div>
                    @enderror
                  </div>
                  <form class="user" method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user class="@error('email') is-invalid @enderror" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        {{ __('Login') }}
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('assets/admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('assets/admin/js/sb-admin-2.min.js')}}"></script>

</body>

</html>