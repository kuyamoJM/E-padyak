<?php
session_start();
require_once '../../../config/config.php';
$brand = addslashes($_POST['brand']);
$q = $conn->query("select * from tbl_brand where brand = '$brand'") or die($conn->error);
if ($q->num_rows > 0){
	 echo '<strong>Error! </strong>
	 		<br />
       		Record already exist!
      ';
} else {
	$conn->query("insert into tbl_brand (brand) values ('$brand')");
	$_SESSION['success'] = 'Product Brand had been successfully added';
	echo '1';
}
?>