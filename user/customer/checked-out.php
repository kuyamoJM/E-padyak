<?php
require_once '../../config/config.php';
 include '../../config/check-admin.php';
 if(isset($_POST['cart_id'])){
 	$cart_id = $_POST['cart_id'];
 	$mop = $_POST['mop'];
 	$order_type = $_POST['order_type'];
 	$delivery_charge = 0;
 	$barangay_id = 0;
 	$remarks = addslashes($_POST['remarks']);
 	
 	$qo = $conn->query("select * from tbl_order order by order_id desc");
 		$ro = $qo->fetch_assoc();
 		$order_id = $ro['order_id'] + 1;
 		$total = 0;
 		$count = 0;
 	foreach ($cart_id as $id){
 		$qc = $conn->query("select * from tbl_cart where cart_id = '$id'");
 		$rc = $qc->fetch_assoc();
 		extract($rc);
 		$total += $amount;
 		if ($count == 0){
 			$qs = $conn->query("select store_id from tbl_product where product_id = '".$rc['product_id']."'");
 			$rs = $qs->fetch_assoc();
// 			echo $qs->num_rows;
 			$store_id = $rs['store_id'];
 //			echo $store_id;
 		}
 		$count++;
 		$conn->query("insert into tbl_product_order (order_id, product_id, quantity, price, amount) values ('$order_id', '$product_id', '$quantity', '$price', '$amount')") or die($conn->error);
 		$conn->query("delete from tbl_cart where cart_id = '$id'");
 	}
 	if ($order_type == 'For Delivery'){

 		$barangay_id = $_POST['barangay'];
 		$qc = $conn->query("select * from tbl_delivery_charge where town_id in (select town_id from tbl_barangay where barangay_id = '$barangay_id') and  store_id = '$store_id'") or die($conn->error);
 		$rc = $qc->fetch_assoc();
// 		echo $qc->num_rows;
 		$delivery_charge = $rc['delivery_charge'];
 		$total += $delivery_charge;
 //			echo $delivery_charge;
 	}
 	$order_number = 'ORD-'.str_pad($order_id, 8, "0", STR_PAD_LEFT).'-'.str_pad($store_id, 4, "0", STR_PAD_LEFT);
 	$conn->query("insert into tbl_order (order_id, user_id, total_amount, mode_of_payment_id, order_type, delivery_charge, remarks, barangay_id, order_number) values ('$order_id', '$user_id', '$total', '$mop', '$order_type','$delivery_charge', '$remarks', '$barangay_id', '$order_number')") or die($conn->error);
 	$_SESSION['success'] = 'Order had been successfully checked out.';
 	header("location: orders-pending.php");
 } else {
 	header("location: cart.php");
 }
 
?> 