<?php 
    $page = 'Dashboard';
    include '../template/header.php';
    include '../template/nav-bar.php';
    include '../template/side-bar-customer.php';
    include '../template/modal.php';
 ?>

 <style type="text/css">
 .pagination a, .text-muted.page-link:hover{
          color: #212529;
          background-color: #ffffff;
        }
        .pagination .active{
          color: #FFFFFF;
          background-color: #212529;
        }
  a.btn-orange{
    color: #ffffff !important;
    background-color: #fd7e14;
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

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Search Results for: <?php echo stripslashes($search); ?></h1>
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
        <div class="w-100 border" style="max-width: 768px; margin-top: -20px; margin-bottom: 20px;">
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
        <div class="row">
        <?php 
          $b = '';
          $c = '';
          if ($brand > 0){
              $b = "and b.brand_id = '$brand'";
            }
            if ($category > 0){
              $c = "and c.category_id = '$category'";
            }
        $sql = "select p.*, b.brand, c.category, s.store_name from tbl_product p inner join tbl_store s on s.store_id = p.store_id inner join tbl_brand b on b.brand_id = p.brand_id inner join tbl_category c on c.category_id = p.category_id  where (p.product_name like '%%$search%%' or b.brand like '%%$search%%' or c.category like '%%$search%%' or p.description like '%%$search%%') and p.is_deleted = 0 $b $c order by product_name";
         $pageNum = 1;
          $max = 9;
          $total = $conn->query($sql)->num_rows;
          //$total = 100;

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
                          
                            <div class="col-xl-3 col-md-4 col-sm-6 col-12 p-2" >
                                 <div class="border p-2 text-center bg-white">
                                    <div class="image-holder" style="margin: 0 auto;">
                                      <img src="<?php echo $base_url; ?>/assets/img/products/<?php echo $rp['photo']; ?>" width="100%"/>
                                    </div>
                                     <div class="portfolio-caption-heading"><?php echo $rp['product_name']; ?></div>
                                  <div class="portfolio-caption-subheading text-muted">Brand: <?php echo $rp['brand']; ?>
                                      <br />Price: &#8369; <?php echo number_format($rp['price'], 2); ?>
                                  </div>
                                  <a href="add-to-cart.php?id=<?php echo $rp['product_id']; ?>" class="btn btn-orange my-3">Add to Cart</a>
                                 </div>
                              </div>
                          <?php } ?>
          <?php } ?>

        </div>
        <!-- /.row (main row) -->
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
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php 
    include '../template/footer.php';
    include '../template/scripts.php';
?>  
<script type="text/javascript">
 function jump_search(){
          var brand = document.getElementById("brand_id").value;
          var category = document.getElementById("category_id").value;
          window.location.href = 'search-products.php?search=<?php echo $search; ?>&brand=' + brand + '&category=' + category;
        }
</script>


</body>
</html>
