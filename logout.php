<?php
session_start();
session_unset();
session_destroy();
include_once 'https/config/config.php';

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST']."/".$folderId;

header("Location: $url");
