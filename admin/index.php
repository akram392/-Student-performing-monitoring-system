<?php
  include "include/db.php";
  ob_start();
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Animated Login Form | SPMS</title>
    <link rel="stylesheet" href="dist/css/styles.css">
  </head>
  <body id="particles-js" >
    <div class="center">
      <h1><b>SPMS V3</b> | Login</h1>
      <form action="" method="POST">
        <div class="txt_field">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <span></span>
        </div>
        <div class="txt_field">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <span></span>
        </div>
        <!-- <div class="pass">Forgot Password?</div> -->
        <input type="submit" class="btn btn-primary btn-block" value="Sign In" name="login">
        <div class="signup_link">
          Not a member? <a href="register.php">Signup</a>
        </div>
      </form>
    </div>

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

    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>

    <?php
      ob_end_flush();
    ?>

  </body>
</html>
