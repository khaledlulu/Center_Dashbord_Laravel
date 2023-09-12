<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('dashbord/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('dashbord/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dashbord/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashbord/plugins/summernote/summernote-bs4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dashbord/plugins/toastr/toastr.min.css') }}">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>PPC </b>Dashbord</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form method="POST" >
        @csrf

            <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" id="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
              <span class="password-show-toggle js-password-show-toggle"><span class="uil"></span></span>

            </div>
          </div>
        </div>
        <div class="row">

          <div class="col-5">
            <button type="button " onclick="login()" class="btn btn-primary btn-block ">Sign In</button>
          </div>
        </div>
    </form>
    <div class="social-auth-links text-center mb-3">
        {{-- <p>- OR -</p> --}}
        <a href="http://127.0.0.1:8000/dashbord/admin/login" class="btn btn-block btn-outline-success">
            <i class="nav-icon fas fa-user-circle"></i> Sign In   Admin
        </a>
        <a href="http://127.0.0.1:8000/dashbord/employee/login" class="btn btn-block btn-outline-primary">
            <i class="nav-icon fas fa-user-tie"></i> Sign In  Employee
        </a>
        <a href="http://127.0.0.1:8000/dashbord/studant/login" class="btn btn-block btn-outline-danger">
            <i class="nav-icon fas fa-user-graduate"> </i> Sign In  Studant
        </a>
        </div>
            <!-- /.col -->



    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('dashbord/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('dashbord/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dashbord/dist/js/adminlte.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{asset('dashbord/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('dashbord/js/crud.js') }}"></script>



<script>

    function login(url, data) {
  var guard = '{{ request('guard') }}';
  axios.post('/dashbord/' + guard + '/login', {
    email:document.getElementById('email').value,
    password:document.getElementById('password').value,
    guard:guard,
  })
    .then(function (response) {
      window.location.href = '/dashbord/Home';
    })
    .catch(function (error) {
      if (error.response.data.errors !== undefined) {
        showErrorMessages(error.response.data.errors);
      } else {
        showMessage(error.response.data);
      }
    });
}

</script>
</body>
</html>
