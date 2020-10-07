<?php 
    include('database.php');

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Expertise Learning :: Courses</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="assets/css/mdb.min.css" rel="stylesheet">
  
  <!-- Favicons -->
  <link href="assets/assets/img/favicon.png" rel="icon">
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
  
  <style type="text/css">

  	body:not(.modal-open){
      padding-right: 0px !important;
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

<body class="hidden-sn white-skin animated">

  <?php include_once('includes/header.php');?>

  <!-- Main Container -->
  <div class="container mt-5 pt-3">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark primary-color mt-5 mb-2">

      <!-- Navbar brand -->
      <a class="font-weight-bold white-text mr-4" href="courses.php">Our Courses</a>

      <!-- Collapsible content -->
      <div class="navbar-nav ml-auto" id="navbarSupportedContent1">

        <!-- Search form -->
        <form class="search-form ml-auto mx-2" role="search" name="ser">

          <div class="form-group md-form my-0 waves-light">

            <input type="search" name="search" class="form-control" placeholder="Search" onkeypress="handle(event)">

          </div>

        </form>

      </div>
      <!-- Collapsible content -->

    </nav>

    <!-- Navbar -->

    <!-- Inside Main Container -->
  <div class="container wow animated bounce">
    <?php 
        $results_per_page = 9;
            $where = "";

            if(isset($_GET['search']))
            {
              $search=$_GET['search'];
              $where = "WHERE name LIKE '%$search%' OR domain LIKE '%$search%'";
              $query = mysqli_query($con, "SELECT * FROM courses ".$where);  
            }
            else
            {
              $query = mysqli_query($con, "SELECT * FROM courses");
            }

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

                    <img src="assets/img/courses/<?php echo $row['profilePic']; ?>" class="img-fluid"
                      alt="">

                    <a href="courseinfo.php?course=<?php echo $row['id']; ?>">

                      <div class="mask rgba-white-slight"></div>

                    </a>

                  </div>
                  <!-- Card image -->

                  <!-- Card content -->
                  <div class="card-body">

                    <!-- Category & Title -->
                    <h5 class="card-title mb-1">

                      <strong>

                        <a href="courseinfo.php?course=<?php echo $row['id']; ?>" class="dark-grey-text"><?php echo $row['name']; ?></a>

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

                    <img src="assets/img/courses/<?php echo $row['profilePic']; ?>" class="img-fluid"
                      alt="">

                    <a href="courseinfo.php?course=<?php echo $row['id']; ?>">

                      <div class="mask rgba-white-slight"></div>

                    </a>

                  </div>
                  <!-- Card image -->

                  <!-- Card content -->
                  <div class="card-body">

                    <!-- Category & Title -->
                    <h5 class="card-title mb-1">

                      <strong>

                        <a href="courseinfo.php?course=<?php echo $row['id']; ?>" class="dark-grey-text"><?php echo $row['name']; ?></a>

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

                    <img src="assets/img/courses/<?php echo $row['profilePic']; ?>" class="img-fluid"
                      alt="">

                    <a href="courseinfo.php?course=<?php echo $row['id']; ?>">

                      <div class="mask rgba-white-slight"></div>

                    </a>

                  </div>
                  <!-- Card image -->

                  <!-- Card content -->
                  <div class="card-body">

                    <!-- Category & Title -->
                    <h5 class="card-title mb-1">

                      <strong>

                        <a href="courseinfo.php?course=<?php echo $row['id']; ?>" class="dark-grey-text"><?php echo $row['name']; ?></a>

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

                  <a class="page-link waves-effect waves-effect <?php if($page==1){ echo 'disabled';}?>" href="courses.php?page=1">First</a>

                </li>
                <!-- Arrow left -->
                <li class="page-item">

                  <a class="page-link waves-effect waves-effect <?php if($page==1){ echo 'disabled';}?>" aria-label="Previous" href="courses.php?page=<?php echo $page-1; ?>">

                    <span aria-hidden="true">«</span>

                    <span class="sr-only">Previous</span>

                  </a>

                </li>

              <?php 
                for($i = 1; $i <=$num_of_pages;$i++)
                {
              ?>
                  <li class="page-item <?php if($page==$i){ echo 'active';}?>">

                  <a class="page-link waves-effect waves-effect" href="courses.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>

                </li>
              <?php  
                  }
                ?>
                <!-- Arrow right -->
                <li class="page-item">

                  <a class="page-link waves-effect waves-effect <?php if($page==$num_of_pages){ echo 'disabled';}?>" aria-label="Next" href="courses.php?page=<?php echo $page+1; ?>">

                    <span aria-hidden="true">»</span>

                    <span class="sr-only">Next</span>

                  </a>

                </li>

                <!-- First -->
                <li class="page-item clearfix d-none d-md-block">

                  <a class="page-link waves-effect waves-effect <?php if($page==$num_of_pages){ echo 'disabled';}?>" href="courses.php?page=<?php echo $num_of_pages; ?>">Last</a>

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
  <!-- Main Container -->

  </main>

    <?php include_once('includes/footer.php');?>

  <!-- Modal: Login / Register Form Demo -->
        <div class="modal fade wow animated rotateIn" data-wow-delay="0.8s" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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

  <!-- Footer -->
  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="assets/js/jquery-3.4.1.min.js"></script>

  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="assets/js/popper.min.js"></script>

  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="assets/js/mdb.min.js"></script>

  <script type="text/javascript">
    /* WOW.js init */

    new WOW().init();
    // Tooltips Initialization

    $(function () {

      $('[data-toggle="tooltip"]').tooltip()
    })

    let slider = $("#calculatorSlider");
    let reseller = $("#resellerEarnings");
    let client = $("#clientPrice");
    let percentageBonus = 30; // = 30%

    let license = {
      corpo: {
        active: true,
        price: 319,
      },
      dev: {
        active: false,
        price: 149,
      },
      priv: {
        active: false,
        price: 79,
      }
    }

    function calculate(price, value) {

      client.text((Math.round((price - (value / 100 * price)))) + '$');
      reseller.text((Math.round(((percentageBonus - value) / 100 * price))) + '$')
    }

    slider.on('input change', e => {

      if (license.priv.active) {

        calculate(license.priv.price, $(e.target).val());
      } else if (license.corpo.active) {

        calculate(license.corpo.price, $(e.target).val());
      } else if (license.dev.active) {

        calculate(license.dev.price, $(e.target).val());
      }
    })

    // Material Select Initialization
    $(document).ready(function () {

      $('.mdb-select').material_select();
    });

    // SideNav Initialization
    $(".button-collapse").sideNav();

    function handle(e){
      var search = document.forms["ser"]["search"].value;
        if(e.keyCode === 13){
            e.preventDefault(); // Ensure it is only this code that rusn
            window.location = 'courses.php?search='+search;
        }
    }

  </script>

</body>

</html>
