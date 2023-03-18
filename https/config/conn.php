<?php
class ClassConnection
{
	public function f_connection()
	{		
		include 'config.php';
		try {
		    $conn = new PDO("mysql:host=$con_host;dbname=$con_dbname", $con_username, $con_password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    //echo "Connected successfully"; 
		    return $conn;
		    }
		catch(PDOException $e)
		    {
		    //echo "Connection failed: " . $e->getMessage();
		     return "fail";
			}			
	}

	public function folder_id()
	{
		include 'config.php';
		return $folderId;
	}

	public function FuncSystemName()
	{
		include 'config.php';
		return $system_Name;
	}
	public function FuncbaseURLLink()
	{
		include 'config.php';
		return $baseURLLink;
	}
}

class ClassConnectionV2
{
	public function f_connection()
	{		
		include 'config.php';
		try {
		    $conn = new PDO("mysql:host=$con_host;dbname=$con_dbname", $con_username, $con_password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    //echo "Connected successfully"; 
		    return $conn;
		    }
		catch(PDOException $e)
		    {
		    //echo "Connection failed: " . $e->getMessage();
		     return "fail";
			}			
	}
	public function FuncBaseURLLink()
	{
		include 'config.php';
		return $baseURLLink;
	}
}

