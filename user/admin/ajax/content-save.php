<?php
session_start();
require_once '../../../config/config.php';
$id = $_POST['content_id'];
$txt_content = addslashes($_POST['txt_content']);
$conn->query("update tbl_content set content = '$txt_content' where content_id = '$id'");
$_SESSION['success'] = 'Record successfully updated.';
?>