<?php
session_start();
require_once '../../../config/config.php';
$e_category_id = addslashes($_POST['e_category_id']);
$e_category = addslashes($_POST['e_category']);
$q = $conn->query("select * from tbl_category where category = '$e_category' and category_id <> '$e_category_id'") or die($conn->error);
if ($q->num_rows > 0){
	 echo '<strong>Error! </strong>
	 		<br />
       		Record already exist! 
      ';
} else {
	$conn->query("update tbl_category set category = '$e_category' where category_id = '$e_category_id'");
	$_SESSION['success'] = 'Product Category had been successfully Updated';
	echo '1';
}
?>