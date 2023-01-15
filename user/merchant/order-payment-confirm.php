<?php
session_start();
require_once '../../config/config.php';
$id = $_GET['id'];
$qo = $conn->query("select * from tbl_order o inner join tbl_product_order p on p.order_id = o.order_id inner join tbl_user u on u.user_id = o.user_id where o.order_id = '$id'");
while ($ro = $qo->fetch_assoc()){
	//echo $ro['product_id'];
	$qp = $conn->query("select * from tbl_product where product_id = '".$ro['product_id']."'");
	$rp = $qp->fetch_assoc();
	$new_stock = $rp['stocks'] - $ro['quantity'];
	$remarks = 'Sold to: '.$ro['lname'].', '.$ro['fname'].' '.$ro['mname'].'<br /> with Order #: '.str_pad($id, 8, "0", STR_PAD_LEFT).'-'.str_pad($rp['store_id'], 4, "0", STR_PAD_LEFT);
	$conn->query("insert into tbl_running_inventory (product_id, product_out, stocks, remarks) values ('".$ro['product_id']."', '".$ro['quantity']."', '".$new_stock."', '$remarks')") or die($conn->error);
	$conn->query("update tbl_product set stocks = '$new_stock' where product_id = '".$ro['product_id']."'") or die($conn->error);
}
	$conn->query("update tbl_order set status = 'Paid' where order_id = '$id'") or die($conn->error);
	$_SESSION['success'] = 'Payment had been successfully confirmed.';
	header("location: orders-paid.php"); 
?>