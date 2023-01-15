<?php 
    $page = 'User Management - Customers';
    include '../template/header.php';
    include '../template/nav-bar.php';
    include '../template/side-bar.php';
    include '../template/modal.php';
 ?>

 
<style type="text/css">
  .modal-dialog{
    width: 95%;
    max-width: 768px;
  }
</style>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Customers</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">User Management</li>
              <li class="breadcrumb-item active">Customers</li>
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
                <h3 class="card-title">List of All Customers</h3> 
             
               
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php include '../template/message.php'; ?>
                <div class="dataTable-wrapper">
                <div class="dataTable-container">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>User Type</th>
                    <th>Account Status</th>
                    <th width="100">Action</th>
                  </tr>
                  </thead>

                  <tbody>
                  <?php 
                  $qc = $conn->query("select * from tbl_user u inner join tbl_barangay b on b.barangay_id = u.barangay_id inner join tbl_town t on t.town_id = b.town_id where u.user_access = 'Customer' order by u.lname asc");
                  while ($rc = $qc->fetch_assoc()){ ?>
                    <tr>
                      <td width="25%"><?php echo $rc['lname'].', '.$rc['fname'].' '.$rc['lname']; ?></td>
                       <td><?php echo $rc['location'].', Brgy. '.$rc['barangay'].', '.$rc['town']; ?>, Marinduque</td>
                       <td><?php echo $rc['user_access']; ?></td>
                       <td><?php if ($rc['is_approved'] == 1) { echo ($rc['is_active'] == 1 ? 'Active' : 'Inactive'); } else {
                          echo 'For Approval';
                       }

                         ?></td>
                       <td class="text-center">
                  
                    <button type="button" class="btn btn-primary btn-xs view" data-id="<?php echo $rc['user_id']; ?>" data-toggle="modal" data-target="#view" ><i class="fa fa-eye"></i></button>
                      <?php if ($rc['user_access'] == 'Admin'){ ?>
                      <span class="btn btn-secondary btn-xs" style="cursor: not-allowed;"><i class="fa fa-check-circle"></i></span>
                      <span class="btn btn-secondary btn-xs" style="cursor: not-allowed;"><i class="fa fa-power-off"></i></span>

                      <?php } else if ($rc['is_approved'] == 1) { ?>
                   <?php if ($rc['is_active'] == 0) { ?>
                    <button type="button" class="btn btn-success btn-xs action" title="Activate" data-action="activate" data-question="Are you sure you want to Activate <?php echo $rc['lname'].', '.$rc['fname'].' '.$rc['lname']; ?>?" data-id="<?php echo $rc['user_id']; ?>?" data-toggle="modal" data-target="#confirmModal" ><i class="fa fa-check-circle"></i></button>
                    <span class="btn btn-secondary btn-xs" style="cursor: not-allowed;"><i class="fa fa-power-off"></i></span>
                    <?php 
                    } else { ?>
                     <span class="btn btn-secondary btn-xs" style="cursor: not-allowed;"><i class="fa fa-check-circle"></i></span>
                    <button type="button" class="btn btn-danger btn-xs action" title="Deactivate"  data-action="deactivate" data-question="Are you sure you want to Deactivate <?php echo $rc['lname'].', '.$rc['fname'].' '.$rc['lname']; ?>?" data-id="<?php echo $rc['user_id']; ?>?" data-toggle="modal" data-target="#confirmModal" ><i class="fa fa-power-off"></i></button>
                    <?php } ?>
                    <?php } else {
                      ?>
                   
                      <button type="button" class="btn btn-success btn-xs action" title="Approve" data-action="Approve" data-question="Are you sure you want to approve <?php echo $rc['lname'].', '.$rc['fname'].' '.$rc['lname']; ?>?" data-id="<?php echo $rc['user_id']; ?>" data-toggle="modal" data-target="#confirmModal" ><i class="fa fa-thumbs-up"></i></button>
                       <button type="button" class="btn btn-danger btn-xs action" title="Reject" data-action="Reject" data-question="Are you sure you want to reject this user <?php echo $rc['lname'].', '.$rc['fname'].' '.$rc['lname']; ?>?" data-id="<?php echo $rc['user_id']; ?>" data-toggle="modal" data-target="#confirmModal" ><i class="fa fa-thumbs-down"></i></button>
                      <?php } ?>
                    </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                     <th>Name</th>
                    <th>Address</th>
                    <th>User Type</th>
                    <th>Account Status</th>
                    <th width="100">Action</th>
                  </tr>
                  </tfoot>
                </table>
                </div>
                </div>
                 <div class="modal fade" id="view">
                  <div class="modal-dialog">
                  <div class="modal-content p-3">
                   <div class="modal-header">
          <h5 class="modal-title" id="logOutModalLabel">User Information</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span> 
        </div>
                    <div class="user-info"></div>
                    </div>
                    </div>
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
              url: 'ajax/user-info.php',
              data: {id: $(this).data('id')},
            //  dataType: 'json',
              success: function(response){
                 $(".user-info").html(response);
                }
            });
      });
     
      $(".action").click(function(){
          $("#confirm_title").html("Confirm");
          $("#modal_confirm").html($(this).data('question'));
          $("#btn_confirm").attr("href", 'user-action.php?id=' + $(this).data('id') + "&back=customers.php&action=" + $(this).data('action'));
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
