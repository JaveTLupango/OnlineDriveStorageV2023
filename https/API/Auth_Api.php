<?php 

if (isset($_POST['email']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    include '../Controller/AuthController.php';
    include '../config/conn.php';

    $C_Auth = new AuthController();
    $C_Con = new ClassConnection();

    $conn = $C_Con->f_connection();
    $apiAuth = $C_Auth->AuthLogin($conn, $email, $password);
    if($apiAuth == 'success')
    { 
        echo "success";
    }
    else
    {
        echo $apiAuth;
    }
}
else 
{
    echo "error";
}