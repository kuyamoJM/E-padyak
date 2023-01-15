<?php
session_start();
require_once '../../../config/config.php';
	$id = $_POST['id'];
	$q = $conn->query("select * from tbl_product p inner join tbl_brand b on b.brand_id =  p.brand_id inner join tbl_category c on c.category_id = p.category_id where p.product_id = '$id'") or die($conn->error);
	$r = $q->fetch_assoc();
	echo json_encode($r);
?>