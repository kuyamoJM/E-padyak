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
    background-attachment: fixed;
  }
.register-box-2{
  width: 100%;
  max-width: 1440px;
  padding: 0 20px;
    margin-top: 50px;
}
textarea{
  resize: none;
}

</style>
</head>

<body class="hold-transition register-page" >
  <!-- alert Modal -->
<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alert_title" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="alert_title"><i class="fa fa-fw fa-exclamation" style="color: #f00;"> </i> Alert</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body" id="modal_alert"></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal" class="btn-close-focus">Close</button>      
        </div>
      </div>
    </div>
  </div>
<div class="register-box-2">
  <div class="login-logo">
    <img src="../assets/img/navbar-logo.png" class="w-100" style="max-width: 250px;" />
  </div>

  <div class="card">
    <div class="card-body register-card-body ">
      <h4 class="login-box-msg">New Merchant Registration</h4>
      <p class="err-msg text-danger"></p>
      <form action="ajax/merchant-sign-up.php" method="post" id="customer_sign_up" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-6 col-12 border">
            <h5 style="border-top: 1px solid #e1e1e1; " class="w-100 text-center py-3">Personal Information</h5>
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
              <div class="input-group mb-3">
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
              <div class="input-group mb-3">
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
              <div class="input-group mb-3">
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
              <div class="input-group mb-3">
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
          </div>
          </div>
         <div class="col-lg-6 col-12 border">
            <h5 style="border-top: 1px solid #e1e1e1; " class="w-100 text-center py-3">Store Information</h5>
              <div class="row">
              <div class="col-12">
              <div class="input-group mb-3">
                <input type="text" class="form-control" required="required" autocomplete="off" name="store" id="store" placeholder="- Store Name - ">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-store"></span>
                  </div>
                </div>
              </div>
            </div>

              <div class="col-md-4 col-sm-6 col-12">
               <select class="form-control mb-3" required="required" name="town2" id="town2">
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
              <div class="brgy2">
                 <select class="form-control mb-3" required="required" name="barangay2" id="barangay2">
                       <option disabled selected>- Select Barangay -</option>

                   

                    ?>
                </select>
              </div>
            </div>
              <div class="col-md-4 col-sm-6 col-12">
              <div class="input-group mb-3">
                <input type="text" class="form-control" autocomplete="off" name="location2" id="location2" required="required" placeholder="- Purok/Street/House No./ - ">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-address-card"></span>
                  </div>
                </div>
              </div>
            </div>
             
             <div class="col-sm-6 col-12">
              <div class="input-group mb-3">
                <input type="text" class="form-control numeric" required="required" autocomplete="off" name="dti" id="dti" placeholder="- DTI Registration No. - ">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-certificate"></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6  col-12">
               <select class="form-control mb-3" required="required" name="subscription_id" id="subscription_id">
                    <option disabled value="" selected>- Select Subscription -</option>
                    <?php 
                    $q = $conn->query("select * from tbl_subscription where is_deleted = 0");
                    while ($r = $q->fetch_assoc()){
                      echo '<option value="'.$r['subscription_id'].'">'.$r['subscription'].' - &#8369;'.number_format($r['fee'], 2).' ('.$r['renewal'].')</option>';
                    }

                    ?>
                </select>
            </div>
              <div class="col-12 ">
                <input type="file" class="form-control image-pdf mb-3" required="required" autocomplete="off" title="Document Proof (.jpg, .png or .pdf)" name="document" id="document">
            </div>
             <div class="col-sm-6 col-12">
             <textarea class="form-control mb-3" name="description" required="required" id="description" placeholder="- Short Description (including contact numbers) -" style="height: 93px;"></textarea>
             
            </div>
              <div class="col-sm-6 col-12">
              <div class="input-group mb-3">
                <textarea class="form-control" name="terms" required="required" id="terms" placeholder="- Terms and Conditions -" style="height: 93px;"></textarea>
                
              </div>
            </div>
             
             
              
        
          </div>
          </div>
        </div>

        <div class="row w-100 pt-3">
          <!-- /.col -->
          <div class="col-lg-2  col-sm-4 col-12 mb-2 text-md-left text-center">
             <a href="login.php" class="btn btn-secondary w-100"><i class="fa fa-arrow-left"></i> Back to Login</a>
          </div>
          <div class="col-lg-8 col-sm-4 col-12">
          </div>

          <div class="col-lg-2 col-sm-4 col-12 mb-2 text-md-right text-center">
            <button type="submit" class="btn btn-primary w-100"><i class="fa fa-check"></i> &nbsp;Register</button>
          </div>
          <!-- /.col -->
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
    $(".image-pdf").change(function(){
          if ($(this).val() != '') {
            var ext = $(this).val().substring($(this).val().length-4, $(this).val().length);
            ext = ext.toLowerCase();
            if (ext != '.jpg' && ext != '.png' && ext != 'jpeg'  && ext != '.pdf'){
                $("#alertModal .modal-body").html('Please select .jpg, .png or .pdf file.');
                $('#alertModal').modal('show').css('z-index', '10000000');
                $(this).val('');
            }
          }
        });
    $("#town").change(function(){
        $.post('ajax/barangay.php', { town: $(this).val()}, function(response){
            $(".brgy").html(response);
        });
    });
    $("#town2").change(function(){
        $.post('ajax/barangay2.php', { town: $(this).val()}, function(response){
            $(".brgy2").html(response);
        });
    });
    $("#customer_sign_up").submit(function(){
      var formData = new FormData($(this)[0]);
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: formData,
              processData: false,  // tell jQuery not to process the data
              contentType: false,  // tell jQuery not to set contentType
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
