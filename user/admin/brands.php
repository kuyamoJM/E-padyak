<?php 
    $page = 'Settings - Product Brands';
    include '../template/header.php';
    include '../template/nav-bar.php';
    include '../template/side-bar.php';
    include '../template/modal.php';
 ?>

 

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product Brands</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
              <li class="breadcrumb-item active">Product Brands</li>
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
                <h3 class="card-title">List of Product Brands</h3> 
                 <div class="float-right">
                    <button type="button" class="btn btn-primary btn-xs add"  data-toggle="modal" data-target="#add" ><i class="fa fa-plus"></i></button>
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
                    <th>Product Brand</th>
                    <th width="100">Action</th>
                  </tr>
                  </thead>

                  <tbody>
                  <?php 
                  $qc = $conn->query("select * from tbl_brand where is_deleted = 0 order by brand asc");
                  while ($rc = $qc->fetch_assoc()){ ?>
                    <tr>
                      <td><?php echo $rc['brand']; ?></td>
                       <td class="text-center">
                  
                  
                    <button type="button" class="btn btn-info btn-xs edit" data-id="<?php echo $rc['brand_id']; ?>" data-toggle="modal" data-target="#update"><i class="fa fa-pencil-alt"></i> 
                    </button>
                    <button type="button" class="btn btn-danger btn-xs delete" data-question="Are you sure you want to delete <?php echo $rc['brand']; ?>?" data-id="<?php echo $rc['brand_id']; ?>" data-toggle="modal" data-target="#confirmModal" ><i class="fa fa-trash"></i></button>
                    </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Product Brand</th>
                    <th width="100">Action</th>
                  </tr>
                  </tfoot>
                </table>
                </div></div>

                  <div class="modal fade" id="add">
                        <div class="modal-dialog">
                          <form action="ajax/brand-record.php" method="post" id="form_submit" >
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Add new record</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                  <div class="msg-err text-danger"></div>

                                <div class="form-group">
                                  <label>Product Brand:</label>
                                  <input type="text" required="required" name="brand" class="form-control" id="brand" autocomplete="off" />
                                </div>


                          </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                              <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                            </div>
                          </div>
                          </div>
                          </form>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                      <div class="modal fade" id="update">
                        <div class="modal-dialog">
                          <form action="ajax/brand-save.php" method="post" id="e_form_submit" >
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Update Information</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                <div class="msg-err-2 text-danger"></div>

                                <div class="form-group">
                                  <label for="e_brand">Brand:</label>
                                  <input type="text" name="e_brand" class="form-control" id="e_brand"  autocomplete="off"  />
                                  <input type="hidden" name="e_brand_id" id="e_brand_id" />
                                </div>

                               
                          </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                            </div>
                          </div>
                          </form>
                          <!-- /.modal-content -->
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
<script type="text/javascript">
  $(document).ready(function(){

      $(".edit").click(function(){
        $.ajax({
              type: 'POST',
              url: 'ajax/brand.php',
              data: {id: $(this).data('id')},
              dataType: 'json',
              success: function(response){
                  $("#e_brand_id").val(response.brand_id)
                  $("#e_brand").val(response.brand);
                }
            });
      });
      $("#form_submit").submit(function(){
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
           // dataType: 'json',
            success: function(response){
                if (response == 1){
                  window.location.href = "brands.php";
                } else {
                  $(".msg-err").html(response);
                }
              }
          });
        return false;
      })
      $("#e_form_submit").submit(function(){
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
           // dataType: 'json',
            success: function(response){
                if (response == 1){
                  window.location.href = "brands.php";
                } else {
                  $(".msg-err-2").html(response);
                }
              }
          });
        return false;
      })
      $(".delete").click(function(){
          $("#confirm_title").html("Confirm Delete");
          $("#modal_confirm").html($(this).data('question'));
          $("#btn_confirm").attr("href", 'brand-delete.php?id=' + $(this).data('id'));
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
