<?php   

class FileInfoController
{
    function getFileInfo($conn,$fid)
    { 
        
        try {
            $sql = "SELECT * FROM `file_server` WHERE fileid ='$fid'";
            $stmt = $conn->query($sql)->fetchAll();
		    return  $stmt;
        }
		catch (Exception $e)
		{			
			return "Failed to login " .$e->getMessage();
		}
    }

    function FileSizeValidator($size)
    {
        $ret = null;
        $idS = null;
        if (intval($size) < 1025000)
        {
            $ret = (intval($size) / 1025); //kb
            $idS ="KB";
        }
        else if(intval($size) < 1050625000)
        {
            $ret = (intval($size) / 1025000); // mb
            $idS ="MB";
        }
        else{
            $ret = (intval($size) / 1050625000); //gb
            $idS ="GB";
        }
        return round(floatval($ret), 2)." ". $idS;
    }

    function getListofFileByUserID($conn,$uid)
    {
        try {
            $sql = "SELECT * FROM `file_server` WHERE userid ='$uid' and status = 1 and locked = 0 Order by id desc";
            $stmt = $conn->query($sql)->fetchAll();
		    return  $stmt;
        }
		catch (Exception $e)
		{			
			return "Failed " .$e->getMessage();
		}
    }

    function getListofAllFiles($conn,$uid)
    {
        try {
            $sql = "SELECT A.id, B.userFullName, B.email, A.filename, A.filetype, A.filesize, A.downloads, A.tdt, A.status, A.locked FROM file_server A LEFT JOIN file_users B on A.userid = B.userid
            WHERE A.status = 1 and A.locked = 0  Order by A.id desc";
            $stmt = $conn->query($sql)->fetchAll();
		    return  $stmt;
        }
		catch (Exception $e)
		{			
			return "Failed " .$e->getMessage();
		}
    }

    function getListofTrashFileByUserID($conn,$uid)
    {
        try {
            $sql = "SELECT * FROM `file_server` WHERE userid ='$uid' and status = 0 Order by id desc";
            $stmt = $conn->query($sql)->fetchAll();
		    return  $stmt;
        }
		catch (Exception $e)
		{			
			return "Failed " .$e->getMessage();
		}
    }

    function getListofLockedFilesByUserID($conn,$uid)
    {
        try {
            $sql = "SELECT * FROM `file_server` WHERE userid ='$uid' and locked = 1 Order by id desc";
            $stmt = $conn->query($sql)->fetchAll();
		    return  $stmt;
        }
		catch (Exception $e)
		{			
			return "Failed " .$e->getMessage();
		}
    }

    function getListofLockedFiles($conn)
    {
        try {
            $sql = "SELECT * FROM `file_server` WHERE locked = 1 Order by id desc";
            $stmt = $conn->query($sql)->fetchAll();
		    return  $stmt;
        }
		catch (Exception $e)
		{			
			return "Failed " .$e->getMessage();
		}
    }

    function getListofTrashFile($conn)
    {
        try {
            $sql = "SELECT * FROM `file_server` WHERE status = 0 Order by id desc";
            $stmt = $conn->query($sql)->fetchAll();
		    return  $stmt;
        }
		catch (Exception $e)
		{			
			return "Failed " .$e->getMessage();
		}
    }

    function getUserTotalFileUpdateSize($conn, $sql, $val1)
    {
        //$sql = "SELECT sum(filesize) as filesize FROM `file_server` WHERE userid = 'FU2021941630764928'";
        $stmt = $conn->prepare($sql);
		$stmt->execute([$val1]); 
		$user = $stmt->fetch();
		$data = array();
		array_push($data,$user);	
		return $data[0]["".$val1.""];  
    }
    
    function getUserTotalFileUpdateSizeV2($conn, $sql, $val1)
    {
        //$sql = "SELECT sum(filesize) as filesize FROM `file_server` WHERE userid = '".$param."'";
        // $stmt = $conn->prepare($sql);
        // $stmt->bindParam('userid', $param, PDO::PARAM_STR);
		// $stmt->execute([$val1]); 
		// $user = $stmt->fetch();
		// $data = array();
		// array_push($data,$user);	
		// return $data[0]["".$val1.""] ??= 'Error';  
        try {
            $stmt = $conn->query($sql)->fetchAll();
		    return  $stmt[0]["".$val1.""];
        }
		catch (Exception $e)
		{			
			return "Failed " .$e->getMessage();
		}
    }

    function getUserTotalFileUpdateSizeV3($conn, $param)
    {
        $sql = "SELECT sum(filesize) as filesize FROM `file_server` WHERE userid = 'FU2021941630764928'";
        // $stmt = $conn->prepare($sql);
        // $stmt->bindParam('userid', $param, PDO::PARAM_STR);
		// $stmt->execute(["filesize"]);         
        // $count = $stmt->rowCount();
		// $row    = $stmt->fetch(PDO::FETCH_ASSOC);
		// $data = array();
		// array_push($data,$row );	
		// return $data[0]["filesize"];  
        try {
            $stmt = $conn->query($sql)->fetchAll();
		    return  $stmt[0]["filesize"];
        }
		catch (Exception $e)
		{			
			return "Failed " .$e->getMessage();
		}

    }
    

    function getUserRole($conn, $sql, $val1)
    {
        //$sql = "SELECT sum(filesize) as filesize FROM `file_server` WHERE userid = 'FU2021941630764928'";
        $stmt = $conn->prepare($sql);
		$stmt->execute([$val1]); 
		$user = $stmt->fetch();
		$data = array();
		array_push($data,$user);	
		return $data[0]["".$val1.""];  
    }
}