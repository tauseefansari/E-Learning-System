<?php
    session_start();
    error_reporting(0);
    include('../database.php');
    if(strlen($_SESSION['userid'] == 0)) 
    {
        header('location:logout.php');
    }
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
   
    <title>Add Staff</title>

    <link rel="apple-touch-icon" href="apple-icon.png">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/styles.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <script src="../assets/js/sweetalert.js"></script>

</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Staff Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="add-teacher.php">Staff Details</a></li>
                            <li class="active">Add Staff</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                       <!-- .card -->

                    </div>
                    <!--/.col-->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>Staff </strong><small> Details</small></div>
                            <form name="" method="post" action="" enctype="multipart/form-data">
                                
                            <div class="card-body card-block">
 
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Staff Name</label>
                                    <input type="text" name="tname" value="" class="form-control" id="tname" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Staff Picture</label>
                                    <input type="file" name="propic" value="" class="form-control" id="propic" required="true">
                                </div>
                                                                          
                                <div class="form-group">
                                    <label for="street" class=" form-control-label">Staff Email ID</label>
                                    <input type="text" name="email" value="" id="email" class="form-control" required="true">
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Staff Qualification</label>
                                            <input type="text" name="qualifications" id="qualifications" value="" class="form-control" required="true">
                                        </div>
                                    </div>            
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Staff Mobile Number</label>
                                            <input type="text" name="mobilenumber" id="mobilenumber" value="" class="form-control" required="true" maxlength="10" pattern="[0-9]+">
                                        </div>
                                    </div>                
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Staff Subjects</label>
                                            <select type="text" name="tsubjects" id="tsubjects" value="" class="form-control" required="true">
                                                <option value="">Choose Subjects</option>
                                                <?php 
                                                    $sql2 = "SELECT * from courses";
                                                    $query2 = mysqli_query($con, $sql2);
                                                    $result2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
                                                    foreach($result2 as $row)
                                                    {          
                                                ?>  
                                                <option value="<?php echo htmlentities($row['name']);?>"><?php echo htmlentities($row['name']);?></option>
                                                <?php } ?> 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Staff Address</label>
                                            <textarea type="text" name="address" id="address" class="form-control" rows="4" cols="12" required="true">
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Joining Date</label>
                                            <input type="date" name="joiningdate" id="joiningdate" value="" class="form-control" required="true">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Password </label>
                                            <input type="password" name="pass" id="pass" minlength="8" value="" class="form-control" required="true">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="city2" class=" form-control-label">Confirm Password </label>
                                            <input type="password" name="pass2" id="pass" minlength="8" value="" class="form-control" required="true">
                                        </div>
                                    </div>
                                </div>
                                <p style="text-align: center;">
                                    <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                        <i class="fa fa-dot-circle-o"></i> Add Staff
                                    </button>
                                </p>
                                                    
                            </div>
                            </form>
                        </div>
                    </div>
                    </div><!-- .animated -->
                    </div><!-- .content -->
                    </div><!-- /#right-panel -->
                    <!-- Right Panel -->


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
    
    <?php 
        if(isset($_POST['submit']))
        {
            $userid=$_SESSION['userid'];
            $tname=$_POST['tname'];
            $email=$_POST['email'];
            $mobnum=$_POST['mobilenumber'];
            $address=mysqli_real_escape_string($con, trim($_POST['address']));
            $quali=$_POST['qualifications'];
            $tsubjects=$_POST['tsubjects'];
            $tdate=$_POST['joiningdate'];
            $pass=$_POST['pass'];
            $pass2=$_POST['pass2'];
            if($pass != $pass2)
            {
                echo    '<script>
                            swal({
                                title: "Staff",
                                text: "Both the password should be same",
                                icon: "warning",
                                button: "Okay!",
                            });
                        </script>';
            }
            else
            {
                $pass= md5($pass);
                $propic=$_FILES["propic"]["name"];
                $extension = substr($propic,strlen($propic)-4,strlen($propic));
                $allowed_extensions = array(".jpg","jpeg",".png",".gif");
                if(!in_array($extension,$allowed_extensions))
                {
                    echo    '<script>
                                swal({
                                    title: "Profile Picture",
                                    text: "Profile Picture is invalid Format",
                                    icon: "info",
                                    button: "Okay!",
                                });
                            </script>';
                }
                else
                {
                    $propic = md5($propic).time().$extension;
                    move_uploaded_file($_FILES["propic"]["tmp_name"],"../assets/img/profile/".$propic);
                    $sql = "insert into staff(name,profilePic,email,mobile,qualification,address,subjectTaken,joiningDate,password) values ('$tname','$propic','$email','$mobnum','$quali','$address','$tsubjects','$tdate','$pass')";
                    $query = mysqli_query($con, $sql);
                    $LastInsertId = mysqli_insert_id($con);
                    if ($LastInsertId > 0) 
                    {
                        echo    "<script>window.location.href ='manage-teacher.php'</script>";
                        $_SESSION['registered'] = "success";
                    }
                    else
                    {
                        echo    '<script>
                                    swal({
                                        title: "Staff",
                                        text: "Something went wrong!",
                                        icon: "error",
                                        button: "Okay!",
                                    });
                                </script>';
                    }
                }
            }
        }
    ?>
</body>
</html> 