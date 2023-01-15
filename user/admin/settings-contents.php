<?php 
    $page = 'Settings - Contents';
    include '../template/header.php';
    include '../template/nav-bar.php';
    include '../template/side-bar.php';
    include '../template/modal.php';
 ?>

 

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Contents</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
              <li class="breadcrumb-item active">Contents</li>
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
                <h3 class="card-title">Website Content Information</h3> 
               
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php include '../template/message.php'; ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th width="7%"></th>
                  </tr>
                  </thead>

                  <tbody>
                  <?php 
                  $qc = $conn->query("select * from tbl_content order by title asc");
                  while ($rc = $qc->fetch_assoc()){ ?>
                    <tr>
                      <td width="25%"><?php echo $rc['title']; ?></td>
                       <td><?php echo (strlen($rc['content']) > 100 ? substr($rc['content'], 0, 200).'...' : $rc['content']); ?></td>
                       <td class="text-center">
                  
                    <button type="button" class="btn btn-success btn-xs view" data-id="<?php echo $rc['content_id']; ?>" data-toggle="modal" data-target="#view" ><i class="fa fa-eye"></i></button>

                    <button type="button" class="btn btn-info btn-xs edit" data-id="<?php echo $rc['content_id']; ?>" data-toggle="modal" data-target="#update"><i class="fa fa-pencil-alt"></i> 
                    </button>
                    </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th width="7%"></th>
                  </tr>
                  </tfoot>
                </table>
                 <div class="modal fade" id="view">
                  <div class="modal-dialog">
                  <div class="modal-content p-3">
                    <h3 class="text-center modal-title">Title</h3>
                    <p class="modal-text">Content</p>
                    </div>
                    </div>
                 </div>
                 <div class="modal fade" id="update">
                        <div class="modal-dialog">
                          <form action="ajax/content-save.php" method="post" id="form_submit" >
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Update Information</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="card card-primary">
                              <div class="card-body">
                                <div class="form-group">
                                  <label>Title:</label>
                                  <p class="content-title"></p>
                                  <input type="hidden" name="content_id" id="content_id" />
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputEmail1">Content:</label>
                                  <textarea type="text" class="form-control" rows="10" cols="4"  id="txt_content" required="required" name="txt_content" placeholder="Content"></textarea>
                                </div>
                              </div>
                          </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                            </div>
                          </div>
                          </form>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
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

<script type="text/javascript">
  $(document).ready(function(){
      $(".view").click(function(){
        $.ajax({
              type: 'POST',
              url: 'ajax/content.php',
              data: {id: $(this).data('id')},
              dataType: 'json',
              success: function(response){
                 
                  $(".modal-title").html(response.title);
                  $(".modal-text").html(nl2br(response.content));
                }
            });
      });
      $(".edit").click(function(){
        $.ajax({
              type: 'POST',
              url: 'ajax/content.php',
              data: {id: $(this).data('id')},
              dataType: 'json',
              success: function(response){
                  $("#content_id").val(response.content_id)
                  $(".content-title").html(response.title);
                  $("#txt_content").val(response.content);
                }
            });
      });
      $("#form_submit").submit(function(){
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
           // dataType: 'json',
            success: function(response){
                window.location.href = 'settings-contents.php';
              }
          });
        return false;
      })
  });

</script>


</body>
</html>
