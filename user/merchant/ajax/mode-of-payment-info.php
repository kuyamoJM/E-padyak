<?php
require_once '../../../config/config.php';
$id = $_POST['id'];
$qc = $conn->query("select * from tbl_mode_of_payment where mode_of_payment_id = '$id'");
$rc = $qc->fetch_assoc();
echo json_encode($rc)
?>