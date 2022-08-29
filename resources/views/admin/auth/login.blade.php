<!DOCTYPE html>
<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('backend')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('backend')}}/css/sb-admin-2.min.css" rel="stylesheet">
      <!-- noty -->
      <link rel="stylesheet" href="{{ asset('backend/vendor/noty/noty.css') }}">
      <script src="{{ asset('backend/vendor/noty/noty.min.js') }}"></script>
  </head>
  <body>


    @include('frontend.includes._sessions')

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="login-form" action="{{route('admin.dologin')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email"   class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                                @error('email')
                                                <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" required class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                                @error('password')
                                                <span class="text-danger"> {{ $message }}</span>
                                                @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Login
                                        </button>
                                        <div class="text-center">
                                            <a class="small" href="{{route('admin.register')}}">Create an Account!</a>
                                        </div>

                                        <hr>

                                    </form>
                                    <hr>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('backend')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('backend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('backend')}}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('backend')}}/js/sb-admin-2.min.js"></script>


  </body>
</html>
