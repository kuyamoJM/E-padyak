<?php 
    $page = 'About Store';
    include '../template/header.php';
    include '../template/nav-bar.php';
    include '../template/side-bar-merchant.php';
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
            <h1 class="m-0">About Store</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">About Store</li>
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
                <h3 class="card-title">Store Information</h3> 
                
               
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php include '../template/message.php';
                    $q = $conn->query("select * from tbl_store s inner join tbl_barangay b on b.barangay_id = s.barangay_id where store_id = '$store_id'");
                    $r = $q->fetch_assoc();
                 ?>
                 <span class="text-danger msg-err"></span>
                 <form action="ajax/store-save.php" method="post" id="form_store" enctype="multipart/form-data">
                      <div class="row">
                          <div class="col-12">
                              <div class="row">
                                  <div class="col-md-6 col-12">
                                    <div class="col-12">
                                     <span style="font-size: 12px; font-weight: bold;">Store Name</span>   
                                    <div class="input-group mb-3">
                                      <input type="text" class="form-control" required="required" value="<?php echo $r['store_name']; ?>" autocomplete="off" name="store" id="store" placeholder="- Store Name - ">
                                     
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
                                     <span style="font-size: 12px; font-weight: bold;">Purok/Street/House No.</span>   
                                      <input type="text" class="form-control" required="required" autocomplete="off" value="<?php echo $r['location']; ?>" name="location" id="location" placeholder="- Purok/Street/House No. - ">
                                  </div>
                                </div>
                                <div class="col-md-6 col-12 text-center">
                                   <img src="<?php echo $base_url; ?>/assets/img/store/<?php echo $r['photo']; ?>" style="width: 100%; max-width: 400px;" />
                                   <br />
                                   
                                    <input type="file" class="form-control image-only" autocomplete="off" name="photo" id="photo" style="width: 100%; max-width: 400px; margin: 10px auto;">
                                    <div  style="width: 100%; max-width: 400px; margin: 10px auto; text-align: left; font-size: 10px; color: #505050;">*optional</div>

                              </div>
                              </div>
                           
                        </div>
                        <div class="col-12">
                           <span style="font-size: 12px; font-weight: bold;">DTI Registration No.</span>   
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" required="required" autocomplete="off" value="<?php echo $r['dti_number']; ?>" name="dti" id="dti" placeholder="- DTI Registration No. - ">
                            
                          </div>
                        </div>
                        <div class="col-12">
                           <span style="font-size: 12px; font-weight: bold;">Description</span>   
                          <div class="input-group mb-3">
                            <textarea type="text" class="form-control" required="required" autocomplete="off"  name="description" id="description" style="height: 100px;" placeholder="- Description. - "><?php echo $r['description']; ?></textarea>
                           
                          </div>
                        </div>
                         <div class="col-12">
                           <span style="font-size: 12px; font-weight: bold;">Terms and Conditions</span>   
                          <div class="input-group mb-3">
                            <textarea type="text" class="form-control" required="required" autocomplete="off" name="terms" id="terms" style="height: 100px;" placeholder="- Terms and Conditions - "><?php echo $r['terms_and_conditions']; ?></textarea>
                           
                          </div>
                           Delivery Option: <input type="checkbox" name="delivery" id="delivery" <?php echo ($r['accept_delivery'] == 1 ? 'checked': ''); ?> data-toggle="toggle">
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
            if (response != '1'){
                  $(".msg-err").html(response);
              } else {
                  window.location.href = "about.php";
              }
            }
          });
      
        return false;
      });

</script>


</body>
</html>
