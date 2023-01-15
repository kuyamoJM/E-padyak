<?php
require_once '../../../config/config.php';
require_once '../../../config/check-admin.php';
$charge = addslashes($_POST['charge']);
$town = addslashes($_POST['town']);
	$conn->query("insert into tbl_delivery_charge (town_id, store_id, delivery_charge) values ('$town', '$store_id', '$charge')");
	$_SESSION['success'] = 'Delivery charge had been successfully added.';
	echo '1';
?>