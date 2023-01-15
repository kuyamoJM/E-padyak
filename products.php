<?php 
$page = 'Products';
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
        <header class="masthead smaller products">
            <div class="container">
                <div class="masthead-heading">Products</div>
                 <div class="d-flex text-center w-100 justify-content-center px-4 pb-5">
                    <form class="col-md-6 col-sm-8 col-12 mx-auto" action="products.php">
                        <div class="mx-2 position-relative">
                            <?php $search = '';
                            $brand = '0';
                            $category = '0';
                            if (isset($_GET['search'])){
                                $search = addslashes($_GET['search']);
                            }
                            if (isset($_GET['brand'])){
                                $brand = addslashes($_GET['brand']);
                            }
                            if (isset($_GET['category'])){
                                $category = addslashes($_GET['category']);
                            }
                            if (isset($_POST['search'])){
                                $Search   = addslashes($_POST['search']);
                                $brand    = addslashes($_POST['brand']);
                                $category = addslashes($_POST['category']);
                            }
                            ?>
                             
                            <input type="text" name="search" autocomplete="off" class="px-3 py-2 w-100 rounded-sm font-arial" value="<?php echo stripslashes($search); ?>" placeholder="Search Products..." />
                            <input type="hidden" name="brand" value="<?php echo $brand; ?>" id="brand" />
                            <input type="hidden" name="category" value="<?php echo $category; ?>" id="category" />
                           
                            <button class="btn btn-primary btn-search position-absolute end-0 rounded-sm py-2 px-3" style="border: 2px solid #d9aa00;" type="submit" ><i class="fa fa-search"></i></button>
                        </div>
                        
                    </form>
                </div>
                
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container font-arial">
                  <div class="w-100 border mx-auto" style="max-width: 768px; margin-top: -20px; margin-bottom: 20px;">
                    <div class="row">
                      <div class="col-md-6">
                        <select name="brand_id" id="brand_id" onchange="jump_search();" class="w-100 p-2" required="required">
                          <option value="0" <?php echo ($brand == 0 ? 'selected="selected"': ''); ?>>All Brands</option>
                         <?php 
                         $qb = $conn->query("select * from tbl_brand where is_deleted = 0 order by brand_id asc");
                         while ($rb = $qb->fetch_assoc()){
                          echo '<option'.($brand == $rb['brand_id'] ? ' selected="selected"' : '').' value="'.$rb['brand_id'].'">'.$rb['brand'].'</option>';
                          }?>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <select name="category_id" id="category_id" onchange="jump_search();" class="w-100 p-2" required="required">
                          <option value="0" <?php echo ($category == 0 ? 'selected="selected"': ''); ?>>All Categories</option>
                          <?php 
                         $qc = $conn->query("select * from tbl_category where is_deleted = 0 order by category_id asc");
                         while ($rc = $qc->fetch_assoc()){
                          echo '<option'.($category == $rc['category_id'] ? ' selected="selected"' : '').' value="'.$rc['category_id'].'">'.$rc['category'].'</option>';
                          }?>
                        </select>
                      </div>
                    </div>
                  </div>
                <div class="row text-center">
                  
                 <?php 
                        $pageNum = 1;
                        $max = 9;
                        $b = '';
                        $c = '';
                        if ($brand > 0){
                            $b = "and b.brand_id = '$brand'";
                          }
                          if ($category > 0){
                            $c = "and c.category_id = '$category'";
                          }
                         if ($search == ''){
                            $sql = "select p.*, b.brand, c.category, s.store_name from tbl_product p inner join tbl_store s on s.store_id = p.store_id inner join tbl_brand b on b.brand_id = p.brand_id inner join tbl_category c on c.category_id = p.category_id where p.is_deleted = 0  $b $c order  by product_name asc";
                        } else {
                          
                            $sql = "select p.*, b.brand, c.category, s.store_name from tbl_product p inner join tbl_store s on s.store_id = p.store_id inner join tbl_brand b on b.brand_id = p.brand_id inner join tbl_category c on c.category_id = p.category_id  where (p.product_name like '%%$search%%' or b.brand like '%%$search%%' or c.category like '%%$search%%') and p.is_deleted = 0 $b $c order by product_name";
                          
                        }
                          $total = $conn->query($sql)->num_rows;

                        $pages = ceil($total/$max);
                            if (isset($_GET['pageNum'])){
                                  $pageNum = $_GET['pageNum'];
                                  if (is_nan($pageNum)){
                                    $pageNum = 1;
                                  }
                                  if ($pageNum > $pages){
                                    $pageNum = $pages;
                                  }
                                  if ($pageNum < 1){
                                    $pageNum = 1;
                                  }
                                }
                         $starting = (floor(($pageNum-1)/10) * 10) + 1;
                         $ending = $starting + 9;
                         if ($ending > $pages){
                            $ending = $pages;
                         }                     
                        $start = ($pageNum - 1) * $max;
                        $qp = $conn->query("$sql limit $start, $max") or die($conn->error);
                        if ($qp->num_rows == 0){
                         ?>
                         <h3 class="text-center text-muted">No Product found.</h3>
                         <?php 
                        } else { 
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
                        <br />
                           <a href="product-reviews.php?id=<?php echo $rp['product_id']; ?>" target="_blank">See Product Reviews</a>
                                                </p>

                                                <div class="row">
                                                        <div class="col-6">

                                                <a href="user/index.php?id=<?php echo $rp['product_id']; ?>&gotocart" class="btn btn-primary text-uppercase" type="button">
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
                    <?php }  } ?>
                    
            </div>
            <?php if ($qp->num_rows > 0){ ?>
            <div class="p-5">
           
              <ul class="pagination justify-content-center text-primary">
                  <li class="page-item">
                      <?php if ($pageNum != 1) { ?>
                          <a class="page-link" href="?pageNum=<?php echo ($pageNum - 1); ?>">Prev</a>
                      <?php } else {?>
                          <span class="text-muted page-link" >Prev</span>
                      <?php } ?>
                  </li>
                    <?php for ($i = $starting; $i <= $ending; $i++) { ?>
                  <li class="page-item">
                      <a class="page-link <?php echo ($pageNum == $i ? 'active' : ''); ?>" href="?pageNum=<?php echo $i; ?>"><?php echo $i; ?></a>
                  </li>
                  <?php } ?>
              
                    
                  <li class="page-item">
                      <?php if ($pages != $pageNum){ ?>
                      <a class="page-link" href="?pageNum=<?php echo ($pageNum + 1); ?>">Next</a>
                      <?php } else { ?>
                          <span class="text-muted page-link" >Next</span>
                      <?php } ?>
                  </li>
              </ul>
              </div>
              <?php } ?>
            </div>
            </div>
        </section>

       
     
         <?php include 'template/contact-us.php'; ?>
        <?php include 'template/footer.php'; ?>
        <script type="text/javascript">
         
        function jump_search(){
          var brand = document.getElementById("brand_id").value;
          var category = document.getElementById("category_id").value;
          window.location.href = 'products.php?search=<?php echo $search; ?>&brand=' + brand + '&category=' + category;
        }
        </script>
    </body>
</html>
