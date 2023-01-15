<?php 
    $page = 'Orders - Paid';
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
    float: left;
    margin-right: 10px;
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
        .d-print-none{
          display: none;
        }
        .modal-backdrop{
          display: none;
        }
        .w-768{
          max-width: 100%;
        }
        .modal-content{
          box-shadow: unset;
          border: none;
          padding: 0;
        }
      }

 </style>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper d-print-none">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Paid Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Paid Orders</li>
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
                <h3 class="card-title">Paid Orders</h3> 
               
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php include '../template/message.php'; ?>
                 <div class="dataTable-wrapper">
                <div class="dataTable-container">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="150" class="text-center">Order #</th>                  
                    <th class="text-center">Customer Name</th>
                    <th width="100" class="text-center">Date Ordered</th>
                    <th width="100" class="text-center">Total Amount</th>
                    <th width="150" class="text-center">Payment Method</th>
                    <th width="110" class="text-center">Action</th>
                  </tr>
                  </thead>

                  <tbody>
                  <?php 
                  $qc = $conn->query("select * from tbl_order o left join tbl_mode_of_payment m on o.mode_of_payment_id = m.mode_of_payment_id inner join tbl_user u on u.user_id = o.user_id where o.order_id in (select order_id from tbl_product_order where product_id in (select product_id from tbl_product where store_id = '$store_id')) and o.status = 'Paid'") or die($conn->error);
                  while ($rc = $qc->fetch_assoc()){ 
                    
                    ?>
                    <tr>
                       <td><?php echo $rc['order_number']; ?></td>
                      <td>
                      <a href="user-info.php" data-id="<?php echo $rc['user_id']; ?>" data-toggle="modal" data-target="#view" class="view-user"><?php echo $rc['lname'].', '.$rc['fname'].' '.$rc['mname']; ?></a>
                       </td>
                      <td><?php echo date("d-M-Y", strtotime($rc['date_ordered'])); ?></td>
                       <td class="text-right">&#8369; <?php echo number_format($rc['total_amount'], 2); ?></td>
                      <?php
                      $qp = $conn->query("select * from tbl_payment where order_id = '".$rc['order_id']."'");
                      ?>
                        <td class="text-center"><?php echo ($rc['mode_of_payment_id'] == 0 ? 'Onhand Payment' : $rc['mode_of_payment']); ?>
                        </td>
                      <td class="text-center">
                      <button type="button" data-id="<?php echo $rc['order_id']; ?>" data-toggle="modal" data-target="#view" class="btn btn-sm btn-primary view" title="View Order Info"><i class="fa fa-eye"></i></button>
                      
                       <button type="button" data-id="<?php echo $rc['order_id']; ?>" data-question="Are you sure you want to move ORDER #: <strong>ODR-<?php echo str_pad($rc['store_id'], 4, "0", STR_PAD_LEFT).'-'.str_pad($rc['order_id'], 8, "0", STR_PAD_LEFT); ?></strong> to completed orders?" data-id="<?php echo $rc['order_id']; ?>" data-toggle="modal" data-target="#confirmModal" class="btn btn-sm btn-success completed" title="Move to Completed Orders"><i class="fa fa-check"></i></button>
                     

                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th width="150" class="text-center">Order #</th>                  
                    <th class="text-center">Customer Name</th>
                    <th width="100" class="text-center">Date Ordered</th>
                    <th width="100" class="text-center">Total Amount</th>
                    <th width="150" class="text-center">Payment Method</th>
                    <th width="110" class="text-center">Action</th>
                  </tr>
                  </tfoot>
                </table>
                </div></div>
                          
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

    <div class="modal fade" id="view">
                  <div class="modal-dialog w-768">
                  <div class="modal-content p-3">
                    <div class="text-right d-print-none">
                      <button type="button" class="close" title="Close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                    </div>
                    <div class="order-information">
                    </div>

                    </div>
                    </div>
                 </div>
<?php 
    include '../template/footer.php';
    include '../template/scripts.php';
?>  

<script src="../dist/js/demo.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".completed").click(function(){
          $("#confirm_title").html("Confirm Move");
          $("#modal_confirm").html($(this).data('question'));
          $("#btn_confirm").attr("href", 'order-move-to-completed.php?id=' + $(this).data('id'));
      });
      $(".view").click(function(){
        $.ajax({
              type: 'POST',
              url: 'ajax/order-information.php',
              data: {id: $(this).data('id')},
             // dataType: 'json',
              success: function(response){
                 //alert(response);
                 $(".order-information").html(response);
                }
            });
      });
      $(".view-user").click(function(){
        $.ajax({
              type: 'POST',
              url: 'ajax/user-info.php',
              data: {id: $(this).data('id')},
             // dataType: 'json',
              success: function(response){
                 //alert(response);
                 $(".order-information").html(response);
                }
            });
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
