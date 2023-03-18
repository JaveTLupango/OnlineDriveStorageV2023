<?php

class AuthController{

    function auth_register($conn, $id, $name, $email, $password)
    {
        try
        {
            $now = new DateTime();
			$dttime = $now->format('Y-m-d H:i:s');
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO file_users (userid, userFullName, username, password, passhash, email, status, tdt, verified, usertype)
                                    VALUES ('$id',  '$name'      ,'$email','$pass','$password','$email','active','$dttime ','0', '0')";
            $conn->exec($sql);
            
            return "success";
        }catch (exception $e)
        {
            return "Error-".$e;
        }
    }   

    function auth_emailValidation($conn, $email)
    {
        $sql = "Select * From file_users Where email = '$email'";
        $stmt = $conn->query($sql)->fetchAll();
        foreach($stmt as $row)
        {
            return false;
            break;
        }
        return true;
    }

    function auth_updateVerify($conn, $key, $hash)
    {
        try
        {
            $sql = "Select * From file_users Where userid = '$key' AND password = '$hash'";
            $stmt = $conn->query($sql)->fetchAll();
            foreach($stmt as $row)
            {
                return false;
                break;
            }
            return true;
        }catch(exception $e)
        {
            return false;
        }
    }   

    function auth_updateVerifiedUser($conn, $key)
    {
        try{

            $sql = "UPDATE file_users SET verified='1' WHERE userid = '$key'";
            $conn->exec($sql);
            return "success";
        }
        catch(exception $e)
        {            
            return "error".$e;
        }

    }

    function AuthLogin($conn, $email, $password)
    { 
        session_start();
        try
		{  
			$query = "SELECT * FROM file_users WHERE email = :email AND passhash = :passhash";  
		    $stmt = $conn->prepare($query);
		    $stmt->execute(
		    	array(  
                          'email'     =>    $email,  
                          'passhash'     =>    $password
                     ) );

		     $count = $stmt->rowCount();
             
		     if ($count == "1")
		     {
                foreach($stmt as $row)
                {
                    if($row["verified"] == 1)
                    {
                        $_SESSION['userid'] =  $row["userid"];
                    }else                    
                    {
                        return "Account not yet verified!";
                    }
                }               
                 
				return "success";
		     }	
		     else{
		     	return "Cridential Not Match!";
		     }  
		}
		catch (Exception $e)
		{			
			return "Failed to login " .$e->getMessage();
		}
    }
}