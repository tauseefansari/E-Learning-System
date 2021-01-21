<?php 
  require '../database.php';
  require '../backend.php';

  if(isset($_SESSION['staff_id']))
  {
    $id=$_SESSION['staff_id'];
  }
  else
  {
  	header("Location: ../index.php");
  }
?>


<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Expertise Learning :: <?php echo $_SESSION['login_staff'];?></title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../assets/css/mdb.min.css" rel="stylesheet">

  <!-- DataTables.net  -->
  <link rel="stylesheet" type="text/css" href="../assets/css/addons/datatables.min.css">
  <link rel="stylesheet" href="../assets/css/addons/datatables-select.min.css">
  
  <!-- Favicons -->
  <link href="../assets/assets/img/favicon.png" rel="icon">
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <script src="../assets/js/sweetalert.js"></script>
  
  <style type="text/css">
    nav ul li.active{
      background-color :  #18d26e;
    }

    .img-fluid{
      width: 120px;
      height: 120px;
      object-fit: cover;
    }

    .chips{
      padding: 11px;
      border-radius: 21px;
      display: inline-block;
      /* margin-top: 3px; */
      height: 35px;
      margin-left: 2px;
    }

    .chips .closebtn{
      font-size: 20px;
      font-weight: bold;
      float: right;
      color: #fff;
      margin-top: -4px;
      margin-right: 5px;
      margin-left: 15px;
      cursor: pointer;
    }

  </style>

</head>

<body class="animated">

  <?php include_once('includes/header.php'); ?>

  <?php
      if(isset($_SESSION["already_present"]))
      {
   ?>
   <script>
      swal({
        title: "Enroll Courses",
        text: "<?php echo $_SESSION["already_present"]; ?>",
        icon: "info",
        button: "Okay!",
    });
    </script>
  <?php
      unset($_SESSION['already_present']);
    }
  ?>

  <!-- Main layout -->
  <main>

    <div class="container">

      <!-- Section: Create Page -->
      <section class="my-5 ml-3">

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-lg-12 wow animated swing">
            <h3 class="h3 blue-gradient text-light p-3 font-weight-bold text-center" style="border-radius:50px;">Students Certificates</h3>
            <?php 
              $query_check = mysqli_query($con, "SELECT student.id AS ID,name,profilePic,certificate FROM appliedCourses JOIN student ON student.id=appliedcourses.studentId  WHERE appliedCourses.progress >=100 AND student.disable=0");
              if(mysqli_num_rows($query_check)<=0)
              {
              	echo '<h4 class="h4 responsive text-center p-3"> No Data Available <h4>';
              }
              else
              {
            ?>

            <table id="dt-cell-sellection" class="table table-hover" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="th-sm text-center">Student Name
                  </th>
                  <th class="th-sm text-center">Profile Pic
                  </th>
                  <th class="th-sm text-center">Completed Courses
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  while ($row = mysqli_fetch_array($query_check))
                  {
                    $id=$row['ID'];
                    $query2= mysqli_query($con, "SELECT appliedCourses.id AS ID, appliedCourses.studentId AS SID,name,price FROM appliedCourses JOIN courses ON appliedCourses.courseId=courses.id WHERE studentId ='$id' AND appliedCourses.progress >=100");
                ?>
                    <tr>
                      <td class="align-middle"> <strong> <?php echo $row['name']; ?> </strong> </td>
                      <td class="align-middle"><img src="../assets/img/profile/<?php echo $row['profilePic']; ?>" style="width: 100px;height: 100px;border-radius: 50px;"></td>
                      <td class="align-middle" style="display: inline-block;">
                        <?php 
                          while($row2=mysqli_fetch_array($query2))
                          {
                        ?>
                          <div class="chips blue-gradient text-white text-center">
                            <?php echo $row2['name']; ?>
                            <a href="../assets/img/Certificates/<?php echo $row['certificate']; ?>" target="_blank" class="closebtn download_btn_ajax" download> <i class="fa fa-download"></i> </a>
                          </div>
                        <?php
                          }
                        ?>
                      </td>
                    </tr>
                <?php
                  }
              }
                ?>
              </tbody>
            </table>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Create Page -->

    </div>

  </main>
  <!-- Main layout -->

  <?php include_once('includes/footer.php'); ?>

<div class="modal fade wow animated flipInY" data-wow-delay="0.5s" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center bg-danger text-white">
        <h4 class="modal-title w-100 font-weight-bold">Change Password</h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <form method="post" action="../backend.php">
        <div class="md-form mb-5">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-email" name="password1" class="form-control validate" required>
          <label data-error="wrong" data-success="Good" for="defaultForm-email">Enter New Password</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" name="password2" class="form-control validate" required>
          <label data-error="wrong" data-success="Good" for="defaultForm-pass">Confirm Password</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-danger" type="submit" name="change_password_staff">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>


  <!-- Footer -->
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="../assets/js/jquery-3.4.1.min.js"></script>

  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../assets/js/popper.min.js"></script>

  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>

  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../assets/js/mdb.min.js"></script>
  <!-- DataTables  -->
  <script type="text/javascript" src="../assets/js/addons/datatables.min.js"></script>
  <!-- DataTables Select  -->
  <script type="text/javascript" src="../assets/js/addons/datatables-select.min.js"></script>

  <script type="text/javascript">
    /* WOW.js init */

    new WOW().init();
    // Tooltips Initialization


    jQuery(document).ready(function($){
      $('#dt-cell-sellection').dataTable({
        select: {
          style: 'os',
          items: 'cell'
        }
      });
    });


    $(document).ready(function () {
      $('.mdb-select').materialSelect();
    });
    
  </script>

</body>

</html>
