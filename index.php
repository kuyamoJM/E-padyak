<?php 
$page = 'Home';
 include 'template/header.php'; ?>
    <style type="text/css">
        .product-hover:hover{
            opacity: 0.8;
        }
        .font-arial{
            font-family: Arial, sans-serif;
        }
    </style>
    <body id="page-top">
       <?php include 'template/nav-bar.php'; ?>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-heading">Welcome To E-Padyak</div>
                <div class="masthead-subheading pb-2">An online shopping management for bikeshops in Marinduque</div>
                <div class="d-flex text-center w-100 justify-content-center px-4 pb-5">
                    <form class="col-md-6 col-sm-8 col-12 mx-auto" action="products.php">
                        <div class="mx-2 position-relative">
                            <?php $search = '';
                            if (isset($_GET['search'])){
                                $search = addslashes($_GET['search']);
                            }
                            if (isset($_POST['search'])){
                                $search = addslashes($_GET['search']);
                            }
                            ?>
                             
                            <input type="text" name="search" autocomplete="off" class="px-3 py-2 w-100 rounded-sm font-arial" value="<?php echo stripslashes($search); ?>" placeholder="Search Products..." />
                           <button class="btn btn-primary btn-search position-absolute end-0 rounded-sm py-2 px-3" style="border: 2px solid #d9aa00;" type="submit" ><i class="fa fa-search"></i></button>
                        </div>
                        
                    </form>
                </div>
                <a class="btn btn-primary btn-xl text-uppercase" href="about-us.php">Tell Me More</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase pb-4">Featured Store</h2>
                </div>
                <div class="row text-center">
                    <?php 
                    $qs = $conn->query("select s.*, u.is_active from tbl_store s inner join tbl_user u on u.store_id = s.store_id where u.is_active = 1 ORDER BY RAND() limit 6 "); 
                    while ($rs = $qs->fetch_assoc()){
                    ?>
                    <div class="col-md-4">
                        <a href="view-store.php?id=<?php echo $rs['store_id']; ?>" class="text-decoration-none"><img src="assets/img/store/<?php echo $rs['photo']; ?>" class="w-100" />
                        <h4 class="my-3"><?php echo $rs['store_name']; ?></h4></a>
                        <p class="text-muted"><?php echo substr($rs['description'], 0, 100); ?>...</p>
                    </div>
                    <?php } ?>
                   
                </div>
                <div class="p-4 text-center">
                    <a class="btn btn-primary btn-xl py-3 text-uppercase px-5" href="stores.php">See all</a>
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase pb-4">Featured Products</h2>
                </div>
                <div class="row">
                    <?php 
                    $qp = $conn->query("select p.*, b.brand, c.category, s.store_name from tbl_product p inner join tbl_store s on s.store_id = p.store_id inner join tbl_brand b on b.brand_id = p.brand_id inner join tbl_category c on c.category_id = p.category_id  where p.is_deleted = 0 order by RAND() limit 12") or die($conn->error);
                    while ($rp = $qp->fetch_assoc()){ ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
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
                                                <p class="item-intro text-muted">Brand: <?php echo $rp['brand']; ?> | Category: <?php echo $rp['category']; ?></p>
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
            <div class="p-4 text-center">
                    <a class="btn btn-primary btn-xl py-3 text-uppercase px-5" href="products.php">See all</a>
                </div>
        </section>
       
        <?php include 'template/contact-us.php'; ?>
        <?php include 'template/footer.php'; ?>
       
    </body>
</html>
