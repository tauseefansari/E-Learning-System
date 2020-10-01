<?php
    session_start();
    //error_reporting(0);
    include('../database.php');
    if(strlen($_SESSION['userid'] == 0)) 
    {
        header('location:logout.php');
    }
    
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
   
    <title>Update Course Image</title>
  
    <link rel="apple-touch-icon" href="apple-icon.png">
  
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/styles.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

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
                        <h1>Update Course Image</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-teacher.php">Manage Staff</a></li>
                            <li class="active">Update Course Image</li>
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
                            <div class="card-header"><strong>Update</strong><small> Course Image</small></div>
                            <form name="" method="post" action="" enctype="multipart/form-data">  
                            <div class="card-body card-block">
                            <?php
                                $eid=$_GET['editid'];
                                $sql= "SELECT * from courses where id='$eid'";
                                $query = mysqli_query($con, $sql);
                                $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                if(mysqli_num_rows($query) > 0)
                                {
                                    foreach($results as $row)
                                    {               
                            ?>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Course Name</label>
                                    <input type="text" name="name" value="<?php  echo $row['name'];?>" class="form-control" id="subjects" required="true" readonly='true'>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Course Picture</label>
                                    <img src="../assets/img/courses/<?php echo $row['profilePic'];?>" width="100" height="100">
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">New Course Picture</label>
                                    <input type="file" name="newpic" value="" class="form-control" id="newpic" required='true'>
                                </div>
                            </div>
                            <?php   }
                                } 
                            ?> 
                            <div class="card-footer">
                                <p style="text-align: center;">
                                    <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                    <i class="fa fa-dot-circle-o"></i> Update Image
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

    <?php 
        if(isset($_POST['submit']))
        {
            $eid=$_GET['editid'];
            $propic=$_FILES["newpic"]["name"];
            $extension = substr($propic,strlen($propic)-4,strlen($propic));
            $allowed_extensions = array(".jpg","jpeg",".png",".gif");
            if(!in_array($extension,$allowed_extensions))
            {
                echo    '<script>
                            swal({
                                title: "Course Picture",
                                text: "Course Picture is invalid Format",
                                icon: "info",
                                button: "Okay!",
                            });
                        </script>';
            }
            else
            {
                $propic=$propic.time().$extension;
                move_uploaded_file($_FILES["newpic"]["tmp_name"],"../assets/img/courses/".$propic);
                $sql= "update courses set profilePic='$propic' where id='$eid'";
                $query = mysqli_query($con, $sql);
                $_SESSION['profile'] = "success";
                echo "<script>window.location.href ='manage-subjects.php'</script>";
            }
        }
    ?>

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>
</html>