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
    
    <title>Manage Courses</title>
    
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

    <script src="../assets/js/sweetalert.js"></script>

</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <?php 
            if(isset($_SESSION['registered']))
            {
                echo    '<script>
                            swal({
                                title: "Course",
                                text: "Course Added Successfully",
                                icon: "success",
                                button: "Okay!",
                            });
                        </script>';
                unset($_SESSION['registered']);
            }

            if(isset($_SESSION['updated']))
            {
                echo    '<script>
                            swal({
                                title: "Course",
                                text: "Course Updated Successfully",
                                icon: "success",
                                button: "Okay!",
                            });
                        </script>';
                unset($_SESSION['updated']);
            }

            if(isset($_SESSION['profile']))
            {
                echo    '<script>
                            swal({
                                title: "Course",
                                text: "Course Profile Picture Updated Successfully",
                                icon: "success",
                                button: "Okay!",
                            });
                        </script>';
                unset($_SESSION['profile']);
            }

            if(isset($_SESSION['delete']))
            {
                echo    '<script>
                            swal({
                                title: "Course",
                                text: "<?php echo $_SESSION["delete"];?> Deleted Successfully",
                                icon: "success",
                                button: "Okay!",
                            });
                        </script>';
                unset($_SESSION['delete']);
            }
        ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Manage Courses
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-teacher.php">Manage Staff</a></li>
                            <li class="active">Manage Courses</li>
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
                                <strong class="card-title">Manage Courses</strong>
                            </div>
                            <div class="card-body">
                                <table id="dt-cell-sellection" class="table table-hover text-center">
                                    <thead>
                                        <tr>
                                            <th class="th-sm text-center">SR NO</th>
                                            <th class="th-sm text-center">Course Name</th>
                                            <th class="th-sm text-center">Course Image</th>
                                            <th class="th-sm text-center">Domain</th>
                                            <th class="th-sm text-center">Managed By</th>
                                            <th class="th-sm text-center">Price</th>
                                            <th class="th-sm text-center">Edit</th>
                                            <th class="th-sm text-center">Action</th>       
                                        </tr>
                                    </thead>
                                    <?php
                                        $sql = "SELECT * from courses ORDER BY creationDate";
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
                                            <td class="align-middle"><img src="../assets/img/courses/<?php echo $row['profilePic'];?>" height="100"></td>
                                            <td class="align-middle"><?php  echo htmlentities($row['domain']);?></td>
                                            <td class="align-middle"><?php  echo htmlentities($row['takenBy']);?></td>
                                            <td class="align-middle"><?php  echo htmlentities($row['price']);?></td>
                                            <td class="align-middle"><a href="edit-subjects-detail.php?editid=<?php echo htmlentities ($row['id']);?>"><i class="fa fa-edit fa-2x text-info"></i></a></td>
                                          <td class="align-middle">
                                            <input type="hidden" name="id" value="<?php echo $row['id'];?>" class="delete_id_value">
                                            <a href="javascript:void(0)" class="btn btn-danger delete_btn_ajax"> <i class="fa fa-trash"></i> </a>
                                          </td>
                                        </tr>
                                       <?php $cnt=$cnt+1;}} ?>   

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
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/mains.js"></script>
    <script type="text/javascript" src="../assets/js/addons/datatables.min.js"></script>
    <script type="text/javascript" src="../assets/js/addons/datatables-select.min.js"></script>

    <script>
        jQuery(document).ready(function($){
          $('.delete_btn_ajax').click(function(e){
                e.preventDefault();
                var deleteid = $(this).closest("tr").find('.delete_id_value').val();
                swal({
                      title: "Are you sure?",
                      text: "Once deleted, you will not be able to recover this course!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "backend.php",
                            data: {
                                "delete_btn_set" : 1,
                                "delete_id" : deleteid,
                            },
                            success: function(response)
                            {
                                swal("Course Deleted Successfully!",{
                                   icon: "success",
                                }).then((result) => {
                                  location.reload();
                                });
                            }
                        });
                      }
                    });
            });
        });

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