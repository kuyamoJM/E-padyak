<?php 
require_once 'config/config.php';
$id = '';
if (isset($_GET['id'])){
  $id = $_GET['id'];
}
$qs = $conn->query("select p.*, b.*, c.*, s.store_name from tbl_product p inner join tbl_brand b on b.brand_id = p.brand_id inner join tbl_category c on c.category_id = p.category_id inner join tbl_store s on s.store_id = p.store_id where p.product_id = '$id'") or die($conn->error);
if ($qs->num_rows == 0){
 // header("location: products.php");
}

$rss = $qs->fetch_assoc();
$page = 'Product Review'; 
 include 'template/header.php'; ?>
    <style type="text/css">
        .product-hover:hover{
            opacity: 0.8;
        }
        .font-arial{
            font-family: Arial, sans-serif;
        }
        .pagination a, .text-muted.page-link:hover{
          color: #212529;
          background-color: #ffffff;
        }
        .pagination .active{
          color: #FFFFFF;
          background-color: #212529;
        }
       
    </style>
    <body id="page-top">
       <?php include 'template/nav-bar.php'; ?>
        <!-- Masthead-->
        <header class="masthead smaller stores">
            <div class="container">
                <div class="masthead-heading">Product Review</div>
                
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
               <div class="text-center font-arial">
                  <div style="width: 90%; max-width: 480px; margin: 0 auto;">
                   <img src="assets/img/products/<?php echo $rss['photo']; ?>" width="100%" style="border: 5px solid #ffffff; box-shadow: 0px 0px 5px #000; margin-bottom: 20px;" />
                   <h2 class="text-uppercase"><?php echo $rss['product_name']; ?></h2>
                    <p class="item-intro text-muted">Brand: <?php echo $rss['brand']; ?> | Category: <?php echo $rss['category']; ?></p>
                   </div>
                  <div class="row text-start">
                      <?php 
                        $qr = $conn->query("select * from tbl_ratings r inner join tbl_user u on u.user_id = r.user_id where product_id = '$id'");
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
                           
                        <?php }
                      ?>

                  </div> 
              </div>
            </div>
        </section>

       
     
         <?php include 'template/contact-us.php'; ?>
        <?php include 'template/footer.php'; ?>
    </body>
</html>
