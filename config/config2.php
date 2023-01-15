<?php
  $conn = new mysqli('localhost', 'id20005633_root', 'eP@dyak2022!', 'id20005633_db_epadyak');
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  date_default_timezone_set('Asia/Manila');
  $base_url = 'http://'.$_SERVER['SERVER_NAME'].'/e-padyak'; 
?>