<?php 
  include('database.php');
  require 'backend.php';

  $id = '';
  $type = '';
  if(isset($_GET['user']) && isset($_GET['type']))
  {
    $id = $_GET['user'];
    $type = $_GET['type'];
  }
  else
  {
    //header("Location : ../index.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Expertise Learning :: Reset Password</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="assets/css/mdb.min.css">
  <!-- Animations -->
  <link rel="stylesheet" href="assets/css/modules/animations-extended.min.css">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <script src="assets/js/sweetalert.js"></script>

  <style type="text/css">
    body:not(.modal-open){
      padding-right: 0px !important;
    }

    .img-fluid{
      width: 100%;
      height: 15vw;
      object-fit: cover;
    }
    
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-dark">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-11 d-flex align-items-center">
          <!-- <a href="index.html" class="logo mr-auto"> </a> -->
          <h1 class="logo mr-auto"> <a href="index.php">Expertise Learning </a> </h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          </div>
      </div>

    </div>
  </header><!-- End Header -->
  <br><br><br>

    <div class="container my-5 py-5 z-depth-1">


    <!--Section: Content-->
    <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">
 

      <!--Grid row-->
      <div class="row d-flex justify-content-center">

        <!--Grid column-->
        <div class="col-md-6">

          <!-- Default form login -->
          <form class="text-center" action="#!">

            <p class="h4 mb-4"> <strong> Forgot password! </strong> </p>

            <!-- Email -->
            <div class="md-form mt-1 mb-4 wow animated bounceInDown" data-wow-delay="0.5s">
              <input type="password" id="form1" class="form-control" value="" required>
              <label class="form-check-label" for="form1" class="">New Password</label>
            </div>
  
            <div class="md-form mt-1 mb-4 wow animated bounceInDown" data-wow-delay="0.5s">
              <input type="password" id="form2" class="form-control" value="" required>
              <label class="form-check-label" for="form2" class="">Confirm New Password</label>
            </div>

            <div class="text-right">
                <button class="btn btn-flat waves-effect">Cancel</button>
                <button class="btn btn-success" id="change">Submit</button>
              </div>
            </div>

          </form>
          <!-- Default form login -->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->


    </section>
    <!--Section: Content-->


  </div>

  
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <?php
    if(isset($_SESSION["status_subscribe"]) && isset($_SESSION["message_subscribe"]))
      {
    ?>
        <script>
          swal({
            title: "Subscribe",
            text: "<?php echo $_SESSION["message_subscribe"]; ?>",
            icon: "<?php echo $_SESSION["status_subscribe"]; ?>",
            button: "Okay!",
        });
        </script>
    <?php
        unset($_SESSION['status_subscribe']);
        unset($_SESSION['message_subscribe']);
      }
    ?>


    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Expertise Learning</h3>
            <p>Our efforts to provide students strong educational digital platform, as we believe we are responsible not just for enabling our students to learn but also to understand every minor details.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right animate__animated animate__fadeInUp"></i> <a href="">Home</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#about">About us</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Courses</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#team">Teams</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#contact">Contact Us</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              8, Saboo Siddik Polytechnic Road <br>
              Maharashtra, Mumbai - 400008 <br>
              India <br>
              <strong>Phone:</strong> +91 9321 3910 48<br>
              <strong>Email:</strong> help@expertise.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Subscribe to our newsletter and get notified for new updates and features</p>
            <form action="backend.php" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe" name="subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright : 2020 <strong>Expertise Learning</strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- JQuery -->
  <script src="assets/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="assets/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="assets/js/bootstrap.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="assets/js/mdb.min.js"></script>

  <script>
    $("#change").click(function(){
    var pass1 = $("#form1").val();
    var pass2 = $("#form2").val();
    if(pass1 == "" || pass2 == "")
    {
      swal("Both Fields are Mandatory!",{icon: "error"})
    }
    else if(pass1 == pass2)
    {
      $.ajax({
            type: 'POST',
            url: 'backend.php?id=<?php echo $id;?>&type=<?php echo $type;?>',
            data: {"password" : pass1, "pass": 1},
            success: function(data)
            {
              window.location.href ='index.php';
            }
        });
    }
    else
    {
      swal("Both the Password should be same!",{icon: "warning"}) 
    }
  });
  </script>  

</body>

</html>