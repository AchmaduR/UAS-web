<?php
include('config/config.php');

if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  if(empty($username)){
    echo  "<script>alert('Tolong di isi username')</script>";
    echo "<meta http-equiv='refresh' content='1 url=index.php'>";
    exit();
  }else if(empty($password)){
    echo  "<script>alert('Tolong di isi password')</script>";
    echo "<meta http-equiv='refresh' content='1 url=index.php'>";
    exit();
  }else{
    $login    = mysqli_query($conn, 
                "SELECT * FROM tb_admin 
                WHERE username='$username' AND 
                password='$password'");
    if(mysqli_num_rows($login) > 0 ){
      $_SESSION['username'] = $username;
      echo  "<script>window.location.href='admin/index.html'</script>";
    }else{
      echo  "<script>alert('Password salah')</script>";
      echo "<meta http-equiv='refresh' content='1 url=index.php'>";
      exit();
    }
  }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><b>Laboratorium</br>FMIPA</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Masuk untuk memulai</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input name="username" type="username" class="form-control" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="">@</span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Ingat Saya
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button name="submit" type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-0">
        <a href="register.php" class="text-center">Buat akun baru</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
