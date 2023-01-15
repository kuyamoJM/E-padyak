<?php 
    $page = 'Product Check-out';
    include '../template/header.php';
    $id = '';
    if (isset($_GET['id'])){
      $id = $_GET['id'];
    }
    $qs = $conn->query("select * from tbl_store where store_id = '$id'");
    if ($qs->num_rows == 0){
      header("location: cart.php");
    }
    $rs = $qs->fetch_assoc();
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
            <h1 class="m-0">Cart</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Product Check-out</li>
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
                <h3 class="card-title">Check-out Products</h3> 
               
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <form method="post" action="checked-out.php">
                    <p>Merchant: <strong><?php echo $rs['store_name']; ?></strong>
                    </p>
                    <table width="100%" cellspacing="2" cellpadding="5" border="1">
                          <tr>
                              <th width="30">&nbsp;</th>
                              <th>Product</th>
                              <th width="150" class="text-center">Quantity</th>
                              <th width="150" class="text-center">Price</th>
                              <th width="120" class="text-center">Amount</th>
                          </tr>
                          <?php 
                              $qc = $conn->query("select * from tbl_cart t inner join tbl_product p on p.product_id = t.product_id inner join tbl_brand b on b.brand_id = p.brand_id inner join tbl_category c on c.category_id = p.category_id where p.product_id in (select product_id from tbl_product where store_id = '$id')") or die($conn->error);
                              $total = 0;
                              while ($rc = $qc->fetch_assoc()){ ?>
                                <tr>
                                    <td><input type="checkbox" name="cart_id[]" data-amount="<?php echo $rc['amount']; ?>" class="check" value="<?php echo $rc['cart_id']; ?>" checked="checked" /></td>
                                    <td><?php echo $rc['product_name'].' ('.$rc['brand'].' - '.$rc['category'].') <br ><strong>Description</strong>: '.$rc['description']; ?></td>
                                    <td class="text-center"><?php echo $rc['quantity']; ?></td>
                                    <td class="text-right">&#8369; <?php echo number_format($rc['price'], 2); ?></td>
                                    <td class="text-right">&#8369; <?php echo number_format($rc['amount'], 2); ?></td>
                                </tr>
                              <?php 
                                $total += $rc['amount']; 
                              } ?>
                              <tr>
                                  <td colspan="4" class="text-right"><strong>Sub-Total</strong></td>
                                  <td colspan="4" class="text-right"><strong>&#8369; <span class="sub_total"><?php echo number_format($total, 2); ?></span></strong>
                                  <input type="hidden" name="total" value="<?php echo $total; ?>" id="total">
                                  </td>
                              </tr>
                              <tr>
                                  <td colspan="4" class="text-right"><strong>Delivery Charge</strong></td>
                                  <td colspan="4" class="text-right"><strong>&#8369; <span class="delivery-charge">0.00</span></strong></td>
                              </tr>
                              <tr>
                                  <td colspan="4" class="text-right"><strong>Total Amount Due</strong></td>
                                  <td colspan="4" class="text-right"><strong>&#8369; <span class="total-amount"><?php echo number_format($total, 2); ?></span></strong></td>
                              </tr>
                    </table>
                    <div class="row mx-auto p-3" style="max-width: 768px; width: 100%;">
                      <div class="py-2 col-md-6 col-12">
                      Mode of Payment: 
                      <br />
                      <select required="required" name="mop" id="mop" class="form-control">
                        <option selected="selected" value="" disabled="disabled">-Select Mode of Payment</option>
                        <option value="0">On Hand Payment</option>
                        <?php $qp = $conn->query("select * from tbl_mode_of_payment where store_id = '$id' and is_deleted = 0") or die($conn->error);
                         while ($rp = $qp->fetch_assoc()) { ?>
                          <option value="<?php echo $rp['mode_of_payment_id']; ?>"><?php echo $rp['mode_of_payment']; ?></option>
                         <?php } ?>
                      </select>
                      </div>
                      <div class="py-2 col-md-6 col-12">
                      Order Type:
                      <br />
                       <select required="required" name="order_type" id="order_type" class="form-control">
                        <option selected="selected" value="" disabled="disabled">-Select Order Type</option>
                        <option value="For Pick-up">For Pick-up</option>
                        <?php if ($rs['accept_delivery'] == 1){ ?><option value="For Delivery">For Delivery</option><?php } ?>
                      </select>
                      </div>
                      <div class="py-2 col-12 address d-none">
                      Delivery Address:
                      <br />
                       <div class="row">
                          <div class="col-sm-6 col-12">
                           <select class="form-control mb-3"  name="town" id="town">
                                <option disabled value="" selected>- Select Town -</option>
                                <?php 
                                $q = $conn->query("select * from tbl_town t inner join tbl_delivery_charge d on d.town_id = t.town_id where d.store_id = '".$rs['store_id']."' order by t.town asc");
                                while ($r = $q->fetch_assoc()){
                                  echo '<option value="'.$r['town_id'].'" data-charge="'.$r['delivery_charge'].'">'.$r['town'].'</option>';
                                }

                                ?>
                            </select>
                        </div>
                          <div class="col-sm-6 col-12">
                          <div class="brgy">
                             <select class="form-control mb-3" required="required" name="barangay" id="barangay">
                                   <option disabled selected>- Select Barangay -</option>

                               

                                ?>
                            </select>
                          </div>
                        </div>
                       </div>
                      </div>
                      <div class="py-2  col-12">
                      Remarks:
                      <br />
                       <textarea required="required"  class="form-control" style="height: 100px;" placeholder="(e.g. Landmarks, messages etc.)" name="remarks" id="remarks"></textarea>
                      </div>
                     
                    </div>
                     <div class="text-center">
                          <div class="mx-auto d-inline-block">
                            <a href="cart.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back to Cart</a> &nbsp;
                            <button type="submit" class="btn btn-primary check-out"><i class="fa fa-shopping-cart"></i> Checkout</button>
                          </div>
                          </div>
                    </form>
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
      $(".check").click(function(){
             var total = 0;

              if ($(".check:checked").length == 0){
                  $(".check-out").attr("disabled", true);
              } else {
                $(".check-out").removeAttr("disabled");

              }
          $( ".check" ).each(function() {
           if ($(this).prop('checked') == true){
                total  = total + parseFloat($(this).data('amount'));
           }
          });
          $(".sub_total").html(total.toFixed(2));
          $("#total").val(total.toFixed(2));
           compute();

      });
      $("#order_type").change(function(){
            if ($(this).val() == 'For Pick-up'){
              $(".address").addClass('d-none');
              $("#town").attr("required", false);
              $(".brgy").html('');
              $(".delivery-charge").html('0.00');
            } else {
              $(".address").removeClass('d-none');
              $("#town").attr("required", true);
              $("#town").change();
            }
            compute();
      });
      $("#town").change(function(){
        $.post('../ajax/barangay.php', { town: $(this).val()}, function(response){
            $(".brgy").html(response);
        });
         compute();
        
    });
      function compute(){
        //var charge = $(".delivery-charge").html();
        var total2 = $("#total").val();
        var totalAmount = 0
        if ($("#town").val() != null){
          $(".delivery-charge").html($("#town option:selected").data('charge'));
          charge = $("#town option:selected").data('charge');
          if ($("#order_type").val() == 'For Pick-up'){
            charge = 0;
            $(".delivery-charge").html('0.00');
          }
          totalAmount = parseFloat(charge) + parseFloat(total2);

        } else {
          totalAmount = $("#total").val();
                     // alert(totalAmount);

        }

            $(".total-amount").html(parseFloat(totalAmount).toFixed(2));


      }
  });



</script>
</body>
</html>
