<?php
require_once '../../config/config.php';
 include '../../config/check-admin.php';
 if(isset($_GET['id'])){
 	$cart_id = $_POST['cart_id'];
 	$qo = $conn->query("select * from tbl_order order by order_id desc");
 		$ro = $qo->fetch_assoc();
 		$order_id = $ro['order_id'] + 1;
 		$total = 0;
 	foreach ($cart_id as $id){
 		$qc = $conn->query("select * from tbl_cart where cart_id = '$id'");
 		$rc = $qc->fetch_assoc();
 		extract($rc);
 		$total += $amount;
 		$conn->query("insert into tbl_product_order (order_id, product_id, quantity, price, amount) values ('$order_id', '$product_id', '$quantity', '$price', '$amount')") or die($conn->error);
 		$conn->query("delete from tbl_cart where cart_id = '$id'");
 	}
 	$conn->query("insert into tbl_order (order_id, user_id, total_amount) values ('$order_id', '$user_id', '$total')") or die($conn->error);
 	header("location: orders-pending.php");
 } else {
 	header("location: orders-pending.php");
 }
?> 