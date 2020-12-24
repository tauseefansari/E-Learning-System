<?php 
	include('database.php');

	if(isset($_GET['course']))
	{
		$courseid = $_GET['course'];
	}

	$querry = mysqli_query($con, "SELECT * FROM courses WHERE id = '$courseid'");
	$result = mysqli_fetch_array($querry);
?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Expertise Learning :: <?php echo $result['name']; ?></title>

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
    
    .img-fluid{
      width: 100%;
      height: 15vw;
      object-fit: cover;
    }

    .img-main{
      width: 100%;
      height: 469px;
      object-fit: cover;
    }

    .fa-play:before {
        margin-left: .3rem;
      }

      /* Steps */
      .step {
        list-style: none;
        margin: 0;
      }

      .step-element {
        display: flex;
        padding: 1rem 0;
      }

      .step-number {
        position: relative;
        width: 7rem;
        flex-shrink: 0;
        text-align: center;
      }

      .step-number .number {
        color: #fff;
        background-color: #000;
        font-size: 1.5rem;
      }

      .step-number .number {
        width: 48px;
        height: 48px;
        line-height: 48px;
      }

      .number {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        width: 38px;
        border-radius: 10rem;
      }

      .step-number::before {
        content: '';
        position: absolute;
        left: 50%;
        top: 48px;
        bottom: -2rem;
        margin-left: -1px;
        border-left: 2px dashed #000;
      }

      .step .step-element:last-child .step-number::before {
        bottom: 1rem;
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
      <div class="card mt-5 hoverable wow animated bounceInLeft" data-wow-delay="0.3s">

        <div class="row mt-5">

          <div class="col-lg-6 p-4">

                <img src="assets/img/courses/<?php echo $result['profilePic']; ?>" alt="courseImage"
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


           <!--  <p class="float-right">

              <button class="btn btn-primary btn-rounded">

                      <i class="fas fa-cart-plus mr-2" aria-hidden="true"></i> Requst to Purchase</button></p> -->

          </div>

        </div>

      </div>
      <!-- News card -->

    </section>

    <!-- Section: Accordion -->
      <section>

        <h2 class="h4-responsive mt-lg-12 mb-2 pb-4  dark-grey-text font-weight-bold text-center wow animated shake" data-wow-delay="0.3s"><strong>Course Content</strong></h2>

        <div class="row">
          <div class="col-lg-12">
          <?php

                  $target_dir = "../assets/img/coursefiles/".$result['name']."/"; 
                  $count = 1;
                  $query = mysqli_query($con, "SELECT * FROM coursecontent WHERE courseid = '$courseid'");
                  if(mysqli_num_rows($query) == 0)
                  {
                    echo '<h3 class="font-weight-bold dark-grey-text text-center"> No Contents found!</h3>';
                  }
                  while ($row = mysqli_fetch_array($query))
                  {
                    $contentid = $row['id'];
                ?>
                <div class="col-lg-12 mb-4">
                  <ol class="step pl-0">
                  <li class="step-element pb-0 wow animated slideInDown" data-wow-delay="0.2s">
                    <div class="step-number">
                      <span class="number font-weight-bold"><?php echo $count; ?></span>
                    </div>
                    <div class="step-excerpt col-lg-10">
                      <h4 class="font-weight-bold dark-grey-text mb-3 text-primary"><?php echo $row['title']; ?></h4>
                      <!-- Accordion card -->
                  <div class="card">

                  <!-- Card header -->
                  <div class="card-header">
                    <h5 class="mb-0 text-white">
                      <strong>Description</strong>
                    </h5>
                  </div>

                <!-- Card body -->
                <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1"
                  data-parent="#accordionEx">
                  <div class="card-body">
                  <?php echo $row['description']; ?>
                  </div>
                </div>
              </div>
              </div>
            </li>
          </ol>
          </div>
          <?php
            $count++; 
            }
          ?>
          </div>
        </div>
          <!-- Grid column -->
      </section>
      <!-- Section: Close by default -->

    <!-- Section: Products v.5 -->
    <section id="products" class="pb-5 mt-4">

      <hr>

      <h4 class="h4-responsive dark-grey-text font-weight-bold my-2 text-center">

        <strong>Recommended Courses</strong>

      </h4>

      <hr class="mb-5">

      <p class="text-center w-responsive mx-auto mb-5 dark-grey-text">Some of the recommended courses based on the above course are </p>

      <!-- Grid row -->
          <div class="row">
          <?php
          	$domain = $result['domain'];
            $query3 = mysqli_query($con, "SELECT * FROM courses WHERE domain = '$domain' ORDER BY id DESC LIMIT 3");

            while($row = mysqli_fetch_array($query3))
            {
          ?>
              <!-- Grid column -->
              <div class="col-lg-4 col-md-12 mb-4 wow animated wobble" data-wow-delay="0.3s">

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

                            <i class="fas fa-shopping-cart ml-3"></i>

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

    </section>
    <!-- Section: Products v.5 -->

  </div>
  <!-- Main Container -->

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

  </script>

</body>

</html>
