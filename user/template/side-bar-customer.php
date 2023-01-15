<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="<?php echo $base_url; ?>/assets/img/navbar-logo.png" alt="E-padyak Logo" class="brand-image " style="opacity: .8">
     &nbsp;
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <?php if ($photo == 'profile.png') {
          ?>
          <img  class="img-circle elevation-2" alt="User Image" src="<?php echo $base_url; ?>/user/dist/img/profile/<?php echo ($gender == 'Male' ? 'm' : 'f'); ?>-profile.svg" />
          <?php } else {
          ?>
          <img  class="img-circle elevation-2" alt="User Image" src="<?php echo $base_url; ?>/user/dist/img/profile/<?php echo $photo; ?>" />
        <?php } ?>
         
        </div>
        <div class="info">
          <a href="my-info.php" class="d-block">Hi, <?php echo $fname.' '.$lname; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo $base_url; ?>/user/customer/" class="nav-link" style="background-color: #fd7e14; color: white;">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
           <li class="nav-item">
             <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                My Orders
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $base_url; ?>/user/customer/orders.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $base_url; ?>/user/customer/orders-pending.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $base_url; ?>/user/customer/orders-paid.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paid</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $base_url; ?>/user/customer/orders-completed.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Completed</p>
                </a>
              </li>

            </ul>
          </li>
         
          <li class="nav-item">
            <a href="<?php echo $base_url; ?>/user/customer/cart.php"  class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Cart
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="<?php echo $base_url; ?>/user/customer/store.php" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>Store
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $base_url; ?>/user/customer/product-ratings.php" class="nav-link">
              <i class="nav-icon fas fa-star"></i>
              <p>Product Ratings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $base_url; ?>/user/logout.php" data-toggle="modal" data-target="#logout" class="nav-link">
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