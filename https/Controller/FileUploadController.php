<?php
class FileUploadController
{
    function func_Uploadfile($conn,$fileName, $fileTmpLoc, $fileType, $fileSize, $fileLoc, $userid, $ext, $_id)
    {
        try
		{       
			$now = new DateTime();
			$dttime = $now->format('Y-m-d H:i:s');
            //include '../../https/Classes/getID.php';
            //$getID = new get_uniqueID();            
            $sql = "INSERT INTO file_server(fileid, filename, tdt, duration,status, userid, filesize, locked, fileLoc, fileType, fileTmpLoc, file_ext)
						VALUES ('$_id', '$fileName', '$dttime', '1000','1', '$userid', '$fileSize', 0, '$fileLoc', '$fileType', '$fileTmpLoc', ' $ext')";
								$conn->exec($sql);
			return "success-".$_id;
		}
		catch (Exception $e)
		{			
			return "Failed to login " .$e->getMessage();
		}
    }

	function func_updateInfoDes($conn, $id, $desc)
	{
		try
		{       
			$sql = "UPDATE file_server SET filedescription = '$desc' WHERE fileid = '$id'";
			$conn->exec($sql);
			return "success";
		}
		catch(exception $ex)
		{
			return "Failed to login " .$ex->getMessage();
		}
	}

	function func_getLink($conn, $id, $base)
	{
		$sql = "Select * From file_server Where id='$id'";
		$stmt = $conn->prepare($sql);
		$stmt->execute(["fileid"]); 
		$user = $stmt->fetch();
		$data = array();
		array_push($data,$user);	
		$retId = $data[0]["fileid"];  
		$link = $base."file_downloads/link/".strtolower($retId).".html";
		return $link;
	}

	function func_DeleteFile($conn, $id)
	{
		try
		{    $now = new DateTime();
			$dttime = $now->format('Y-m-d H:i:s');
			$sql = "UPDATE file_server SET status = 0, statusDate = '$dttime' WHERE id = '$id'";
			$conn->exec($sql);
			return "success";
		}
		catch(exception $ex)
		{
			return "Failed to login " .$ex->getMessage();
		}
	}

	function func_UpdateDownloadCountFile($conn, $id)
	{
		try
		{   
			$sql = "UPDATE file_server SET downloads = downloads + 1 WHERE id = '$id'";
			$conn->exec($sql);
			return "success";
		}
		catch(exception $ex)
		{
			return "Failed to login " .$ex->getMessage();
		}
	}

	function func_getFilePathName($conn, $id)
	{
		try
		{   
			$sql = "Select * From file_server Where id='$id'";
			$stmt = $conn->prepare($sql);
			$stmt->execute(["fileLoc"]); 
			$user = $stmt->fetch();
			$data = array();
			array_push($data,$user);	
			$retId = $data[0]["fileLoc"];  			
			return $retId;
		}
		catch(exception $ex)
		{
			return "Failed to login " .$ex->getMessage();
		}
	}
	function func_getFilePathNameData($conn, $id)
	{
		try
		{   
			$sql = "DELETE From file_server Where id='$id'";
			$conn->exec($sql);
			return "success";	
		}
		catch(exception $ex)
		{
			return "Failed to login " .$ex->getMessage();
		}
	}
}