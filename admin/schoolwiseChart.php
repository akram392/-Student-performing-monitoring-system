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
            <h1 class="m-0">Dashboard v2</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v2</li>
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

                $sql = "SELECT school, SUM(enrolled) AS total
                        FROM enrollment
                        GROUP BY school";
                $all_enroll = mysqli_query($db, $sql);
                $i = 0;

                // $total = array();

                while ($row = mysqli_fetch_assoc($all_enroll)) {
                    // code...

                    $school[]  = $row['school'];
                    $total[]   = $row['total'];
                    $i++;


                } 

            ?>

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
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    // Setup Block
                    const school = <?php echo json_encode($school); ?>;
                    const total = <?php echo json_encode($total); ?>;
                    const data = {
                    labels: school,
                        datasets: [{
                            label: 'Enrollment Analysis',
                            data: total,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)'
                            ],
                            borderWidth: 1
                        },{
                            label: 'Enrollment Analysis',
                            data: total,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)'
                            ],
                            borderWidth: 1,
                            type: 'line'
                        }] 
                    };
                    
                    // Config Block
                    const config = {
                        type: 'bar',
                        data,
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
                    };
                    // Render Block
                    const myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );

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
