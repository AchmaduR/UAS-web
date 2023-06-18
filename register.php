<?php
include('config/config.php');

if(isset($_POST['submit'])){
    $username   = $_POST['username'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $check      = mysqli_query($conn, 
                                "SELECT * FROM tb_admin
                                WHERE username='$username' OR
                                email='$email'");
    if(mysqli_num_rows($check) > 0){
        echo   "<script>alert('Data ini sudah ada')</script>";
    }else{
        if($password){
            $query  = "INSERT INTO tb_admin
                        VALUES ('','$username', '$email', MD5('$password'))";
            $result = mysqli_query($conn, $query);
            echo "<script>window.location.href='index.php'";
            echo "<script>alert('Data berhasil diupdate')</script>";
        }else{
            echo "<script>alert('Data gagal terisi!')</script>";
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
      <a href="../../index2.html" class="h1"><b>Pendaftaran Lab</br>FMIPA</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Daftar dahulu untuk masuk</p>

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
          <input name="email" type="email" class="form-control" placeholder="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
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
        <a href="index.php" class="text-center">Sudah Punya akun</a>
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
