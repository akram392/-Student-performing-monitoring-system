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

      $do = isset($_GET['do']) ? $_GET['do'] : 'Course';

      if ($do == "Course") {
        // code...
       ?>

       <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">

                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">All Course Outline Informations </h3>
                  </div>
                  <div class="card-body">
                  <table class="table table-dark table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Sl.</th>
                        <th scope="col">Course ID</th>
                        <th scope="col">Section</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Course Outline</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php

                        $sql = " SELECT * FROM courseoutline ";
                        $all_course_outline = mysqli_query($db, $sql);
                        $i = 0;

                        while ($row = mysqli_fetch_assoc($all_course_outline)) {
                          // code...
                          $id                = $row['id'];
                          $course_id         = $row['course_id'];
                          $section           = $row['section'];
                          $semester          = $row['semester'];
                          $course_outline    = $row['course_outline'];
                          
                          $i++;

                          ?>
                          
                          <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            
                            <td><?php echo $course_id; ?></td>
                            <td><?php echo $section; ?></td>
                            <td><?php echo $semester; ?></td>
                            <td><a href="dist/img/users/<?php echo $course_outline; ?>" target="_blank" id="anchors"><?php echo $course_outline;  ?></a></td>
                            <!-- <td></td> -->

                            <td>
                              <div class="btn-group">
                                <a href="courseoutline.php?do=Edit&id=<?php echo $id; ?>">
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
                                        <h5 class="modal-title" id="exampleModalLabel">Are you confirm delete the info ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <a href="courseoutline.php?do=Delete&deleteCourseline=<?php echo $id; ?>" class="btn btn-danger">Yes</a>
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
                  <a href="courseoutline.php?do=Add" class="btn btn-success btn-block"> Add New Course Outline Info </a>
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
                      <h3 class="card-title">Add Course Outline</h3>
                    </div>
                    <div class="card-body">
                      <form action="courseoutline.php?do=Insert" method="POST" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Course ID</label>
                                <input type="text" class="form-control" name="courseid" autocomplete="off">
                              </div>

                              <div class="form-group">
                                  <label for="">Section</label>
                                  <input type="text" class="form-control" name="section" autocomplete="off">
                              </div>

                              <div class="form-group">
                                <label for="">Semester</label>
                                <select class="form-control" name="semester" id="">
                                  <option value="">Please select semester</option>
                                  <option value="Summer22">Summer22</option>
                                  <option value="Spring22">Spring22</option>
                                  <option value="Autumn22">Autumn22</option>
                                </select>
                              </div>

                              <div class="form-group">
                                  <label for="">Course Title</label>
                                  <input type="text" class="form-control" name="course_title" autocomplete="off">
                              </div>

                              <div class="form-group">
                                  <label for="">Credit Value</label>
                                  <input type="text" class="form-control" name="credit_value" autocomplete="off">
                              </div>

                              <div class="form-group">
                                <label for="">Duration</label>
                                <input type="text" class="form-control" name="duration" autocomplete="off">
                            </div>
                            

                          </div>

                        <div class="col-md-6">

                          <div class="form-group">
                              <label for="">Course Description</label>
                              <textarea class="form-control" name="course_desc" autocomplete="off" rows="4"></textarea>

                          </div>

                          <div class="form-group">
                              <label for="">Course Outline</label>
                              <input type="file" class="form-control-file" name="pdf">
                          </div>

                          <div class="form-group">
                              <input type="submit" class="btn btn-primary" value="Upload Here" name="upload">
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
        if (isset($_POST['upload'])) {
          // code...
          $course_id      = $_POST['courseid'];
          $section        = $_POST['section'];
          $course_title   = $_POST['course_title'];
          $credit_value   = $_POST['credit_value'];
          $duration       = $_POST['duration'];
          $course_desc    = $_POST['course_desc'];


 
          $pdf       = $_FILES['pdf']['name'];
          $tmp_pdf   = $_FILES['pdf']['tmp_name'];

          $random_number = rand(0, 1000000);
          $pdfFile = $random_number.$pdf;

          move_uploaded_file($tmp_pdf, "dist/img/users/" . $pdfFile);

          $sql = " INSERT INTO courseoutline( course_id, section, semester, course_outline, course_title, credit_value, duration, course_desc ) values( '$course_id', '$section', '$semester', '$pdfFile', '$course_title', '$credit_value', '$duration', '$course_desc' ) ";
          $uploadInfo = mysqli_query($db, $sql);

          if ($uploadInfo) {
            // code...
            header("Location: courseoutline.php");
          }
          else {
            echo "Query Filed" . mysqli_error($db);
          }

        }
      }
      elseif ($do == "Edit") {
        // code...
        if (isset($_GET['id'])) {
          // code...
          $edit_course_id = $_GET['id'];
          $sql = "SELECT * FROM courseoutline WHERE id = '$edit_course_id' ";
          $the_edit_info = mysqli_query($db, $sql);

          while ( $row = mysqli_fetch_assoc($the_edit_info)) {
            // code...
            $edit_id            = $row['id'];
            $course_id          = $row['course_id'];
            $section            = $row['section'];
            $semester           = $row['semester'];
            $course_outline     = $row['course_outline'];
            $course_title       = $row['course_title'];
            $credit_value       = $row['credit_value'];
            $duration           = $row['duration'];
            $course_desc        = $row['course_desc'];
            ?>
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Edit Course Outline Information</h3>
                      </div>
                      <div class="card-body">
                        <form action="courseoutline.php?do=Update" method="POST" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Course ID</label>
                                <input type="text" class="form-control" name="courseid" autocomplete="off" value="<?php echo $course_id; ?>" readonly>
                              </div>

                              <div class="form-group">
                                  <label for="">Section</label>
                                  <input type="text" class="form-control" name="section" autocomplete="off" value="<?php echo $section; ?>">
                              </div>

                              <div class="form-group">
                                  <label for="">Semester</label>
                                  <select class="form-control" name="semester" id="">
                                    <option value="">Please select semester</option>
                                    <option value="Summer22" <?php if(!empty($semester)){echo "Selected";} ?>>Summer22</option>
                                    <option value="Spring22" <?php if(!empty($semester)){echo "Selected";} ?>>Spring22</option>
                                    <option value="Autumn22" <?php if(!empty($semester)){echo "Selected";} ?>>Autumn22</option>
                                  </select>
                              </div>

                              <div class="form-group">
                                  <label for="">Course Title</label>
                                  <input type="text" class="form-control" name="course_title" autocomplete="off" value="<?php echo $course_title; ?>">
                              </div>

                              <div class="form-group">
                                  <label for="">Credit Value</label>
                                  <input type="text" class="form-control" name="credit_value" autocomplete="off" value="<?php echo $credit_value; ?>">
                              </div>

                              <div class="form-group">
                                 <label for="">Duration</label>
                                 <input type="text" class="form-control" name="duration" autocomplete="off" value="<?php echo $duration; ?>">
                             </div>

                            </div>

                          <div class="col-md-6">

                              <div class="form-group">
                                  <label for="">Course Description</label>
                                  <textarea class="form-control" name="course_desc" autocomplete="off" rows="4"><?php echo $course_desc; ?></textarea>
                              </div>

                              <div class="form-group">
                                  <label for="">Course Outline</label>
                                  <?php
                                    if ( !empty($course_outline)) {
                                        // code...
                                        ?>
                                        <embed src="dist/img/users/<?php echo $course_outline; ?>" type="">
                                        <?php
                                      }
                                      else {
                                        ?>
                                        <embed src="dist/img/users/default.pdf" type="">
                                        <?php
                                      }
                                  ?>
                                  <input type="file" class="form-control-file" name="pdf">
                              </div>

                              <div class="form-group">
                                <input type="hidden" name="update" value="<?php echo $edit_id; ?>">
                                <input type="submit" class="btn btn-primary" value="Update Course Outline Info Here" name="save">
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
            $course_id        = $_POST['courseid'];
            $section          = $_POST['section'];
            $semester         = $_POST['semester'];
            $course_title     = $_POST['course_title'];
            $credit_value     = $_POST['credit_value'];
            $duration         = $_POST['duration'];
            $course_desc      = $_POST['course_desc'];
  
   
            $pdf       = $_FILES['pdf']['name'];
            $tmp_pdf   = $_FILES['pdf']['tmp_name']; 
  
            // for image php code here...
            if (!empty($pdf)) {
  
                // image file name change and move to folder
                $random_number = rand(0, 1000000);
                $pdfFile = $random_number.$pdf;
  
                move_uploaded_file($tmp_pdf, "dist/img/users/" . $pdfFile);
  
                $sql = "UPDATE courseoutline SET course_id = '$course_id', section = '$section', semester = '$semester', course_outline = '$pdfFile', course_title = '$course_title', credit_value = '$credit_value', duration = '$duration', course_desc = '$course_desc' WHERE id = '$the_update_id' ";
                
                $update_info = mysqli_query($db, $sql);
  
                if ($update_info) {
                  // code...
                  header("Location: courseoutline.php?do=Course");
                }
                else {
                  die("Query Filed" . mysqli_error($db));
                }
            }  
            else {
              $sql = "UPDATE courseoutline SET course_id = '$course_id', section = '$section', semester = '$semester' WHERE id = '$the_update_id' ";
                
                $update_info = mysqli_query($db, $sql);
  
                if ($update_info) {
                  // code...
                  header("Location: courseoutline.php?do=Course");
                }
                else {
                  die("Query Filed" . mysqli_error($db));
                }
            }          
              
          }
      }
      elseif ($do == "Delete") {
        // delete code start here...
        
        if (isset($_GET['deleteCourseline'])) {

          $del_id = $_GET['deleteCourseline'];

          // delete user form database

          $del_sql = "DELETE FROM courseoutline WHERE id = '$del_id' ";
          $delete_the_user = mysqli_query($db, $del_sql);

          if ($delete_the_user) {
            // code...
            header("Location: courseoutline.php?do=Course");
          }
          else {
            echo "Query Filed" . mysqli_error($db);
          }
        }
      }

    ?>
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
