

<style>
    .btn {
        margin-right: 1px;
        margin-top: 2px;
    }
</style>
<?php 
  if(isset($_SESSION['userid']))
  {
?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Uploaded File</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>File Name</th>
                    <th>File Type</th>
                    <th>Size</th>
                    <th>Date Upload</th>
                    <th>NoOfDownload</th>
                    <th>Option</th>
                  </tr>
                  </thead>
                  <tbody>
                        <?php 
                        try{
                          
                          //include '../https/config/conn.php';
                          //$C_Con = new ClassConnection();
                          
                          //$conn = $C_Con->f_connection();

                          $listOfData =  $C_FIC->getListofFileByUserID($conn, $_SESSION["userid"]);
                          $count = 0;
                          foreach($listOfData as $row)
                          {
                            $count++;
                            ?>
                                 <tr>
                                      <td><?php echo $count ?></td>
                                      <td><?php echo $row["filename"] ?></td>
                                      <td><?php echo $row["filetype"] ?></td>
                                      <td> <?php echo $C_FIC->FileSizeValidator( $row["filesize"])?></td>
                                      <td><?php echo $row["tdt"] ?></td>
                                      <td> <?php echo $row["downloads"] ?></td>
                                      <td>
                                          <!-- <button class="btn btn-warning" onclick="file_edit(<?php echo $row['id'] ?>)" title="Get Link Here."><i class="fa fa-edit" aria-hidden="true"></i></button> -->
                                          <button class="btn btn-primary" onclick="file_download(<?php echo $row['id'] ?>)" title="Download here."><i class="fa fa-download" aria-hidden="true"></i></button>
                                          <button class="btn btn-danger" onclick="file_Delete(<?php echo $row['id'] ?>)" title="Delete here"><i class="fa fa-trash" aria-hidden="true"></i> </button>
                                          <button class="btn btn-info" onclick="file_sharedLink(<?php echo $row['id'] ?>)" title="Get Shared Link Here."><i class="fa fa-link" aria-hidden="true"></i> </button>                    
                                      </td>
                                    </tr>
                            <?php
                          }
                        }
                        catch (Exception $e)
                        {			
                          echo "Failed " .$e->getMessage();
                        }

                        ?>
                 </tbody>
                </table>
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
<?php } ?>
    <div class="modal fade" id="file_sharedLink" role="dialog">
    <div class="modal-dialog">    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
        <h4 class="modal-title">Share Link</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <input type="text" id="LinkText" class="form-control" > 
              <button type="button" onclick="CopyLink()" class="btn btn-success">Copy</button>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>          
        </div>
      </div>

      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Advertisement</h3>
              </div>
              <div class="card-body">
                  <div class="row">
                        <div class=" col-6">
                        <?php
                               include("../ads/horizontal.php");
                           ?>
                        </div>
                        <div class=" col-6">
                        <?php
                              include("../ads/horizontal.php");
                           ?>
                        </div>
                            
                  </div>
                  
              </div>
            </div>
          </div>
        </div>
      </div>
</section> 


<script src="<?php echo $url ?>config.js"></script>
    <script>
      
      var base_url = window.location.origin+'/'+folder_id;
      function _(el)
      {
          return document.getElementById(el);
      }

      function file_edit(id)
      {        
        //_("myModal").modal("show");
        $("#myModal").modal();
      }
      
      function CopyLink()
      {        
       var copyText = document.getElementById("LinkText");
        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */
        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText.value);
      }

      function file_sharedLink(id)
      {        
        debugger;
        //_("myModal").modal("show");
        $.ajax({
          type: "POST",
          url: "../files/layout/api/linkApi.php",
          data: {
              id:id,
              urlbase : base_url
          },
          success:function(a)
          {
            document.getElementById("LinkText").value = a;
          },
          error:function(b)
          {

          }
          });
        $("#file_sharedLink").modal();
      }

      function file_download(id)
      {
        $.ajax({
          type: "POST",
          url: "../files/layout/api/linkApi.php",
          data: {
              id:id,
              urlbase : base_url
          },
          success:function(a)
          {
            debugger;
            window.open(a, '_blank');
          },
          error:function(b)
          {

          }
          });
      }
      
      function file_Delete(id)
      {
        debugger;
        Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.isConfirmed) {
               
                $.ajax({
                      type: "POST",
                      url: "../files/layout/api/DeleteFileApi.php",
                      data: {
                          id:id,
                          urlbase : base_url
                      },
                      success:function(a)
                      {   
                        if(a == "success")
                        {
                          Swal.fire({
                                      title: 'File is in Bin',
                                      text: "File Successfully Deleted",
                                      icon: 'success',
                                      confirmButtonColor: '#3085d6',
                                      cancelButtonColor: '#d33',
                                      confirmButtonText: 'Okay!'
                                    }).then((result) => {
                                      if (result.isConfirmed) {
                                        location.reload();
                                      }
                                    })
                        }
                      },
                      error:function(b)
                      {

                      }
                      });

              }
            })

       
      }

    </script>
    
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>