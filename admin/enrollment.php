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

              <!-- chart start -->
              <div class="col-lg-8 offset-2 my-5">
                    <div class="card bg-white">
                        <div class="card-body">
                            <h5>School Wise Student Enrollment Chart</h5>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart"></canvas> 
                        </div>
                    </div>
                </div>

                <script>
                  var ctx = document.getElementById('myChart').getContext('2d');
                  var myChart = new Chart(ctx, {
                      type: 'bar',
                      data: {
                          labels: ['SLASS', 'SBE', 'SELS', 'SETS', 'SPPH'],
                          datasets: [{
                              label: 'School Wise Analysis',
                              data: [53.39, 27.18, 48.54, 57.28, 53.39],                                              
                              backgroundColor: [
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)'
                              ],
                              borderColor: [
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(54, 162, 235, 1)',
                                  'rgba(255, 206, 86, 1)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)'
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
                
                <!-- chart start -->
                <div class="col-lg-8 offset-2 my-5">
                        <div class="card bg-white">
                            <div class="card-body">
                                <h5>Department Wise Student Enrollment Chart</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="myCharts"></canvas> 
                            </div>
                        </div>
                </div>

                <script>
                  var ctx = document.getElementById('myCharts').getContext('2d');
                  var myCharts = new Chart(ctx, {
                      type: 'bar',
                      data: {
                          labels: ['MKT', 'BBA', 'CSE', 'BPHA', 'ACT', 'EnvS', 'EnvM'],
                          datasets: [{
                            label: 'Department Wise Analysis',
                              data: [46.60, 72.81, 51.45, 42.71, 46.60, 51.45, 42.71],                                              
                              backgroundColor: [
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(255, 159, 64, 0.2)',
                                  'rgba(153, 255, 153, 0.2)',
                                  'rgba(255, 51, 253, 0.2)',
                                  'rgba(75, 192, 192, 0.2)'
                              ],
                              borderColor: [
                                  'rgba(255, 206, 86, 0.2)',
                                  'rgba(75, 192, 192, 1)',
                                  'rgba(153, 102, 255, 1)',
                                  'rgba(255, 159, 64, 1)',
                                  'rgba(153, 255, 153, 1)',
                                  'rgba(255, 51, 253, 1)',
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
