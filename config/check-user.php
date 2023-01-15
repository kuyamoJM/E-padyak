<?php 
session_start();
unset($_SESSION['epadyak']);
if (isset($_SESSION['epadyak'])){
  header("Location: ./index.php");
  exit();
} 
?>