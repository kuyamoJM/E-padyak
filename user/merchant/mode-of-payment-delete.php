<?php
session_start();
require_once '../../config/config.php';
$id = $_GET['id'];
	$conn->query("update tbl_mode_of_payment set is_deleted = 1 where mode_of_payment_id = '$id'");
	$_SESSION['success'] = 'Product had been successfully deleted.';
	header("location: mode-of-payment.php");
?>