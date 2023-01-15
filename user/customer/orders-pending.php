<?php 
    $page = 'Orders - Pending';
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
            <h1 class="m-0">Pending Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Pending Orders</li>
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
                <h3 class="card-title">Pending Orders</h3> 
               
                
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
                    <th class="text-center">Merchant</th>
                    <th width="100" class="text-center">Date Ordered</th>
                    <th width="100" class="text-center">Total Amount</th>
                    <th width="150" class="text-center">Payment Method</th>
                    <th width="110" class="text-center">Action</th>
                  </tr>
                  </thead>

                  <tbody>
                  <?php 
                  $qc = $conn->query("select * from tbl_order o left join tbl_mode_of_payment m on o.mode_of_payment_id = m.mode_of_payment_id where o.user_id = '$user_id' and o.status = 'Pending'") or die($conn->error);
                  while ($rc = $qc->fetch_assoc()){ 
                    $qs = $conn->query("select * from tbl_store where store_id in (select p.store_id from tbl_product p inner join tbl_product_order po on po.product_id = p.product_id where po.order_id = '".$rc['order_id']."')") or die($conn->error);
                    $rs = $qs->fetch_assoc();
                    ?>
                    <tr>
                      <td><?php echo $rc['order_number']; ?></td>
                       <td>
                      <?php echo $rs['store_name']; ?>
                       </td>
                      <td><?php echo date("d-M-Y", strtotime($rc['date_ordered'])); ?></td>
                       <td class="text-right">&#8369; <?php echo number_format($rc['total_amount'], 2); ?></td>
                      <?php
                      $qp = $conn->query("select * from tbl_payment where order_id = '".$rc['order_id']."'");
                      ?>
                        <td class="text-center"><?php echo ($rc['mode_of_payment_id'] == 0 ? 'Onhand Payment' : $rc['mode_of_payment']); ?>
                          <?php if ($qp->num_rows > 0) { echo '<br /><span class="text-muted" style="font-size: 10px;">(Pending Payment Approval)</span>'; } ?>
                        </td>
                      <td class="text-center">
                      <button type="button" data-id="<?php echo $rc['order_id']; ?>" data-toggle="modal" data-target="#view" class="btn btn-sm btn-primary view" title="View Order Info"><i class="fa fa-eye"></i></button>
                      
                      <?php if ($rc['mode_of_payment_id'] > 0 && $qp->num_rows == 0){ ?>
                      <button type="button" data-id="<?php echo $rc['order_id']; ?>" data-order="ORD-<?php echo str_pad($rc['order_id'], 8, "0", STR_PAD_LEFT).'-'.str_pad($rs['store_id'], 4, "0", STR_PAD_LEFT); ?>"  data-toggle="modal" data-mode="<?php echo $rc['mode_of_payment']; ?>" data-target="#payment" class="btn btn-sm btn-success payment" data-amount="<?php echo $rc['total_amount']; ?>" title="Add Payment"><i class="fa fa-peso-sign"></i></button>
                      <?php } else { ?>
                      <span class="btn btn-secondary btn-sm"><i class="fa fa-peso-sign"></i> </span>
                      <?php } ?>
                      <?php if ($rc['status'] == 'Pending' && $qp->num_rows == 0) { ?>
                      <button type="button" data-id="<?php echo $rc['order_id']; ?>" data-question="Are you sure you want to cancel <strong>ODR-<?php echo str_pad($rs['store_id'], 4, "0", STR_PAD_LEFT).'-'.str_pad($rc['order_id'], 8, "0", STR_PAD_LEFT); ?></strong>?" title="Paid"  data-id="<?php echo $rc['order_id']; ?>" data-toggle="modal" data-target="#confirmModal" class="btn btn-sm btn-danger cancel" title="Cancel Order"><i class="fa fa-trash"></i></button>
                      <?php } else { ?>
                      <span class="btn btn-secondary btn-sm"><i class="fa fa-trash"></i> </span>
                      <?php } ?>

                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th width="150" class="text-center">Order #</th>                  
                    <th class="text-center">Merchant</th>
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
   <!-- Edit Product -->
                     <div class="modal fade" id="payment">
                        <div class="modal-dialog">
                          <form action="order-payment.php" method="post" id="e_form_submit" enctype="multipart/form-data">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Add Payment</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <input type="hidden" name="e_product_id" id="e_product_id" />
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                  <div class="msg-err-2 text-danger"></div>

                                     <div class="row">
                                      <div class="col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Order #:</span>
                                      <p class="order-number"></p>
                                        </div>
                                        <div class="col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Payment Method:</span>
                                      <p class="mode-of-payment"></p>
                                        </div>
                                        <div class="col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Amount</span>
                                      <p class="amount"></p>
                                        </div>
                                        <div class="col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Reference/Transaction #:</span>
                                      <input type="text" class="form-control" id="refno" name="refno" required="required" placeholder="Reference/Transaction #">
                                        </div>
                                        <div class="col-12">
                                      <span style="font-size: 12px; font-weight: bold;">Other Details:</span>
                                      <textarea class="form-control" required="required" autocomplete="off" name="details" id="details" style="height: 100px;" placeholder="e.g. Sender Name. Remarks etc. "></textarea>
                                      <input type="hidden" name="order_id" id="order_id" required="required" />
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
    $(".cancel").click(function(){
          $("#confirm_title").html("Confirm Cancel");
          $("#modal_confirm").html($(this).data('question'));
          $("#btn_confirm").attr("href", 'order-cancel.php?id=' + $(this).data('id'));
      });
      $(".payment").click(function(){
          $(".order-number").html($(this).data('order'));
          $(".mode-of-payment").html($(this).data('mode'));
          $(".amount").html("&#8369; " + $(this).data('amount'));
          $("#order_id").val($(this).data('id'));
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
