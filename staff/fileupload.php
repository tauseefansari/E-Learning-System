<?php 
  require '../database.php';
  require '../backend.php';

  if(isset($_SESSION['staff_id']))
  {
  	$id=$_SESSION['staff_id'];
  	$manageBy = $_SESSION['login_staff'];
  }
  else
  {
    header("Location: ../index.php");
  }

  if(isset($_GET['contentid']))
  {
    $contentid = $_GET['contentid'];
    $_SESSION['contentid'] = $contentid;
  }

  if(isset($_SESSION['courseid']))
  {
    $courseid = $_SESSION['courseid'];
    $query = mysqli_query($con, "SELECT * FROM courses WHERE id = '$courseid'");
      $row = mysqli_fetch_array($query);
    $coursename = $row['name']; 
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
  <link href="../assets/img/favicon.png" rel="icon">
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <link href="../assets/css/dropzone.css" rel="stylesheet" type="text/css">

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

  <script type="text/javascript" src="../assets/js/jquery-3.4.1.min.js"></script>

  <script src="../assets/js/dropzone.js" type="text/javascript"></script>

  <style type="text/css">
    .fit-card{
      width: 100%;
      height: 15vw;
      object-fit: cover;
    }
  </style>
 
</head>

<body class="animated">

  <?php include_once('includes/header.php'); ?>

  <!-- Main layout -->
  <main>

    <div class="container my-5">

  <!-- Section -->
  <section>
    <!--First row-->
    <div class="row wow animated lightSpeedIn">

      <!--First column-->
      <div class="col-12">

        <form action="upload.php" class="dropzone" id="myAwesomeDropzone"> </form>

      </div>
      <!--First column-->
      <div class="col-lg-12 text-center mt-3">
        <a href="addcontent.php?course=<?php echo $_SESSION['courseid']; ?>" class="btn btn-secondary ml-auto"> < Back to Contents </a>
        <a href="javascript:void(0)" class="btn btn-primary ml-auto finish_upload"> Finish Upload </a>
      </div>

    </div>
    <!--First row-->
    
    <!--Tab panels-->
    <div class="tab-content mb-5">
      <!--Section: Content-->
    <section class="text-center">

      <!--Grid row-->
      <div class="row wow animated bounceInDown" data-wow-delay="0.2s">

        <?php
          $target_dir = "../assets/img/coursefiles/".$coursename."/"; 
          $query = mysqli_query($con, "SELECT * FROM coursefiles WHERE contentid = '$contentid'");
          while ($row = mysqli_fetch_array($query))
          {
            $filePath = $target_dir.$row["filename"]; 
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
              <input type="hidden" name="id" value="<?php echo $row['id'];?>" class="delete_id_value">
              <input type="hidden" name="file" value="<?php echo $filePath;?>" class="delete_file_value">
              <h6 class="text-left"> <?php echo $row['filename'];?> <br> <span class="text-danger mt-3"> <?php echo $row['size'];?></span><a href="javascript:void(0)" class="btn btn-danger pull-right delete_btn_ajax"> <i class="fa fa-trash"></i> </a> </h6>
            </div>
          </div>
        </div>
        <!--Grid column-->
        <?php 
          }
        ?>
        
      </div>
      <!--Grid row-->


    </section>
    <!--Section: Content-->
    </div>
  </section>
  <!-- Section -->

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
        <button class="btn btn-danger" type="submit" name="change_password_staff">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>

  <!-- Footer -->
  <!-- SCRIPTS -->
  <!-- JQuery -->

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

  Dropzone.autoDiscover = false;
        $(".dropzone").dropzone({
            dictDefaultMessage: '<span> Drag and Drop Files Here to Upload <br> <i class="fa fa-cloud-upload fa-3x"></i> <span>',
            addRemoveLinks: true,
            removedfile: function(file) {
                var name = file.name;    
                $.ajax({
                    type: 'POST',
                    url: 'upload.php',
                    data: {name: name,request: 2},
                    sucess: function(data){
                        console.log('success: ' + data);
                    }
                });
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }
        });


    jQuery(document).ready(function($){
      $('.delete_btn_ajax').click(function(e){
            var deleteid = $(this).closest("div").find('.delete_id_value').val();
            var deletefile = $(this).closest("div").find('.delete_file_value').val();
            swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover this file!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "upload.php",
                        data: {
                            "delete_btn_set" : 1,
                            "delete_id" : deleteid,
                            "delete_file" : deletefile,
                        },
                        success: function(response)
                        {
                            swal("File Deleted Successfully!",{
                               icon: "success",
                            }).then((result) => {
                              location.reload();
                            });
                        }
                    });
                  }
               });
        });

      $('.finish_upload').click(function(e){
        e.preventDefault();
        location.reload();
      });
    });

</script>

</body>

</html>
