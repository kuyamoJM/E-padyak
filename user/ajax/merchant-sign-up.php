<?php
session_start();
require_once '../../config/config.php';
$fname				= addslashes($_POST['fname']);
$mname				= addslashes($_POST['mname']);
$lname				= addslashes($_POST['lname']);
$barangay			= addslashes($_POST['barangay']);
$location			= addslashes($_POST['location']);
$email				= addslashes($_POST['email']);
$contact			= addslashes($_POST['contact']);
$gender				= addslashes($_POST['gender']);
$birthday			= addslashes($_POST['birthday']);
$username			= addslashes($_POST['username']);
$password			= addslashes($_POST['password']);
$retype				= addslashes($_POST['retype']);
$security_question	= addslashes($_POST['security_question']);
$answer				= addslashes($_POST['answer']);
$store 				= addslashes($_POST['store']);
$barangay2			= addslashes($_POST['barangay2']);
$location2			= addslashes($_POST['location2']);
$description		= addslashes($_POST['description']);
$terms				= addslashes($_POST['terms']);
$dti 				= addslashes($_POST['dti']);
$subscription_id	= addslashes($_POST['subscription_id']);
$err = 0;
$msg = '';

$qn = $conn->query("select * from tbl_user where fname = '$fname' and mname = '$mname' and lname = '$lname'");
if ($qn->num_rows > 0){
	$err++;
	$msg .= '*Name already exist. <br />';
}
$qu = $conn->query("select * from tbl_user where username = '$username'");
if ($qu->num_rows > 0){
	$err++;
	$msg .= '*Userame not available. <br />';
}
if ($password != $retype){
	$err++;
	$msg .= '*Passwords did not match.<br />';
}
$qs = $conn->query("select * from tbl_store where store_name = '$store'");
if ($qs->num_rows > 0){
	$err++;
	$msg .= '*Store already exist.<br />';	
}
if ($err > 0){
	echo $err .' error(s) found.<br />';
	echo $msg;
} else {
	$qid = $conn->query("select user_id from tbl_user order by user_id desc");
	$rid = $qid->fetch_assoc();
	$qsid = $conn->query("select store_id from tbl_store order by store_id desc") or die($conn->error);
	if ($qsid->num_rows > 0){
		$rsid = $qsid->fetch_assoc();
		$new_sid =  $rsid['store_id'] + 1;
	} else {
		$new_sid = 1;
	}
	$new_id = $rid['user_id'] + 1;
	include '../template/check-image.php';

	 $ext_proof = strtolower(getExt($_FILES['document']['name']));
	 $proof = substr(microtime(), 2, 19).'.'.$ext_proof;
	 move_uploaded_file($_FILES['document']['tmp_name'], '../../assets/proof/'.$proof);	
	$conn->query("insert into tbl_user (user_id, username, password, email, fname, mname, lname, gender, contact, birthday, barangay_id, location, user_access, sq_id, answer, store_id) value ('$new_id', '$username', '$password', '$email', '$fname', '$mname', '$lname', '$gender', '$contact', '$birthday', '$barangay', '$location', 'Merchant', '$security_question', '$answer', '$new_sid')") or die($conn->error);
	$conn->query("insert into tbl_store (store_id, store_name, barangay_id, location, description, terms_and_conditions, dti_number, document_proof) values ('$new_sid', '$store', '$barangay2', '$location2', '$description', '$terms', '$dti', '$proof')") or die($conn->error);
	$conn->query("insert into tbl_store_subscription (store_id, subscription_id) values ('$new_sid', '$subscription_id')") or die($conn->error);
	echo 1;
}
?>