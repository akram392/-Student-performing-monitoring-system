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
                
              <?php

                $sql = "SELECT * FROM spiderchart";
                $all_cat = mysqli_query($db, $sql);
                $i = 0;

                while ($row = mysqli_fetch_assoc($all_cat)) {
                    // code...

                    $cat_successfully_achieved_per[] = $row['successfully_achieved_per'];
                    $cat_failed_to_achieve_per[]     = $row['failed_to_achieve_per'];

                } 

            ?>

                <div class="col-lg-8 offset-2 my-5">
                        <div class="card bg-white">
                            <div class="card-body">
                                <h5>CO’s and PO’s achieved by the
students</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart"></canvas> 
                            </div>
                        </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                  const cat_successfully_achieved_per = <?php echo json_encode($cat_successfully_achieved_per); ?>;
                  const cat_failed_to_achieve_per = <?php echo json_encode($cat_failed_to_achieve_per); ?>;
                  var ctx = document.getElementById('myChart').getContext('2d');
                  var myChart = new Chart(ctx, {
                      type: 'radar',
                      data: {
                          labels: ['C1', 'C2', 'C3', 'C4', 'P2', 'P3', 'P4', 'P6'],
                          datasets: [{
                              label: 'Successfully achieved',
                              data: cat_successfully_achieved_per,                                              
                              backgroundColor: [
                                  'rgba(255, 51, 253, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(255, 159, 64, 0.2)',
                                  'rgba(153, 255, 153, 0.2)',
                                  'rgba(75, 192, 192, 0.2)'
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
                              data: cat_failed_to_achieve_per,                                              
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

              </div>
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
