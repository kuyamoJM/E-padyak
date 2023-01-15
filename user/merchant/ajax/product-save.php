<?php
session_start();
require_once '../../../config/config.php';
$product_id 		= addslashes($_POST['e_product_id']);
$brand_id 		= addslashes($_POST['e_brand']);
$category_id 	= addslashes($_POST['e_category']);
$product_name 	= addslashes($_POST['e_product_name']);
$description 	= addslashes($_POST['e_description']);
$price			= addslashes($_POST['e_price']);

$q = $conn->query("select * from tbl_product where product_name = '$product_name' and product_id <> '$product_id'") or die($conn->error);
if ($q->num_rows > 0){
	 echo '<strong>Error! </strong>
	 		<br />
       		Product name already exist!
      ';
} else {
	$qp = $conn->query("select * from tbl_product where product_id = '$product_id'");
	$rp = $qp->fetch_assoc();
	$photo = $rp['photo']; 
	if ($_FILES['e_photo']['name']){
		  include '../../template/check-image.php';
			 $ext_photo = strtolower(getExt($_FILES['e_photo']['name']));
	 		$photo = substr(microtime(), 2, 19).'.'.$ext_photo;
			 move_uploaded_file($_FILES['e_photo']['tmp_name'], '../../../assets/img/products/'.$photo);
	      	if ($rp['photo'] != 'no-image.jpg'){
				unlink('../../../assets/img/products/'.$rp['photo']);
			}
	}
	

		
	 $conn->query("update tbl_product set  product_name = '$product_name', brand_id = '$brand_id', category_id = '$category_id', description = '$description', price = '$price', photo = '$photo' where product_id = '$product_id'") or die($conn->error);
	$_SESSION['success'] = 'Product had been successfully Updated.';
	echo '1';
}
?>