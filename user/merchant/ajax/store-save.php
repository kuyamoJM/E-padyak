<?php
session_start();
require_once '../../../config/config.php';
$user_id = $_SESSION['epadyak'];
$sql = "SELECT * FROM tbl_user WHERE user_id = '$user_id'";
$query_user = $conn->query($sql);
$row_user = $query_user->fetch_assoc();
extract($row_user);
$store 			= addslashes($_POST['store']);
$barangay_id	= addslashes($_POST['barangay']);
$location 		= addslashes($_POST['location']);
$dti_number 	= addslashes($_POST['dti']);
$description 	= addslashes($_POST['description']);
$terms			= addslashes($_POST['terms']);
if (isset($_POST['delivery'])){
	$del = 1;
} else {
	$del = 0;
}
$q = $conn->query("select * from tbl_store where store_id <> '$store_id' and store_name = '$store' ") or die($conn->error);
if ($q->num_rows > 0){
	 echo '<strong>Error! </strong>
	 		<br />
       		Store name already exist!';
} else {
	$qp = $conn->query("select * from tbl_store where store_id = '$store_id'");
	$rp = $qp->fetch_assoc();
	$photo = $rp['photo'];
	if ($_FILES['photo']['name']){
		  include '../../template/check-image.php';
			 $ext_photo = strtolower(getExt($_FILES['photo']['name']));
			 $photo = substr(microtime(), 2, 19).'.'.$ext_photo;
			 move_uploaded_file($_FILES['photo']['tmp_name'], '../../../assets/img/store/'.$photo);	
	      	if ($rp['photo'] != 'no-image.jpg'){
				unlink('../../../assets/img/store/'.$rp['photo']);
			}
	}
	 $conn->query("update tbl_store set store_name = '$store', barangay_id = '$barangay_id', location = '$location', description = '$description', terms_and_conditions = '$terms', photo = '$photo', dti_number = '$dti_number', accept_delivery = '$del' where store_id = '$store_id'") or die($conn->error);
	$_SESSION['success'] = 'Store information had been successfully updated';
	echo '1';
}
?>