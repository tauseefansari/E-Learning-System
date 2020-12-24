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
      width: 100%;
      height: 15vw;
      object-fit: cover;
    }
  </style>

</head>

<body class="animated">

  <?php include_once('includes/header.php'); ?>

  <?php 
    $query = mysqli_query($con, "SELECT * FROM staff WHERE id = '$id'");
    $res = mysqli_fetch_array($query);
  ?>

  <!-- Main Container -->
  <div class="container mt-3 pt-3">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mt-5 mb-2 wow animated slideIn" data-wow-delay="0.2s">

      <!-- Navbar brand -->
      <a class="h3 font-weight-bold white-text mr-4 p-2 ml-auto" href="mycourses.php"><?php echo $res['name'];?>'s Courses</a>

      <!-- Collapsible content -->
      <div class="navbar-nav ml-auto" id="navbarSupportedContent1">

      </div>
      <!-- Collapsible content -->

    </nav>

    <!-- Navbar -->

  <!-- Inside Main Container -->
  <div class="container wow animated bounce">
    <?php 
        $results_per_page = 9;
            $where = "";
            $where = "WHERE takenBy = '$manageBy'";
            $query = mysqli_query($con, "SELECT * FROM courses ".$where);  
            $num_of_pages = ceil(mysqli_num_rows($query)/$results_per_page);
            if($num_of_pages <= 0)
              echo "<p class='h3 responsive text-center mt-5 font-weight-bold'> No Results found! </p>";
      ?>

    <div class="row pt-4">

      <!-- Content -->
      <div class="col-lg-12">

        <!-- Products Grid -->
        <section class="section pt-3">

          <!-- Grid row -->
          <div class="row">
          <?php

            if(!isset($_GET['page']))
            {
              $page=1;
            }
            else
            {
              $page=$_GET['page'];
            }

            $page_result = ($page - 1)*$results_per_page;

            $query2 = mysqli_query($con, "SELECT * FROM courses ".$where." LIMIT ".$page_result." , 3");

            while($row = mysqli_fetch_array($query2))
            {
          ?>
              <!-- Grid column -->
              <div class="col-lg-4 col-md-12 mb-4 wow animated bounceInRight" data-wow-delay="0.3s">

                <!-- Card -->
                <div class="card card-ecommerce">

                  <!-- Card image -->
                  <div class="view overlay">

                    <img src="../assets/img/courses/<?php echo $row['profilePic']; ?>" class="img-fluid"
                      alt="">

                    <a href="addcontent.php?course=<?php echo $row['id']; ?>">

                      <div class="mask rgba-white-slight"></div>

                    </a>

                  </div>
                  <!-- Card image -->

                  <!-- Card content -->
                  <div class="card-body">

                    <!-- Category & Title -->
                    <h5 class="card-title mb-1">

                      <strong>

                        <a href="addcontent.php?course=<?php echo $row['id']; ?>" class="dark-grey-text"><?php echo $row['name']; ?></a>

                      </strong>

                    </h5>

                    <?php echo $row['badge']; ?>

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

                          <strong>₹ <?php echo $row['price']; ?></strong>

                        </span>

                        <!-- <span class="float-right">

                          <a class="" data-toggle="tooltip" data-placement="top" title="Requst to Purchase">

                            <i class="fas fa-edit ml-3"></i>

                          </a>

                        </span> -->

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
          <!-- Grid row -->

          <!-- Grid row -->
          <div class="row">
          <?php

            $query3 = mysqli_query($con, "SELECT * FROM courses ".$where." LIMIT ".($page_result+3)." , 3");

            while($row = mysqli_fetch_array($query3))
            {
          ?>
              <!-- Grid column -->
              <div class="col-lg-4 col-md-12 mb-4 wow animated bounceInLeft" data-wow-delay="0.3s">

                <!-- Card -->
                <div class="card card-ecommerce">

                  <!-- Card image -->
                  <div class="view overlay">

                    <img src="../assets/img/courses/<?php echo $row['profilePic']; ?>" class="img-fluid"
                      alt="">

                    <a href="addcontent.php?course=<?php echo $row['id']; ?>">

                      <div class="mask rgba-white-slight"></div>

                    </a>

                  </div>
                  <!-- Card image -->

                  <!-- Card content -->
                  <div class="card-body">

                    <!-- Category & Title -->
                    <h5 class="card-title mb-1">

                      <strong>

                        <a href="addcontent.php?course=<?php echo $row['id']; ?>" class="dark-grey-text"><?php echo $row['name']; ?></a>

                      </strong>

                    </h5>

                    <?php echo $row['badge']; ?>

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

                          <strong>₹ <?php echo $row['price']; ?></strong>

                        </span>

                        <!-- <span class="float-right">

                          <a class="" data-toggle="tooltip" data-placement="top" title="Requst to Purchase">

                            <i class="fas fa-edit ml-3"></i>

                          </a>

                        </span> -->

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
          <!-- Grid row -->

          <!-- Grid row -->
          <div class="row">
          <?php

            $query4 = mysqli_query($con, "SELECT * FROM courses ".$where." LIMIT ".($page_result+6)." , 3");

            while($row = mysqli_fetch_array($query4))
            {
          ?>
              <!-- Grid column -->
              <div class="col-lg-4 col-md-12 mb-4 wow animated bounceInRight" data-wow-delay="0.3s">

                <!-- Card -->
                <div class="card card-ecommerce">

                  <!-- Card image -->
                  <div class="view overlay">

                    <img src="../assets/img/courses/<?php echo $row['profilePic']; ?>" class="img-fluid"
                      alt="">

                    <a href="addcontent.php?course=<?php echo $row['id']; ?>">

                      <div class="mask rgba-white-slight"></div>

                    </a>

                  </div>
                  <!-- Card image -->

                  <!-- Card content -->
                  <div class="card-body">

                    <!-- Category & Title -->
                    <h5 class="card-title mb-1">

                      <strong>

                        <a href="addcontent.php?course=<?php echo $row['id']; ?>" class="dark-grey-text"><?php echo $row['name']; ?></a>

                      </strong>

                    </h5>

                    <?php echo $row['badge']; ?>

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

                          <strong>₹ <?php echo $row['price']; ?></strong>

                        </span>

                        <!-- <span class="float-right">

                          <a class="" data-toggle="tooltip" data-placement="top" title="Requst to Purchase">

                            <i class="fas fa-edit ml-3"></i>

                          </a>

                        </span> -->

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
          <!-- Grid row -->


          <!-- Grid row -->
          <div class="row justify-content-center mb-4">

            <!-- Pagination -->
            <nav class="mb-4">

              <ul class="pagination pagination-circle pg-blue mb-0">

                <!-- First -->
                <li class="page-item clearfix d-none d-md-block">

                  <a class="page-link waves-effect waves-effect <?php if($page==1){ echo 'disabled';}?>" href="mycourses.php?page=1">First</a>

                </li>
                <!-- Arrow left -->
                <li class="page-item">

                  <a class="page-link waves-effect waves-effect <?php if($page==1){ echo 'disabled';}?>" aria-label="Previous" href="mycourses.php?page=<?php echo $page-1; ?>">

                    <span aria-hidden="true">«</span>

                    <span class="sr-only">Previous</span>

                  </a>

                </li>

              <?php 
                for($i = 1; $i <=$num_of_pages;$i++)
                {
              ?>
                  <li class="page-item <?php if($page==$i){ echo 'active';}?>">

                  <a class="page-link waves-effect waves-effect" href="mycourses.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>

                </li>
              <?php  
                  }
                ?>
                <!-- Arrow right -->
                <li class="page-item">

                  <a class="page-link waves-effect waves-effect <?php if($page==$num_of_pages){ echo 'disabled';}?>" aria-label="Next" href="mycourses.php?page=<?php echo $page+1; ?>">

                    <span aria-hidden="true">»</span>

                    <span class="sr-only">Next</span>

                  </a>

                </li>

                <!-- First -->
                <li class="page-item clearfix d-none d-md-block">

                  <a class="page-link waves-effect waves-effect <?php if($page==$num_of_pages){ echo 'disabled';}?>" href="mycourses.php?page=<?php echo $num_of_pages; ?>">Last</a>

                </li>

              </ul>

            </nav>
            <!-- Pagination -->

          </div>
          <!-- Grid row -->

        </section>
        <!-- Products Grid -->

      </div>
      <!-- Content -->

    </div>

  </div>
  <!-- Inside Main Container -->
</div>
    

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
