<!-- Log-out Modal -->
<div class="modal fade" id="logout">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="logOutModalLabel">Ready to Leave?</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
      </div>
      <div class="modal-body">
       Select "Logout" below if you are ready to end your current session.
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        <a href="<?php echo $base_url; ?>/user/log-out.php"  class="btn btn-primary">Log-out</a>
      </div>
    </div>
  </div>
</div>

  <!-- alert Modal -->
<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alert_title" aria-hidden="true" >
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

  <!-- Form modal -->
