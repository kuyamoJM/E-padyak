<?php
session_start();
require_once '../../config/config.php';
$id = $_GET['id'];
$conn->query("update tbl_category set is_deleted = 1 where category_id = '$id'");
	$_SESSION['success'] = 'Product Category had been successfully deleted.';
header("location: categories.php");

?>