<?php
session_start();
require_once '../../config/config.php';
 include '../../config/check-admin.php';
$id = $_GET['id'];
/*  $prod = $conn->query("select * from tbl_product where product_id = '$id'");
  $row  = $prod->fetch_assoc();
  $qty = $_POST['qty'];
  $amount = $row['price'] * $qty;
  $conn->query("insert into tbl_cart (user_id, product_id, quantity, price, amount) values ('$user_id', '$id', '$qty', '".$row['price']."', '$amount')") or die($conn->error);
  $_SESSION['success'] = 'Product had been successfully added to cart.';
  header("location: cart.php"); */
?>