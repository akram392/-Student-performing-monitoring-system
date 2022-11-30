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
  <title>News Panel | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><b>Blog</b> REGISTRATION</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new User</p>

      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full Name" name="fullname" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="User Name" name="username" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype Password" name="cpassword" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" class="btn btn-primary btn-block" name="register" value="Register">
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div> -->

      <a href="index.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
    <?php
      
      if (isset($_POST['register'])) {
        // code...
        $fullname     = mysqli_real_escape_string($db, $_POST['fullname']);
        $username     = mysqli_real_escape_string($db, $_POST['username']);
        $email        = mysqli_real_escape_string($db, $_POST['email']);
        $password     = mysqli_real_escape_string($db, $_POST['password']);
        $cpassword    = mysqli_real_escape_string($db, $_POST['cpassword']);
      }

      if (empty($fullname) || empty($username) || empty($email) || empty($password) || empty($cpassword) ) {
        // code...
        echo '<div class= "alert alert-warning">Please provide your valid data.</div>';
      }
      else {
        if ($password == $cpassword) {
          // encrypted password...
          $hassedPass = sha1($password);

          $sql = "INSERT INTO users( name, username, email, password, role ) VALUES('$fullname', '$username', '$email', '$hassedPass', 0)";

          $register_user = mysqli_query($db, $sql);

          if ($register_user) {
              // code...
              header("Location: index.php");
            }  
          else {
            die("Query Filed" . mysqli_error($db));
          }  
        }
        else {
          echo '<div class= "alert alert-warning">Password did n\'t Match. </div>';
        }
      }

    ?>
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

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
