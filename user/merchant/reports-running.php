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
                <form action="reports-running.php" method="post" class="text-right d-print-none">
                <?php 
                $pid = '-1';
                $from = '';
                $to = '';
                if (isset($_POST['generate'])){
                  $pid = $_POST['product'];
                  $from = $_POST['date_from'];
                  $to = $_POST['date_to'];
                }
                                  $qc = $conn->query("select * from tbl_running_inventory where product_id = '$pid' and date between '$from 00:00:00' and '$to 23:59:59' order by date asc") or die($conn->error);

                ?>
               <span>Select Product</span>
               <select name="product" id="product" required="required" >
                 <option value="" selected="selected" disabled="disabled">-select product-</option>
                 <?php 
                  $qp = $conn->query("select * from tbl_product p inner join tbl_brand b on b.brand_id = p.brand_id inner join tbl_category c on c.category_id = p.category_id where p.store_id = '$store_id' and p.is_deleted = 0");
                  while ($rp = $qp->fetch_assoc()){ 
                 ?>
                 <option <?php if ($pid == $rp['product_id']) { echo 'selected="selected"';} ?> value="<?php echo $rp['product_id']; ?>"><?php echo $rp['product_name'].' ('.$rp['brand'].' - '.$rp['category'].')'; ?></option>
                 <?php } ?>
               </select>
               <span>Transactions from</span>
               <input type="date" name="date_from" required="required" value="<?php echo $from; ?>" max="<?php echo date("Y-m-d"); ?>">
               <span>To</span>
               <input type="date" name="date_to" required="required" max="<?php echo date("Y-m-d"); ?>" value="<?php echo $to ; ?>"> &nbsp;
               <button type="submit" class="btn btn-sm btn-primary" name="generate"><i class="fa fa-chart-line"></i> Generate</button>&nbsp;
               <button type="button" onclick="window.print();" <?php if ($qc->num_rows == 0) { echo 'disabled="disabled"'; } ?> class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print</button>
               </form>
               <div class="d-none d-print-block">
               <?php 
               $qri = $conn->query("select * from tbl_product p inner join tbl_brand b on b.brand_id = p.brand_id inner join tbl_category c on c.category_id = p.category_id where p.product_id = '$pid'");
                $rri = $qri->fetch_assoc();
               ?>
                  <h4 class="text-center">Running Inventory Report</h4>
                  <p class="text-center"><?php echo $rri['product_name'].' ('.$rri['brand'].' - '.$rri['category'].')'; ?><br />
                  <?php echo date("Y-M-d", strtotime($from)).' - '.date("Y-M-d", strtotime($to)); ?></p>

               </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                  <tr>
                    <th width="180">Date</th>
                    <th width="180">Stocks In</th>
                    <th width="180">Stocks Out</th>
                    <th width="200">Remaining Stocks</th>
                    <th>Remarks</th>
                  </tr>
                  </thead>

                  <tbody>
                  <?php 
                  $qc = $conn->query("select * from tbl_running_inventory where product_id = '$pid' and date between '$from 00:00:00' and '$to 23:59:59' order by date asc") or die($conn->error);
                  while ($rc = $qc->fetch_assoc()){ ?>
                    <tr>
                      <td><?php echo date("Y-m-d H:i A" , strtotime($rc['date'])); ?></td>
                      <td class="text-center"><?php echo $rc['product_in']; ?></td>
                      <td class="text-center"><?php echo $rc['product_out']; ?></td>
                      <td class="text-center"><?php echo $rc['stocks']; ?></td>
                      <td ><?php echo $rc['remarks']; ?></td>
                    </tr>
                    <?php } ?>
                    <?php if ($qc->num_rows == 0){ ?>
                      <tr>
                          <td colspan="5" class="text-center text-muted"><strong>No Record Found.</strong></td>
                      </tr>
                    <?php } ?>
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
