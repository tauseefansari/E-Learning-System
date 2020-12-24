<?php 
    
    session_start();
  	use PHPMailer\PHPMailer\PHPMailer;
  	use PHPMailer\PHPMailer\SMTP;
  	use PHPMailer\PHPMailer\Exception;
  	require 'vendor/autoload.php';
  	require 'database.php';

    
  	//User Query form functionality
	if(isset($_POST["sendmail"]))
  	{
    	$mail = new PHPMailer;
    	$mail->IsSMTP();        //Sets Mailer to send message using SMTP
    	$mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
    	$mail->Port = '587';        //Sets the default SMTP server port
    	$mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
    	$mail->Username = 'learnerexpertise60@gmail.com';     //Sets SMTP username
    	$mail->Password = 'zakiyakhan123';     //Sets SMTP password
    	$mail->SMTPSecure = 'tls';       //Sets connection prefix. Options are "", "ssl" or "tls"
    	$mail->SetFrom("learnerexpertise60@gmail.com", "MindScript");   //Sets the From email address for the 
    	$mail->AddAddress("learnerexpertise60@gmail.com", 'Mindscript');  //Adds a "To" address       //Sets word wrapping on the body of the message to a given number of characters
    	$mail->IsHTML(true);       //Sets message type to HTML
    	$mail->Subject = $_POST['subject'];    //Sets the Subject of the message
    	$message = '<b> Name : '.$_POST['name'].'</b> <br><br> <b> E-Mail : </b>'.$_POST['email'].' <br><br> <b>Message : </b>'.$_POST['message'];
    	$mail->Body = $message;       //An HTML or plain text message body
    	if($mail->Send())        //Send an Email. Return true on success or false on error
    	{
    		$_SESSION["status"] = "success";
    		$_SESSION["message"] = "Email sent successfully";
     		header("Location: index.php#contact");
    	}
    	else
    	{
    		$_SESSION["status"] = "error";
    		$_SESSION["message"] = "Email sent failed";
     		header("Location: index.php#contact");
    	}
  	}


  	// Subscribe functionality
  	if(isset($_POST['subscribe']))
  	{
  		$mail = new PHPMailer;
    	$mail->IsSMTP();        //Sets Mailer to send message using SMTP
    	$mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
    	$mail->Port = '587';        //Sets the default SMTP server port
    	$mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
    	$mail->Username = 'learnerexpertise60@gmail.com';     //Sets SMTP username
    	$mail->Password = 'zakiyakhan123';     //Sets SMTP password
    	$mail->SMTPSecure = 'tls';       //Sets connection prefix. Options are "", "ssl" or "tls"
    	$mail->SetFrom("learnerexpertise60@gmail.com", "MindScript");   //Sets the From email address for the 
    	$mail->AddAddress($_POST['email'], 'Mindscript');  //Adds a "To" address       //Sets word wrapping on the body of the message to a given number of characters
    	$mail->IsHTML(true);       //Sets message type to HTML
    	$mail->Subject = "Subscribe Expertise Learning";    //Sets the Subject of the message
    	$message = '<b> Thanks for Subscribing <br><br> Your Email is '.$_POST['email'].' you will be notified for all latest updates and news <br><br> Thanks from Expertise Learning';
    	$mail->Body = $message;       //An HTML or plain text message body
    	if($mail->Send())        //Send an Email. Return true on success or false on error
    	{
    		$_SESSION["status_subscribe"] = "success";
    		$_SESSION["message_subscribe"] = "Thanks for Subscribing";
     		header("Location: index.php#footer");
    	}
    	else
    	{
    		$_SESSION["status_subscribe"] = "error";
    		$_SESSION["message_subscribe"] = "Failed to Subscribe";
     		header("Location: index.php#footer");
    	}
  	}


    function randomPassword() 
    {
        $pass="";
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789$@";
        for ($i = 0; $i < 8; $i++) 
        {
            $n = rand(0,strlen($alphabet)-1);
            $pass.= $alphabet[$n];
        }
        return $pass;
    }

    if(isset($_POST['addstudent']))
    {
      $name=$_POST['sname'];
      $email=$_POST['email'];
      $mobile=$_POST['mobile'];
      $quali=$_POST['qualification'];
      $address=mysqli_real_escape_string($con, trim($_POST['address']));
      $propic=$_FILES["propic"]["name"];
      $extension = substr($propic,strlen($propic)-4,strlen($propic));
      $allowed_extensions = array(".jpg","jpeg",".png",".gif");
      if(!in_array($extension,$allowed_extensions))
      {
        $_SESSION['addstudents'] = "Profile Picture is invalid Format";
        header("Location: staff/index.php"); 
      }
      else
      {
          $check = mysqli_query($con, "SELECT * FROM student WHERE email = '$email'");
          if(!mysqli_num_rows($check) > 0)
          {
            $propic=$propic.time().$extension;
            move_uploaded_file($_FILES["propic"]["tmp_name"],"assets/img/profile/".$propic);
            $password = randomPassword();
            $encPassword = md5($password);
            $query = mysqli_query($con, "INSERT INTO student (name,profilePic,email,mobile,qualification,address,password) VALUES ('$name','$propic','$email','$mobile','$quali','$address','$encPassword')");
            $id = mysqli_insert_id($con);
            $payment= mysqli_query($con, "INSERT INTO payment (`studentId`, `totalPayment`, `paidPayment`, `mode`, `history`) VALUES ('$id', '0', '0', 'NA', 'NA')");
            if($query)
            {
              $_SESSION['addstudents'] = "Password has been sent to your email!";
              $mail = new PHPMailer;
              $mail->IsSMTP();        //Sets Mailer to send message using SMTP
              $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
              $mail->Port = '587';        //Sets the default SMTP server port
              $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
              $mail->Username = 'learnerexpertise60@gmail.com';     //Sets SMTP username
              $mail->Password = 'zakiyakhan123';     //Sets SMTP password
              $mail->SMTPSecure = 'tls';       //Sets connection prefix. Options are "", "ssl" or "tls"
              $mail->SetFrom("learnerexpertise60@gmail.com", "MindScript");   //Sets the From email address for the 
              $mail->AddAddress($email, 'Mindscript');  //Adds a "To" address       //Sets word wrapping on the body of the message to a given number of characters
              $mail->IsHTML(true);       //Sets message type to HTML
              $mail->Subject = "Registration Successful";    //Sets the Subject of the message
              $message = '<b> Thanks for Registering Expertise Learning <br><br> Your Email is '.$email.'<br><br> <b> Your Password is : </b>'.$password.'<br><br><br> Never Share your email and password with any other person and change it for security purpose. <br><br> Thanks from Expertise Learning';
              $mail->Body = $message;       //An HTML or plain text message body
              if($mail->Send())        //Send an Email. Return true on success or false on error
              {
                header("Location: staff/index.php");
              }
            }
          }
          else
          {
            $_SESSION['addstudents'] = "Email already taken! Use Different Email";
            header("Location: staff/index.php");
          }
        }
      }

  if(isset($_POST['staff_login']))
  {
      $email=$_POST['staff_email'];
      $password=md5($_POST['staff_password']);
      $sql = "SELECT id,name FROM staff WHERE email='$email' and password='$password' AND disable=0";
      $query = mysqli_query($con, $sql);
      $results = mysqli_fetch_array($query);
      if(mysqli_num_rows($query) > 0)
      {
          $_SESSION['staff_id'] = $results['id'];
          $_SESSION['login_staff'] = $results['name'];
          header("Location: staff/index.php");
      }
      else
      {
          $_SESSION['invalid'] = "Invalid Email or Password!";
          header("Location: index.php");
      }
  }

  if(isset($_POST['student_login']))
  {
      $email=$_POST['student_email'];
      $password=md5($_POST['student_password']);
      $sql = "SELECT id,name FROM student WHERE email='$email' and password='$password' AND disable=0";
      $query = mysqli_query($con, $sql);
      $results = mysqli_fetch_array($query);
      if(mysqli_num_rows($query) > 0)
      {
          $_SESSION['student_id'] = $results['id'];
          $_SESSION['login_student'] = $results['name'];
          header("Location: student/index.php");
      }
      else
      {
          $_SESSION['invalid'] = "Invalid Email or Password!";
          header("Location: index.php");
      }
  }

  if(isset($_POST['delete_btn_set']))
  {
      $key=$_POST['delete_id'];
      $query2=mysqli_query($con,"UPDATE student SET disable=1 WHERE id=$key");
  }

  if(isset($_POST['change_password']))
  {
    $id=$_SESSION['student_id'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    if($password1 == $password2)
    {
      $password=md5($password1);
      $query = mysqli_query($con, "UPDATE student SET password='$password' WHERE id='$id'");
      if($query)
      {
        $_SESSION['password_changed'] = "Password changed successfully!";
        header("Location: student/index.php");
      }
    }
    else
    {
      $_SESSION['password_changed'] = "Both the password should be same!";
      header("Location: student/index.php");
    }
  }


  if(isset($_POST['change_password_staff']))
  {
    $id=$_SESSION['staff_id'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    if($password1 == $password2)
    {
      $password=md5($password1);
      $query = mysqli_query($con, "UPDATE staff SET password='$password' WHERE id='$id'");
      if($query)
      {
        $_SESSION['password_changed_staff'] = "Password changed successfully!";
        header("Location: staff/index.php");
      }
    }
    else
    {
      $_SESSION['password_changed_staff'] = "Both the password should be same!";
      header("Location: staff/index.php");
    }
  }

  if(isset($_POST['upload']))
  {
    $propic=$_FILES["propic"]["name"];
    $extension = substr($propic,strlen($propic)-4,strlen($propic));
    $allowed_extensions = array(".jpg","jpeg",".png",".gif");
    if(!in_array($extension,$allowed_extensions))
    {
      $_SESSION['uploaded'] = "Profile Picture is invalid Format";
      header("Location: student/myaccount.php"); 
    }
    else
    {
      $id=$_SESSION['student_id'];
      $propic=$propic.time().$extension;
      move_uploaded_file($_FILES["propic"]["tmp_name"],"assets/img/profile/".$propic);
      $query = mysqli_query($con, "UPDATE student set profilePic = '$propic' WHERE id='$id'");
      if($query)
      {
        $_SESSION['uploaded'] = "Profile Picture Updated Successfully";
        header("Location: student/myaccount.php"); 
      }
      else
      {
        $_SESSION['uploaded'] = "Profile Picture Updated Failed! Please retry!";
        header("Location: student/myaccount.php"); 
      }
    }
  }


  if(isset($_POST['upload_staff']))
  {
    $propic=$_FILES["propic"]["name"];
    $extension = substr($propic,strlen($propic)-4,strlen($propic));
    $allowed_extensions = array(".jpg","jpeg",".png",".gif");
    if(!in_array($extension,$allowed_extensions))
    {
      $_SESSION['uploaded_staff'] = "Profile Picture is invalid Format";
      header("Location: staff/myaccount.php"); 
    }
    else
    {
      $id=$_SESSION['staff_id'];
      $propic=$propic.time().$extension;
      move_uploaded_file($_FILES["propic"]["tmp_name"],"assets/img/profile/".$propic);
      $query = mysqli_query($con, "UPDATE staff set profilePic = '$propic' WHERE id='$id'");
      if($query)
      {
        $_SESSION['uploaded_staff'] = "Profile Picture Updated Successfully";
        header("Location: staff/myaccount.php"); 
      }
      else
      {
        $_SESSION['uploaded_staff'] = "Profile Picture Updated Failed! Please retry!";
        header("Location: staff/myaccount.php"); 
      }
    }
  }


  if(isset($_POST['update_student']))
  {
    $id=$_SESSION['student_id'];
    $name=ucfirst($_POST['name']);
    $email=$_POST['email'];
    $quali=$_POST['qualification'];
    $mobile=$_POST['mobile'];
    $address=mysqli_real_escape_string($con, trim($_POST['address']));
    $query = mysqli_query($con, "UPDATE student set name='$name',email='$email',mobile='$mobile',address='$address',qualification='$quali' WHERE id='$id'");
    if($query)
    {
      $_SESSION['updated'] = "Student Details Updated Successfully";
      header("Location: student/myaccount.php"); 
    }
    else
    {
      $_SESSION['updated'] = "Student Details Update Failed! Please retry!";
      header("Location: student/myaccount.php"); 
    }
  }


  if(isset($_POST['update_staff']))
  {
    $id=$_SESSION['staff_id'];
    $name=ucfirst($_POST['name']);
    $email=$_POST['email'];
    $quali=$_POST['qualification'];
    $mobile=$_POST['mobile'];
    $subject=$_POST['subject'];
    $address=mysqli_real_escape_string($con, trim($_POST['address']));
    $query = mysqli_query($con, "UPDATE staff set name='$name',email='$email',mobile='$mobile',address='$address',qualification='$quali',subjectTaken='$subject' WHERE id='$id'");
    if($query)
    {
      $_SESSION['updated_staff'] = "Staff Details Updated Successfully";
      header("Location: staff/myaccount.php"); 
    }
    else
    {
      $_SESSION['updated_staff'] = "Staff Details Update Failed! Please retry!";
      header("Location: staff/myaccount.php"); 
    }
  }

  if(isset($_POST['staff_set']))
  {
      $email = $_POST['email'];
      $query = mysqli_query($con,"SELECT * FROM staff WHERE email = '$email'");      
      if(mysqli_num_rows($query) == 1)
      {
        $res = mysqli_fetch_array($query);
        $userid = $res['id'];
        $link='http://localhost/elearning/resetpassword.php?user='.$userid.'&type=staff';

        $mail = new PHPMailer;
        $mail->IsSMTP();        //Sets Mailer to send message using SMTP
        $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = '587';        //Sets the default SMTP server port
        $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = 'learnerexpertise60@gmail.com';     //Sets SMTP username
        $mail->Password = 'zakiyakhan123';     //Sets SMTP password
        $mail->SMTPSecure = 'tls';       //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->SetFrom("learnerexpertise60@gmail.com", "MindScript");   //Sets the From email address for the 
        $mail->AddAddress($email, 'Mindscript');  //Adds a "To" address       //Sets word wrapping on the body of the message to a given 
        $mail->IsHTML(true);       //Sets message type to HTML
        $mail->Subject = "Forgot Password Expertise Learning";    //Sets the Subject of the message
        $message = '<b> Your password forgot request is receiver <br><br> Your Email is '.$email.' Click on the below link to forget/reset your password <br><br> <a href="'.$link.'">www.expertiselearning.com/staff/password/forgot/userid/'.md5($email).'</a>  <br><br> Thanks from Expertise Learning';
        $mail->Body = $message;       //An HTML or plain text message body
        $mail->Send();
        echo json_encode(array("status"=>1));
      }
      else
      {
        echo json_encode(array("status"=>0));     
      }
  }

  if(isset($_POST['student_set']))
  {
      $email = $_POST['email'];
      $query = mysqli_query($con,"SELECT * FROM student WHERE email = '$email'");
      if(mysqli_num_rows($query) == 1)
      {
        $res = mysqli_fetch_array($query);
        $userid = $res['id'];
        $link='http://localhost/elearning/resetpassword.php?user='.$userid.'&type=student';      

        $mail = new PHPMailer;
        $mail->IsSMTP();        //Sets Mailer to send message using SMTP
        $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts of your Email hosting, this for Godaddy
        $mail->Port = '587';        //Sets the default SMTP server port
        $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
        $mail->Username = 'learnerexpertise60@gmail.com';     //Sets SMTP username
        $mail->Password = 'zakiyakhan123';     //Sets SMTP password
        $mail->SMTPSecure = 'tls';       //Sets connection prefix. Options are "", "ssl" or "tls"
        $mail->SetFrom("learnerexpertise60@gmail.com", "MindScript");   //Sets the From email address for the 
        $mail->AddAddress($email, 'Mindscript');  //Adds a "To" address       //Sets word wrapping on the body of the message to a given 
        $mail->IsHTML(true);       //Sets message type to HTML
        $mail->Subject = "Forgot Password Expertise Learning";    //Sets the Subject of the message
        $message = '<b> Your password forgot request is receiver <br><br> Your Email is '.$email.' Click on the below link to forget/reset your password <br><br> <a href="'.$link.'">www.expertiselearning.com/student/password/forgot/userid/'.md5($email).'</a>  <br><br> Thanks from Expertise Learning';
        $mail->Body = $message;       //An HTML or plain text message body
        $mail->Send();
        echo json_encode(array("status"=>1));
      }
      else
      {
        echo json_encode(array("status"=>0));
      }
  }

  if(isset($_POST['pass']))
  {
    $id = $_GET['id'];
    $type = $_GET['type'];
    $password = md5($_POST['password']);
    if($type == "student")
    {
      $query = mysqli_query($con, "UPDATE student SET password = '$password' WHERE id = '$id'");
      $_SESSION['password_change'] = "Password Changed Successfully!";
    }
    else if($type == "staff")
    {
      $query = mysqli_query($con, "UPDATE staff SET password = '$password' WHERE id = '$id'");
      $_SESSION['password_change'] = "Password Changed Successfully!";
    }
  }


  //Student Enroll to course
  if(isset($_POST['enroll_set']))
  {

    $amount = 0;
    $student = explode(',', $_POST['students']);
    $course = explode(',', $_POST['courses']);
    for($i=0; $i<count($student); $i++)
    {
      for($j=0; $j<count($course); $j++)
      {
        $check = mysqli_query($con, "SELECT * FROM appliedcourses WHERE studentId= '$student[$i]' AND courseId= '$course[$j]'");
        if(mysqli_num_rows($check)==0)
        {
          $price = mysqli_query($con, "SELECT price FROM courses WHERE id='$course[$j]'");
          $amount += mysqli_fetch_array($price)['price'];
          $query = mysqli_query($con, "INSERT INTO appliedcourses (`studentId`, `courseId`) VALUES ('$student[$i]', '$course[$j]')");
        }
        else
        {
          $_SESSION['already_present'] = "Some Course(s) already present";
        }
      }
      $query_price = mysqli_query($con, "UPDATE payment SET totalPayment = totalPayment+'$amount' WHERE studentId = '$student[$i]'");
    }
  }

  if(isset($_POST['course_delete_btn_set']))
  {
    $id = $_POST['delete_id'];
    $studentId = $_POST['studentid'];
    $price = $_POST['price'];
    $payment = mysqli_query($con, "UPDATE payment SET totalPayment=(totalPayment - '$price') WHERE studentId = '$studentId'");
    $query = mysqli_query($con, "DELETE FROM appliedcourses WHERE id = '$id'");
  }
  
  if(isset($_POST['pay_details']))
  {
    $id = $_POST['val'];
    $query = mysqli_query($con, "SELECT * FROM payment WHERE studentId = '$id'");
    $row = mysqli_fetch_array($query);
    echo $row['totalPayment'] - $row['paidPayment'];
  }

  if(isset($_POST['pay_set']))
  {
    $id = $_POST['id'];
    $pay = $_POST['pay'];
    $query = mysqli_query($con, "UPDATE payment SET paidPayment=paidPayment + '$pay' WHERE studentId = '$id'");
  }

  if(isset($_SESSION['courseid']))
  {
    $courseid = $_SESSION['courseid'];
    $query = mysqli_query($con, "SELECT * FROM courses WHERE id = '$courseid'");
    $row = mysqli_fetch_array($query);
    $coursename = $row['name']; 
  } 

  if(isset($_POST['content_delete_btn_set']))
  {
      $target_dir = "assets/img/coursefiles/".$coursename."/";
      $contentid = $_POST['delete_id'];
      $check = mysqli_query($con, "SELECT filename FROM coursefiles WHERE contentid = '$contentid'");
      while($result = mysqli_fetch_array($check))
      {
        $res = $target_dir.$result['filename'];
        unlink($res);
      }
      $query=mysqli_query($con,"DELETE FROM coursefiles WHERE contentid = $contentid");  
      $delcontent = mysqli_query($con, "DELETE FROM coursecontent WHERE id=$contentid");
  }
?>