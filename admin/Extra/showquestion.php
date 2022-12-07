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
               
        <!-- Main row -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-5">
                <form action="" method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                        <button type="submit" class="btn btn-primary ml-2">Search</button>
                    </div>
                </form>
              </div>
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

                        if (isset($_GET['search'])) {
                          // code...
                          $filtervalue = $_GET['search'];
                          $sql = " SELECT * FROM questionbank WHERE CONCAT(course_id,semester,exam_type) LIKE '%$filtervalue%' ";
                          $all_question = mysqli_query($db, $sql);
                          $i = 0;

                          while ($row = mysqli_fetch_assoc($all_question)) {
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

                            </tr>
                            <?php
                          }
                        }

                      ?>

                    </tbody>
                  </table>

                </div>
                <!-- card body end -->
                </div>
                <!-- card end -->

              </div>
            </div>
          </div>
        </section>

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
