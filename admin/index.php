<?php
  include "include/db.php";
  ob_start();
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>News Panel | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Blog</b> LOGIN</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
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
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" class="btn btn-primary btn-block" value="Sign In" name="login">
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php

  if (isset($_POST['login'])) {
    // code...

    $email    = mysqli_real_escape_string($db, $_POST['email']);  //string e divert korbe
    $password = mysqli_real_escape_string($db, $_POST['password']); //string e divert korbe

    // encrypted password
    $hassedPass = sha1($password);

    $sql = "SELECT * FROM users WHERE email = '$email' ";
    $the_user = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_assoc($the_user)) {
      // code...
      $_SESSION['id']       = $row['id'];
      $_SESSION['name']     = $row['name'];
      $_SESSION['username'] = $row['username'];
      $set_password         = $row['password'];
      $_SESSION['email']    = $row['email'];
      $_SESSION['phone']    = $row['phone'];
      $_SESSION['address']  = $row['address'];
      $_SESSION['role']     = $row['role'];
      $_SESSION['image']    = $row['images'];
    }

    if ( $email == $_SESSION['email'] && $hassedPass == $set_password ) {
      // code...
      header("Location: dashboard.php");
    }
    elseif ( $email !== $_SESSION['email'] || $hassedPass !== $set_password ) {
      // code...
      header("Location: index.php");
    }
    else {
      header("Location: index.php");
    }
  }

?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<?php
  ob_end_flush();
?>
</body>
</html>
