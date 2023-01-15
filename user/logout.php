<?php
session_start();
unset($_SESSION['epadyak']);
header("Location: ../");
exit();
?>