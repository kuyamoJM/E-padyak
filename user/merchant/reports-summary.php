<?php 
    $page = 'Running Inventory';
    include '../template/header.php';
    include '../template/nav-bar.php';
    include '../template/side-bar-merchant.php';
    include '../template/modal.php';
 ?>

<style type="text/css">
   .w-768{
    max-width: 768px;
    width: 96%;
   }
   .thumbs{
    width: 100px;
    border: 1px solid rgba(100, 100, 100, 0.5);
   }
            .yellow-star{
                color: #ff9900;
            }
            .gray-star{
                color: #909090;
            }
    @media print{
      .content-wrapper>.content{
        background-color: #ffffff;
      }
      .card-header{
        border: none;
      }
    }
 </style>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Running Inventory</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Reports</li>
              <li class="breadcrumb-item active">Running Inventory</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
       

            <div class="card">
              <div class="card-header">
                <div class="d-none d-print-block text-center">
                 <?php 
                 $qs = $conn->query("select * from tbl_store where store_id = '$store_id'");
                 $rs = $qs->fetch_assoc();
                 echo '<h3>'.$rs['store_name'].'</h3>'
                 ?>
                </div>
                <form action="reports-summary.php" method="post" class="text-right d-print-none">
                <?php 
                $from = '';
                $to = '';
                if (isset($_POST['generate'])){
                  $from = $_POST['date_from'];
                  $to = $_POST['date_to'];
                }
                 $qc = $conn->query("select o.*, u.fname, u.mname, u.lname from tbl_order o inner join tbl_user u on u.user_id = o.user_id where o.status  = 'Completed' and o.date_ordered between '$from  00:00:00' and '$to 23:59:59' order by date_ordered asc") or die($conn->error);
                ?>
              
               <span>Order Summary from</span>
               <input type="date" name="date_from" required="required" value="<?php echo $from; ?>" max="<?php echo date("Y-m-d"); ?>">
               <span>To</span>
               <input type="date" name="date_to" required="required" max="<?php echo date("Y-m-d"); ?>" value="<?php echo $to ; ?>"> &nbsp;
               <button type="submit" class="btn btn-sm btn-primary" name="generate"><i class="fa fa-chart-line"></i> Generate</button>&nbsp;
               <button type="button" onclick="window.print();" <?php if ($qc->num_rows == 0) { echo 'disabled="disabled"'; } ?> class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print</button>
               </form>
               <div class="d-none d-print-block">
               
                  <h4 class="text-center">Order Summary Report</h4>
                  <p class="text-center">
                  <?php echo date("Y-M-d", strtotime($from)).' - '.date("Y-M-d", strtotime($to)); ?></p>

               </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                  <tr>
                    <th width="180">Date</th>
                    <th>Customer Name</th>
                    <th width="180">Order Type</th>
                    <th width="200">Amount</th>
                  </tr>
                  </thead>

                  <tbody>
                  <?php 
                  $total = 0;
                 
                  while ($rc = $qc->fetch_assoc()){
                $total += $rc['total_amount'];
                   ?>
                    <tr>
                      <td><?php echo date("Y-m-d" , strtotime($rc['date_ordered'])); ?></td>
                      <td><?php echo $rc['lname'].', '.$rc['fname'].' '.$rc['mname']; ?></td>
                      <td class="text-center"><?php echo ($rc['order_type'] == 'For Pick-up' ? 'Pick-up' : 'Deliver'); ?></td>
                      <td class="text-right" >&#8369; <?php echo number_format($rc['total_amount'], 2); ?></td>
                    </tr>
                    <?php } ?>
                    <?php if ($qc->num_rows == 0){ ?>
                      <tr>
                          <td colspan="4" class="text-center text-muted"><strong>No Record Found.</strong></td>
                      </tr>
                    <?php } else { ?>
                    <tr>
                      <td colspan="3" class="text-right"><strong>Total Amount</strong></td>
                      <td class="text-right" ><strong>&#8369; <?php echo number_format($total, 2); ?></strong></td>
                    </tr>
                    <?php
                      }
                      ?>
                  </tbody>

                </table>
               
             
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php 
    include '../template/footer.php';
    include '../template/scripts.php';
?>  



</body>
</html>
