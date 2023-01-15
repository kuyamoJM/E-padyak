<?php
session_start();
require_once '../../config/config.php';
$id = '';
if (isset($_GET['id'])){
	$id = $_GET['id'];
}
$back = 'users.php';
if (isset($_GET['action']) && $id != ''){
	if (isset($_GET['back'])){
		$back = $_GET['back'];
	}
	$action = $_GET['action'];
	switch($action){
		case  'Approve':
			$conn->query("update tbl_user set is_approved = 1, is_active = 1 where user_id = '$id'");
			$q = $conn->query("select * from tbl_user where user_id = '$id'");
			$r = $q->fetch_assoc();
			if ($r['user_access'] == 'Merchant'){
				$q2 = $conn->query("select * from tbl_store_subscription ss inner join tbl_subscription s on s.subscription_id = ss.subscription_id where ss.store_id = '".$r['store_id']."' and ss.status = 'pending'") or die($conn->error);
				$r2 = $q2->fetch_assoc();
				if ($r2['renewal'] == 'Annual'){
					$exp = date('Y-m-d',strtotime('+1 year',time())) . PHP_EOL;
				} elseif ($r2['renewal'] == 'Quarterly'){
					$exp = date('Y-m-d',strtotime('+3 months',time())) . PHP_EOL;
				} else {
					$exp = date('Y-m-d',strtotime('+30 days',time())) . PHP_EOL;					
				}
				$conn->query("update tbl_store_subscription set expiration_date	= '$exp', status = 'Active' where store_subscription_id = '".$r2['store_subscription_id']."'");
			}
			$_SESSION['success'] = 'User registration had been approved successfully.';
			break;
		case 'Reject':
			$q = $conn->query("select * from tbl_user where user_id = '$id'");
			$r = $q->fetch_assoc();
			if ($r['user_access'] == 'Merchant'){
				$conn->query("delete from tbl_user where user_id = '$id'");
				$conn->query("delete from tbl_store where store_id = '".$r['store_id']."'");
				$conn->query("delete from tbl_store_subscription where store_id = '".$r['store_id']."'");
			}
			$_SESSION['success'] = 'User registration had been rejected successfully.';
			break;
		case 'activate':
			$conn->query("update tbl_user set is_active = 1 where user_id = '$id'");
			$_SESSION['success'] = 'User account had been activated successfully.';
			break;
		case 'deactivate':
			$conn->query("update tbl_user set is_active = 0 where user_id = '$id'");
			$_SESSION['success'] = 'User account had been deactivated successfully.';
	}
	header("location: $back");
} else {
	header("Location: index.php");
	exit();
}
?>