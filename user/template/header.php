<?php
require_once '../../config/config.php';
    include '../../config/check-admin.php';
if (!($_SESSION['epadyak'])){
  header("Location: ../../index.php");
  exit();
} else {
  $user_id = $_SESSION['epadyak'];
  $sql = "SELECT * FROM tbl_user u inner join tbl_barangay b on b.barangay_id = u.barangay_id inner join tbl_town t on t.town_id = b.town_id WHERE u.user_id = '$user_id'";
  $query_user = $conn->query($sql) or die($conn->error);
  $row_user = $query_user->fetch_assoc();
  extract($row_user);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Padyak | <?php echo $page; ?></title>
       <link rel="icon" type="image/x-icon" href="../../assets/favicon.png" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>/user/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>/css/font-awesome.min.css"> 
   <link rel="stylesheet" href="<?php echo $base_url; ?>/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>/user/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>/user/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>/user/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>/user/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>/user/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>/user/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo $base_url; ?>/user/plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="<?php echo $base_url; ?>/user/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>/user/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $base_url; ?>/user/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <style type="text/css">
    textarea{
      resize: none;
    }
     .dataTable-wrapper{
  width: 100% !important; 
  overflow-x: auto !important;  
}
  .dataTable-container{
  width: 99% !important; 
}
 button.close{
    outline: none !important;
  }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">