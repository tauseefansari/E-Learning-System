<?php
    session_start();
    error_reporting(0);
    include('../database.php');
    if (strlen($_SESSION['userid'] == 0)) 
    {
        header('location:logout.php');
    }
    
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
   
    <title>Update Staff</title>
  
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
                $eid=$_GET['editid'];
                $tname=$_POST['tname'];
                $email=$_POST['email'];
                $mobnum=$_POST['mobilenumber'];
                $address=trim($_POST['address']);
                $quali=$_POST['qualifications'];
                $tsubjects=$_POST['tsubjects'];
                $tdate=$_POST['joiningdate'];
                $sql="update staff set name='$tname',email='$email',mobile='$mobnum',qualification='$quali',address='$address',subjectTaken='$tsubjects',joiningDate='$tdate' where id='$eid'";
                $query = mysqli_query($con, $sql);
                if($query)
                {
                    $_SESSION['updated'] = "success";
                    echo    "<script>window.location.href ='manage-teacher.php'</script>";
                }
            }
        ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Update Staff Detail</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-teacher.php">Manage Staff</a></li>
                            <li class="active">Update Staff</li>
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
                            <div class="card-header"><strong>Staff</strong><small> Detail</small></div>
                            <form name="" method="post" action="" enctype="multipart/form-data">
                            <div class="card-body card-block">
                            <?php
                                $eid = $_GET['editid'];
                                $sql = "SELECT * from staff where id='$eid'";
                                $query = mysqli_query($con, $sql);
                                $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                if(mysqli_num_rows($query) > 0)
                                {
                                    foreach($results as $row)
                                    {               
                            ?>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Staff Name</label>
                                            <input type="text" name="tname" value="<?php  echo $row['name'];?>" class="form-control" id="tname" required="true">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Staff Picture</label> &nbsp;<img src="../assets/img/profile/<?php echo $row['profilePic'];?>" width="100" height="100">
                                            <a href="changeimage.php?editid=<?php echo $row['id'];?>"> &nbsp; Edit Image</a>
                                        </div>

                                        <div class="form-group">
                                            <label for="street" class=" form-control-label">Staff Email ID</label>
                                            <input type="text" name="email" value="<?php  echo $row['email'];?>" id="email" class="form-control" required="true">
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Staff Qualification</label>
                                                    <input type="text" name="qualifications" id="qualifications" value="<?php  echo $row['qualification'];?>" class="form-control" required="true">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Staff Mobile Number</label>
                                                    <input type="text" name="mobilenumber" id="mobilenumber" value="<?php  echo $row['mobile'];?>" class="form-control" required="true" maxlength="10" pattern="[0-9]+">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Staff Subjects</label>
                                                    <select type="text" name="tsubjects" id="tsubjects" value="" class="form-control" required="true">
                                                        <option value="<?php  echo $row['subjectTaken'];?>"><?php  echo $row['subjectTaken'];?>
                                                        </option>
                                                        <?php 
                                                            $sql2 = "SELECT * from courses";
                                                            $query2 = mysqli_query($con, $sql2);
                                                            $result2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
                                                            foreach($result2 as $row1)
                                                            {          
                                                        ?>  
                                                        <option value="<?php echo htmlentities($row1['name']);?>"><?php echo htmlentities($row1['name']);?></option>
                                                        <?php } 
                                    }
                                }
                                                        ?> 
                                                    </select>
                                                </div>
                                            </div>
                                         </div>

                                        <div class="row form-group">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Staff Address</label>
                                                    <textarea type="text" name="address" id="address" class="form-control" rows="5" cols="12" required="true"><?php  echo $row['address'];?>
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Joining Date</label>
                                                    <input type="date" name="joiningdate" id="joiningdate" value="<?php  echo $row['joiningDate'];?>" class="form-control" required="true">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <p style="text-align: center;">
                                    <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit"><i class="fa fa-dot-circle-o"></i> Update Staff</button>
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

</body>
</html>