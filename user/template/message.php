<style type="text/css">
  .float-right{
    float: right;
  }
</style>
<?php
    if(isset($_SESSION['error'])){
       echo '
       <div class="display-block">
         <div class="alert alert-danger text-white" role="alert">
           <button type="button" class="close text-white float-right" data-dismiss="alert" aria-label="Close">&times;</button>
          <h4 class="text-white"><i class="fa fa-exclamation-triangle"></i> Error!</h4>
          '.$_SESSION['error'].'
        </div>
      </div>
      ';
      unset($_SESSION['error']);
    }

    if(isset($_SESSION['success'])){
      echo '
      <div class="display-block">
         <div class="alert alert-primary text-white" role="alert">
           <button type="button" class="close text-white float-right" data-dismiss="alert" aria-label="Close">&times;</button>
          <h4 class="text-white"><i class="fa fa-check"></i> Success!</h4>
          '.$_SESSION['success'].'
        </div>
        </div>
      ';
      unset($_SESSION['success']);
    }
  ?>
