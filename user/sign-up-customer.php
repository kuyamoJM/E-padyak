<?php require_once '../config/config.php';
session_start();
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
.register-box-2{
  width: 100%;
  max-width: 768px;
  padding: 0 20px;
  margin-top: 50px;
}

</style>
</head>

<body class="hold-transition register-page" >
<div class="register-box-2">
  <div class="login-logo">
    <img src="../assets/img/navbar-logo.png" class="w-100" style="max-width: 250px;" />
  </div>

  <div class="card">
    <div class="card-body register-card-body ">
      <h4 class="login-box-msg">New Customer Registration</h4>
      <p class="err-msg text-danger"></p>
      <form action="ajax/customer-sign-up.php" method="post" id="customer_sign_up">
        <div class="row">
        <div class="col-md-4 col-sm-6 col-12">
        <div class="input-group mb-3">
          <input type="text" class="form-control" required="required" autocomplete="off" name="fname" id="fname" placeholder="- First Name - ">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
      </div>
        <div class="col-md-4 col-sm-6 col-12">
        <div class="input-group mb-4">
          <input type="text" class="form-control" required="required" autocomplete="off" name="mname" id="mname" placeholder="- Middle Name - ">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
      </div>
        <div class="col-md-4 col-sm-6 col-12">
        <div class="input-group mb-3">
          <input type="text" class="form-control" required="required" autocomplete="off" name="lname" id="lname" placeholder="- Last Name - ">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
      </div>
        <div class="col-md-4 col-sm-6 col-12">
         <select class="form-control mb-3" required="required" name="town" id="town">
              <option disabled value="" selected>- Select Town -</option>
              <?php 
              $q = $conn->query("select * from tbl_town order by town asc");
              while ($r = $q->fetch_assoc()){
                echo '<option value="'.$r['town_id'].'">'.$r['town'].'</option>';
              }

              ?>
          </select>
      </div>
        <div class="col-md-4 col-sm-6 col-12">
        <div class="brgy">
           <select class="form-control mb-3" required="required" name="barangay" id="barangay">
                 <option disabled selected>- Select Barangay -</option>

             

              ?>
          </select>
        </div>
      </div>
        <div class="col-md-4 col-sm-6 col-12">
        <div class="input-group mb-4">
          <input type="text" class="form-control" autocomplete="off" name="location" id="location" required="required" placeholder="- Purok/Street/House No./ - ">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-card"></span>
            </div>
          </div>
        </div>
      </div>
        <div class="col-12">
        <div class="input-group mb-3">
          <input type="email" required="required" autocomplete="off" name="email" id="email" class="form-control" placeholder="- Email Address - ">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
      </div>
        <div class="col-md-4 col-sm-6 col-12">
        <div class="input-group mb-4">
          <input type="text" class="form-control numeric" autocomplete="off" maxlength="11" name="contact" id="contact" required="required" placeholder="- Contact Number - ">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
      </div>

        <div class="col-md-4 col-sm-6 col-12">
          <select class="form-control mb-3" required="required" name="gender" id="gender">
                          <option disabled="disabled" value="" selected="selected">- Select  Gender - </option>
                          <option>Male</option>
                          <option>Female</option>
            </select>
      </div>
      
        <div class="col-md-4 col-12">
        <div class="input-group mb-3">
           
          <input type="date" name="birthday" id="birthday" required="required" class="form-control" title="Birthday">
          
        </div>
      </div>
        <div class="col-md-4 col-12">
        <div class="input-group mb-4">
          <input type="text" class="form-control" autocomplete="off" name="username" id="username" required="required" placeholder="- Username - ">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
      </div>
        <div class="col-md-4 col-sm-6 col-12">
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" minlength="6" id="password" placeholder="- Password - " >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
      </div>
        <div class="col-md-4 col-sm-6 col-12">
        <div class="input-group mb-3">
          <input type="password" class="form-control" required="required"  minlength="6" name="retype" id="retype" placeholder="- Re-type Password - " >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
      </div>
        <div class="col-md-8 col-sm-6 col-12">
         <select class="form-control mb-3" required="required" id="security_question" name="security_question">
              <option disabled="disabled" value="" selected="selected">- Select Security Question - </option>
              <?php 
              $qsq =  $conn->query("select * from tbl_security_question where is_deleted = 0");
              while ($rsq = $qsq->fetch_assoc()){
                echo '<option value="'. $rsq['sq_id'] . '">'. $rsq['security_question'] . '</option>';
              }
              ?>
          </select>
      </div>
      <div class="col-md-4 col-sm-6 col-12">
        <div class="input-group mb-3">
          <input type="text" class="form-control" autocomplete="off" required="required" name="answer" id="answer" placeholder="- Answer - " >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
      </div>
        <div class="row w-100 pt-3">
          <!-- /.col -->
          <div class="col-sm-4 col-12 mb-2 text-md-left text-center">
             <a href="login.php" class="btn btn-secondary w-100"><i class="fa fa-arrow-left"></i> Back to Login</a>
          </div>
          <div class="col-sm-4 col-12">
          </div>

          <div class="col-sm-4 col-12 mb-2 text-md-right text-center">
            <button type="submit" class="btn btn-primary w-100"><i class="fa fa-check"></i> &nbsp;Register</button>
          </div>
          <!-- /.col -->
        </div>
        </div>
      </form>

     
     
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

<script type="text/javascript">
  $(document).ready(function(){
    $("#town").change(function(){
        $.post('ajax/barangay.php', { town: $(this).val()}, function(response){
            $(".brgy").html(response);
        });
    });
    $("#customer_sign_up").submit(function(){
       $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
           // dataType: 'json',
            success: function(response){
                if (response == 1){
                  window.location.href = "registration-success.php?success";
                } else {
                  $(".err-msg").html(response);
                }
              }
          });
      return false;
    });
  })
</script>
</body>
</html>
