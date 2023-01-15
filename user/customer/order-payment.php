<?php
session_start();
require_once '../../config/config.php';
if (isset($_POST['submit'])){
	$refno 		= addslashes($_POST['refno']);
	$details 	= addslashes($_POST['details']);
	$order_id 	= addslashes($_POST['order_id']);
	$conn->query("insert into tbl_payment (order_id, reference_number, details) values ('$order_id', '$refno', '$details')") or die($conn->error);
	$_SESSION['success'] = 'Payment details had been added. Please wait for the merchant confirmation.';
	header("location: orders-pending.php");
}
?>