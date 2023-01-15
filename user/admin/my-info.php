<?php 
    $page = 'My Profile';
    include '../template/header.php';
    include '../template/nav-bar.php';
    include '../template/side-bar.php';
    include '../template/modal.php';
 ?>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
 <style type="text/css">
   .w-768{
    max-width: 768px;
    width: 96%;
   }
   .thumbs{
    width: 100px;
    border: 1px solid rgba(100, 100, 100, 0.5);
   }
   #barangay{
    margin-bottom: 1rem !important;
   }
 </style>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">My Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
       

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">My Profile</h3> 
                
               
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php include '../template/message.php';
                    $q = $conn->query("select * from tbl_user s inner join tbl_barangay b on b.barangay_id = s.barangay_id where user_id = '$user_id'");
                    $r = $q->fetch_assoc();
                 ?>
                 <span class="text-danger msg-err"></span>
                 <form action="../ajax/profile-save.php" method="post" id="form_store" enctype="multipart/form-data">
                      <div class="row">
                          <div class="col-12">
                              <div class="row">
                                  <div class="col-md-6 col-12">
                                    <div class="col-12">
                                     <span style="font-size: 12px; font-weight: bold;">First Name</span>   
                                    <div class="input-group mb-3">
                                      <input type="text" class="form-control" required="required" value="<?php echo $fname; ?>" autocomplete="off" name="fname" id="fname" placeholder="- Store Name - ">
                                     
                                    </div>
                                  </div>
                                  <div class="col-12">
                                     <span style="font-size: 12px; font-weight: bold;">Middle Name</span>   
                                    <div class="input-group mb-3">
                                      <input type="text" class="form-control" required="required" value="<?php echo $mname; ?>" autocomplete="off" name="mname" id="mname" placeholder="- Store Name - ">
                                     
                                    </div>
                                  </div>
                                  <div class="col-12">
                                     <span style="font-size: 12px; font-weight: bold;">Last Name</span>   
                                    <div class="input-group mb-3">
                                      <input type="text" class="form-control" required="required" value="<?php echo $lname; ?>" autocomplete="off" name="lname" id="lname" placeholder="- Store Name - ">
                                     
                                    </div>
                                  </div>
                                  <div class="col-12">
                                     <span style="font-size: 12px; font-weight: bold;">Town</span>   
                                     <select class="form-control mb-3" required="required" name="town" id="town">
                                                   <option disabled value="" selected>- Select Town -</option>
                                                    <?php 
                                                    $qq = $conn->query("select * from tbl_town order by town asc");
                                                    while ($rr = $qq->fetch_assoc()){
                                                      echo '<option value="'.$rr['town_id'].'"'.($r['town_id'] == $rr['town_id'] ? ' selected="selected"' : '').'>'.$rr['town'].'</option>';
                                                    }

                                                    ?>
                                                </select>
                                  </div>
                                  <div class="col-12">
                                     <span style="font-size: 12px; font-weight: bold;">Barangay</span>   
                                     <div class="brgy-holder">
                                     <select class="form-control mb-3" required="required" name="barangay" id="barangay">
                                                   <option disabled value="" selected>- Select Barangay -</option>
                                                    <?php 
                                                    $q3 = $conn->query("select * from tbl_barangay where town_id = '".$r['town_id']."'order by barangay asc");
                                                    while ($r3 = $q3->fetch_assoc()){
                                                      echo '<option value="'.$r3['barangay_id'].'"'.($r['barangay_id'] == $r3['barangay_id'] ? ' selected="selected"' : '').'>'.$r3['barangay'].'</option>';
                                                    }

                                                    ?>
                                                </select>
                                      </div>
                                  </div>
                                   <div class="col-12">
                                   <div class="mb-3">
                                     <span style="font-size: 12px; font-weight: bold;">Purok/Street/House No.</span>   
                                      <input type="text" class="form-control" required="required" autocomplete="off" value="<?php echo $location; ?>" name="location" id="location" placeholder="- Purok/Street/House No. - ">
                                      </div>
                                  </div>
                                  <div class="col-12">
                                     <span style="font-size: 12px; font-weight: bold;">Gender</span>   
                                       <select class="form-control mb-3" required="required" name="gender" id="gender">
                                                   <option disabled value="" selected>- Select Gender -</option>
                                                    <option <?php if ($gender == 'Male') { echo 'selected="selected"';} ?>>Male</option>
                                                    <option <?php if ($gender == 'Female') { echo 'selected="selected"';} ?>>Female</option>
                                                    ?>
                                                </select>
                                  </div>
                                   <div class="col-12">
                                    <div class="mb-3">
                                     <span style="font-size: 12px; font-weight: bold;">Birthday</span>   
                                      <input type="date" class="form-control" required="required" autocomplete="off" value="<?php echo $birthday; ?>" name="bday" id="bday" placeholder="- Birthday. - ">
                                      </div>
                                  </div>
                                   <div class="col-12">
                                    <div class="mb-3">
                                     <span style="font-size: 12px; font-weight: bold;">Contact</span>   
                                      <input type="text" class="form-control" required="required" autocomplete="off" value="<?php echo $contact; ?>" name="contact" id="contact" placeholder="- Contact - ">
                                      </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="mb-3">
                                     <span style="font-size: 12px; font-weight: bold;">Email</span>   
                                      <input type="email" class="form-control" required="required" autocomplete="off" value="<?php echo $email; ?>" name="email" id="email" placeholder="- Email - ">
                                      </div>
                                  </div>
                                  
                                  
                                </div>
                                <div class="col-md-6 col-12">
                                  <div class="col-12">
                                    <div class="mb-3">
                                     <span style="font-size: 12px; font-weight: bold;">Username</span>   
                                      <input type="text" class="form-control" required="required" autocomplete="off" value="<?php echo $username; ?>" name="uname" id="uname" placeholder="- Username - ">
                                      </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="mb-3">
                                     <span style="font-size: 12px; font-weight: bold;">Password</span>   
                                      <input type="password" class="form-control" minlength="6" required="required" autocomplete="off" value="<?php echo $password; ?>" name="password" id="password" placeholder="- Username - ">
                                      </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="mb-3">
                                     <span style="font-size: 12px; font-weight: bold;">Security Question</span>   
                                        <select class="form-control mb-3" required="required" id="security_question" name="security_question">
                                                      <option disabled="disabled" value="" selected="selected">- Select Security Question - </option>
                                                      <?php 
                                                      $qsq =  $conn->query("select * from tbl_security_question where is_deleted = 0");
                                                      while ($rsq = $qsq->fetch_assoc()){
                                                        echo '<option value="'. $rsq['sq_id'] . '"'.($sq_id == $rsq['sq_id'] ? 'selected="selected"' : '').'>'. $rsq['security_question'] . '</option>';
                                                      }
                                                      ?>
                                                  </select>
                                            </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="mb-3">
                                     <span style="font-size: 12px; font-weight: bold;">Answer</span>   
                                      <input type="password" class="form-control" required="required" autocomplete="off" value="<?php echo $answer; ?>" name="answer" id="answer" placeholder="- Username - ">
                                      </div>
                                  </div>
                                  <div class=" text-center mt-3">
                                  <?php 
                                    if ($photo == 'profile.png') {
                                        ?>
                                        <img  class="img-thumb" style="width: 100%; max-width: 200px;"  alt="User Image" src="<?php echo $base_url; ?>/user/dist/img/profile/<?php echo ($gender == 'Male' ? 'm' : 'f'); ?>-profile.svg" />
                                        <?php } else {
                                        ?>
                                        <img  class="img-thumb" style="width: 100%; max-width: 200px;"  alt="User Image" src="<?php echo $base_url; ?>/user/dist/img/profile/<?php echo $photo; ?>" />
                                      <?php } ?>
                               
                                   <br />
                                   
                                    <input type="file" class="form-control image-only" autocomplete="off" name="photo" id="photo" style="width: 100%; max-width: 400px; margin: 10px auto;">
                                    <div  style="width: 100%; max-width: 400px; margin: 10px auto; text-align: left; font-size: 10px; color: #505050;">*optional</div>
                                    </div>

                              </div>
                              </div>
                           
                        </div>
                        
                         
                         
                       
                      </div>
                      <div class="text-right">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                      </div>

                    </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php 
    include '../template/footer.php';
    include '../template/scripts.php';
?>  
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $(".image-only").change(function(){
          if ($(this).val() != '') {
            var ext = $(this).val().substring($(this).val().length-4, $(this).val().length);
            ext = ext.toLowerCase();
            if (ext != '.jpg' && ext != '.png' && ext != 'jpeg'  && ext != '.gif'  && ext != '.bmp'){
                $("#alertModal .modal-body").html('Please select a valid image.');
                $('#alertModal').modal('show').css('z-index', '10000000');
                $(this).val('');
            }
          }
        });
     
  });
   $("#town").change(function(){
        $.post('../ajax/barangay.php', { town: $(this).val()}, function(response){
            $(".brgy-holder").html(response);
        });
    });
   $("#form_store").submit(function(){
        var formData = new FormData($(this)[0]);
          $.ajax({
              type: 'POST',
              url: $(this).attr('action'),
              data: formData,
              processData: false,  // tell jQuery not to process the data
              contentType: false,  // tell jQuery not to set contentType
              success: function(response){
            if (response != 1){
                  $(".msg-err").html(response);
              } else {
                  window.location.href = "my-info.php";
              }
            }
          });
      
        return false;
      });

</script>


</body>
</html>
