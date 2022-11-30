  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SPMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/users/<?php echo $_SESSION['image'] ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['name'] ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>           
          </li>
          

          <?php
            
            if ($_SESSION['role'] == 1) {
              // code...
              ?>
              
              <!-- user manage menu start here -->

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    User Management
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="users.php?do=Manage" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manage User</p>
                    </a>
                  </li>
                </ul>
              </li> 

              <?php
            }

          ?> 

          <!-- student results menu start here -->
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Faculty
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="questionbank.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Question Bank</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="courseoutline.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course Outline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="studentchart.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>CO & PO Achieve Chart</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="enrollment.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Enrollment Analysis</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Student
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="showquestion.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Question Bank</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="showcoutline.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course Outline</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li> -->

          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Sign Out</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>