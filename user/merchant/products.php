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

 </style>

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
              <li class="breadcrumb-item active">Products</li>
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
                <h3 class="card-title">Product List</h3> 
                 <div class="float-right">
                    <button type="button" class="btn btn-primary btn-xs add" data-toggle="modal" data-target="#add" ><i class="fa fa-plus"></i> New</button>
                  </div>
               
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php include '../template/message.php'; ?>
                 <div class="dataTable-wrapper">
                <div class="dataTable-container">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Product Name</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th width="100">Action</th>
                  </tr>
                  </thead>

                  <tbody>
                  <?php 
                  $qc = $conn->query("select * from tbl_product p inner join tbl_brand b on b.brand_id = p.brand_id inner join tbl_category c on c.category_id = p.category_id where p.is_deleted = 0 and store_id = '$store_id' order by product_name asc");
                  while ($rc = $qc->fetch_assoc()){ ?>
                    <tr>
                      <td width="250"><?php echo $rc['product_name']; ?>
                      <br />Brand:<strong><?php echo $rc['brand']; ?></strong>
                      <br />Category:<strong><?php echo $rc['category']; ?> </strong></td>
                      <td width="100">
                      <img class="thumbs" src="<?php echo $base_url; ?>/assets/img/products/<?php echo $rc['photo']; ?>" /></td>
                       <td><?php echo $rc['description']; ?>
                         <br />Price: <strong>&#8369; <?php echo number_format($rc['price'], 2); ?></strong>
                         <br />
                         <?php
                         $qrate = $conn->query("select AVG(ratings) as rate from tbl_ratings where product_id = '".$rc['product_id']."'");
                         $rrate = $qrate->fetch_assoc();
                           $ratings = $rrate['rate'];
                             //$ratings = 2.76;   
                            if ($ratings == ''){
                                echo '<i>No Ratings Yet.</i>';
                            } else {  
                              echo 'Ratings: ';
                                $half = 0;
                                if (fmod($ratings,1) >= 0.80){
                                    $rest = floor($ratings) + 1;
                                } else {
                                    $rest = floor($ratings);
                                    if (fmod($ratings,1) >= 0.20){
                                        $half = 1;
                                    }
                                } 
                                for ($i = 0; $i < $rest; $i++){
                                    echo '<i class="fa fa-star yellow-star mx-1 "> </i>';
                                }
                                if ($half > 0){
                                  echo '<i class="fa fa-star-half-o yellow-star mx-1 "> </i>';   
                                  $rest += 1;
                                }

                                for ($ii = $rest; $ii < 5; $ii++){
                                    echo '<i class="fa fa-star-o gray-star mx-1 "> </i>';
                                }
                                echo number_format($ratings, 2);

                            }
                        ?>
                         <br /><?php echo ($rc['stocks'] == 0 ? '<span style="font-weight:bold; color: #ff0000;">Out of Stock</span>' : 'Stocks: <strong>'.$rc['stocks']).'</strong>'; ?>
                       </td>
                       <td class="text-center">
                  
                    <button type="button" class="btn btn-success btn-xs add-stock" data-id="<?php echo $rc['product_id']; ?>" title="Add Stocks" data-toggle="modal" data-target="#add_stock" ><i class="fa fa-plus"></i></button>

                    <button type="button" class="btn btn-info btn-xs edit" data-id="<?php echo $rc['product_id']; ?>" title="Edit" data-toggle="modal" data-target="#update"><i class="fa fa-pencil-alt"></i> 
                    </button>
                    <button type="button" class="btn btn-danger btn-xs delete" title="delete" data-question="Are you sure you want to delete <?php echo $rc['product_name']; ?>?" data-id="<?php echo $rc['product_id']; ?>" data-toggle="modal" data-target="#confirmModal" ><i class="fa fa-trash"></i></button>
                    </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Product Name</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th width="100">Action</th>
                  </tr>
                  </tfoot>
                </table>
                </div></div>
               
                        <!-- Add Product -->
                  <div class="modal fade" id="add">
                        <div class="modal-dialog w-768">
                          <form action="ajax/product-record.php" method="post" id="form_submit" enctype="multipart/form-data">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Add New Product</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                  <div class="msg-err text-danger"></div>

                                     <div class="row">
                                      <div class="col-md-6 col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Product Brand</span>
                                      <select class="form-control mb-3" required="required" name="brand" id="brand">
                                            <option disabled value="" selected>- Select Brand -</option>
                                            <?php 
                                            $q = $conn->query("select * from tbl_brand order by brand asc");
                                            while ($r = $q->fetch_assoc()){
                                              echo '<option value="'.$r['brand_id'].'">'.$r['brand'].'</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Product Category</span>
                                      <select class="form-control mb-3" required="required" name="category" id="category">
                                            <option disabled value="" selected>- Select Category -</option>
                                            <?php 
                                            $q = $conn->query("select * from tbl_category order by category asc");
                                            while ($r = $q->fetch_assoc()){
                                              echo '<option value="'.$r['category_id'].'">'.$r['category'].'</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6  col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Product Name</span>
                                      <input type="hidden" name="store_id" id="store_id" value="<?php echo $store_id; ?>" />
                                      <div class="input-group mb-3">
                                        <input type="text" class="form-control" required="required" autocomplete="off" name="product_name" id="product_name" placeholder="- Product Name - ">
                                      </div>
                                    </div>
                                       <div class="col-md-6  col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Price</span>
                                      <div class="input-group mb-3">
                                        <input type="text" class="form-control numeric" required="required" autocomplete="off" name="price" id="price" placeholder="- Price - ">
                                      </div>
                                    </div>
                                     <div class=" col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Description</span>                                     
                                       <div class="input-group mb-3">
                                        <textarea class="form-control" required="required" autocomplete="off" name="description" id="description" style="height: 100px;" placeholder="- Description - "></textarea>
                                      </div>
                                    </div>
                                 
                                    <div class="col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Photo</span>
                                      <div class="input-group mb-3">
                                        <input type="file" class="form-control image-only" required="required" autocomplete="off" name="photo" id="photo" placeholder="- Photo - ">
                                      </div>
                                    </div>
                                     <div class="col-12">
                                      <span style="font-size: 12px; font-weight: bold;">3D Image Link (*optional)</span>
                                      <div class="input-group mb-3">
                                        <textarea class="form-control" autocomplete="off" name="img_3d" id="img_3d" placeholder="- Embed Code - " style="height: 100px;" ></textarea>
                                      </div>
                                    </div>
                                          </div>
                                      </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                                        </div>
                                      </div>
                                </div>
                          <!-- /.modal-content -->
                          </form>
                         
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <!-- Edit Product -->
                     <div class="modal fade" id="update">
                        <div class="modal-dialog w-768">
                          <form action="ajax/product-save.php" method="post" id="e_form_submit" enctype="multipart/form-data">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Product Information</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <input type="hidden" name="e_product_id" id="e_product_id" />
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                  <div class="msg-err-2 text-danger"></div>

                                     <div class="row">
                                      <div class="col-md-6 col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Product Brand</span>
                                      <select class="form-control mb-3" required="required" name="e_brand" id="e_brand">
                                            <option disabled value="" selected>- Select Brand -</option>
                                            <?php 
                                            $q = $conn->query("select * from tbl_brand order by brand asc");
                                            while ($r = $q->fetch_assoc()){
                                              echo '<option value="'.$r['brand_id'].'">'.$r['brand'].'</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Product Category</span>
                                      <select class="form-control mb-3" required="required" name="e_category" id="e_category">
                                            <option disabled value="" selected>- Select Category -</option>
                                            <?php 
                                            $q = $conn->query("select * from tbl_category order by category asc");
                                            while ($r = $q->fetch_assoc()){
                                              echo '<option value="'.$r['category_id'].'">'.$r['category'].'</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6  col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Product Name</span>
                                      <div class="input-group mb-3">
                                        <input type="text" class="form-control" required="required" autocomplete="off" name="e_product_name" id="e_product_name" placeholder="- Product Name - ">
                                      </div>
                                    </div>
                                       <div class="col-md-6  col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Price</span>
                                      <div class="input-group mb-3">
                                        <input type="text" class="form-control numeric" required="required" autocomplete="off" name="e_price" id="e_price" placeholder="- Price - ">
                                      </div>
                                    </div>
                                     <div class=" col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Description</span>                                     
                                       <div class="input-group mb-3">
                                        <textarea class="form-control" required="required" autocomplete="off" name="e_description" id="e_description" style="height: 100px;" placeholder="- Description - "></textarea>
                                      </div>
                                    </div>
                                 
                                    <div class="col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Photo</span>
                                        <input type="file" class="form-control image-only" autocomplete="off" name="e_photo" id="e_photo" placeholder="- Photo - ">
                                        <span class="text-muted" style="font-size: 10px;">(optional)</span>
                                    </div>
                                          </div>
                                      </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                                        </div>
                                      </div>
                               </div>
                          <!-- /.modal-content -->
                          </form>
                        </div>
                        <!-- /.modal-dialog -->
                      </div>  
                      <!-- Add Stock -->
                     <div class="modal fade" id="add_stock">
                        <div class="modal-dialog">
                          <form action="product-add-stock.php" method="post" id="a_form_submit" enctype="multipart/form-data">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Add Stock</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <input type="hidden" name="a_product_id" id="a_product_id" />
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                  <div class="msg-err-2 text-danger"></div>

                                     <div class="row">
                                      <div class="col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Product Name</span> : <span class="p-name"></span>
                                      <br />
                                      <span style="font-size: 12px; font-weight: bold;">Brand</span> : <span class="p-brand"></span>
                                      <br />
                                      <span style="font-size: 12px; font-weight: bold;">Category</span> : <span class="p-category"></span>
                                    </div>
                                    
                                    <div class="col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Additional Stocks</span>
                                        <input type="text" class="form-control numeric" required="required" autocomplete="off" name="stock" id="stock" placeholder="- Additional Stocks - ">
                                    </div>
                                      <div class="col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Remarks</span>
                                        <input type="text" class="form-control" required="required" autocomplete="off" name="remarks" id="remarks" placeholder="- Remarks - ">
                                    </div>
                                    
                                          </div>
                                      </div>
                                        <div class="modal-footer justify-content-between">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                          <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                                        </div>
                                      </div>
                               </div>
                          <!-- /.modal-content -->
                          </form>
                        </div>
                        <!-- /.modal-dialog -->
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
  </div>
<?php 
    include '../template/footer.php';
    include '../template/scripts.php';
?>  

<script src="../dist/js/demo.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $(".image-only").change(function(){
          if ($(this).val() != '') {
            var ext = $(this).val().substring($(this).val().length-4, $(this).val().length);
            ext = ext.toLowerCase();
            if (ext != '.jpg' && ext != '.png' && ext != 'jpeg'  && ext != '.gif'  && ext != '.bmp'){
                $("#alertModal .modal-body").html('Please select a valid image.');
                $('#alertModal').modal('show').css('z-index', '10000000');
                $(this).val('');
            }
          }
        });
      $(".add-stock").click(function(){
        $.ajax({
              type: 'POST',
              url: 'ajax/product-info.php',
              data: {id: $(this).data('id')},
              dataType: 'json',
              success: function(response){
                  $("#a_product_id").val(response.product_id);
                  $(".p-name").html(response.product_name);
                  $(".p-brand").html(response.brand);
                  $(".p-category").html(response.category); 
                }
            });
      });
      $(".edit").click(function(){
        $.ajax({
              type: 'POST',
              url: 'ajax/products.php',
              data: {id: $(this).data('id')},
              dataType: 'json',
              success: function(response){
                  $("#e_product_id").val(response.product_id);
                  $('#e_brand option[value="' + response.brand_id +'"]').prop('selected', true);
                  $('#e_category option[value="' + response.category_id +'"]').prop('selected', true);
                  $("#e_product_name").val(response.product_name);
                  $("#e_price").val(response.price);
                  $("#e_description").val(response.description);
                }
            });
      });
      $("#form_submit").submit(function(){
        var formData = new FormData($(this)[0]);
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: formData,
              processData: false,  // tell jQuery not to process the data
              contentType: false,  // tell jQuery not to set contentType
              success: function(response){
            if (response != '1'){
                  $(".msg-err").html(response);
              } else {
                  window.location.href = "products.php";
              }
            }
          });
      
        return false;
      });
      $("#e_form_submit").submit(function(){
         var formData = new FormData($(this)[0]);
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: formData,
              processData: false,  // tell jQuery not to process the data
              contentType: false,  // tell jQuery not to set contentType
              success: function(response){
            if (response != '1'){
                  $(".msg-err-2").html(response);
              } else {
                  window.location.href = "products.php";
              }
            }
          });
      
        return false;
      })
      $(".delete").click(function(){
          $("#confirm_title").html("Confirm Delete");
          $("#modal_confirm").html($(this).data('question'));
          $("#btn_confirm").attr("href", 'product-delete.php?id=' + $(this).data('id'));
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
