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
    
    <title>Admin Profile</title>

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

        <?php 
            if(isset($_POST['submit']))
            {
                $adminid = $_SESSION['userid'];
                $AName=$_POST['adminname'];
                $mobno=$_POST['mobilenumber'];
                $email=$_POST['email'];
                $sql = "update admin set name='$AName',mobile='$mobno',email='$email' where id='$adminid'";
                $query = mysqli_query($con, $sql);
                if($query)
                {
                    echo    '<script>
                            swal({
                                title: "Admin",
                                text: "Admin Details Updated Successfully",
                                icon: "success",
                                button: "Okay!",
                            });
                        </script>';
                }
                else
                {
                    echo    '<script>
                            swal({
                                title: "Admin",
                                text: "Something went wrong! Please try again",
                                icon: "warning",
                                button: "Okay!",
                            });
                        </script>';
                }
            }
        ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Admin Profile</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="adminprofile.php">Admin Profile</a></li>
                            <li class="active">Update Profile</li>
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
                            <div class="card-header"><strong>Admin</strong><small> Profile</small></div>
                            <form name="profile" method="post" action="">   
                            <div class="card-body card-block">
                            <?php
                                $sql="SELECT * from admin";
                                $query = mysqli_query($con, $sql);
                                $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                if(mysqli_num_rows($query) > 0)
                                {
                                    foreach($results as $row)
                                    {               
                            ?>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Admin Name</label>
                                    <input type="text" name="adminname" value="<?php  echo $row['name'];?>" class="form-control" required='true'>
                                </div>
                                <div class="form-group">
                                    <label for="vat" class=" form-control-label">User Name</label>
                                    <input type="text" name="username" value="<?php  echo $row['username'];?>" class="form-control" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="street" class=" form-control-label">Mobile</label>
                                    <input type="text" name="mobilenumber" value="<?php  echo $row['mobile'];?>"  class="form-control" maxlength='10' required='true'>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Email</label>
                                            <input type="email" name="email" value="<?php  echo $row['email'];?>" class="form-control" required='true'>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="postal-code" class=" form-control-label">Admin Registration Date</label>
                                            <input type="text" name="" value="<?php  echo $row['registrationDate'];?>" readonly="" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php       }
                                    } 
                            ?>  
                            <div class="card-footer">
                                <p style="text-align: center;">
                                    <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                            <i class="fa fa-dot-circle-o"></i> Update Profile
                                    </button>
                                </p>
                            </div>
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

</body>
</html>