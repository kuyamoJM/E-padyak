<?php
session_start();
if (!$_SESSION['epadyak']){
	header("Location: ../login.php");
	exit();
} else {
	$user_id = $_SESSION['epadyak'];
	$sql = "SELECT * FROM tbl_user WHERE user_id = '$user_id'";
	$query_user = $conn->query($sql);
	$row_user = $query_user->fetch_assoc();
	extract($row_user);
}

?>