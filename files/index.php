<?php
session_start();
include '../https/config/conn.php';
include '../https/Controller/FileInfoController.php';
$C_FIC = new FileInfoController();
$conn_C = new ClassConnection();
$conn = $conn_C->f_connection();

$logsURL = null;
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST']."/".$conn_C->folder_id();
$logsURL = $url;

$system_name = $conn_C->FuncSystemName();

if(isset($_GET["reqUrl"]))
{    
  $data = $_GET["reqUrl"];
    // if(isset($_SESSION['identity']) == null)
    // {
        if(strtoupper($data) == "LOGIN" || strtoupper($data) == "REGISTER" 
        || strtoupper($data) == "FORGOTPASSWORD" || strtoupper($data) == "RESETPASSWORD"
        || strtoupper($data) == "SUCCESSREGISTER")
        {
          //echo 'LOGIN';
          include "auth.view.php";
        }
        elseif(strpos(strtoupper($data), "DOWNLOAD") !== false) //strpos($data)
        {          
          $linkID = $_GET["fid"];
         // echo 'gotit - '.$linkID;
          include "file_.view.php";
        }
        elseif(strpos(strtoupper($data), "LINK") !== false) //strpos($data)
        {          
          $linkID = $_GET["fid"];
         // echo 'gotit - '.$linkID;
          include "filedownload.view.php";
        }
        else
        {
          include "file_.view.php";
          //echo strtoupper($data);
        }      
    // }
    // else
    // {
    //   echo 'sdcfssdfsdfsdsd';
    // }
}
else{
    if(isset($_SESSION['identity']) == null)
    {
      $data = "Login";
      include "auth.view.php";
    }
    else
    {
      echo 'Home';
    }
}
