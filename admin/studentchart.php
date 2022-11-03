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
              <div class="col-lg-8 offset-2 my-5">
                    <div class="card bg-white">
                        <div class="card-body">
                            <h5>Hello, world!</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart"></canvas> 
                        </div>
                    </div>
                </div>

                <script>
                  var ctx = document.getElementById('myChart').getContext('2d');
                  var myChart = new Chart(ctx, {
                      type: 'radar',
                      data: {
                          labels: ['C1', 'C2', 'C3', 'C4', 'P2', 'P3', 'P4', 'P6'],
                          datasets: [{
                              label: 'Successfully achieved',
                              data: [53.39, 27.18, 48.54, 57.28, 53.39, 27.18, 48.54, 57.28],                                              
                              backgroundColor: [
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(255, 159, 64, 0.2)',
                                  'rgba(153, 255, 153, 0.2)',
                                  'rgba(255, 51, 253, 0.2)'
                              ],
                              borderColor: [
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 1)',
                                  'rgba(153, 255, 153, 1)',
                                  'rgba(255, 51, 253, 1)'
                              ],
                              borderWidth: 3
                          },{
                              label: 'Failed to achieve',
                              data: [46.60, 72.81, 51.45, 42.71, 46.60, 72.81, 51.45, 42.71],                                              
                              backgroundColor: [
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(255, 159, 64, 0.2)',
                                  'rgba(153, 255, 153, 0.2)',
                                  'rgba(255, 51, 253, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(54, 162, 235, 0.2)'
                              ],
                              borderColor: [
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 1)',
                                  'rgba(153, 255, 153, 1)',
                                  'rgba(255, 51, 253, 1)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(54, 162, 235, 1)'
                              ],
                              borderWidth: 3
                          }]
                      },
                      options: {
                          scales: {
                              yAxes: [{
                                  ticks: {
                                      beginAtZero: true
                                  }
                              }]
                          },
                          legend: {
                            display: true,
                            position: "top",
                            align: "end"
                          },
                          animation:{
                            duration: 5000,
                            easing: 'easeInOutBounce'
                          },
                          
                      }

                  });
                </script>
                
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
