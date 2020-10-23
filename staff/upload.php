<?php
	require '../database.php';

	session_start();

	function FileSizeConvert($bytes)
	{
	    $bytes = floatval($bytes);
	        $arBytes = array(
	            0 => array(
	                "UNIT" => "TB",
	                "VALUE" => pow(1024, 4)
	            ),
	            1 => array(
	                "UNIT" => "GB",
	                "VALUE" => pow(1024, 3)
	            ),
	            2 => array(
	                "UNIT" => "MB",
	                "VALUE" => pow(1024, 2)
	            ),
	            3 => array(
	                "UNIT" => "KB",
	                "VALUE" => 1024
	            ),
	            4 => array(
	                "UNIT" => "B",
	                "VALUE" => 1
	            ),
	        );

	    foreach($arBytes as $arItem)
	    {
	        if($bytes >= $arItem["VALUE"])
	        {
	            $result = $bytes / $arItem["VALUE"];
	            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
	            break;
	        }
	    }
	    return $result;
	}

	if(isset($_SESSION['courseid']))
	{
		$courseid = $_SESSION['courseid'];
		$query = mysqli_query($con, "SELECT * FROM courses WHERE id = '$courseid'");
  		$row = mysqli_fetch_array($query);
		$coursename = $row['name'];	
	}

	$target_dir = "../assets/img/coursefiles/".$coursename."/"; 

	if(!is_dir($target_dir)){
	    mkdir($target_dir, 0755, true);
	}

	if(isset($_SESSION['contentid']))
	{
		$contentid = $_SESSION['contentid'];
	}

	$request = 1;
	if(isset($_POST['request'])){
		$request = $_POST['request'];
	}

	// Upload file
	if($request == 1){
		$filename = basename($_FILES["file"]["name"]);
		$size = FileSizeConvert($_FILES["file"]["size"]);
		$target_file = $target_dir . basename($_FILES["file"]["name"]);
		$msg = "";
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
			$insert = mysqli_query($con, "INSERT INTO coursefiles (contentid, filename, size, uploaded_on) VALUES ('".$contentid."','".$filename."','$size', NOW())"); 
		    $msg = "Successfully uploaded";
		}else{
		    $msg = "Error while uploading";
		}
		echo $msg;
	}

	// Remove file
	if($request == 2)
	{
		$targetFile = $_POST['name'];
		$filename = $target_dir.$_POST['name'];
		$delete = mysqli_query($con, "DELETE FROM coursefiles WHERE filename = '$targetFile' AND contentid = '$contentid'"); 
		unlink($filename); exit;
	}

	if($_POST['add'] == 1)
	{
		$title = $_POST['title'];
		$desc = mysqli_real_escape_string($con,$_POST['desc']);
		//echo $title . ": " . $desc;
		$ins = mysqli_query($con, "INSERT INTO coursecontent (title, description, courseid) VALUES ('$title', '$desc', '$courseid')"); 
		if($ins)
		{
			$_SESSION['contentadded'] = "Course content added successfully!";
		}
		else
		{
			$_SESSION['contentadded'] = "Something went wrong! Please try again!";	
		}
	}

	if(isset($_POST['delete_btn_set']))
    {
        $key=$_POST['delete_id'];
        $filename = mysqli_real_escape_string($con, $_POST['delete_file']);
        $query=mysqli_query($con,"DELETE FROM coursefiles WHERE id = $key");
        unlink($filename); exit;
    }
?>