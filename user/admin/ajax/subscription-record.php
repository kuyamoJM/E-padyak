<?php
session_start();
require_once '../../../config/config.php';
$subscription = addslashes($_POST['subscription']);
$renewal = addslashes($_POST['renewal']);
$fee = number_format(addslashes($_POST['fee']), 2);
$q = $conn->query("select * from tbl_subscription where subscription = '$subscription' and renewal = '$renewal' and fee = '$fee'") or die($conn->error);
if ($q->num_rows > 0){
	 echo '<strong>Error! </strong>
	 		<br />
       		Record already exist!
      ';
} else {
	$conn->query("insert into tbl_subscription (subscription, renewal, fee) values ('$subscription', '$renewal', '$fee')");
	$_SESSION['success'] = 'Subscription had been successfully added';
	echo '1';
}
?>