
 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light navbar-orange">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <?php if ($user_access == 'Customer') { 
        $search = '';
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
          $search = addslashes($_POST['search']);
           $brand    = addslashes($_POST['brand']);
            $category = addslashes($_POST['category']);
          }?>
      <li class="nav-item" style="display: flex;">
        <form action="search-products.php"  method="post" style="align-self: center; position: relative;">
          <button type="submit" class="position-absolute top-0 border-0 pr-2" style="height: calc(2.25rem + 2px); background-color: transparent; color: #fd7e14; right: 0;"><i class="fa fa-search"></i></button>
          <input type="text" class="form-control" name="search" autocomplete="off" value="<?php echo stripslashes($search); ?>" placeholder="Search Products..." />
           <input type="hidden" name="brand" value="<?php echo $brand; ?>" id="brand" />
                            <input type="hidden" name="category" value="<?php echo $category; ?>" id="category" />
        </form>
      </li>
      <?php  } ?>
    
    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->