<?php 
	ob_start(); //Turn ON Output Buffering
	// session_start(); //Start of Session
    $con = mysqli_connect("localhost","root","","billingsystem");
    if(mysqli_connect_errno())
    {
        echo "Failed to Connect ".mysqli_connect_errno();
    }
?>