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
if ($err > 0){
	echo $err .' error(s) found.<br />';
	echo $msg;
} else {
	$qid = $conn->query("select user_id from tbl_user order by user_id desc");
	$rid = $qid->fetch_assoc();
	$new_id = $rid['user_id'] + 1;
	$conn->query("insert into tbl_user (user_id, username, password, email, fname, mname, lname, gender, contact, birthday, barangay_id, location, user_access, sq_id, answer) value ('$new_id', '$username', '$password', '$email', '$fname', '$mname', '$lname', '$gender', '$contact', '$birthday', '$barangay', '$location', 'Customer', '$security_question', '$answer')") or die($conn->error);
	echo 1;
}
?>