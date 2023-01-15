<?php 
    $page = 'Dashboard';
    include '../template/header.php';
    include '../template/nav-bar.php';
    include '../template/side-bar-customer.php';
    include '../template/modal.php';
 ?>
 <link rel="stylesheet" type="text/css" href="zoom/style.css">
 <style type="text/css">
  a.btn-orange{
    color: #ffffff !important;
    background-color: #fd7e14;
  }
  .shows{
    height: 300px;
  }

#show-img , #big-img{
  height: auto !important;
  background-color: #ffffff;
  z-index: 2000;
}
.shows div{
  box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.4);
}
.center{
width: 150px;
  margin: 40px auto;
  
}
 .yellow-star{
                color: #ff9900;
            }
            .gray-star{
                color: #909090;
            }
  .image-holder{
      width: 284px;
      height: 213px;
    }
   @media (max-width: 991.98px) {
    .image-holder{
      width: 227px;
      height: 170px;
    }
   @media (max-width: 767.98px) {
    .image-holder{
      width: 260px;rcalcc
      height: 195px;
    }
   @media (max-width: 575.98px) {
    .image-holder{
      width: 100%;
      height: unset;
    }
  }
 </style>

  <?php
  $id = '';
  if (isset($_GET['id'])){
    $id = $_GET['id'];
  }
  $qp = $conn->query("select p.*, b.*, s.store_name, c.* from tbl_product p inner join tbl_brand b on b.brand_id = p.brand_id inner join tbl_category c on c.category_id = p.category_id inner join tbl_store s on s.store_id = p.store_id where p.product_id = '$id'") or die($conn->error);
  if ($qp->num_rows == 0){
    header("location: search-products.php");
  }
  $rp = $qp->fetch_assoc();
  extract($rp);

  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add to Cart: <?php echo $rp['product_name']; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Search Products</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
          <div class="bg-white pt-2" style="min-height: 80vh;">
           <div class="row justify-content-md-start justify-content-sm-center">

                <div class="col-12">
               
                     <div class="shows mx-auto" href="../../assets/img/products/<?php echo $rp['photo']; ?>">
                       <img src="../../assets/img/products/<?php echo $rp['photo']; ?>" id="show-img" class="border" >
                     </div>
                     <p class="text-center w-full pt-3"><?php echo "Product Name: <strong>$product_name</strong> <br />Brand: <strong>$brand</strong>
                     |
                     Category: <strong>$category</strong>"; ?>
                       <br >
                       Merchant: <strong><?php echo $store_name; ?></strong>
                     </p>

                   

                   
                </div>
                <div class="col-12  text-center pt-3">
                <p class="text-center"><strong>Description:</strong> <br /><?php echo $description; ?> </p>
                <p class="text-center">
                  <strong>Ratings:</strong>
                  <?php
                         $qrate = $conn->query("select AVG(ratings) as rate from tbl_ratings where product_id = '".$product_id."'");
                         $rrate = $qrate->fetch_assoc();
                           $ratings = $rrate['rate'];
                            // $ratings = 2.76;   
                            if ($ratings == ''){
                                echo '<i>No Ratings Yet.</i>';
                            } else {  
                                echo number_format($ratings, 2);
                                $half = 0;
                                if (fmod($ratings,1) >= 0.80){
                                    $rest = floor($ratings) + 1;
                                } else {
                                    $rest = floor($ratings);
                                    if (fmod($ratings,1) >= 0.20){
                                        $half = 1;
                                    }
                                } 
                                echo '<br />';
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

                            }
                        ?>
                  </p>
                <?php if ($stocks > 0 ){ 
                    $qq = $conn->query("select * from tbl_cart where product_id = '$product_id' and user_id = '$user_id'");
                    if ($qq->num_rows == 0) {
                  ?>
                  
                <form action="product-add-to-cart.php?id=<?php echo $product_id; ?>" method="post">
                  <div class="center">
    
                <div class="input-group">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-secondary btn-number"  data-type="minus" data-field="qty">
                            <span class="fa fa-minus"></span>
                          </button>
                      </span>
                      <input type="text" name="qty" readonly="readonly" class="form-control input-number" value="1" min="1" max="<?php echo $stocks; ?>">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="qty">
                              <span class="fa fa-plus"></span>
                          </button>
                      </span>
                  </div>
                    <div class="text-center p-3">
                      <button type="submit" class="btn btn-primary">Add to Cart</button>
                      </div>

             </div>
                </form>
                <?php } else {
                    echo  '<span><strong>Product already in <a href="cart.php">cart</a>.</strong></span>';                  
                }

                }  else  { echo  '<span class="text-danger"><strong>Out of stock.</strong></span>';} ?>
                            </div>
             

            </div>
            <div class="p-2">
                      <?php 
                        $qr = $conn->query("select * from tbl_ratings r inner join tbl_user u on u.user_id = r.user_id where product_id = '$id'");
                        if ($qr->num_rows > 0){
                          echo '<h3 class="text-center m-0 p-2 bg-primary mb-2">Reviews</h3>
                                      <div class="row text-start">';
                        }
                        while ($rr = $qr->fetch_assoc()){ ?>
                            <div class="col-lg-4 col-md-6 col-12 p-2">
                                <div class="p-2 border h-100">
                                <p>
                                    <span class="text-primary"><strong><?php echo $rr['fname'].' '.substr($rr['mname'], 0, 1).'. '.$rr['lname']; ?></strong></span>
                                    <br />
                                      <?php 
                      
                                    $rate = $rr['ratings'];
                                   for ($i = 0; $i < 5; $i++){
                                       if ($i < $rate) { echo '<i class="fa fa-star yellow-star mx-1 "> </i>'; }
                                       else { echo '<i class="fa fa-star gray-star mx-1 "> </i>'; }
                                    }

                                ?>
                                    <br />
                                     <span class="text-muted"><i><?php echo $rr['review']; ?></i></span>
                                </p>
                                </div>
                            </div>
                           
                        <?php echo '  </div> '; }
                      ?>

                      </div>

                
                 
        <!-- /.row (main row) -->
        </div>
      </div><!-- /.container-fluid -->
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

<script src="zoom/zoom-image.js"></script>
     <script src="zoom/main.js"></script>

</body>
</html>
