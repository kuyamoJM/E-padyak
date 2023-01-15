<?php
session_start();
require_once '../../../config/config.php';
	$id = $_POST['id'];
	$q = $conn->query("select * from tbl_product where product_id = '$id'");
	$r = $q->fetch_assoc();
	echo json_encode($r);
?>