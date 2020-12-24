<?php 
  require '../database.php';
  require '../backend.php';

  if(isset($_SESSION['student_id']))
  {
  	$id=$_SESSION['student_id'];
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
  <title>Expertise Learning :: <?php echo $_SESSION['login_student'];?></title>
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
    .multiple-select-dropdown li [type=checkbox]+label {
      height: 1rem;
    }

    .img-fluid{
      width: 100%;
      height: 15vw;
      object-fit: cover;
    }

    nav ul li.active{
      background-color :  #18d26e;
    }

  </style>

</head>

<body class="animated">

  <?php include_once('includes/header.php'); ?>

  <?php
	  if(isset($_SESSION["password_changed"]))
	    {
	      $status="";
	      if($_SESSION['password_changed']=="Password changed successfully!")
	      {
	        $status = "success";  
	      }
	      else
	      {
	        $status = "warning";
	      }
	  ?>
	      <script>
	        swal({
	          title: "Change Password",
	          text: "<?php echo $_SESSION["password_changed"]; ?>",
	          icon: "<?php echo $status; ?>",
	          button: "Okay!",
	      });
	      </script>
	  <?php
	      unset($_SESSION['password_changed']);
	    }
	  ?>

  <!-- Main Container -->
  <div class="container pt-1">

    <!-- Main container -->
    <div class="container wow animated bounceInDown">

      <div class="row pt-1">

        <!-- Content -->
        <div class="col-lg-12">
          <?php
        $ongoing= mysqli_query($con, "SELECT * FROM appliedCourses WHERE progress < 100 AND studentId='$id'");
              if(mysqli_num_rows($ongoing) > 0)
              { 
            ?>

          <h4 class="font-weight-bold mt-4 title-1 wow animated slideInRight" data-wow-delay="0.3s">

              <strong>Ongoing Courses</strong>

            </h4>

            <hr class="red mb-5">
            
            <!-- Grid row -->
            <?php
            	$start=0; 
            	$query = mysqli_query($con, "SELECT * FROM appliedCourses JOIN courses ON appliedCourses.courseId = courses.id WHERE appliedCourses.studentId = '$id' AND appliedCourses.progress < 100");
            	while($row = mysqli_fetch_array($query))
          		{
          			if($start % 3 == 0)
          			{
          				echo '<div class="row wow animated slideInLeft" data-wow-delay="0.3s">';
          			}
            ?>

              <!-- Grid column -->
              <div class="col-lg-4 col-md-12 mb-4 wow animated rotateIn" data-wow-delay="0.2s">

                <!-- Card -->
                <div class="card card-ecommerce">

                  <!-- Card image -->
                  <div class="view overlay">

                    <img src="../assets/img/courses/<?php echo $row['profilePic'];?>" class="img-fluid" 
                      alt="">

                    <a>

                      <div class="mask rgba-white-slight"></div>

                    </a>

                  </div>
                  <!-- Card image -->

                  <!-- Card content -->
                  <div class="card-body">

                    <!-- Category & Title -->
                    <h5 class="card-title mb-1">

                      <strong>

                        <a href="" class="dark-grey-text"><?php echo $row['name'];?></a>

                      </strong>

                    </h5>

                    <?php echo $row['badge'];?></a>

                    <!-- Rating -->
                    <ul class="rating">

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                    </ul>

                      <div class="progress">
                        <div class="progress-bar bg-success" style="width : <?php echo $row['progress'];?>%;"></div>
                    </div>

                    <!-- Card footer -->
                    <div class="card-footer pb-0">

                      <div class="row mb-0">

                        <span class="float-left">

                          <strong>₹ <?php echo $row['price'];?></a></strong>

                        </span>

                      </div>

                    </div>

                  </div>

                  <!-- Card content -->
                </div>

                <!-- Card -->
              </div>
              <!-- Grid column -->
              <?php 
              		$start++;
              		if($start % 3 == 0)
              		{
              			echo '</div>';
              		}
              	}
              	echo '</div>';
              }
              ?>
        </div>

      <div class="row pt-1">

        <!-- Content -->
        <div class="col-lg-12">

          <?php
              $ongoing= mysqli_query($con, "SELECT * FROM appliedCourses WHERE progress = 100 AND studentId='$id'");
              if(mysqli_num_rows($ongoing) > 0)
              { 
            ?>

          <h4 class="font-weight-bold mt-4 title-1 wow animated slideInRight" data-wow-delay="0.3s">

              <strong>Completed Courses</strong>

            </h4>

            <hr class="blue mb-5">
            
            <!-- Grid row -->
            <?php
              $start=0; 
              $query = mysqli_query($con, "SELECT * FROM appliedCourses JOIN courses ON appliedCourses.courseId = courses.id WHERE appliedCourses.studentId = '$id'  AND appliedCourses.progress >= 100");
              while($row = mysqli_fetch_array($query))
              {
                if($start % 3 == 0)
                {
                  echo '<div class="row wow animated slideInLeft" data-wow-delay="0.3s">';
                }
            ?>

              <!-- Grid column -->
              <div class="col-lg-4 col-md-12 mb-4 wow animated rotateIn" data-wow-delay="0.2s">

                <!-- Card -->
                <div class="card card-ecommerce">

                  <!-- Card image -->
                  <div class="view overlay">

                    <img src="../assets/img/courses/<?php echo $row['profilePic'];?>" class="img-fluid" 
                      alt="">

                    <a>

                      <div class="mask rgba-white-slight"></div>

                    </a>

                  </div>
                  <!-- Card image -->

                  <!-- Card content -->
                  <div class="card-body">

                    <!-- Category & Title -->
                    <h5 class="card-title mb-1">

                      <strong>

                        <a href="" class="dark-grey-text"><?php echo $row['name'];?></a>

                      </strong>

                    </h5>

                    <?php echo $row['badge'];?></a>

                    <!-- Rating -->
                    <ul class="rating">

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                    </ul>

                    <!-- Card footer -->
                    <div class="card-footer pb-0">

                      <div class="row mb-0">

                        <span class="float-left">

                          <strong>₹ <?php echo $row['price'];?></a></strong>

                        </span>

                      </div>

                    </div>

                  </div>

                  <!-- Card content -->
                </div>

                <!-- Card -->
              </div>
              <!-- Grid column -->
              <?php 
                  $start++;
                  if($start % 3 == 0)
                  {
                    echo '</div>';
                  }
                }
                echo '</div>';
              }
              ?>
    </div>

          <div class="col-lg-12">
          <h4 class="font-weight-bold mt-4 title-1 wow animated slideInRight" data-wow-delay="0.3s">

              <strong>Recommended Courses</strong>

            </h4>

            <hr class="blue mb-5">
            
            
            <div class="row mt-5">
            <?php
              $query3 = mysqli_query($con, "SELECT * FROM courses ORDER BY id DESC LIMIT 3");

              while($row = mysqli_fetch_array($query3))
              {
          ?>
              <!-- Grid column -->
              <div class="col-lg-4 col-md-12 mb-4 wow animated rotateIn" data-wow-delay="0.2s">

                <!-- Card -->
                <div class="card card-ecommerce">

                  <!-- Card image -->
                  <div class="view overlay">

                    <img src="../assets/img/courses/<?php echo $row['profilePic'];?>" class="img-fluid" 
                      alt="">

                    <a href="../courseinfo.php?course=<?php echo $row['id']; ?>">

                      <div class="mask rgba-white-slight"></div>

                    </a>

                  </div>
                  <!-- Card image -->

                  <!-- Card content -->
                  <div class="card-body">

                    <!-- Category & Title -->
                    <h5 class="card-title mb-1">

                      <strong>

                        <a href="../courseinfo.php?course=<?php echo $row['id']; ?>" class="dark-grey-text"><?php echo $row['name'];?></a>

                      </strong>

                    </h5>

                    <?php echo $row['badge'];?></a>

                    <!-- Rating -->
                    <ul class="rating">

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                      <li>

                        <i class="fas fa-star blue-text"></i>

                      </li>

                    </ul>

                    <!-- Card footer -->
                    <div class="card-footer pb-0">

                      <div class="row mb-0">

                        <span class="float-left">

                          <strong>₹ <?php echo $row['price'];?></a></strong>

                        </span>

                      </div>

                    </div>

                  </div>

                  <!-- Card content -->
                </div>
                <!-- Card -->
              </div>
              <!-- Grid column -->
              <?php 
                }
              ?>
            </div>
          </div>
        </div>
        </div>
    </div>
  </div>
</body>
    

  <?php include_once('includes/footer.php'); ?>


  <div class="modal fade wow animated flipInY" data-wow-delay="0.5s" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center bg-primary text-white">
        <h4 class="modal-title w-100 font-weight-bold">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
      	<form method="post" action="../backend.php">
        <div class="md-form mb-5">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-email" name="password1" class="form-control validate">
          <label data-error="wrong" data-success="Good" for="defaultForm-email">Enter New Password</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="defaultForm-pass" name="password2" class="form-control validate">
          <label data-error="wrong" data-success="Good" for="defaultForm-pass">Confirm Password</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-primary" type="submit" name="change_password">Submit</button>
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

    function showPreview(objFileInput) {
        if (objFileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
          $("#targetLayer").html('<img src="'+e.target.result+'" width="100px" height="100px" style="border-radius: 50px;" class="upload-preview" />');
          $(".icon-choose-image").css('opacity','1.0');
            }
        fileReader.readAsDataURL(objFileInput.files[0]);
        }
    }

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
