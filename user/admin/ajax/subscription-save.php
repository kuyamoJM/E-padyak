<?php
session_start();
require_once '../../../config/config.php';
$e_subscription_id = addslashes($_POST['e_subscription_id']);
$e_subscription = addslashes($_POST['e_subscription']);
$e_renewal = addslashes($_POST['e_renewal']);
$e_fee = number_format(addslashes($_POST['e_fee']), 2);
$q = $conn->query("select * from tbl_subscription where subscription = '$e_subscription' and renewal = '$e_renewal' and fee = '$e_fee' and subscription_id <> '$e_subscription_id'") or die($conn->error);
if ($q->num_rows > 0){
	 echo '<strong>Error! </strong>
	 		<br />
       		Record already exist! 
      ';
} else {
	$conn->query("update tbl_subscription set subscription = '$e_subscription',  renewal = '$e_renewal', fee = '$e_fee' where subscription_id = '$e_subscription_id'");
	$_SESSION['success'] = 'Subscription had been successfully Updated.';
	echo '1';
}
?>