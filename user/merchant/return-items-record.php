<?php
require_once '../../config/config.php';
 include '../../config/check-admin.php';
 if (isset($_POST['submit'])){
	$id = $_POST['product_order_id'];
	 $qty = $_POST['qty'];
	 $reason = addslashes($_POST['reason']);
	 $qo = $conn->query("select * from tbl_product_order po inner join tbl_order o on o.order_id = po.order_id inner join tbl_product p on p.product_id = po.product_id inner join tbl_brand b on b.brand_id = p.brand_id inner join tbl_category c on c.category_id = p.category_id inner join tbl_user u on u.user_id = o.user_id where po.product_order_id = '$id'") or die($conn->error);
	 $ro = $qo->fetch_assoc();
	 $new_stock = $ro['stocks'] + $qty; 
	 $remarks = 'Returned from order #: '.$ro['order_number'].'<br />Reason: '.$reason;
 	$total = $ro['total_amount'];
	 if ($qty == $ro['quantity']){
		
	 	$total -= $ro['amount'];
	 	$conn->query("delete from tbl_product_order where product_order_id = '$id'") or die($conn->error);

	 } else {
	 	$amount = $ro['amount'] - ($ro['price'] * $qty);
	 	$total = $ro['total_amount'] - ($ro['price'] * $qty);
	 	$conn->query("update tbl_product_order set quantity = quantity - $qty, amount = '$amount' where product_order_id = '$id'");

	 }
	 //$total -= $ro['amount'];
	 	$conn->query("insert into tbl_returned_item (order_id, product_id, store_id, quantity, reason) values ('".$ro['order_id']."', '".$ro['product_id']."', '$store_id', '$qty', '$reason')") or die($conn->error);
	 	$conn->query("update tbl_product set stocks = stocks + $qty where product_id = '".$ro['product_id']."'") or die($conn->error);
	 	$conn->query("update tbl_order set total_amount = '$total' where order_id = '".$ro['order_id']."'") or die($conn->error);
	 	$conn->query("insert into tbl_running_inventory (product_id, product_in, stocks, remarks) values ('".$ro['product_id']."', '$qty', '$new_stock', '$remarks')") or die($conn->error);
	 	$_SESSION['success'] = 'Item Successfully Returned.'; 
	 	header("location: return-replace-items.php?order=".$ro['order_number']);

 } else {
 	header("location: index.php");
 }
/*  $prod = $conn->query("select * from tbl_product where product_id = '$id'");
  $row  = $prod->fetch_assoc();
  $qty = $_POST['qty'];
  $amount = $row['price'] * $qty;
  $conn->query("insert into tbl_cart (user_id, product_id, quantity, price, amount) values ('$user_id', '$id', '$qty', '".$row['price']."', '$amount')") or die($conn->error);
  $_SESSION['success'] = 'Product had been successfully added to cart.';
  header("location: cart.php"); */
?>