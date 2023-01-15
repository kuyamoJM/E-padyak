<?php 
    $page = 'Dashboard';
    include '../template/header.php';
    include '../template/nav-bar.php';
    include '../template/side-bar-customer.php';
    include '../template/modal.php';
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>
                  <?php echo $conn->query("select * from tbl_order where user_id = '$user_id'")->num_rows; ?>

                </h3>

                <p>Total Orders</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="orders.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $conn->query("select * from tbl_order where user_id = '$user_id' and status = 'Pending'")->num_rows; ?></h3>

                <p>Pending Orders</p>
              </div>
              <div class="icon">
                <i class="fa fa-bicycle"></i>
              </div>
              <a href="orders-pending.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $conn->query("select * from tbl_order where user_id = '$user_id' and status = 'Paid'")->num_rows; ?></h3>

                <p>Paid Orders</p>
              </div>
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <a href="orders-paid.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $conn->query("select * from tbl_order where user_id = '$user_id' and status = 'Completed'")->num_rows; ?></h3>

                <p>Completed</p>
              </div>
              <div class="icon">
                <i class="fa fa-check-square"></i>
              </div>
              <a href="orders-completed.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
         
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php 
    include '../template/footer.php';
    include '../template/scripts.php';
?>  


</body>
</html>
