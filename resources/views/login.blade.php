<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel=”icon” href="{{url('assets/img/logo.png')}}">
  <title>Kecamatan Mangga Kulon - Login</title>
  <link href="{{url('../vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{url('../vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{url('../css/ruang-admin.min.css')}}" rel="stylesheet">

</head>
<body class="bg-gradient-success -login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login </h1>
                  </div>
                  <form action="/kirimdata" method="Post">
                      {{csrf_field()}}
              
                      <div class="form-group">
                              <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" name="username" aria-describedby="emailHelp"
                                required="">
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" name="password" required="">
                              @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn btn-primary btn-block">Login</button>
                            </div>
                          <div class="clearfix"></div>

                          <div class="separator">
                            <div class="clearfix"></div>
                            <br />
                            <div>
                          </div>
                          </div>
                          <hr>
                        <div class="text-center">
                      </div>
                    <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="{{url('../vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('../vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('../vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{url('../js/ruang-admin.min.js')}}"></script>
</body>

</html>
   