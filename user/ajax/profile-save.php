
<?php
session_start();
require_once '../../config/config.php';
$user_id = $_SESSION['epadyak'];
$sql = "SELECT * FROM tbl_user WHERE user_id = '$user_id'";
$query_user = $conn->query($sql);
$row_user = $query_user->fetch_assoc();
extract($row_user);
$fname 				= addslashes($_POST['fname']);
$mname 				= addslashes($_POST['mname']);
$lname 				= addslashes($_POST['lname']);
$barangay_id		= addslashes($_POST['barangay']);
$location 			= addslashes($_POST['location']);
$birthday	 		= addslashes($_POST['bday']);
$contact	 		= addslashes($_POST['contact']);
$email				= addslashes($_POST['email']);
$username			= addslashes($_POST['uname']);
$password			= addslashes($_POST['password']);
$security_question	= addslashes($_POST['security_question']);
$answer				= addslashes($_POST['answer']);
$q = $conn->query("select * from tbl_user where username = '$username' and user_id <> '$user_id' ") or die($conn->error);
if ($q->num_rows > 0){
	 echo '<strong>Error! </strong>
	 		<br />
       		Username already exist!';
} else {
	$photo2 = $photo;
	if ($_FILES['photo']['name']){
		  include '../template/check-image.php';
			 $ext_photo = strtolower(getExt($_FILES['photo']['name']));
			 $photo2 = substr(microtime(), 2, 19).'.'.$ext_photo;
			 move_uploaded_file($_FILES['photo']['tmp_name'], '../dist/img/profile/'.$photo2);	
	      	if ($photo != 'profile.png'){
				unlink('../dist/img/profile/'.$photo);
			}
	}
	 $conn->query("update tbl_user set fname = '$fname', mname = '$mname', lname = '$mname', barangay_id = '$barangay_id', location = '$location', birthday = '$birthday', contact = '$contact', email = '$email', username = '$username',  password = '$password', sq_id = '$security_question', answer = '$answer', photo = '$photo2' where user_id = '$user_id' ") or die($conn->error);
	$_SESSION['success'] = 'Profile had been successfully updated';
	echo '1';
}
?>