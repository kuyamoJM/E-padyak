<?php require_once '../config/config.php';
session_start();
unset($_SESSION['epadyak']);
if (isset($_SESSION['epadyak'])){
  header("Location: ./index.php");
  exit();
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>E-Padyak | Sign-up</title>
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
  max-width: 460px;
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
    <div class="card-body register-card-body rounded">
      <h4 class="login-box-msg">Please select Membership:</h4>

      
        <div class="row w-100 px-2 py-5">
          <!-- /.col -->
          <div class="col-sm-6 col-12 mb-2 px-3">
             <a href="sign-up-customer.php" class="btn btn-primary w-100"><i class="fa fa-check-square"></i> &nbsp;I'm a Customer</a>
          </div>

          <div class="col-sm-6 col-12 mb-2 px-3">
             <a href="sign-up-merchant.php" class="btn btn-success w-100"><i class="fa fa-check-square"></i> &nbsp;I'm a Merchant</a>
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-sm-6 col-12 text-sm-left text-center">
            <a href="../index.php">Home</a>
          </div>
          <div class="col-sm-6 col-12 text-sm-right text-center">
            <a href="login.php">Log-in Page</a>
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
<script type="text/javascript">
  $(document).ready(function(){
    $("#town").change(function(){
        $.post('ajax/barangay.php', { town: $(this).val()}, function(response){
            $(".brgy").html(response);
        });
    });
  })
</script>
</body>
</html>
