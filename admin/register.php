<?php
  include "include/db.php";
  ob_start();
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Animated Register Form | SPMS</title>
    <link rel="stylesheet" href="dist/css/styles.css">
  </head>
  <body id="particles-js" >
    <div class="center">
      <h1><b>SPMS V3</b> | Register</h1>
      <form action="" method="POST">
        <div class="txt_field">
          <input type="text" class="form-control" placeholder="Full Name" name="fullname" autocomplete="off">
          <span></span>
        </div>
        <div class="txt_field">
          <input type="text" class="form-control" placeholder="User Name" name="username" autocomplete="off">
          <span></span>
        </div>
        <div class="txt_field">
          <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off">
          <span></span>
        </div>
        <div class="txt_field">
          <input type="password" class="form-control" placeholder="Password" name="password" autocomplete="off">
          <span></span>
        </div>
        <div class="txt_field">
          <input type="password" class="form-control" placeholder="Retype Password" name="cpassword" autocomplete="off">
          <span></span>
        </div>
        <input type="submit" class="btn btn-primary btn-block" name="register" value="Register">
        <div class="signup_link">
          You are already member. <a href="index.php">Login</a>
        </div>
      </form>
    </div>

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
        // echo '<div class= "alert alert-warning">Please provide your valid data.</div>';
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

    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>

    <?php
      ob_end_flush();
    ?>

  </body>
</html>
