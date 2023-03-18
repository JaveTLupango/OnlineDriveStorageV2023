<?php

class ProfileController
{
    function getProfileDetails($conn, $id)
    {
       // session_start();
        try {
            $sql = "SELECT * FROM `file_users` WHERE userid = '$id' ";
            $stmt = $conn->query($sql)->fetchAll();
		    return  $stmt;
        }
		catch (Exception $e)
		{			
			return "Failed to login " .$e->getMessage();
		}
    }

}