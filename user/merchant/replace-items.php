<?php 
    $page = 'Replace Items';
    include '../template/header.php';

 $id = '';
      if (isset($_GET['id'])){
        $id = addslashes($_GET['id']);
        } 

         $qo = $conn->query("select * from tbl_product_order po inner join tbl_order o on o.order_id = po.order_id inner join tbl_product p on p.product_id = po.product_id inner join tbl_brand b on b.brand_id = p.brand_id inner join tbl_category c on c.category_id = p.category_id inner join tbl_user u on u.user_id = o.user_id where po.product_order_id = '$id'") or die($conn->error);
         if ($qo->num_rows == 0){
          header("location: return-replace-items.php");
         }
         $ro = $qo->fetch_assoc();    include '../template/nav-bar.php';
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
            <h1 class="m-0">Replace Items</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Replace Items</li>
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
                <h3 class="w-100 card-title">Order Details:</h3> 
                <?php 

               
                ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="replace-items-record.php?order=<?php echo $ro['order_number']; ?>" method="post" id="form_submit" >
                                  <p>Customer Name: <strong><?php echo $ro['lname'].', '.$ro['fname'].' '.$ro['mname']; ?></strong></p>
                                  <p>Order #: <strong><?php echo $ro['order_number']; ?></strong></p>
                                  <p>Date Ordered: <strong><?php echo date("d-M-Y", strtotime($ro['date_ordered'])); ?></strong></p>
                                  <p>Product: <strong><?php echo $ro['product_name'].' ('.$ro['brand'].' - '.$ro['category'].')'; ?></strong></p>
                                  <input type="hidden" name="product_order_id" id="product_order_id" required="required" value="" />
                                  <p>No. of Item(s) to Replace
                                <div class="input-group"  style="max-width: 200px;">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-secondary btn-number"  data-type="minus" data-field="qty">
                            <span class="fa fa-minus"></span>
                          </button>
                      </span>
                      <input type="text" name="qty" readonly="readonly" class="form-control input-number text-center" value="1" min="1" max="<?php echo $ro['quantity']; ?>">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="qty">
                              <span class="fa fa-plus"></span>
                          </button>
                      </span>
                  </div>
                    <div class="form-group">
                      <p class="py-2">Reason for Item Replacement</p>
                      <input type="hidden" required="required" id="product_order_id" name="product_order_id" value="<?php echo $id; ?>" />
                      <textarea required="required" name="reason" id="reason" class="form-control" placeholder="Reason for Item Replacement" style="max-width: 300px; height: 90px;"></textarea>
                    </div>


                            <div class="text-left pb-3">
                              <a href="return-replace-items.php?order=<?php echo $ro['order_number']; ?>" class="btn btn-secondary" "><i class="fa fa-arrow-left"></i> Back</a>
                              &nbsp;
                              <button type="button" data-toggle="modal" data-target="#submit_return"  class="btn btn-primary"><i class="fa fa-exchange"></i> Replace</button>
                            </div>
                            <div class="modal fade" id="submit_return">
                        <div class="modal-dialog">
                         
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Confirm Submission</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                  <p class="text-center fw-bold">Are you sure you want to return this item?</p>


                          </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                              <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-check"></i> Continue</button>
                            </div>
                          </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
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

  
</script>
</body>
</html>
