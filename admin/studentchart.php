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
                        <h3 class="card-title">CO’s and PO’s achieved by the
students.</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-dark table-striped table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Sl.</th>
                                <th scope="col">Number of Students</th>
                                <th scope="col">CO</th>
                                <th scope="col">Successfully Achieved</th>
                                <th scope="col">Successfully Achieved(%)</th>
                                <th scope="col">Failed to Achieve</th>
                                <th scope="col">Failed to Achieve(%)</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                                $sql = "SELECT * FROM spiderchart";
                                $all_cat = mysqli_query($db, $sql);
                                $i = 0;

                                while ($row = mysqli_fetch_assoc($all_cat)) {
                                    // code...

                                    $cat_id                        = $row['id'];
                                    $cat_total_student             = $row['number_of_students'];
                                    $cat_co                        = $row['CO'];
                                    $cat_successfully_achieved     = $row['successfully_achieved'];
                                    $cat_successfully_achieved_per = $row['successfully_achieved_per'];
                                    $cat_failed_to_achieve         = $row['failed_to_achieve'];
                                    $cat_failed_to_achieve_per     = $row['failed_to_achieve_per'];
                                    $i++;

                                    ?>

                                    <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $cat_total_student; ?></td>
                                    <td><?php echo $cat_co; ?></td>
                                    <td><?php echo $cat_successfully_achieved; ?></td>
                                    <td><?php echo $cat_successfully_achieved_per; ?></td>
                                    <td><?php echo $cat_failed_to_achieve; ?></td>
                                    <td><?php echo $cat_failed_to_achieve_per; ?></td>
                                    
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

              <!-- chart start -->
                
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
