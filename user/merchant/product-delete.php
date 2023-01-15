<?php
session_start();
require_once '../../config/config.php';
$id = $_GET['id'];
	$conn->query("update tbl_product set is_deleted = 1 where product_id = '$id'");
	$_SESSION['success'] = 'Product had been successfully deleted.';
	header("location: products.php");
?>