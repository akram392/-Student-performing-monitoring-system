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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
               
        <!-- Main row -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">School Wise & Department Wise Student Enrollment Analysis</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-dark table-striped table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Sl.</th>
                                <th scope="col">SCHOOL</th>
                                <th scope="col">DEPARTMENT</th>
                                <th scope="col">SEMESTER</th>
                                <th scope="col">COURSE ID</th>
                                <th scope="col">ENROLLED</th>
                                <!-- <th scope="col"></th> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                                $sql = "SELECT * FROM enrollment";
                                $all_enroll = mysqli_query($db, $sql);
                                $i = 0;

                                while ($row = mysqli_fetch_assoc($all_enroll)) {
                                    // code...

                                    $enroll_id    = $row['id'];
                                    $school       = $row['school'];
                                    $department   = $row['department'];
                                    $semester     = $row['semester'];
                                    $course_id    = $row['course_id'];
                                    $enrolled     = $row['enrolled'];
                                    $i++;

                                    ?>

                                    <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $school; ?></td>
                                    <td><?php echo $department; ?></td>
                                    <td><?php echo $semester; ?></td>
                                    <td><?php echo $course_id; ?></td>
                                    <td><?php echo $enrolled; ?></td>
                                    
                                    </tr>

                                    <?php
                                } 
                            ?>
                            </tbody>
                        </table>

                    </div>
                <!-- card body end -->
                </div>
              </div>

              <!-- chart end -->
            </div>
          </div>
        </section>
        <!-- /.row -->
      </div><!--/. container-fluid -->
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
