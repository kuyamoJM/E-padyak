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
  <title>E-Padyak | Forgot Password</title>
   <link rel="icon" type="image/x-icon" href="../assets/favicon.png" />
  <!-- Google Font: Source Sans Pro -->
    
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<style type="text/css">
  .login-page{
    background: url('../assets/img/header-bg.jpg') no-repeat center;
    background-size: cover;
  }

</style>
<body class="hold-transition login-page" >
<div class="login-box">
  <div class="login-logo">
    <img src="../assets/img/navbar-logo.png" class="w-75" />
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Forgot Password</p>

      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="pb-2">
        <div class="text-center text-danger pb-2">
          <?php 
          $un = '';
          if (isset($_POST['login'])){
            $un = addslashes($_POST['un']);
            $answer = addslashes($_POST['answer']);
            $security_question = $_POST['security_question'];
            $q = $conn->query("select * from tbl_user where username = '$un' and sq_id = '$security_question' and answer = '$answer'");
            if ($q->num_rows > 0){
              $r = $q->fetch_assoc();
              header("location: reset-password.php?id=".md5($r['user_id']));

            } else {
              echo 'Unable to verify account. 
              <br />Please try again.';
            }
          }
          
           ?>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="un" value="<?php echo stripslashes($un); ?>" required autocomplete="off" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <select class="form-control" required="required" id="security_question" name="security_question">
                    <option disabled="disabled" value="" selected="selected">- Select Security Question - </option>
                    <?php 
                    $qsq =  $conn->query("select * from tbl_security_question where is_deleted = 0");
                    while ($rsq = $qsq->fetch_assoc()){
                      echo '<option value="'. $rsq['sq_id'] . '">'. $rsq['security_question'] . '</option>';
                    }
                    ?>
                </select>
        </div>
         <div class="input-group mb-3">
          <input type="password" name="answer" class="form-control" required placeholder="Answer">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" name="login" class="btn btn-primary btn-block">Verify</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



      <p class="mb-0 text-center">
        <a href="sign-up.php" class="text-center">Sign-Up</a> | <a href="forgot-password.php" class="text-center">Login</a> | <a href="../index.php" class="text-center">Return Home</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
