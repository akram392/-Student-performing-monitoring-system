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

      $do = isset($_GET['do']) ? $_GET['do'] : 'Question';

      if ($do == "Question") {
        // code...
       ?>

       <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">

                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">All Question Bank Informations </h3>
                  </div>
                  <div class="card-body">
                  <table class="table table-dark table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">Sl.</th>
                        <th scope="col">Course ID</th>
                        <th scope="col">Section</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Question Bank</th>
                        <th scope="col">Exam Type</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php

                        $sql = " SELECT * FROM questionbank ";
                        $all_student = mysqli_query($db, $sql);
                        $i = 0;

                        while ($row = mysqli_fetch_assoc($all_student)) {
                          // code...
                          $id             = $row['id'];
                          $course_id      = $row['course_id'];
                          $section        = $row['section'];
                          $semester       = $row['semester'];
                          $question       = $row['question'];
                          $exam_type      = $row['exam_type'];
                          $i++;
                          ?>

                          <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            
                            <td><?php echo $course_id; ?></td>
                            <td><?php echo $section; ?></td>
                            <td><?php echo $semester; ?></td>
                            <td><a href="dist/img/users/<?php echo $question; ?>" target="_blank" id="anchor"><?php echo $question; ?></a></td>
                            <td><?php echo $exam_type; ?></td>
                            <!-- <td></td> -->

                            <td>
                              <div class="btn-group">
                                <a href="questionbank.php?do=Edit&id=<?php echo $id; ?>">
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
                                        <a href="questionbank.php?do=Delete&deleteStudent=<?php echo $id; ?>" class="btn btn-danger">Yes</a>
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
                  <a href="questionbank.php?do=Add" class="btn btn-success btn-block"> Add New Question Info </a>
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
                      <h3 class="card-title">Add Question Bank (Quiz/Midterm/Final)</h3>
                    </div>
                    <div class="card-body">
                      <form action="questionbank.php?do=Insert" method="POST" enctype="multipart/form-data">
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

                          </div>

                        <div class="col-md-6">

                          <div class="form-group">
                              <label for="">Question Bank</label>
                              <input type="file" class="form-control-file" name="pdf">
                          </div>

                          <div class="form-group">
                              <label for="">Exam Type</label>
                              <select class="form-control" name="examtype" id="">
                                <option value="">Please select type</option>
                                <option value="Quiz">Quiz</option>
                                <option value="Midterm">Midterm</option>
                                <option value="Final">Final</option>
                              </select>
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
          $semester       = $_POST['semester'];
          $exam_type      = $_POST['examtype'];

 
          $pdf       = $_FILES['pdf']['name'];
          $tmp_pdf   = $_FILES['pdf']['tmp_name'];

          $random_number = rand(0, 1000000);
          $pdfFile = $random_number.$pdf;

          move_uploaded_file($tmp_pdf, "dist/img/users/" . $pdfFile);

          $sql = " INSERT INTO questionbank( course_id, section, semester, question, exam_type ) values( '$course_id', '$section', '$semester', '$pdfFile', '$exam_type' ) ";
          $uploadInfo = mysqli_query($db, $sql);

          if ($uploadInfo) {
            // code...
            header("Location: questionbank.php");
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
          $the_user_id = $_GET['id'];
          $sql = "SELECT * FROM questionbank WHERE id = '$the_user_id' ";
          $the_users = mysqli_query($db, $sql);

          while ( $row = mysqli_fetch_assoc($the_users)) {
            // code...
            $edit_id        = $row['id'];
            $course_id      = $row['course_id'];
            $section        = $row['section'];
            $semester       = $row['semester'];
            $question       = $row['question'];
            $exam_type      = $row['exam_type'];
            ?>
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Edit Question Bank Information</h3>
                      </div>
                      <div class="card-body">
                        <form action="questionbank.php?do=Update" method="POST" enctype="multipart/form-data">
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

                            </div>

                          <div class="col-md-6">
                            

                            <div class="form-group">
                                <label for="">Exam Type</label>
                                <select class="form-control" name="examtype" id="">
                                  <option value="0">Please select type</option>
                                  <option value="Quiz" <?php if(!empty($semester)){echo "Selected";} ?>>Quiz</option>
                                  <option value="Midterm" <?php if(!empty($semester)){echo "Selected";} ?>>Midterm</option>
                                  <option value="Final" <?php if(!empty($semester)){echo "Selected";} ?>>Final</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Question Bank</label>
                                <?php
                                  if ( !empty($question)) {
                                      // code...
                                      ?>
                                      <embed src="dist/img/users/<?php echo $question; ?>" type="">
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
                              <input type="submit" class="btn btn-primary" value="Update Question Info Here" name="save">
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
          $exam_type        = $_POST['examtype'];

 
          $pdf       = $_FILES['pdf']['name'];
          $tmp_pdf   = $_FILES['pdf']['tmp_name']; 

          // for image php code here...
          if (!empty($pdf)) {

              // image file name change and move to folder
              $random_number = rand(0, 1000000);
              $pdfFile = $random_number.$pdf;

              move_uploaded_file($tmp_pdf, "dist/img/users/" . $pdfFile);

              $sql = "UPDATE questionbank SET course_id = '$course_id', section = '$section', semester = '$semester', question = '$pdfFile' WHERE id = '$the_update_id' ";
              
              $update_info = mysqli_query($db, $sql);

              if ($update_info) {
                // code...
                header("Location: questionbank.php?do=Question");
              }
              else {
                die("Query Filed" . mysqli_error($db));
              }
          }  
          else {
            $sql = "UPDATE questionbank SET course_id = '$course_id', section = '$section', semester = '$semester' WHERE id = '$the_update_id' ";
              
              $update_info = mysqli_query($db, $sql);

              if ($update_info) {
                // code...
                header("Location: questionbank.php?do=Question");
              }
              else {
                die("Query Filed" . mysqli_error($db));
              }
          }          
            
        }
      }
      elseif ($do == "Delete") {
        // delete code start here...
        
        if (isset($_GET['deleteStudent'])) {

          $del_id = $_GET['deleteStudent'];

          // delete user form database

          $del_sql = "DELETE FROM questionbank WHERE id = '$del_id' ";
          $delete_the_user = mysqli_query($db, $del_sql);

          if ($delete_the_user) {
            // code...
            header("Location: questionbank.php?do=Question");
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
