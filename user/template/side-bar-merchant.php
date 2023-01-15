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
            <a href="<?php echo $base_url; ?>/user/merchant/" class="nav-link" style="background-color: #fd7e14; color: white;">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
           <li class="nav-item">
             <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Orders
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $base_url; ?>/user/merchant/orders.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Orders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $base_url; ?>/user/merchant/orders-pending.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $base_url; ?>/user/merchant/orders-paid.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paid</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $base_url; ?>/user/merchant/orders-completed.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Completed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $base_url; ?>/user/merchant/orders-returned-items.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Returned Items</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $base_url; ?>/user/merchant/orders-replaced-items.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Replaced Items</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
             <a href="products.php" class="nav-link">
              <i class="nav-icon fas fa-box-open"></i>
              <p>
                Products
              </p>
            </a>

          </li>
          <li class="nav-item">
             <a href="return-replace-items.php" class="nav-link">
              <i class="nav-icon fas fa-exchange"></i>
              <p>
                Return/Replace Items
              </p>
            </a>

          </li>
          <li class="nav-item">
             <a href="mode-of-payment.php" class="nav-link">
              <i class="nav-icon fas fa-money-bill"></i>
              <p>
                Mode of Payment
              </p>
            </a>

          </li>
          <li class="nav-item">
             <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $base_url; ?>/user/merchant/reports-inventory.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Inventory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $base_url; ?>/user/merchant/reports-running.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Running Inventory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $base_url; ?>/user/merchant/reports-summary.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Order Summary</p>
                </a>
              </li>

            </ul>
          </li>
           <li class="nav-item">
             <a href="about.php" class="nav-link">
              <i class="nav-icon fas fa-info"></i>
              <p>
                About Store
              </p>
            </a>

          </li>
          <?php
            $qs = $conn->query("select * from tbl_store where store_id = '$store_id'") or die($conn->error);
            $rs = $qs->fetch_assoc();

            if ($rs['accept_delivery'] == 1){ ?>
           <li class="nav-item">
             <a href="delivery-charge.php" class="nav-link">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Delivery Charge
              </p>
            </a>

          </li>
          <?php } ?>
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