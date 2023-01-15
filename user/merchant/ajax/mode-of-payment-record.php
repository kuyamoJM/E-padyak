<?php
require_once '../../../config/config.php';
require_once '../../../config/check-admin.php';
$mode = addslashes($_POST['mode']);
$details = addslashes($_POST['details']);
$q = $conn->query("select * from tbl_mode_of_payment where mode_of_payment = '$mode' and store_id = '$store_id'") or die($conn->error);
if ($q->num_rows > 0){
	 echo '<strong>Error! </strong>
	 		<br />
       		Record already exist!
      ';
} else {
	$conn->query("insert into tbl_mode_of_payment (mode_of_payment, details, store_id) values ('$mode', '$details', '$store_id')");
	$_SESSION['success'] = 'Mode of payment had been successfully added';
	echo '1';
}
?>