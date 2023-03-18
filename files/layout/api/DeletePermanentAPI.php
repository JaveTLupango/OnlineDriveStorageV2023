<?php 
include '../../../https/Controller/FileUploadController.php';
include '../../../https/config/conn.php';
$UF_Con = new FileUploadController();
$conn_C = new ClassConnection();
if (isset($_POST['id']))
{    
    $id = $_POST['id'];
    $conn = $conn_C->f_connection();
    $ret_UPF = $UF_Con->func_getFilePathName($conn,$id);    
    $filePath = "../../../".$ret_UPF;
    $ret_UPF21 = $UF_Con->func_getFilePathNameData($conn,$id);
    if (!unlink($filePath)) { 
        echo ("cannot be deleted due to an error"); 
    } 
    else { 
        echo "success";
    } 
}
else
{
    echo "API return 400";
}

