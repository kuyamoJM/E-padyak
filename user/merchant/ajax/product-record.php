<?php
session_start();
require_once '../../../config/config.php';
$brand_id 		= addslashes($_POST['brand']);
$category_id 	= addslashes($_POST['category']);
$product_name 	= addslashes($_POST['product_name']);
$description 	= addslashes($_POST['description']);
$price			= addslashes($_POST['price']);
$store_id		= addslashes($_POST['store_id']);
$img_3d 		= addslashes($_POST['img_3d']);

$q = $conn->query("select * from tbl_product where brand_id = '$brand_id' and category_id = '$category_id' and store_id = '$store_id' and product_name = '$product_name'") or die($conn->error);
if ($q->num_rows > 0){
	 echo '<strong>Error! </strong>
	 		<br />
       		Product already exist!
      ';
} else {
	include '../../template/check-image.php';

	 $ext_photo = strtolower(getExt($_FILES['photo']['name']));
	 $photo = substr(microtime(), 2, 19).'.'.$ext_photo;
	 move_uploaded_file($_FILES['photo']['tmp_name'], '../../../assets/img/products/'.$photo);	
	 $conn->query("insert into tbl_product (brand_id, category_id, store_id, product_name, description, price, photo, img_3d) values ('$brand_id', '$category_id', '$store_id', '$product_name', '$description', '$price', '$photo', '$img_3d')") or die($conn->error);
	$_SESSION['success'] = 'Product had been successfully added';
	echo '1';
}
?>