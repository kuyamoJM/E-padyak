<?php require_once '../config/config.php';
session_start();
if (isset($_SESSION['epadyak'])){
  header("Location: ./index.php");
  exit();
} 
if (!isset($_GET['success'])){
  header("Location: ../index.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>E-Padyak | Registration Successful</title>
   <link rel="icon" type="image/x-icon" href="../assets/favicon.png" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style type="text/css">
  .register-page{
    background: url('../assets/img/header-bg.jpg') no-repeat center;
    background-size: cover;
  }
.register-box{
  width: 100%;
  max-width: 768px;
  padding: 0 20px;
}

</style>
</head>

<body class="hold-transition register-page" >
<div class="register-box">
  <div class="login-logo">
    <img src="../assets/img/navbar-logo.png" class="w-100" style="max-width: 250px;" />
  </div>

  <div class="card">
    <div class="card-body register-card-body px-4 pt-4 rounded">
      <h4 class="login-box-msg bg-success p-2 mb-2">Registration Successful!</h4>
      <h5 class="text-center py-5">Please wait for the Admintrator's approval<br /> before you can access your account.</h5>
        <div class="row  pt-4">
          <div class="col-sm-6 col-12 text-sm-left text-center mt-2">
            <a href="../index.php" class="btn btn-success"><i class="fa fa-home"></i> &nbsp;Return Home</a>
          </div>
          <div class="col-sm-6 col-12 text-sm-right text-center mt-2">
            <a href="login.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> &nbsp;Back Log-in</a>
          </div>
        </div>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>

</body>
</html>
