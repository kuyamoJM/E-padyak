<?php
session_start();
require_once '../../config/config.php';
$id = $_GET['id'];
	$conn->query("delete from tbl_delivery_charge where delivery_charge_id = '$id'");
	$_SESSION['success'] = 'Delivery charge had been successfully deleted.';
	header("location: delivery-charge.php");
?>