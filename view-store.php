<?php 
require_once 'config/config.php';
$store_id = '';
if (isset($_GET['id'])){
  $store_id = $_GET['id'];
}
$qs = $conn->query("select * from tbl_store s inner join tbl_barangay b on b.barangay_id = s.barangay_id inner join tbl_town t on t.town_id = b.town_id where store_id = '$store_id'");
if ($qs->num_rows == 0){
  header("location: stores.php");
}

$rss = $qs->fetch_assoc();
$page = $rss['store_name']; 
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
                <div class="masthead-heading"><?php echo $page; ?></div>
                
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
               <div class="text-center font-arial">
                  <div style="width: 90%; max-width: 700px; margin: 0 auto;">
                   <img src="assets/img/store/<?php echo $rss['photo']; ?>" width="100%" style="border: 5px solid #ffffff; box-shadow: 0px 0px 5px #000; margin-bottom: 20px;" />
                   <p>Located at: <?php echo $rss['location'].' Brgy. '.$rss['barangay'].', '.$rss['town']; ?>, Marinduque</p>
                   <p><?php echo nl2br($rss['description']); ?></p>
                   </div>
                    <h2 class="bg-primary p-3 mb-5">Featured Products</h2>
                     <div class="row">
                    <?php 
                    $qp = $conn->query("select p.*, b.brand, c.category, s.store_name from tbl_product p inner join tbl_store s on s.store_id = p.store_id inner join tbl_brand b on b.brand_id = p.brand_id inner join tbl_category c on c.category_id = p.category_id where p.store_id = '$store_id' and p.is_deleted = 0 order by RAND() limit 9") or die($conn->error);
                    while ($rp = $qp->fetch_assoc()){ ?>
                    <div class="col-lg-4 col-sm-6 p-2">
                        <div class="border pb-4">
                          <!-- Portfolio item 1-->
                           <div class="portfolio-item">
                              <a class="text-decoration-none portfolio-link" data-bs-toggle="modal" href="#product<?php echo $rp['product_id']; ?>">
                                  <img class="img-fluid product-hover" src="assets/img/products/<?php echo $rp['photo']; ?>" alt="<?php echo $rp['product_name']; ?>" />
                                   <div class="portfolio-caption">
                                  <div class="portfolio-caption-heading"><?php echo $rp['product_name']; ?></div>
                                  <div class="portfolio-caption-subheading text-muted">Brand: <?php echo $rp['brand']; ?>
                                      <br />Price: &#8369; <?php echo number_format($rp['price'], 2); ?>
                                  </div>
                              </div>
                              </a>
                             
                          </div>
                        </div>
                    </div>
                    <!-- Portfolio item 1 modal popup-->
                    <div class="portfolio-modal modal fade" id="product<?php echo $rp['product_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="modal-body">
                                                <!-- Project details-->
                                                <h2 class="text-uppercase"><?php echo $rp['product_name']; ?></h2>
                                                <p class="item-intro text-muted">Brand: <?php echo $rp['brand']; ?> | Category <?php echo $rp['category']; ?></p>
                                                <?php if ($rp['img_3d'] == '' ) { ?>
                                                <img class="img-fluid d-block mx-auto" src="assets/img/products/<?php echo $rp['photo']; ?>" alt="<?php echo $rp['product_name']; ?>" />
                                                <?php } else {
                                                    echo '<div class="img-3d">'.$rp['img_3d'].'</div>';
                                                    } ?>
                                                <p><strong>Price: &#8369; <?php echo number_format($rp['price'], 2); ?> </strong><br />
                                                Description: <?php echo $rp['description']; ?>
                                                 <br />
                                                 <?php
                         $qrate = $conn->query("select AVG(ratings) as rate from tbl_ratings where product_id = '".$rp['product_id']."'");
                         $rrate = $qrate->fetch_assoc();
                           $ratings = $rrate['rate'];
                            // $ratings = 2.76;   
                            if ($ratings == ''){
                                echo '<i>No Ratings Yet.</i>';
                            } else {  
                              echo 'Ratings: ';
                                $half = 0;
                                if (fmod($ratings,1) >= 0.80){
                                    $rest = floor($ratings) + 1;
                                } else {
                                    $rest = floor($ratings);
                                    if (fmod($ratings,1) >= 0.20){
                                        $half = 1;
                                    }
                                } 
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
                                echo number_format($ratings, 2);

                            }
                        ?>
                                                </p>
                                                <div class="row">
                                                        <div class="col-6">

                                                <a href="user/index.php?id=<?php echo $rp['product_id']; ?>&gotocart" class="btn btn-primary text-uppercase"  type="button">
                                                    <i class="fa fa-shopping-cart me-1"></i>
                                                    Add to Cart
                                                </a>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <button class="btn btn-secondary text-uppercase" data-bs-dismiss="modal" type="button">
                                                        <i class="fas fa-xmark me-1"></i>
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <?php } ?>
                    
            </div>
              </div>
            </div>
        </section>

       
     
         <?php include 'template/contact-us.php'; ?>
        <?php include 'template/footer.php'; ?>
    </body>
</html>
