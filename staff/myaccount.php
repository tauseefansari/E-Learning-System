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

    .card.card-cascade .view.gradient-card-header {
        padding: 1.1rem 1rem;
    }

    .card.card-cascade .view {
        box-shadow: 0 5px 12px 0 rgba(0, 0, 0, 0.2), 0 2px 8px 0 rgba(0, 0, 0, 0.19);
    }

    .multiple-select-dropdown li [type=checkbox]+label {
      height: 1rem;
    }

    .img-fluid{
      width: 200px;
      height: 200px;
    }

    nav ul li.active{
      background-color :  #18d26e;
    }

  </style>

</head>

<body class="animated">

  <?php include_once('includes/header.php'); ?>

  <?php 
    $query = mysqli_query($con, "SELECT * FROM staff WHERE id = '$id'");
    $res = mysqli_fetch_array($query);
  ?>

  <?php
      if(isset($_SESSION["uploaded_staff"]))
        {
          $status="";
          if($_SESSION['uploaded_staff']=="Profile Picture Updated Successfully")
          {
            $status = "success";  
          }
          else if($_SESSION['uploaded_staff']=="Profile Picture is invalid Format")
          {
            $status = "warning";  
          }
          else
          {
            $status = "error";
          }
      ?>
          <script>
            swal({
              title: "Profile Picture",
              text: "<?php echo $_SESSION["uploaded_staff"]; ?>",
              icon: "<?php echo $status; ?>",
              button: "Okay!",
          });
          </script>
      <?php
          unset($_SESSION['uploaded_staff']);
        }
      ?>

      <?php
      if(isset($_SESSION["updated_staff"]))
        {
          $status="";
          if($_SESSION['updated_staff']=="Staff Details Updated Successfully")
          {
            $status = "success";  
          }
          else
          {
            $status = "error";
          }
      ?>
          <script>
            swal({
              title: "Staff Account",
              text: "<?php echo $_SESSION["updated_staff"]; ?>",
              icon: "<?php echo $status; ?>",
              button: "Okay!",
          });
          </script>
      <?php
          unset($_SESSION['updated_staff']);
        }
      ?>

  <!-- Main layout -->
  <main>
    <div class="container py-3">

      <!-- Section: Edit Account -->
      <section class="section">
        <!-- First row -->
        <div class="row">
          <!-- First column -->
          <div class="col-lg-4 mb-4">

            <!-- Card -->
            <div class="card card-cascade narrower wow animated flipInY" data-wow-delay="0.3s">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header bg-success lighten-3">
                <h5 class="mb-0 font-weight-bold">Edit Photo</h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">
                <img src="../assets/img/profile/<?php echo $res['profilePic']; ?>" alt="User Photo" class="z-depth-1 mb-3 mx-auto rounded-circle img-fluid" />

                <p class="text-muted"><small>Browse to select profile picture</small></p>
                <div class="row flex-center">
                  <button class="btn btn-success btn-rounded btn-sm" data-toggle="modal" data-target="#myModal">Change Photo</button><br>
                </div>
              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>
          <!-- First column -->

          <!-- Second column -->
          <div class="col-lg-8 mb-4 wow animated flipInX">

            <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header bg-success lighten-3">
                <h5 class="mb-0 font-weight-bold">Edit Account</h5>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade text-center">

                <!-- Edit Form -->
                <form method="post" action="../backend.php">
                  <!-- First row -->

                  <div class="row">

                    <!-- First column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input type="text" id="form1" class="form-control validate" name="name" value="<?php echo $res['name']; ?>">
                        <label for="form1" data-error="wrong" data-success="right">Staff Name</label>
                      </div>
                    </div>
                    <!-- Second column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input type="email" id="form2" class="form-control validate" name="email" value="<?php echo $res['email']; ?>">
                        <label for="form2" data-error="wrong" data-success="right">Email</label>
                      </div>
                    </div>
                  </div>
                  <!-- First row -->

                  <!-- First row -->
                  <div class="row">
                    <!-- First column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label style="margin-top: -40px;">Qualification</label>
                        <select name="qualification" id="qualification" class="form-control" required>
                          <option value="<?php echo $res['qualification']; ?>"><?php echo $res['qualification']; ?></option>
                          <option value="Diploma">Diploma</option>
                          <option value="Engineer">Engineer</option>
                          <option value="Masters">Masters</option>
                          <option value="Others">Others</option>
                      </select>
                      </div>
                    </div>

                    <!-- Second column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input type="text" id="form82" class="form-control validate" name="mobile" pattern="\d*" maxlength="10" value="<?php echo $res['mobile']; ?>">
                        <label for="form82" data-error="wrong" data-success="right">Mobile</label>
                      </div>
                    </div>
                  </div>
                  <!-- First row -->

                  <!-- Second row -->
                  <div class="row">

                    <!-- First column -->
                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <input type="text" id="form76" class="form-control validate" value="<?php echo $res['joiningDate']; ?>" disabled>
                        <label for="form76">Joining Date</label>
                      </div>
                    </div>
                    <!-- Second column -->

                    <div class="col-md-6">
                      <div class="md-form mb-0">
                        <label style="margin-top: -40px;">Expertise In</label>
                        <select name="subject" id="subject" class="form-control" required>
                          <option value="<?php echo $res['subjectTaken']; ?>"><?php echo $res['subjectTaken']; ?></option>
                          <?php 
                            $query = mysqli_query($con, "SELECT * FROM courses");
                            while ($row = mysqli_fetch_array($query))
                            {
                          ?>
                            <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                          <?php
                            }
                          ?>
                      </select>
                      </div>
                    </div>
                  </div>
                  <!-- Second row -->

                  <!-- Third row -->
                  <div class="row">

                    <!-- First column -->
                    <div class="col-md-12">
                      <div class="md-form mb-0">
                        <textarea type="text" id="form78" name="address" class="md-textarea form-control" rows="3"><?php echo $res['address']; ?></textarea>
                        <label for="form78">Address</label>
                      </div>
                    </div>
                  </div>
                  <!-- Third row -->

                  <!-- Fourth row -->
                  <div class="row">
                    <div class="col-md-12 text-center my-4">
                      <input type="submit" value="Update Account" name="update_staff" class="btn btn-success btn-rounded">
                    </div>
                  </div>
                  <!-- Fourth row -->

                </form>
                <!-- Edit Form -->

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>
          <!-- Second column -->

        </div>
        <!-- First row -->

      </section>
      <!-- Section: Edit Account -->

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


<div class="modal fade wow animated rotateIn" id="myModal" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
          <div class="modal-header text-center bg-warning text-white">
            <h4 class="modal-title w-100 font-weight-bold">Change Profile Picture</h4>
          </div>

      <form class="text-center p-5" method="post" action="../backend.php" enctype="multipart/form-data"> 
        <!-- image -->
        <div class="bgColor">
          <div id="targetOuter">
            <div id="targetLayer"></div>
            <img src="" class="icon-choose-image" />
            <div class="icon-choose-image">
            <input name="propic" id="propic" type="file" class="inputFile" onChange="showPreview(this);">
            </div>
          </div>
        </div>
          <!-- Send button -->
          <button class="btn btn-info btn-md ok mt-3" data-toggle="modal" data-target="#myModal" style="visibility: hidden;" name="upload_staff" type="submit">Upload</button>
          <button class="btn btn-danger btn-md mt-3" data-dismiss="modal" aria-label="Close">Cancel</button>
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

    function showPreview(objFileInput) {
        if (objFileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
          $("#targetLayer").html('<img src="'+e.target.result+'" width="200px" height="200px" style="border-radius: 100px;" class="upload-preview" />');
          $(".icon-choose-image").css('opacity','1.0');
          $(".ok").css('visibility','visible');
        }
        fileReader.readAsDataURL(objFileInput.files[0]);
        }
    }

    

  </script>

</body>

</html>
