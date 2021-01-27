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
   
    <title>Add Course</title>
  
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
                        <h1>Course Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="add-subjects.php">Course Details</a></li>
                            <li class="active">Add Course</li>
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
                            <div class="card-header"><strong>Course Details</strong></div>
                            <form name="" method="post" action="" enctype="multipart/form-data">
                                
                            <div class="card-body card-block">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Course Name</label>
                                        <input type="text" name="name" value="" class="form-control" id="subjects" required="true">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="company" class=" form-control-label">Duration (in Months)</label>
                                        <input type="number" name="duration" value="" class="form-control" id="subjects" required="true">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Course Domain</label>
                                    <select type="text" name="domain" id="company" value="" class="form-control" required="true">
                                        <option value="">Choose Domain</option>  
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
                                        <option value="">Choose Badge</option>  
                                        <option value="<span class='badge badge-danger mb-2'>New</span>">New</option>
                                        <option value="<span class='badge badge-primary mb-2'>Bestseller</span>">Bestseller</option>
                                        <option value="<span class='badge badge-success mb-2'>Sale</span>">Sale</option>
                                        <option value="<span class='badge grey mb-2'>Best Rated</span>">Best Rated</option>
                                        <option value="<span class='badge badge-warning mb-2'>Top Demand</span>">Top Demand</option> 
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">Course Picture</label>
                                    <input type="file" name="propic" value="" class="form-control" id="propic" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="city" class=" form-control-label">Course Price</label>
                                    <input type="number" name="price" id="mobilenumber" value="" class="form-control" required="true">
                                </div>
                                <div class="form-group">
                                    <label for="city" class=" form-control-label">Course Objective</label>
                                    <textarea type="text" name="objective" id="address" class="form-control" rows="4" cols="12" required="true">
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="city" class=" form-control-label">Course Description</label>
                                    <textarea type="text" name="description" id="address" class="form-control" rows="4" cols="12" required="true">
                                    </textarea>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="city" class=" form-control-label">Taken By</label>
                                            <select type="text" name="taken" id="tsubjects" value="" class="form-control" required="true">
                                                <option value="">Choose Staff</option>
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
                                <p style="text-align: center;">
                                    <button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                        <i class="fa fa-dot-circle-o"></i>  Add Course 
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
            $userid=$_SESSION['userid'];
            $name=$_POST['name'];
            $domain=$_POST['domain'];
            $duration=$_POST['duration'];
            $badge=mysqli_real_escape_string($con,$_POST['badge']);
            $objective=mysqli_real_escape_string($con, trim($_POST['objective']));
            $description=mysqli_real_escape_string($con, trim($_POST['description']));
            $taken=$_POST['taken'];
            $price=$_POST['price'];
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
                $propic=$propic.time().$extension;
                move_uploaded_file($_FILES["propic"]["tmp_name"],"../assets/img/courses/".$propic);
                $sql = "insert into courses (name,domain,profilePic,objective,description,takenBy,price,badge,duration) values ('$name','$domain','$propic','$objective','$description','$taken','$price','$badge','$duration')";
                $query = mysqli_query($con, $sql);
                $LastInsertId = mysqli_insert_id($con);
                if($LastInsertId > 0) 
                {
                    $_SESSION['registered'] = "success";
                    echo "<script>window.location.href ='manage-subjects.php'</script>";
                }
                else
                {
                    echo    '<script>
                                swal({
                                    title: "Course",
                                    text: "Something went wrong! Please try again",
                                    icon: "warning",
                                    button: "Okay!",
                                });
                            </script>';
                }
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