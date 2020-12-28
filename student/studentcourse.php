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

	if(isset($_GET['course']))
	{
		$courseid = $_GET['course'];
	}

	$querry = mysqli_query($con, "SELECT * FROM courses WHERE id = '$courseid'");
	$result = mysqli_fetch_array($querry);
  $coursename = $result['name']; 
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

    .img-main{
      width: 100%;
      height: 469px;
      object-fit: cover;
    }

    .fit-card{
      width: 100%;
      height: 15vw;
      object-fit: cover;
    }
  </style>

</head>

<body class="hidden-sn white-skin animated">

	<?php include_once('includes/header.php');?>

  <!-- Main Container -->
  <div class="container mt-5 pt-3 wow animated bounceInDown">

    <!-- Section: product details -->
    <section id="productDetails" class="pb-5">

      <!-- News card -->
      <div class="card mt-5 hoverable wow animated bounceInLeft">

        <div class="row mt-5">

          <div class="col-lg-6 p-4">

                <img src="../assets/img/courses/<?php echo $result['profilePic']; ?>" alt="courseImage"
                      class="img-main">

          </div>

          <div class="col-lg-5 mr-3 text-center text-md-left">

            <h2 class="h2-responsive text-center text-md-left product-name font-weight-bold dark-grey-text mb-1 ml-xl-0 ml-4">

              <strong><?php echo $result['name']; ?></strong>

            </h2>

			       <?php echo $result['badge']; ?>            

            </strong>

            </h2>

            <h3 class="h3-responsive text-center text-md-left mb-5 ml-xl-0 ml-4">

              <span class="dark-grey-text font-weight-bold">

                <strong>₹ <?php echo $result['price']; ?></strong>

              </span>

            </h3>

            <p class="ml-xl-0 ml-4">
				<strong>Description : </strong><?php echo $result['description']; ?>
            </p>

            <p class="ml-xl-0 ml-4">

              <strong>Duration : </strong><?php echo $result['duration']; ?> Months</p>

          </div>

        </div>

      </div>
      <!-- News card -->
    </section>

    <div class="container">
    <div class="col-md-6 col-xl-5 mb-2">

      <div class="btn-group" data-toggle="buttons">

        <label class="btn btn-danger btn-lg text-center active">
          <input type="radio" name="options" id="ong" autocomplete="off" checked> <i class="fas fa-spinner fa-2x mb-2" aria-hidden="true"></i> Ongoing
        </label>

        <label class="btn btn-success btn-lg text-center">
          <input type="radio" name="options" id="comp" autocomplete="off"> <i class="fas fa-check-double fa-2x mb-2" aria-hidden="true"></i>  Completed
        </label>

        <label class="btn btn-primary btn-lg text-center">
          <input type="radio" name="options" id="al" autocomplete="off"> <i class="fas fa-globe-asia fa-2x mb-2" aria-hidden="true"></i> All
        </label>

      </div>

    </div>

    <!-- Panel -->
    <div class="card text-center mt-3" id="ongoing">
      <div class="card-header danger-color white-text">
        <i class="fas fa-spinner fa-2x mb-3" aria-hidden="true"></i> <h4> Ongoing Files</h4>
      </div>
      <div class="card-body text-left">
        <?php 
          $query = mysqli_query($con, "SELECT * FROM coursecontent WHERE courseid='$courseid'");
          while ($row = mysqli_fetch_array($query))
          {
        ?>
            <h4 class="font-weight-bold mt-4 title-1">
              <strong><?php echo $row['title']; ?></strong>
            </h4>
            <hr class="red mb-5">
        <?php
            $start=0;
            $contentid = $row['id'];
            $files = mysqli_query($con, "SELECT * FROM coursefiles WHERE id NOT IN (SELECT fileId FROM filestatus WHERE complete=1) AND contentid='$contentid'");
            while($res = mysqli_fetch_array($files))
            {
              if($start % 3 == 0)
              {
                echo '<div class="row">';
              }

              $target_dir = "../assets/img/coursefiles/".$coursename."/"; 
              $filePath = $target_dir.$res["filename"]; 
              $fileMime = mime_content_type($filePath); 
        ?>
            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <?php 
                    if($fileMime == "image/png")
                    {
                  ?>
                    <img src="<?php echo $filePath; ?>" type="<?php echo $fileMime; ?>" class="fit-card">
                  <?php 
                    }
                    else if($fileMime == "video/mp4")
                    {
                  ?>
                    <video class="fit-card" controls>
                      <source src="<?php echo $filePath; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                  <?php 
                    }
                    else if($fileMime == "application/octet-stream")
                    {
                  ?>
                  <audio controls>
                    <source src="<?php echo $filePath; ?>" type="audio/ogg">
                      Your browser does not support the audio element.
                  </audio>
                  <?php 
                    }
                    else
                    {
                  ?>
                  <embed src="<?php echo $filePath; ?>" type="<?php echo $fileMime; ?>" class="fit-card">
                  <?php 
                    }
                  ?>
                  <a href="<?php echo $filePath; ?>" target="_blank" download><button type="button" class="btn btn-outline-success pull-right"> <i class="fas fa-download"></i> Download </button> </a>
                  <h6 class="text-left"> <?php echo $res['filename'];?> <br> <span class="text-danger mt-3"> <?php echo $res['size'];?></span> </h6>
                  <div class="switch ong pull-right">
                    <input type="hidden" value="<?php echo $res['id'];?>" class="check_value">
                    <label>
                      Incomplete
                      <input type="checkbox">
                      <span class="lever"></span> Complete
                    </label>
                  </div>
                </div>
              </div>
            </div>
          <!--Grid column-->
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
      <div class="card-footer text-muted danger-color white-text">
        <p class="mb-0 text-center text-light">End of ongoing courses!</p>
      </div>
    </div>
    <!-- Panel -->

    <!-- Panel -->
    <div class="card text-center mt-3" id="completed">
      <div class="card-header success-color white-text">
        <i class="fas fa-check-double fa-2x mb-3" aria-hidden="true"></i> <h4> Completed Files</h4>
      </div>
      <div class="card-body text-left">
        <?php 
          $query = mysqli_query($con, "SELECT * FROM coursecontent WHERE courseid='$courseid'");
          while ($row = mysqli_fetch_array($query))
          {
        ?>
            <h4 class="font-weight-bold mt-4 title-1">
              <strong><?php echo $row['title']; ?></strong>
            </h4>
            <hr class="blue mb-5">
        <?php
            $start=0;
            $contentid = $row['id'];
            $files = mysqli_query($con, "SELECT * FROM coursefiles JOIN filestatus ON coursefiles.id=filestatus.fileId WHERE filestatus.complete=1 AND coursefiles.contentid='$contentid'");
            while($res = mysqli_fetch_array($files))
            {
              if($start % 3 == 0)
              {
                echo '<div class="row">';
              }
              $target_dir = "../assets/img/coursefiles/".$coursename."/"; 
              $filePath = $target_dir.$res["filename"]; 
              $fileMime = mime_content_type($filePath);
        ?>
            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <?php
                    if($fileMime == "image/png")
                    {
                  ?>
                    <img src="<?php echo $filePath; ?>" type="<?php echo $fileMime; ?>" class="fit-card">
                  <?php 
                    }
                    else if($fileMime == "video/mp4")
                    {
                  ?>
                    <video class="fit-card" controls>
                      <source src="<?php echo $filePath; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                  <?php 
                    }
                    else if($fileMime == "application/octet-stream")
                    {
                  ?>
                  <audio controls>
                    <source src="<?php echo $filePath; ?>" type="audio/ogg">
                      Your browser does not support the audio element.
                  </audio>
                  <?php 
                    }
                    else
                    {
                  ?>
                  <embed src="<?php echo $filePath; ?>" type="<?php echo $fileMime; ?>" class="fit-card">
                  <?php 
                    }
                  ?>
                  <a href="<?php echo $filePath; ?>" download><button type="button" class="btn btn-outline-success pull-right"> <i class="fas fa-download"></i> Download </button> </a>
                  <h6 class="text-left"> <?php echo $res['filename'];?> <br> <span class="text-danger mt-3"> <?php echo $res['size'];?></span> </h6>
                  <div class="switch comp pull-right">
                    <input type="hidden" value="<?php echo $res['fileId'];?>" class="check_value2">
                    <label>
                      Incomplete
                      <input type="checkbox" checked="checked">
                      <span class="lever"></span> Complete
                    </label>
                  </div>
                </div>
              </div>
            </div>
          <!--Grid column-->
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
      <div class="card-footer text-muted success-color white-text">
        <p class="mb-0 text-center text-light">End of completed Files!</p>
      </div>
    </div>
    <!-- Panel -->

    <!-- Panel -->
    <div class="card text-center mt-3" id="all">
      <div class="card-header primary-color white-text">
        <i class="fas fa-globe-asia fa-2x mb-3" aria-hidden="true"></i> <h4> All Files</h4>
      </div>
      <div class="card-body text-left">
        <?php 
          $query = mysqli_query($con, "SELECT * FROM coursecontent WHERE courseid='$courseid'");
          while ($row = mysqli_fetch_array($query))
          {
        ?>
            <h4 class="font-weight-bold mt-4 title-1">
              <strong><?php echo $row['title']; ?></strong>
            </h4>
            <hr class="blue mb-5">
        <?php
            $start=0;
            $contentid = $row['id'];
            $files = mysqli_query($con, "SELECT * FROM coursefiles JOIN filestatus ON coursefiles.id=filestatus.fileId WHERE coursefiles.contentid='$contentid'");
            while($res = mysqli_fetch_array($files))
            {
              if($start % 3 == 0)
              {
                echo '<div class="row">';
              }
              $target_dir = "../assets/img/coursefiles/".$coursename."/"; 
              $filePath = $target_dir.$res["filename"]; 
              $fileMime = mime_content_type($filePath);
        ?>
            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card">
                <div class="card-body">
                  <?php 
                    if($fileMime == "image/png")
                    {
                  ?>
                    <img src="<?php echo $filePath; ?>" type="<?php echo $fileMime; ?>" class="fit-card">
                  <?php 
                    }
                    else if($fileMime == "video/mp4")
                    {
                  ?>
                    <video class="fit-card" controls>
                      <source src="<?php echo $filePath; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                  <?php 
                    }
                    else if($fileMime == "application/octet-stream")
                    {
                  ?>
                  <audio controls>
                    <source src="<?php echo $filePath; ?>" type="audio/ogg">
                      Your browser does not support the audio element.
                  </audio>
                  <?php 
                    }
                    else
                    {
                  ?>
                  <embed src="<?php echo $filePath; ?>" type="<?php echo $fileMime; ?>" class="fit-card">
                  <?php 
                    }
                  ?>
                  <a href="<?php echo $filePath; ?>" download><button type="button" class="btn btn-outline-success pull-right"> <i class="fas fa-download"></i> Download </button> </a>
                  <h6 class="text-left"> <?php echo $res['filename'];?> <br> <span class="text-danger mt-3"> <?php echo $res['size'];?></span> </h6>
                </div>
              </div>
            </div>
          <!--Grid column-->
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
      <div class="card-footer text-muted primary-color white-text">
        <p class="mb-0 text-center text-light">End of All Files!</p>
      </div>
    </div>
    <!-- Panel -->
  </div>
</div>
</div>

  <?php include_once('includes/footer.php');?>

  <!-- Modal: Login / Register Form Demo -->
        <div class="modal fade wow animated rotateIn" data-wow-delay="0.5s" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog cascading-modal" role="document">
            <!-- Content -->
            <div class="modal-content">

              <!-- Modal cascading tabs -->
              <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="nav md-tabs tabs-2 bcolor darken-3" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#panel17" role="tab"><i class="fas fa-user mr-1"></i>
                      Student Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel18" role="tab"><i class="fas fa-user mr-1"></i>
                      Staff Login</a>
                  </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                  <!-- Panel 17 -->
                  <div class="tab-pane fade in show active" id="panel17" role="tabpanel">

                    <!-- Body -->
                    <form action="backend.php" method="post">
                    <div class="modal-body mb-1">
                      <div class="md-form form-sm">
                        <i class="fas fa-envelope prefix"></i>
                        <input type="email" id="form2" name="student_email" class="form-control form-control-sm">
                        <label for="form2">Student email</label>
                      </div>

                      <div class="md-form form-sm">
                        <i class="fas fa-lock prefix"></i>
                        <input type="password" id="form3" name="student_password" class="form-control form-control-sm">
                        <label for="form3">Student password</label>
                      </div>
                      <div class="text-center mt-2">
                        <button class="btn btn-info" type="submit" name="student_login">Login <i class="fas fa-sign-in-alt ml-1"></i></button>
                      </div>
                    </div>
                    </form>
                    <!-- Footer -->
                    <div class="modal-footer">
                      <div class="options text-center text-md-right mt-1">
                        <p><a href="#" class="blue-text">Forgot Password?</a></p>
                      </div>
                      <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                    </div>

                  </div>
                  <!-- Panel 7 -->

                  <!-- Panel 18 -->
                  <div class="tab-pane fade" id="panel18" role="tabpanel">

                    <!-- Body -->
                    <form action="backend.php" method="post">
                    <div class="modal-body mb-1">
                      <div class="md-form form-sm">
                        <i class="fas fa-envelope prefix"></i>
                        <input type="email" id="form2" name="staff_email" class="form-control form-control-sm">
                        <label for="form2">Staff email</label>
                      </div>

                      <div class="md-form form-sm">
                        <i class="fas fa-lock prefix"></i>
                        <input type="password" id="form3" name="staff_password" class="form-control form-control-sm">
                        <label for="form3">Staff password</label>
                      </div>
                      <div class="text-center mt-2">
                        <button class="btn btn-info" type="submit" name="staff_login">Login <i class="fas fa-sign-in-alt ml-1"></i></button>
                      </div>
                    </div>
                    </form>
                    <!-- Footer -->
                    <div class="modal-footer">
                      <div class="options text-center text-md-right mt-1">
                        <p><a href="#" class="blue-text">Forgot Password?</a></p>
                      </div>
                      <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                    </div>
                  <!-- Panel 8 -->
                </div>

              </div>
            </div>
            <!-- Content -->
          </div>
        </div>
        <!-- Modal: Login / Register Form Demo -->
        

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
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });

    // Material Select Initialization
    $(document).ready(function () {
      $('.mdb-select').material_select();
    });

    // MDB Lightbox Init
    $(function () {
      $("#mdb-lightbox-ui").load("assets/mdb-addons/mdb-lightbox-ui.html");
    });

    // SideNav Initialization
    $(".button-collapse").sideNav();

    $(document).ready(function()
    {
      $("#ongoing").show();
      $("#completed").hide();
      $("#all").hide();
      $('#ong, #comp, #al').change(function () {
        if ($("#ong").is(":checked")) {
            $("#ongoing").show();
            $("#completed").hide();
            $("#all").hide();
        }
        else if ($("#comp").is(":checked")) {
            $("#ongoing").hide();
            $("#completed").show();
            $("#all").hide();
        }
        else
        { 
            $("#ongoing").hide();
            $("#completed").hide();
            $("#all").show();
        }
        }); 
    });

    jQuery(document).ready(function($){
      $('.ong').change(function(e){
        var check = $(this).closest(".switch").find('.check_value').val();
          $.ajax({
              type: "POST",
              url: "../backend.php",
              data: {
                  "switch_val" : 1,
                  "file_id" : check,
              },
              success: function(response)
              {
                  swal("Marked as Completed!",{
                     icon: "success",
                  }).then((result) => {
                    location.reload();
                  });
              }
           });
        });
    });

    jQuery(document).ready(function($){
      $('.comp').change(function(e){
        var check2 = $(this).closest(".switch").find('.check_value2').val();
          $.ajax({
              type: "POST",
              url: "../backend.php",
              data: {
                  "switch_val2" : 1,
                  "file_id2" : check2,
              },
              success: function(response)
              {
                  swal("Marked as Inomplete!",{
                     icon: "success",
                  }).then((result) => {
                    location.reload();
                  });
              }
           });
        });
    });


  </script>

</body>

</html>
