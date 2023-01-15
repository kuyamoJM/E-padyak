<?php 
    $page = 'Settings - Subscription';
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
            <h1 class="m-0">Subscription</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
              <li class="breadcrumb-item active">Subscription</li>
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
                <h3 class="card-title">List of Available Subscription</h3> 
                 <div class="float-right">
                    <button type="button" class="btn btn-primary btn-xs add" data-id="<?php echo $rc['content_id']; ?>" data-toggle="modal" data-target="#add" ><i class="fa fa-plus"></i></button>
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
                    <th>Subscription</th>
                    <th class="d-sm-block d-none">Renewal</th>
                    <th>fee</th>
                    <th width="100">Action</th>
                  </tr>
                  </thead>

                  <tbody>
                  <?php 
                  $qc = $conn->query("select * from tbl_subscription where is_deleted = 0 order by subscription asc");
                  while ($rc = $qc->fetch_assoc()){ ?>
                    <tr>
                      <td width="25%"><?php echo $rc['subscription']; ?></td>
                       <td class="d-sm-block d-none"><?php echo $rc['renewal']; ?></td>
                       <td>&#8369; <?php echo number_format($rc['fee'], 2); ?></td>
                       <td class="text-center">
                  
                    <button type="button" class="btn btn-success btn-xs view" data-id="<?php echo $rc['subscription_id']; ?>" data-toggle="modal" data-target="#view" ><i class="fa fa-eye"></i></button>

                    <button type="button" class="btn btn-info btn-xs edit" data-id="<?php echo $rc['subscription_id']; ?>" data-toggle="modal" data-target="#update"><i class="fa fa-pencil-alt"></i> 
                    </button>
                    <button type="button" class="btn btn-danger btn-xs delete" data-question="Are you sure you want to delete <?php echo $rc['subscription']; ?>?" data-id="<?php echo $rc['subscription_id']; ?>" data-toggle="modal" data-target="#confirmModal" ><i class="fa fa-trash"></i></button>
                    </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Subscription</th>
                    <th class="d-sm-block d-none">Renewal</th>
                    <th>fee</th>
                    <th width="100">Action</th>
                  </tr>
                  </tfoot>
                </table>
                </div></div>
                 <div class="modal fade" id="view">
                  <div class="modal-dialog">
                  <div class="modal-content p-3">
                    <h3 class="text-center modal-title">Title</h3>
                    <p class="renewal"></p>
                    <p class="fee"></p>
                    </div>
                    </div>
                 </div>
                  <div class="modal fade" id="add">
                        <div class="modal-dialog">
                          <form action="ajax/subscription-record.php" method="post" id="form_submit" >
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
                                  <label>Subcription:</label>
                                  <input type="text" required="required" name="subscription" class="form-control" id="subscription" autocomplete="off" />
                                </div>

                                <div class="form-group">
                                  <label for="renewal">Renewal:</label>
                                    <select name="renewal" id="renewal" class="form-control" required="required">
                                      <option value="" selected="selected" disabled="disabled">--select--</option>>
                                      <option value="Monthly">Monthly</option>>
                                      <option value="Quarterly">Quarterly</option>>
                                      <option value="Yearly">Yearly</option>>
                                    </select>
                               </div>
                                <div class="form-group">
                                  <label for="fee">Fee:</label>
                                  <input type="text" required="required" name="fee" class="form-control numeric" id="fee"  autocomplete="off"  />
                                </div>
                              </div>
                          </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                              <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                            </div>
                          </div>
                          </form>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                 <div class="modal fade" id="update">
                        <div class="modal-dialog">
                          <form action="ajax/subscription-save.php" method="post" id="e_form_submit" >
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
                                  <label for="e_subscription">Subcription:</label>
                                  <input type="text" name="e_subscription" class="form-control" id="e_subscription"  autocomplete="off"  />
                                  <input type="hidden" name="e_subscription_id" id="e_subscription_id" />
                                </div>

                                <div class="form-group">
                                  <label for="e_renewal">Renewal:</label>
                                    <select name="e_renewal" id="e_renewal" class="form-control" required="required">
                                      <option value="" selected="selected" disabled="disabled">--select--</option>>
                                      <option value="Monthly">Monthly</option>>
                                      <option value="Quarterly">Quarterly</option>>
                                      <option value="Yearly">Yearly</option>>
                                    </select>
                               </div>
                                <div class="form-group">
                                  <label for="e_fee">Fee:</label>
                                  <input type="text" name="e_fee" class="form-control numeric" id="e_fee"  autocomplete="off"  />
                                </div>
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
      $(".edit").click(function(){
        $.ajax({
              type: 'POST',
              url: 'ajax/subscription.php',
              data: {id: $(this).data('id')},
              dataType: 'json',
              success: function(response){
                  $("#e_subscription_id").val(response.subscription_id)
                  $("#e_subscription").val(response.subscription);
                  $('#e_renewal option[value="' + response.renewal +'"]').prop('selected', true);
                  $("#e_fee").val(response.fee);
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
                  window.location.href = "subscription.php";
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
                  window.location.href = "subscription.php";
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
          $("#btn_confirm").attr("href", 'subscription-delete.php?id=' + $(this).data('id'));
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
