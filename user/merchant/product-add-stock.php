<?php
session_start();
require_once '../../config/config.php';
$id 		= $_POST['a_product_id'];
$stock  	= $_POST['stock'];
$remarks 	= addslashes($_POST['remarks']);
$conn->query("update tbl_product set stocks = stocks + $stock where product_id = '$id'")  or die($conn->error);
$qp = $conn->query("select * from tbl_product where product_id = '$id'") or die($conn->error);
$rp = $qp->fetch_assoc();
$conn->query("insert into tbl_running_inventory (product_id, product_in, stocks, remarks) values ('$id', '$stock', '".$rp['stocks']."', '$remarks')") or die($conn->error);
$_SESSION['success'] = 'Stocks had been successfully added.';
header("location: products.php");
?>