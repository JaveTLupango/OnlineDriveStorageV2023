<?php 
include '../../../https/Controller/FileUploadController.php';
include '../../../https/config/conn.php';
$UF_Con = new FileUploadController();
$conn_C = new ClassConnection();
if (isset($_POST['id']))
{    
    $id = $_POST['id'];
    $urlbase = $_POST['urlbase'];    
    $conn = $conn_C->f_connection();
    $ret_UPF = $UF_Con->func_RestoreFile($conn,$id);
    echo  $ret_UPF ;
}
else
{
    echo "API return 400";
}

