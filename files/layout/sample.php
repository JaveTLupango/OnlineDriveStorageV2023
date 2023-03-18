<?php

//echo "ok";
$sadasd = "image / png";
$dd = "image";
// 
$max_upload = (int)(ini_get('upload_max_filesize'));
$max_post = (int)(ini_get('post_max_size'));
$memory_limit = (int)(ini_get('memory_limit'));
$upload_mb = min($max_upload, $max_post, $memory_limit);

echo "max_upload ". $max_upload ."<br>";
echo "max_post ". $max_post ."<br>";
echo "memory_limit ". $memory_limit ."<br>";
echo "upload_mb ". $upload_mb ."<br>";

if(strpos($sadasd, "image")!== false) 
{
    echo 't';
}
else{
    echo 'f';}