<?php 
$page = 'About Us';
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
        <header class="masthead smaller about-us">
            <div class="container">
                <div class="masthead-heading">About Us</div>
                
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container font-arial">
               <p><?php
              $qp = $conn->query("select * from tbl_content where title = 'About us'");
              $rp =  $qp->fetch_assoc();
              echo nl2br($rp['content']);
              ?></p>
            </div>
        </section>

       
     
         <?php include 'template/contact-us.php'; ?>
        <?php include 'template/footer.php'; ?>
    </body>
</html>
