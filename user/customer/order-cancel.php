<?php
session_start();
require_once '../../config/config.php';
if (isset($_GET['id'])){
	$id 		= addslashes($_GET['id']);
	$conn->query("delete from tbl_product_order where order_id = '$id'") or die($conn->error);
	$conn->query("delete from tbl_order where order_id = '$id'") or die($conn->error);
	$_SESSION['success'] = 'Order had been successfully cancelled.';
	header("location: orders-pending.php");
}
?>