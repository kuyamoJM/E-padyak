<?php 
$page = 'Stores';
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
                <div class="masthead-heading">Stores</div>
                
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container font-arial">
               <div class="row text-center">
                    <?php 
                    $max = 9;
                    $pageNum = 1;
                    $total = $conn->query("select s.*, u.is_active from tbl_store s inner join tbl_user u on u.store_id = s.store_id where u.is_active = 1")->num_rows;
                    $pages = ceil($total/$max);

                    if (isset($_GET['pageNum'])){
                      $pageNum = $_GET['pageNum'];
                      if (is_nan($pageNum)){
                        $pageNum = 1;
                      }
                    }
                    $start = ($pageNum - 1) * $max;
                    $qs = $conn->query("select s.*, u.is_active from tbl_store s inner join tbl_user u on u.store_id = s.store_id where u.is_active = 1 order by store_name asc limit $start, $max "); 
                    while ($rs = $qs->fetch_assoc()){
                    ?>
                    <div class="col-md-4 mb-3">
                        <a href="view-store.php?id=<?php echo $rs['store_id']; ?>" class="text-decoration-none"><img src="assets/img/store/<?php echo $rs['photo']; ?>" class="w-100" />
                        <h4 class="my-3"><?php echo $rs['store_name']; ?></h4></a>
                        <p class="text-muted"><?php echo substr($rs['description'], 0, 50); ?>...</p>
                        <a href="view-store.php?id=<?php echo $rs['store_id']; ?>" class="btn btn-primary">More Info</a>
                    </div>
                    <?php } ?>
                   
                </div>
                <div class="p-5">
              <ul class="pagination justify-content-center text-primary">
                  <li class="page-item">
                      <?php if ($pageNum != 1) { ?>
                          <a class="page-link" href="?pageNum=<?php echo ($pageNum - 1); ?>">Prev</a>
                      <?php } else {?>
                          <span class="text-muted page-link" >Prev</span>
                      <?php } ?>
                  </li>
                    <?php for ($i = 1; $i <= $pages; $i++) { ?>
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
            </div>
        </section>

       
     
         <?php include 'template/contact-us.php'; ?>
        <?php include 'template/footer.php'; ?>
    </body>
</html>
