<?php
session_start();
require_once '../../../config/config.php';
$e_brand_id = addslashes($_POST['e_brand_id']);
$e_brand = addslashes($_POST['e_brand']);
$q = $conn->query("select * from tbl_brand where brand = '$e_brand' and brand_id <> '$e_brand_id'") or die($conn->error);
if ($q->num_rows > 0){
	 echo '<strong>Error! </strong>
	 		<br />
       		Record already exist! 
      ';
} else {
	$conn->query("update tbl_brand set brand = '$e_brand' where brand_id = '$e_brand_id'");
	$_SESSION['success'] = 'Product Brand had been successfully Updated';
	echo '1';
}
?>