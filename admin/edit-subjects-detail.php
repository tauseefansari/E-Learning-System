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
   
    <title>Update Courses</title>
  
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
                        <h1>Update Course</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-subjects.php">Update Course</a></li>
                            <li class="active">Update Course</li>
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
                            <div class="card-header"><strong>Course</strong><small> Detail</small></div>
                            <form name="" method="post" action="">
                                
                            <div class="card-body card-block">
                            <?php
                                $eid=$_GET['editid'];
                                $sql = "SELECT * from courses where id='$eid'";
                                $query = mysqli_query($con, $sql); 
                                $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                if(mysqli_num_rows($query) > 0)
                                {
                                    foreach($results as $row)
                                    {               
                            ?>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Course Name</label>
                                                <input type="text" name="name" value="<?php  echo $row['name'];?>" class="form-control" id="subjects" required="true">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="company" class=" form-control-label">Duration (in Months)</label>
                                                <input type="number" name="duration" value="<?php  echo $row['duration'];?>" class="form-control" id="subjects" required="true">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Course Domain</label>
                                            <select type="text" name="domain" id="company" value="" class="form-control" required="true">
                                                <option value="<?php echo $row['domain'];?>"><?php echo $row['domain'];?></option>  
                                                <option value="AI">AI</option>
                                                <option value="ML">ML</option>
                                                <option value="Programming">Programming</option>
                                                <option value="Web Development">Web Development</option>
                                                <option value="Others">Others</option> 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Course Badge</label>
                                            <select type="text" name="badge" id="company" value="" class="form-control" required="true">
                                                <option value="<?php echo $row['badge'];?>"><?php echo $row['badge'];?></option>  
                                                <option value="<span class='badge badge-danger mb-2'>New</span>">New</option>
                                                <option value="<span class='badge badge-primary mb-2'>Bestseller</span>">Bestseller</option>
                                                <option value="<span class='badge badge-success mb-2'>Sale</span>">Sale</option>
                                                <option value="<span class='badge grey mb-2'>Best Rated</span>">Best Rated</option>
                                                <option value="<span class='badge badge-warning mb-2'>Top Demand</span>">Top Demand</option> 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Course Picture</label>
                                            <img src="../assets/img/courses/<?php echo $row['profilePic'];?>" width="100" height="100">
                                            <a href="changecourseimage.php?editid=<?php echo $row['id'];?>"> &nbsp; Edit Image</a>
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Course Price</label>
                                            <input type="number" name="price" id="mobilenumber" value="<?php echo $row['price'];?>" class="form-control" required="true">
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Course Objective</label>
                                            <textarea type="text" name="objective" id="address" class="form-control" rows="4" cols="12" required="true"><?php echo $row['objective'];?>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Course Description</label>
                                            <textarea type="text" name="description" id="address" class="form-control" rows="4" cols="12" required="true"><?php echo $row['description'];?>
                                            </textarea>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="city" class=" form-control-label">Taken By</label>
                                                    <select type="text" name="taken" id="tsubjects" value="" class="form-control" required="true">
                                                        <option value="<?php echo $row['takenBy'];?>"><?php echo $row['takenBy'];?></option>
                                                        <?php 
                                                            $sql2 = "SELECT * from staff WHERE disable=0";
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
                                <?php 
                                    }
                                }
                                ?>
                                <p style="text-align: center;">
                                    <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                        <i class="fa fa-dot-circle-o"></i>  Update Course 
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

    <?php 
        if(isset($_POST['submit']))
        {
            $eid=$_GET['editid'];
            $name=$_POST['name'];
            $domain=$_POST['domain'];
            $duration=$_POST['duration'];
            $badge=mysqli_real_escape_string($con,$_POST['badge']);
            $objective=mysqli_real_escape_string($con, trim($_POST['objective']));
            $description=mysqli_real_escape_string($con, trim($_POST['description']));
            $taken=$_POST['taken'];
            $price=$_POST['price'];
            $sql= "update courses set name='$name',domain='$domain',description='$description',price='$price',takenBy='$taken',objective='$objective',badge='$badge',duration='$duration' where id='$eid'";
            $query = mysqli_query($con, $sql);
            if($query)
            {
                $_SESSION['updated'] = "success";
                echo "<script>window.location.href ='manage-subjects.php'</script>";
            }
      }
    ?>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

    <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/mains.js"></script>
</body>
</html>