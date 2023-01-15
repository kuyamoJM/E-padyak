<?php 
    $page = 'Stores';
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
            <h1 class="m-0">Stores</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Stores</li>
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
        <div class="row">
        <?php 
        $sql = "select s.*, u.is_active from tbl_store s inner join tbl_user u on s.store_id = u.store_id where u.is_active = 1";
         $pageNum = 1;
          $max = 91;
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
                                      <img src="<?php echo $base_url; ?>/assets/img/store/<?php echo $rp['photo']; ?>" width="100%"/>
                                    </div>
                                     <div class="portfolio-caption-heading"><?php echo $rp['store_name']; ?></div>
                                  <div class="portfolio-caption-subheading text-muted"><?php echo substr($rp['description'], 0, 30);  ?>...
                                  </div>
                                  <a href="view-store.php?id=<?php echo $rp['store_id']; ?>" class="btn btn-orange my-3">More Info</a>
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


</body>
</html>
