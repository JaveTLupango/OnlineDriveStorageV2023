<?php
if(strtoupper($data) === "DOWNLOAD" && strtoupper($data) === "LINK")
{
  $FI_C = new FileInfoController();
  $ret = $FI_C->getFileInfo($conn, strtoupper($linkID));
  //echo $ret;
  //$d_json = json_decode($ret);
  foreach($ret as $row)
      $id = $row['id'];
      $base64Stringph = $url.''.$row['fileLoc'];
      $fileName = $row['filename'];
      $filesize= $row['filesize'];
      $tdt= $row['tdt'];
      $downloadNo = $row['downloads'];
      $ext = $row['file_ext'];
      $fileType = $row['filetype'];
      $status = $row['status'];
      $filedescription = $row['filedescription'];
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo strtoupper($data) . " | " . $system_name ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $url; ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $url; ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo $url; ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $url; ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php
        include 'layout/nav.view.php';
        include 'layout/sidebar.view.php';
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo strtoupper($data)?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo strtoupper($data)?></a></li>
              <li class="breadcrumb-item active">List of Files</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <?php 
      if( strtoupper($data) === "UPLOADFILES")
      {
        include 'layout/uploadfile.php';
      }
      elseif(strtoupper($data) === "DOWNLOAD")
      {
        include 'layout/download.view.php';
      }
      elseif(strtoupper($data) === "LINK")
      {
        include 'layout/download.view.php';
      }
      elseif(strtoupper($data) === "TRASH")
      {
        include 'layout/trash_file.view.php';
      }
      elseif(strtoupper($data) === "PAGENOTFOUND")
      {
        include 'layout/pagenotfound.view.php';
      }
      elseif(strtoupper($data) === "PROFILE")
      {
        include 'layout/profile.view.php';
      }
      elseif(strtoupper($data) === "FILE")
      {
        include 'layout/data_file.view.php';
      }
      elseif(strtoupper($data) === "LOCKEDFILES")
      {        
        if($varUserType == 1)
        {
          include 'layout/locked_All_file.view.php';
        }
        else
        {
          include 'layout/pagenotfound.view.php';
        }
      }
      elseif(strtoupper($data) === "LISTOFFILES")
      {        
        if($varUserType == 1)
        {
          include 'layout/data_file_non_user.view.php';
        }
        else
        {
          include 'layout/pagenotfound.view.php';
        }
      }
      elseif(strtoupper($data) === "LISTOFDELETEDFILES")
      {
        if($varUserType == 1)
        {
          include 'layout/trash_All_file.view.php';
        }
        else
        {
          include 'layout/pagenotfound.view.php';
        }       
      }
      elseif(strtoupper($data) === "ADS")
      {
        if($varUserType == 1)
        {
          include 'layout/ads.view.php';
        }
        else
        {
          include 'layout/pagenotfound.view.php';
        }
        
      }else
      {
        include 'layout/pagenotfound.view.php';
      }
    ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.5
    </div>
    <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="https://codelife.javelupango.com/">CodeLife</a> | Develop By: <a href="https://javelupango.com/">Jave</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo $url; ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $url; ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo $url; ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $url; ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo $url; ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo $url; ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $url; ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $url; ?>assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
