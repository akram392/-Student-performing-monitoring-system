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

                $sql = "SELECT * FROM achieve_co_plo";
                $all_cats = mysqli_query($db, $sql);
                $i = 0;

                while ($row = mysqli_fetch_assoc($all_cats)) {
                    // code...

                    $co1_f = $row['co1_f'];
                    $co2_f = $row['co2_f'];
                    $co3_f = $row['co3_f'];
                    $co4_f = $row['co4_f'];
                    $co1_p = $row['co1_p'];
                    $co2_p = $row['co2_p'];
                    $co3_p = $row['co3_p'];
                    $co4_p = $row['co4_p'];

                } 

                // $akram = array($co1_f[],$co2_f[],$co3_f[],$co4_f[]);
                // $hossain = array($co1_p[],$co2_p[],$co3_p[],$co4_p[]);

            ?>

                <div class="col-lg-5 offset-3 my-0">
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
                  const co1_f = <?php echo json_encode($co1_f); ?>;
                  const co2_f = <?php echo json_encode($co2_f); ?>;
                  const co3_f = <?php echo json_encode($co3_f); ?>;
                  const co4_f = <?php echo json_encode($co4_f); ?>;
                  const co1_p = <?php echo json_encode($co1_p); ?>;
                  const co2_p = <?php echo json_encode($co2_p); ?>;
                  const co3_p = <?php echo json_encode($co3_p); ?>;
                  const co4_p = <?php echo json_encode($co4_p); ?>;
                  var ctx = document.getElementById('myChart').getContext('2d');
                  var myChart = new Chart(ctx, {
                      type: 'radar',
                      data: {
                          labels: ['C1', 'C2', 'C3', 'C4', 'P2', 'P3', 'P4', 'P6'],
                          datasets: [{
                              label: 'Successfully achieved',
                              data: [co1_p,co2_p,co2_p,co2_p,co1_p,co2_p,co2_p,co2_p],                                              
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
                              data: [co1_p,co2_p,co2_p,co2_p,co1_p,co2_p,co2_p,co2_p],                                              
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
