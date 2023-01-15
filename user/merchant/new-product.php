<?php 
    $page = 'New Products';
    include '../template/header.php';
    include '../template/nav-bar.php';
    include '../template/side-bar-merchant.php';
    include '../template/modal.php';
 ?>

 

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active"><a href="products.php">Products</a></li>
              <li class="breadcrumb-item active">New Product</li>
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
                <h3 class="card-title">Add New Product</h3> 
                 <div class="float-right">
                    <a href="products.php" class="btn btn-primary btn-xs add" ><i class="fa fa-arrow-left"></i> Back</a>
                  </div>
               
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                   <form action="ajax/product-record.php" method="post" id="customer_sign_up">
                      <div class="row">
                          <div class="col-md-4 col-sm-6 col-12">
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" required="required" autocomplete="off" name="fname" id="fname" placeholder="- Product Name - ">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                           <select class="form-control mb-3" required="required" name="town" id="town">
                                <option disabled value="" selected>- Select Brand -</option>
                                <?php 
                                $q = $conn->query("select * from tbl_brand order by brand asc");
                                while ($r = $q->fetch_assoc()){
                                  echo '<option value="'.$r['brand_id'].'">'.$r['brand'].'</option>';
                                }

                                ?>
                            </select>
                        </div>
                         <div class="col-md-4 col-sm-6 col-12">
                           <select class="form-control mb-3" required="required" name="town" id="town">
                                <option disabled value="" selected>- Select Category -</option>
                                <?php 
                                $q = $conn->query("select * from tbl_category order by category asc");
                                while ($r = $q->fetch_assoc()){
                                  echo '<option value="'.$r['category_id'].'">'.$r['category'].'</option>';
                                }

                                ?>
                            </select>
                        </div>
                      
                      </div>
                    </form>
              </div>
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
<script src="../dist/js/demo.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $(".view").click(function(){
        $.ajax({
              type: 'POST',
              url: 'ajax/subscription.php',
              data: {id: $(this).data('id')},
              dataType: 'json',
              success: function(response){
                 
                  $(".modal-title").html(response.subscription);
                  $(".renewal").html("<strong>Renewal:</strong> " + response.renewal);
                  $(".fee").html("<strong>Fee:</strong> &#8369; " + response.fee);
                }
            });
      });
     
  });

</script>

</body>
</html>
