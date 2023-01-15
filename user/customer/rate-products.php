<?php
require_once '../../config/config.php';
require_once '../../config/check-admin.php';
if (isset($_POST['submit'])){
	$product_id = $_POST['product_id'];
	$ratings = $_POST['ratings'];
	$review = addslashes($_POST['review']);
	$conn->query("insert into tbl_ratings (user_id, product_id, ratings, review) values ('$user_id', '$product_id', '$ratings', '$review')") or die($conn->error);
	$_SESSION['success'] = 'Product had been successfully rated.';
} 
	header("location: product-ratings.php"); 

?>