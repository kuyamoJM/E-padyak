<?php
session_start();
require_once '../../config/config.php';
$id = $_GET['id'];
$conn->query("update tbl_brand set is_deleted = 1 where brand_id = '$id'");
	$_SESSION['success'] = 'Brand had been successfully deleted.';
header("location: brands.php");

?>