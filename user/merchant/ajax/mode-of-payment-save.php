<?php
require_once '../../../config/config.php';
require_once '../../../config/check-admin.php';
$mode_id = addslashes($_POST['e_mode_id']);
$mode = addslashes($_POST['e_mode']);
$details = addslashes($_POST['e_details']);
$q = $conn->query("select * from tbl_mode_of_payment where mode_of_payment = '$mode' and store_id = '$store_id' and mode_of_payment_id <> '$mode_id'") or die($conn->error);
if ($q->num_rows > 0){
	 echo '<strong>Error! </strong>
	 		<br />
       		Record already exist!
      ';
} else {
	$conn->query("update tbl_mode_of_payment set mode_of_payment = '$mode', details = '$details' where mode_of_payment_id = '$mode_id'");
	$_SESSION['success'] = 'Mode of payment had been successfully updated';
	echo '1';
}
?>