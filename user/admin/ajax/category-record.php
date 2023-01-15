<?php
session_start();
require_once '../../../config/config.php';
$category = addslashes($_POST['category']);
$q = $conn->query("select * from tbl_category where category = '$category'") or die($conn->error);
if ($q->num_rows > 0){
	 echo '<strong>Error! </strong>
	 		<br />
       		Record already exist!
      ';
} else {
	$conn->query("insert into tbl_category (category) values ('$category')");
	$_SESSION['success'] = 'Product Category had been successfully added';
	echo '1';
}
?>