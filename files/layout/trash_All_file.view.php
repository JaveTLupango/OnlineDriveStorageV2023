

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
                    <th>File Name</th>
                    <th>File Type</th>
                    <th>Size</th>
                    <th>Deleted Date</th>
                    <th>Option</th>
                  </tr>
                  </thead>
                  <tbody>
                        <?php 
                        try{
                          $listOfData =  $C_FIC->getListofTrashFile($conn);
                          $count = 0;
                          foreach($listOfData as $row)
                          {
                            $count++;

                            ?>
                                 <tr>
                                      <td><?php  if(strlen($row["filename"]) > 25)
                                       {
                                        echo substr($row["filename"],0,25). "...";
                                       }
                                       else
                                       {
                                        echo $row["filename"];
                                       }
                                        ?></td>
                                      <td><?php echo $row["filetype"] ?></td>
                                      <td> <?php echo $C_FIC->FileSizeValidator( $row["filesize"])?></td>
                                      <td><?php echo $row["statusDate"] ?></td>
                                      <td>
                                        <button class="btn btn-success" onclick="file_Restore(<?php echo $row['id'] ?>)" title="Restore File."><i class="fa fa-recycle" aria-hidden="true"></i></button>
                                        <button class="btn btn-danger" onclick="file_trashPermanent(<?php echo $row['id'] ?>)" title="Delete Permanently."><i class="fa fa-trash" aria-hidden="true"></i></button>
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
                                   include("../ads/horizontal.txt");
                              ?>
                    </div>
                    <div class=" col-6">
                            <?php
                                 include("../ads/horizontal.txt");
                              ?>
                    </div>
                </div> 
              </div>
            </div>
          </div>
        </div>
      </div>
</section> 

    <script>
      
      var base_url = window.location.origin+'/onlinedrive/';
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

      function file_Restore(id)
      {debugger;
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to restore this file?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Restore it!'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                      type: "POST",
                      url: "../files/layout/api/RestoreFileApi.php",
                      data: {
                          id:id,
                          urlbase : base_url
                      },
                      success:function(a)
                      {   
                        if(a == "success")
                        {
                          Swal.fire({
                                      title: 'File is Already Restored',
                                      text: "File Successfully Restored",
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

      function file_trashPermanent(id)
      {
        debugger;
        Swal.fire({
            title: 'Are you sure You want to Delete this file?',
            text: "Deleted permanently, no option to Retored?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                      type: "POST",
                      url: "../files/layout/api/DeletePermanentAPI.php",
                      data: {
                          id:id
                      },
                      success:function(a)
                      {   
                        if(a == "success")
                        {
                          Swal.fire({
                                      title: 'File is Deleted',
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