<?php
session_start();
require_once '../../../config/config.php';
	$id = $_POST['id'];
	$q = $conn->query("select * from tbl_delivery_charge d inner join tbl_town t on t.town_id = d.town_id where delivery_charge_id = '$id'") or die($conn->error);
	$r = $q->fetch_assoc();
	echo json_encode($r);
?>