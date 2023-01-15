<?php 
    $page = 'Products';
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
            <h1 class="m-0">Products Inventory</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Reports</li>
              <li class="breadcrumb-item active">Product Inventory</li>
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
               <div class="float-right d-print-none">
                <button type="button" onclick="window.print();" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Print</button>
                </div>
                <h4 class="text-center">Products Inventory Report as of </h4>
                <p class="text-center"><strong><?php echo date("F d, Y"); ?></strong></p> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered">
                  <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th class="text-center">Stocks</th>
                  </tr>
                  </thead>

                  <tbody>
                  <?php 
                  $qc = $conn->query("select * from tbl_product p inner join tbl_brand b on b.brand_id = p.brand_id inner join tbl_category c on c.category_id = p.category_id where p.is_deleted = 0 and store_id = '$store_id' order by product_name asc");
                  while ($rc = $qc->fetch_assoc()){ ?>
                    <tr>
                      <td width="30%"><?php echo $rc['product_name']; ?></td>
                      <td width="30%"><?php echo $rc['brand']; ?></td>
                      <td width="30%"><?php echo $rc['category']; ?></td>
                      <td width="10%" class="text-center"><?php echo $rc['stocks']; ?></td>
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
