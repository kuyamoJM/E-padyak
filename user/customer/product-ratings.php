<?php 
    $page = 'Product Ratings';
    include '../template/header.php';
    include '../template/nav-bar.php';
    include '../template/side-bar-customer.php';
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

 </style>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product Ratings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Product Ratings</li>
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
                <h3 class="card-title">Product Ratings</h3> 
               
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php include '../template/message.php'; ?>
                 <div class="dataTable-wrapper">
                <div class="dataTable-container">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="200">Products</th>
                    <th width="200">Merchant</th>
                    <th>Review</th>
                    <th width="100">Ratings</th>
                  </tr>
                  </thead>

                  <tbody>
                  <?php 
                  $qc = $conn->query("select p.*, b.*, c.*, s.store_name from tbl_product p inner join tbl_store s on s.store_id = p.store_id inner join tbl_brand b on b.brand_id = p.brand_id inner join tbl_category c on c.category_id = p.category_id where product_id in (select product_id from tbl_product_order where order_id in (select order_id from tbl_order where user_id = '$user_id' and status = 'Completed')) ") or die($conn->error);
                  while ($rc = $qc->fetch_assoc()){ ?>
                    <tr>
                      
                       <td>
                          <?php echo $rc['product_name'].' ('.$rc['brand'].' - '.$rc['category'].')'; ?>
                       </td>
                       <td>
                      <?php echo $rc['store_name']; ?>
                       </td>
                       <td>
                      <?php 
                      $qr = $conn->query("select * from tbl_ratings where user_id = '$user_id' and product_id = '".$rc['product_id']."'") or die($conn->error);
                      if ($qr->num_rows > 0) { 
                        $rr = $qr->fetch_assoc();
                       echo $rr['review']; 
                       } else {
                          echo '-';
                       } ?>
                       </td>
                       <td class="text-center">
                    <?php 
                      
                      if ($qr->num_rows > 0) { 
                        $rate = $rr['ratings'];
                       for ($i = 0; $i < 5; $i++){
                           if ($i < $rate) { echo '<i class="fa fa-star yellow-star mx-1 "> </i>'; }
                           else { echo '<i class="fa fa-star gray-star mx-1 "> </i>'; }
                        }
                     } else {

                    ?>
                      <a href="check-out.php?id=<?php echo $rc['store_id']; ?>" data-brand="<?php echo $rc['brand']; ?>" data-category="<?php echo $rc['category']; ?>" data-product="<?php echo $rc['product_name']; ?>" data-merchant="<?php echo $rc['store_name']; ?>" data-image="<?php echo $base_url; ?>/assets/img/products/<?php echo $rc['photo']; ?>" class="btn btn-primary rate" title="Check Out"  data-target="#rate"  data-toggle="modal" data-id="<?php echo $rc['product_id']; ?>"><i class="fa fa-star"></i> Rate</a>
                    <?php } ?>
                    </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Products</th>
                    <th>Merchants</th>
                    <th>Review</th>
                    <th>Ratings</th>
                  </tr>
                  </tfoot>
                </table>
                </div></div>
               
                       
                      </div>             
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
      <!-- Edit Product -->
                     <div class="modal fade" id="rate">
                        <div class="modal-dialog">
                          <form action="rate-products.php" method="post" id="e_form_submit" enctype="multipart/form-data">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Rate Product</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                  <div class="text-center">
                                    <img src="" class="product-image mb-3 mx-auto" style="width: 100%; border: 5px solid #EFEFEF; box-shadow: 0 0 5px #909090;" />
                                  </div>
                                     <div class="row">
                                      <div class="col-12 col-sm-6">
                                      <span style="font-size: 12px; font-weight: bold;">Product Name:</span>
                                      <p class="product-name"></p>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                      <span style="font-size: 12px; font-weight: bold;">Brand:</span>
                                      <p class="brand"></p>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                      <span style="font-size: 12px; font-weight: bold;">Cateogry</span>
                                      <p class="category"></p>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                      <span style="font-size: 12px; font-weight: bold;">Merchant:</span>
                                      <p class="merchant"></p>
                                        </div>
                                        <div class="col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Ratings:</span>
                                      <select name="ratings" id="ratings" required="required" class="form-control">
                                        <option selected="selected" disabled="disabled">-Rate-</option>
                                        <?php for ($r = 1; $r <= 5; $r++){
                                          echo '<option value="'.$r.'">'.$r.'</option>'; 
                                        }
                                        ?>
                                      </select>
                                      <input type="hidden" name="product_id" required="required" id="product_id" />
                                        </div>
                                         <div class="col-12">
                                          <span style="font-size: 12px; font-weight: bold;">Review</span>
                                          <textarea class="form-control" name="review" id="review" placeholder="Review" style="height: 100px;"></textarea>
                                            </div>
                                    
                                          </div>
                                      </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                          <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-check"></i> Submit</button>
                                        </div>
                                      </div>
                               </div>
                          <!-- /.modal-content -->
                          </form>
                        </div>
                        <!-- /.modal-dialog -->
  </div>
<?php 
    include '../template/footer.php';
    include '../template/scripts.php';
?>  

<script src="../dist/js/demo.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
     $(".rate").click(function(){
      $(".product-name").html($(this).data('product'));
      $(".brand").html($(this).data('brand'));
      $(".category").html($(this).data('category'));
      $(".merchant").html($(this).data('merchant'));
      $("#product_id").val($(this).data('id'));
      $(".product-image").attr('src', $(this).data('image'));
     });
  });

</script>
<!-- DataTables  & Plugins -->
<script src="<?php echo $base_url; ?>/user/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $base_url; ?>/user/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $base_url; ?>/user/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $base_url; ?>/user/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo $base_url; ?>/user/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo $base_url; ?>/user/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo $base_url; ?>/user/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo $base_url; ?>/user/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo $base_url; ?>/user/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo $base_url; ?>/user/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo $base_url; ?>/user/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo $base_url; ?>/user/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": false, "lengthChange": false, "autoWidth": false,
      "buttons": [""]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

</script>

</body>
</html>
