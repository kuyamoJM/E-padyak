<?php 
    $page = 'Return/Replace Items';
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
            <h1 class="m-0">Return/Replace Items</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Return/Replace Items</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row --?>
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
                <h3 class="w-100 card-title">Please Enter the Order Number below:</h3> 
                <form action="return-replace-items.php" method="post" class="row"  style="max-width: 400px;" >
                <?php 

                $order_number = '';
                if (isset($_GET['order'])){
                  $order_number = addslashes($_GET['order']);
                  } 
                if (isset($_POST['order'])){
                  $order_number = addslashes($_POST['order']);
                  } ?>
                  <div class="col-md-8">
                  <input type="text" name="order" id="order" class="form-control" value="<?php echo stripslashes($order_number); ?>" />
                  </div>
                  <div class="col-md-4">
                  <button type="submit" class="btn btn-primary d-inline-block"><i class="fas fa-paper-plane"></i> Submit</button>
                  </div>
                </form>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="min-height: 70vh;">
                <?php if ($order_number != ''){


                  ?>
                                  <?php include '../template/message.php'; ?>

                  <?php 
                    $qo = $conn->query("select o.*, u.fname, u.lname, u.mname, m.* from tbl_order o inner join tbl_user u on o.user_id = u.user_id left join tbl_mode_of_payment m on o.mode_of_payment_id = m.mode_of_payment_id where o.order_number = '$order_number' and o.order_id in (select order_id from tbl_product_order where product_id in (select product_id from tbl_product where store_id = '$store_id'))") or die($conn->error);
                    if ($qo->num_rows == 0 ) { echo '<h3>Order Number not found.</h3>'; } else {
                      $ro = $qo->fetch_assoc();
                      if ($ro['status'] != 'Completed') { echo '<h3>Order not yet completed.</h3>'; } else {
                      $id = $ro['order_id'];
                      $qm = $conn->query("select * from tbl_store where store_id in (select store_id from tbl_product where product_id in (select product_id from tbl_product_order where order_id = '$id'))") or die($conn->error);
                      $rm = $qm->fetch_assoc();
                      ?>
                      <div class="p-3">
                      <table width="100%" border="1" cellpadding="4" cellspacing="4">
                        <tr>
                          <td colspan="5"><h4 class="text-center p-1 m-0">Order Information</h4></td>
                        </tr>
                        <tr>
                          <td colspan="2">Order #: &nbsp; <strong><?php echo $ro['order_number']; ?></strong></td>
                          <td colspan="3">Order Date: &nbsp; <strong><?php echo date("d-M-Y", strtotime($ro['date_ordered'])); ?></strong></td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                          <td colspan="2">Customer Name: &nbsp; <strong><?php echo $ro['lname'].', '.$ro['fname'].' '.$ro['mname']; ?></strong></td>
                          <td colspan="3">Merchant: &nbsp; <strong><?php echo $rm['store_name']; ?></strong>
                        </tr>
                       
                       
                        <tr>
                          <td>Item</td>
                          <td class="text-center">Quantity</td>
                          <td class="text-center">Price</td>
                          <td class="text-center">Amount</td>
                          <td width="180" class="text-center">Action</td>
                        </tr>
                            <?php 
                                $qp = $conn->query("select * from tbl_product_order po inner join tbl_product p on p.product_id = po.product_id inner join tbl_brand b on b.brand_id = p.brand_id inner join tbl_category c on c.category_id = p.category_id where p.store_id = '".$rm['store_id']."' and po.order_id = '$id'") or die($conn->error); 
                                $total = 0;
                                while ($rp = $qp->fetch_assoc()) {
                                $total += $rp['amount']; ?>
                            <tr>
                                <td>
                                <?php echo $rp['product_name'].' ('.$rp['brand'].' - '.$rp['category'].')'; ?></td>
                                <td class="text-center"><?php echo $rp['quantity']; ?></td>
                                <td class="text-right">&#8369; <?php echo number_format($rp['price'], 2); ?></td>
                                <td class="text-right">&#8369; <?php echo number_format($rp['amount'], 2); ?></td>
                                <td class="text-center">
                                  <a href="return-items.php?id=<?php echo $rp['product_order_id']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-undo"></i> Return </a> 
                                  <a href="replace-items.php?id=<?php echo $rp['product_order_id']; ?>" class="btn btn-sm btn-success"><i class="fas fa-exchange"></i> Replace </a> 
                                </td>
                                
                            </tr>
                            <?php } ?>
                          
                        </table>
                        
                        </div> 
                        <?php } } }
                  ?>

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
  $('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

  $(document).ready(function(){
    $(".return").click(function(){
        $(".product-info").html($(this).data('return'));
        $(".product_order_id").val($(this).data('id'));
        //$(".input-number").attr("max", $(this).data('quantity')); 
        $(".input-number").attr({
   "max" : 10,
   "min" : 1
});
    });
  });
</script>
</body>
</html>
