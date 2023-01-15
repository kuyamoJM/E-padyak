<?php
require_once '../../../config/config.php';
require_once '../../../config/check-admin.php';
$charge = addslashes($_POST['e_charge']);
$id = addslashes($_POST['id']);
	$conn->query("update tbl_delivery_charge set delivery_charge = '$charge' where delivery_charge_id = '$id'");
	$_SESSION['success'] = 'Delivery charge had been successfully updated.';
	echo '1';
?>