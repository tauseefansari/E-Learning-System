<?php 

	session_start();

 //  	use PHPMailer\PHPMailer\PHPMailer;
 //  	use PHPMailer\PHPMailer\SMTP;
 //  	use PHPMailer\PHPMailer\Exception;
 //  	require 'vendor/autoload.php';
   	  require '../database.php';

 //  	//User Query form functionality
	// if(isset($_POST["sendmail"]))
 //  	{
 //    	$mail = new PHPMailer;
 //    	$mail->IsSMTP();        //Sets Mailer to send message using SMTP
 //    	$mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
 //    	$mail->Port = '587';        //Sets the default SMTP server port
 //    	$mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
 //    	$mail->Username = 'learnerexpertise60@gmail.com';     //Sets SMTP username
 //    	$mail->Password = 'zakiyakhan123';     //Sets SMTP password
 //    	$mail->SMTPSecure = 'tls';       //Sets connection prefix. Options are "", "ssl" or "tls"
 //    	$mail->SetFrom("learnerexpertise60@gmail.com", "MindScript");   //Sets the From email address for the 
 //    	$mail->AddAddress("learnerexpertise60@gmail.com", 'Mindscript');  //Adds a "To" address       //Sets word wrapping on the body of the message to a given number of characters
 //    	$mail->IsHTML(true);       //Sets message type to HTML
 //    	$mail->Subject = $_POST['subject'];    //Sets the Subject of the message
 //    	$message = '<b> Name : '.$_POST['name'].'</b> <br><br> <b> E-Mail : </b>'.$_POST['email'].' <br><br> <b>Message : </b>'.$_POST['message'];
 //    	$mail->Body = $message;       //An HTML or plain text message body
 //    	if($mail->Send())        //Send an Email. Return true on success or false on error
 //    	{
 //    		$_SESSION["status"] = "success";
 //    		$_SESSION["message"] = "Email sent successfully";
 //     		header("Location: index.php#contact");
 //    	}
 //    	else
 //    	{
 //    		$_SESSION["status"] = "error";
 //    		$_SESSION["message"] = "Email sent failed";
 //     		header("Location: index.php#contact");
 //    	}
 //  	}


 //  	// Subscribe functionality
 //  	if(isset($_POST['subscribe']))
 //  	{
 //  		$mail = new PHPMailer;
 //    	$mail->IsSMTP();        //Sets Mailer to send message using SMTP
 //    	$mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
 //    	$mail->Port = '587';        //Sets the default SMTP server port
 //    	$mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
 //    	$mail->Username = 'learnerexpertise60@gmail.com';     //Sets SMTP username
 //    	$mail->Password = 'zakiyakhan123';     //Sets SMTP password
 //    	$mail->SMTPSecure = 'tls';       //Sets connection prefix. Options are "", "ssl" or "tls"
 //    	$mail->SetFrom("learnerexpertise60@gmail.com", "MindScript");   //Sets the From email address for the 
 //    	$mail->AddAddress($_POST['email'], 'Mindscript');  //Adds a "To" address       //Sets word wrapping on the body of the message to a given number of characters
 //    	$mail->IsHTML(true);       //Sets message type to HTML
 //    	$mail->Subject = "Subscribe Expertise Learning";    //Sets the Subject of the message
 //    	$message = '<b> Thanks for Subscribing <br><br> Your Email is '.$_POST['email'].' you will be notified for all latest updates and news <br><br> Thanks from Expertise Learning';
 //    	$mail->Body = $message;       //An HTML or plain text message body
 //    	if($mail->Send())        //Send an Email. Return true on success or false on error
 //    	{
 //    		$_SESSION["status_subscribe"] = "success";
 //    		$_SESSION["message_subscribe"] = "Thanks for Subscribing";
 //     		header("Location: index.php#footer");
 //    	}
 //    	else
 //    	{
 //    		$_SESSION["status_subscribe"] = "error";
 //    		$_SESSION["message_subscribe"] = "Failed to Subscribe";
 //     		header("Location: index.php#footer");
 //    	}
 //  	}

    //Delete Course
    if(isset($_POST['delete_btn_set']))
    {
        $key=$_POST['delete_id'];
        $query2=mysqli_query($con,"DELETE FROM courses WHERE id=$key");
    }

    //Delete Staff
    if(isset($_POST['delete_btn_staff_set']))
    {
        $key=$_POST['delete_id'];
        $query=mysqli_query($con,"UPDATE staff SET disable = 1 WHERE id=$key");
    }

    //Delete Student
    if(isset($_POST['delete_student_set']))
    {
        $key=$_POST['delete_id'];
        $query=mysqli_query($con,"UPDATE student SET disable = 1 WHERE id=$key");
    }
?>