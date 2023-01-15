<?php
session_start();
require_once '../../config/config.php';
$id = $_GET['id'];
	$conn->query("delete from tbl_cart where cart_id = '$id'");
	$_SESSION['success'] = 'Product had been successfully removed from cart.';
	header("location: cart.php");
?>