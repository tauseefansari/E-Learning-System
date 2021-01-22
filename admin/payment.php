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
    
    <title>Payment</title>

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
                        <h1>View All Payments</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
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
                                <strong class="card-title">Manage Payments</strong>
                            </div>
                            <div class="card-body">
                                <table id="dt-cell-sellection" class="table table-hover text-center">
                                    <thead>
                                        <tr>
                                            <tr>
							                  <th class="th-sm text-center">SR NO</th>
							                  <th class="th-sm text-center">Student Name</th>
							                  <th class="th-sm text-center">Total Amount</th>
							                  <th class="th-sm text-center">Paid Amount</th>
							                  <th class="th-sm text-center">Remaning Amount</th>       
							                </tr>
                                        </tr>
                                        </thead>
										<?php
										$sql='SELECT * FROM student INNER JOIN payment ON (student.id=payment.studentId)';
										$query = mysqli_query($con, $sql);
										$results = mysqli_fetch_all($query, MYSQLI_ASSOC);
										$cnt=1;
										if(mysqli_num_rows($query) > 0)
										{
										foreach($results as $row)
										{               ?>   
						                <tr>
						                  <td class="align-middle"><?php echo htmlentities($cnt);?></td>
						            	  <td class="align-middle"><?php  echo htmlentities($row['name']);?></td>
						                  <td class="align-middle"><?php  echo htmlentities($row['totalPayment']);?></td>
						                  <td class="align-middle"><?php  echo htmlentities($row['paidPayment']);?></td>
						                  <td class="align-middle"><?php  echo htmlentities(($row['totalPayment'])-($row['paidPayment']));?></td>
						                </tr>
						               <?php $cnt=$cnt+1;}} ?>   

                                </table>
                            </div>
                        </div>
                    </div>



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div>

    <!-- Right Panel -->


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
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