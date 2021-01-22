<?php
    session_start();
    error_reporting(0);
    include('../database.php');
    if(strlen($_SESSION['userid'] == 0)) 
    {
        header('location:logout.php');
    }

?>
<!doctype html>
<html class="no-js" lang="en">
<head>
   
    <title>Search</title>
    

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="apple-touch-icon" href="apple-icon.png">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/addons/datatables.min.css">
    <link rel="stylesheet" href="../assets/css/addons/datatables-select.min.css">

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
                        <h1>Search Teacher</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="search.php">Search Teacher</a></li>
                            <li class="active">Teacher</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Search Teacher</strong>
                            </div>

                        <form name="search" method="post" style="padding-top: 20px" >
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                   <div class="form-group row">
                                        <label class="col-4 col-form-label" for="example-email" style="padding-left: 50px"><strong>Search by Name or Subject</strong></label>
                                        <div class="col-6">
                                            <input id="searchdata" type="text" name="searchdata" required="true" class="form-control">
                                        </div>
                                    </div>
                                    <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="search" id="submit">
                                    <i class="fa fa-dot-circle-o"></i> Search
                                    </button></p>
                                </div> 
                            </form>

                            <?php
                            if(isset($_POST['search']))
                            { 

                            $sdata=$_POST['searchdata'];
                              ?>
                              <h4 align="center">Result against <b>"<?php echo $sdata;?>"</b> keyword </h4> 
                            <div class="card-body">
                                <table id="dt-cell-sellection" class="table table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="th-sm text-center">SR NO</th>
                                            <th class="th-sm text-center">Staff Name</th>
                                            <th class="th-sm text-center">Subject</th>
                                            <th class="th-sm text-center">Joining Date</th>       
                                            <th class="th-sm text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <?php
                                        $sql="SELECT * from staff where name like '%$sdata%' || subjectTaken like  '%$sdata%'";
                                        $query = mysqli_query($con, $sql);
                                        $results = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                        $cnt=1;
                                        if(mysqli_num_rows($query) > 0)
                                        {
                                        foreach($results as $row)
                                        {   
                                    ?>   
                                        <tr>
                                          <td class="align-middle"><?php echo htmlentities($cnt);?></td>
                                          <td class="align-middle"><?php  echo htmlentities($row['name']);?></td>
                                          <td class="align-middle"><?php  echo htmlentities($row['subjectTaken']);?></td>
                                          <td class="align-middle"><?php  echo htmlentities($row['joiningDate']);?></td>
                                          <td class="align-middle"><a href="edit-teacher-detail.php?editid=<?php echo htmlentities ($row['id']);?>"><i class="fa fa-edit fa-2x text-info"></i></a></td>
                                        </tr>
                                    <?php 
                                        $cnt=$cnt+1;
                                        } } else { 
                                    ?>
                                        <tr>
                                            <td colspan="8"> No record found against this search</td>
                                        </tr>   
                                        <?php } }?>
                                </table>
                            </div>
                        </div>
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
    <script src="../assets/js/mains.js"></script>
    <script type="text/javascript" src="../assets/js/addons/datatables.min.js"></script>
    <script type="text/javascript" src="../assets/js/addons/datatables-select.min.js"></script>

    <script>
        jQuery(document).ready(function($){
          $('#dt-cell-sellection').dataTable({
            select: {
              style: 'os',
              items: 'cell'
            }
          });
        });
    </script>

</body>
</html>