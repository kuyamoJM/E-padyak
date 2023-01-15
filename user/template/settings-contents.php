<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../assets/img/navbar-logo.png" alt="E-padyak Logo" class="brand-image " style="opacity: .8">
     &nbsp;
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Hi, <?php echo $fname.' '.$lname; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link" style="background-color: #fd7e14; color: white;">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="usermanagement.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User Management
              </p>
            </a>
          </li>
          <li class="nav-item">
             <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                System Settings
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="bikecategory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contents</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="bikeinformation.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Brands</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="bikemonitoring.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="bikemonitoring.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subscription</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>