<?php
session_start();
if(isset($_SESSION['userid']))
{
    $userid = $_SESSION['userid'];
}
else
{
    $userid = null;
}


include '../../https/Controller/FileUploadController.php';
include '../../https/config/conn.php';
include '../../https/Classes/getID.php';
$UF_Con = new FileUploadController();
$conn_C = new ClassConnection();
$conn_CL = new get_uniqueID();
$fileName = $_FILES["inputGroupFile01"]["name"];
$fileTmpLoc = $_FILES["inputGroupFile01"]["tmp_name"];
$fileType = $_FILES["inputGroupFile01"]["type"];
$fileSize = $_FILES["inputGroupFile01"]["size"];
$fileErrorMsg = $_FILES["inputGroupFile01"]["error"];
if(!$fileTmpLoc)
{	
	echo "Error: Please browse for a file before clicking the upload button";
	exit();
}
$path = "";
$ext_ = explode(".", $fileName);
$ext = $ext_[count($ext_) - 1];
$newFN = ($conn_CL->ID_generator("FN")).".".$ext;
$trr = strpos("$fileType", "image");
if(strpos($fileType, "image") !== false)
{
    $path = "file_server/img/$newFN";
}
elseif(strpos($fileType, "video") !== false)
{
    $path = "file_server/video/$newFN";
}
elseif(strpos($fileType, "audio") !== false)
{
    $path = "file_server/music/$newFN";
}
elseif(strpos($fileType, "application") !== false && strpos($fileName, ".exe") !== false)
{
    $path = "file_server/others/$newFN";
}
elseif(strpos($fileType, "application")!== false && (!strpos($fileName, ".exe")!== false))
{
    $path = "file_server/docs/$newFN";
}
else
{
    $path = "file_server/others/$newFN";    
}
if(move_uploaded_file($fileTmpLoc,  "../../$path"))
{  
    $_id = $conn_CL->ID_generator('FL');
    $conn = $conn_C->f_connection();
    $ret_UPF = $UF_Con->func_Uploadfile($conn, $fileName, $fileTmpLoc, $fileType, $fileSize, $path, $userid, $ext, $_id);
    if (explode("-", $ret_UPF)[0] === 'success')
    {
        echo '<button type="button" class="btn btn-primary">'.$fileName.' upload is complete.</button>'.$ret_UPF;
    }
    else
    {
        echo '<button type="button" class="btn btn-danger">'.$ret_UPF.'</button>'.$ret_UPF;
    }
}
else
{
        echo '<button type="button" class="btn btn-danger">move_uploaded_file function failed</button>';
}
