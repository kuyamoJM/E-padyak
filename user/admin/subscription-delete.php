<?php
session_start();
require_once '../../config/config.php';
$id = $_GET['id'];
$conn->query("update tbl_subscription set is_deleted = 1 where subscription_id = '$id'");
	$_SESSION['success'] = 'Subscription had been successfully deleted.';
header("location: subscription.php");

?>