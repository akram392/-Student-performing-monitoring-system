<?php
  include "include/header.php"
?>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php

    if ( $_SESSION['role'] == 1 ) {
      // code...
      
      $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';     // Ternary condition

      if ($do == "Manage") {
        // code...
       ?>

       <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">

                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">All Users Informations </h3>
                  </div>
                  <div class="card-body">
                  <table class="table table-dark table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Sl.</th>
                        <th scope="col">Avater</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Address</th>
                        <th scope="col">User Role</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php

                        $sql = " SELECT * FROM users ";
                        $all_user = mysqli_query($db, $sql);
                        $i = 0;

                        while ($row = mysqli_fetch_assoc($all_user)) {
                          // code...
                          $id       = $row['id'];
                          $name     = $row['name'];
                          $username = $row['username'];
                          $email    = $row['email'];
                          $phone    = $row['phone'];
                          $address  = $row['address'];
                          $role     = $row['role'];
                          $image    = $row['images'];
                          $i++;
                          ?>

                          <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td>
                              <?php
                                if (empty($image)) {
                                  // code...
                                  ?>
                                  <img src="dist/img/users/default.png" alt="" class="avater-img">
                                  <?php
                                }
                                else {
                                  ?>
                                  <img src="dist/img/users/<?php echo $image; ?>" alt="" class="avater-img">
                                  <?php
                                }

                              ?>
                               
                            </td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td><?php echo $email; ?></td>
                            <td>
                              <?php

                                if (empty($phone)) {
                                  // code...
                                  echo "Empty";
                                }
                                else {
                                  echo $phone ;
                                }
                              ?>
                              
                            </td>
                            <td>
                              <?php

                                if (empty($address)) {
                                  // code...
                                  echo "Empty";
                                }
                                else {
                                  echo $address ;
                                }
                              ?>
                            </td>
                            <td>
                              <?php

                                if ($role == 1) {
                                  // code...
                                  
                                  ?>
                                    <span class="badge badge-success">Super Admin</span>
                                  <?php
                                }
                                elseif ($role == 2) {
                                  ?>
                                    <span class="badge badge-primary">Faculty</span>
                                  <?php
                                }
                                elseif ($role == 3) {
                                  ?>
                                    <span class="badge badge-warning">Student</span>
                                  <?php
                                }
                                else {
                                  ?>
                                    <span class="badge badge-danger">Member</span>
                                  <?php
                                }
                              ?>
                            </td>
                            <td>
                              <div class="btn-group">
                                <a href="users.php?do=Edit&id=<?php echo $id; ?>">
                                  <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#delete<?php echo $id; ?>">
                                  <i class="fas fa-trash"></i>
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Are you confirm delete the user ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <a href="users.php?do=Delete&deleteUser=<?php echo $id; ?>" class="btn btn-danger">Yes</a>
                                        <a href="" class="btn btn-primary" data-dismiss="modal">No</a>
                                      </div>
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </td>
                          </tr>
                          <?php
                        }

                      ?>

                    </tbody>
                  </table>

                </div>
                <!-- card body end -->
                </div>
                <!-- card end -->

                <div class="col-lg-12">
                  <a href="users.php?do=Add" class="btn btn-success btn-block"> Add New User </a>
                </div>
              </div>
            </div>
          </div>
        </section>
       <?php
      }
      elseif ($do == "Add") {
        // code...
        ?>
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Register New User</h3>
                    </div>
                    <div class="card-body">
                      <form action="users.php?do=Insert" method="POST" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="">Username</label>
                              <input type="text" class="form-control" name="username" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="">Full Name</label>
                                <input type="text" class="form-control" name="name" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="">Email Address</label>
                                <input type="email" class="form-control" name="email" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control" name="phone" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address" autocomplete="off">
                            </div>

                          </div>

                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="">Password</label>
                              <input type="password" class="form-control" name="password" autocomplete="off">
                          </div>

                          <div class="form-group">
                              <label for="">Retype Password</label>
                              <input type="password" class="form-control" name="repassword" autocomplete="off">
                          </div>

                          <div class="form-group">
                              <label for="">User Role</label>
                              <select class="form-control" name="role" id="">
                                <option value="0">Please select user role</option>
                                <option value="1">Super Admin</option>
                                <option value="2">Faculty</option>
                                <option value="3">Student</option>
                                <option value="4">Member</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label for="">User Avater Image</label>
                              <input type="file" class="form-control-file" name="image">
                          </div>

                          <div class="form-group">
                              <input type="submit" class="btn btn-primary" value="Register Here" name="register">
                          </div>

                        </div>
                       </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </section>
        <?php
      }
      elseif ($do == "Insert") {
        // code...
        if (isset($_POST['register'])) {
          // code...
          $username    = $_POST['username'];
          $name        = $_POST['name'];
          $email       = $_POST['email'];
          $phone       = $_POST['phone'];
          $address     = $_POST['address'];
          $password    = $_POST['password'];
          $repassword  = $_POST['repassword'];
          $role        = $_POST['role'];


          $image       = $_FILES['image']['name'];
          $tmp_image   = $_FILES['image']['tmp_name'];

          if ($password == $repassword) {
            // encypreted password...
            $hassedPass = sha1($password);

            $random_number = rand(0, 1000000);
            $imageFile = $random_number.$image;

            move_uploaded_file($tmp_image, "dist/img/users/" . $imageFile);

            $sql = " INSERT INTO users( name, username, password, email, phone, address, role, images ) values( '$name', '$username', '$hassedPass', '$email', '$phone', '$address', '$role', '$imageFile' ) ";
            $registerUser = mysqli_query($db, $sql);

            if ($registerUser) {
              // code...
              header("Location: users.php");
            }
            else {
              echo "Query Filed" . mysqli_error($db);
            }
          }

        }
      }
      elseif ($do == "Edit") {
        // code...
        if (isset($_GET['id'])) {
          // code...
          $the_user_id = $_GET['id'];
          $sql = "SELECT * FROM users WHERE id = '$the_user_id' ";
          $the_users = mysqli_query($db, $sql);

          while ( $row = mysqli_fetch_assoc($the_users)) {
            // code...
            $edit_id  = $row['id'];
            $name     = $row['name'];
            $username = $row['username'];
            $email    = $row['email'];
            $phone    = $row['phone'];
            $address  = $row['address'];
            $role     = $row['role'];
            $image    = $row['images'];
            ?>
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Edit User Information</h3>
                      </div>
                      <div class="card-body">
                        <form action="users.php?do=Update" method="POST" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control" name="username" autocomplete="off" value="<?php echo $username; ?>">
                              </div>

                              <div class="form-group">
                                  <label for="">Full Name</label>
                                  <input type="text" class="form-control" name="name" autocomplete="off" value="<?php echo $name; ?>">
                              </div>

                              <div class="form-group">
                                  <label for="">Email Address</label>
                                  <input type="email" class="form-control" name="email" autocomplete="off" value="<?php echo $email; ?>">
                              </div>

                              <div class="form-group">
                                  <label for="">Phone Number</label>
                                  <input type="text" class="form-control" name="phone" autocomplete="off" value="<?php echo $phone; ?>">
                              </div>

                              <div class="form-group">
                                  <label for="">Address</label>
                                  <input type="text" class="form-control" name="address" autocomplete="off" value="<?php echo $address; ?>">
                              </div>

                            </div>

                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" autocomplete="off" placeholder="Enter New Password">
                            </div>

                            <div class="form-group">
                                <label for="">Retype Password</label>
                                <input type="password" class="form-control" name="repassword" autocomplete="off" placeholder="Retype Your New Password">
                            </div>

                            <div class="form-group">
                                <label for="">User Role</label>
                                <select class="form-control" name="role" id="">
                                  <option value="0">Please select user role</option>
                                  <option value="1" <?php if($role == 1){echo "Selected";} ?>>Super Admin</option>
                                  <option value="2" <?php if($role == 2){echo "Selected";} ?>>Faculty</option>
                                  <option value="3" <?php if($role == 3){echo "Selected";} ?>>Student</option>
                                  <option value="4" <?php if($role == 4){echo "Selected";} ?>>Member</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">User Avater Image</label>
                                <?php
                                  if ( !empty($image)) {
                                      // code...
                                      ?>
                                      <img src="dist/img/users/<?php echo $image; ?>" alt="" style="width: 75px; display: block;">
                                      <?php
                                    }
                                    else {
                                      ?>
                                      <img src="dist/img/users/default.png" alt="" style="width: 75px; display: block;">
                                      <?php
                                    }
                                ?>
                                <input type="file" class="form-control-file" name="image">
                            </div>

                            <div class="form-group">
                              <input type="hidden" name="update" value="<?php echo $edit_id; ?>">
                              <input type="submit" class="btn btn-primary" value="Update User Info Here" name="save">
                            </div>

                          </div>
                         </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </section>

            <?php
          }
        }
      }
      elseif ($do == "Update") {
        // code...
        if (isset($_POST['update'])) {
          // code...
          $the_update_id    = $_POST['update'];
          $username         = $_POST['username'];
          $name             = $_POST['name'];
          $email            = $_POST['email'];
          $phone            = $_POST['phone'];
          $address          = $_POST['address'];
          $password         = $_POST['password'];
          $repassword       = $_POST['repassword'];
          $role             = $_POST['role'];


          $image            = $_FILES['image']['name'];
          $tmp_image        = $_FILES['image']['tmp_name'];

          // for password php code here...
          if (!empty($password)) {
            // code...
            if ($password == $repassword) {
              // encrypted password...
              $hassedPass = sha1($password);

              $sql = "UPDATE users SET password = '$hassedPass' WHERE id = '$the_update_id' ";
              $update_pass = mysqli_query($db, $sql);
            }
          } 

          // for image php code here...
          if (!empty($image)) {
            // delete user image form folder and database...

              $del_id = $_GET['deleteUser'];

              $sql = "SELECT * FROM users WHERE id = '$del_id' ";
              $del_user = mysqli_query($db, $sql);

              while ($row = mysqli_fetch_assoc($del_user)) {
                // code...
                $del_image = $_GET['$image'];
              }

              unlink("dist/img/users/" . $del_image);

              // image file name change and move to folder
              $random_number = rand(0, 1000000);
              $imageFile = $random_number.$image;

              move_uploaded_file($tmp_image, "dist/img/users/" . $imageFile);

              $sql = "UPDATE users SET name = '$name', email = '$email', phone = '$phone', address = '$address', role = '$role', images =   '$imageFile' WHERE id = '$the_update_id' ";
              
              $update_info = mysqli_query($db, $sql);

              if ($update_info) {
                // code...
                header("Location: users.php?do=Manage");
              }
              else {
                die("Query Filed" . mysqli_error($db));
              }
          }  
          else {
            $sql = "UPDATE users SET name = '$name', username = '$username', email = '$email', phone = '$phone', address = '$address', role = '$role' WHERE id = '$the_update_id' ";
              
              $update_info = mysqli_query($db, $sql);

              if ($update_info) {
                // code...
                header("Location: users.php?do=Manage");
              }
              else {
                die("Query Filed" . mysqli_error($db));
              }
          }          
            
        }
      }
      elseif ($do == "Delete") {
        // delete code start here...
        
        if (isset($_GET['deleteUser'])) {
          // delete user image form folder and database...

          $del_id = $_GET['deleteUser'];

          $sql = "SELECT * FROM users WHERE id = '$del_id' ";
          $del_user = mysqli_query($db, $sql);

          while ($row = mysqli_fetch_assoc($del_user)) {
            // code...
            $del_image = $_GET['$image'];
          }

          unlink("dist/img/users/$del_image");

          // delete user form database

          $del_sql = "DELETE FROM users WHERE id = '$del_id' ";
          $delete_the_user = mysqli_query($db, $del_sql);

          if ($delete_the_user) {
            // code...
            header("Location: users.php?do=Manage");
          }
          else {
            echo "Query Filed" . mysqli_error($db);
          }
        }
      } 

    }
    else {
      echo "You are not able to access this. Thanks !!!";
    }

    ?>

    <!-- Main content -->
    <!-- <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <h1>Content goes here</h1>
          </div>
        </div>

      </div>
    </section> -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<?php
  include "include/footer.php"
?> 
