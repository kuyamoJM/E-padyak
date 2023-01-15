<?php
require_once '../../../config/config.php';
$id = $_POST['id'];
$qc = $conn->query("select * from tbl_brand where brand_id = '$id'");
$rc = $qc->fetch_assoc();
echo json_encode($rc)
?>