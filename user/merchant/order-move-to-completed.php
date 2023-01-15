<?php
session_start();
require_once '../../config/config.php';
$id = $_GET['id'];

	$conn->query("update tbl_order set status = 'Completed' where order_id = '$id'") or die($conn->error);
	$_SESSION['success'] = 'Order had been successfully moved to completed orders.';
	header("location: orders-completed.php"); 
?>