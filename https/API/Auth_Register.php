<?php

if ('POST' === $_SERVER['REQUEST_METHOD'])
 {
   $fullname = $_POST["fullname"];
   $email = $_POST["email"];
   $password = $_POST["password"];
   $password2 = $_POST["password2"];
   if($password === $password2)
   {
      try {
             include '../Controller/AuthController.php';
             include '../Controller/EmailController.php';  
             include '../config/conn.php';
             include '../Classes/getID.php';  
             
             $C_Con = new ClassConnectionV2();
             $conn = $C_Con->f_connection();
             
            $AC_Con = new AuthController();
            $conn_CL = new get_uniqueID();
            $conn_Email = new  Email_Controller();
            $g_id = $conn_CL->ID_generator("FU"); 
            $urlLink = $C_Con->FuncBaseURLLink();
            if($AC_Con->auth_emailValidation($conn, $email))
             {                  
                 $AC_ret = $AC_Con->auth_register($conn, $g_id, $fullname, $email, $password);
                 if($AC_ret == "success")
                 {
                   $content2 = "Do not share this email to others.";
                   $content3 = "Having trouble to log into your account? Just relay to your upline.";
                   $URL_g = $urlLink."emailverification.php?id=/".  password_hash($password, PASSWORD_DEFAULT)."%$2y$10$%". $g_id;
                   $EmailContent = $conn_Email->email_ContentVerify_Func("E.Drive", $fullname , $URL_g, $content2, $content3);
                   $resEmail = $conn_Email->sendEmailForgotPassword($email, $EmailContent, $fullname, "Email Verification");
                   echo 'success';
                 }
                 else
                 {
                   echo ''.$AC_ret.'';
                 } 
             }
             else
             {
               //This email is already being used
               echo 'This email is already being used!';
             }  
     
        } catch (Exception $e) {
            echo $e;
        }                            
   }
   else{
       echo 'Password Not Match!';
   }
 }
 else
 {
     echo 'Bad Request';
 }
?>