<?php 
  include('database.php');
  require 'backend.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Expertise Learning :: Home</title>
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

  <?php
    if(isset($_SESSION["invalid"]))
      {
    ?>
        <script>
          swal({
            title: "Login Failed!",
            text: "<?php echo $_SESSION["invalid"]; ?>",
            icon: "error",
            button: "Okay!",
        });
        </script>
    <?php
        unset($_SESSION['invalid']);
      }
    ?>

    <?php
    if(isset($_SESSION["password_change"]))
      {
    ?>
        <script>
          swal({
            title: "Password Change!",
            text: "<?php echo $_SESSION["password_change"]; ?>",
            icon: "success",
            button: "Okay!",
        });
        </script>
    <?php
        unset($_SESSION['password_change']);
      }
    ?>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-transparent">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-11 d-flex align-items-center">
          <!-- <a href="index.html" class="logo mr-auto"> </a> -->
          <h1 class="logo mr-auto"> <a href="index.php">Expertise Learning </a> </h1>
          <!-- Uncomment below if you prefer to use an image logo -->
           

          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li class="active"><a href="index.php">Home</a></li>
              <li class="drop-down"><a href="">Courses</a>
                <ul>
                  <li><a href="#portfolio">Out Top Courses</a></li>
                  <li><a href="courses.php">All Courses</a></li>
                </ul>
              </li>
              <li><a href="#about">About Us</a></li>
              <!-- <li class="drop-down"><a href="">Course</a>
                <ul>
                  <li><a href="#">Artificial Intelligence</a></li>
                  <li><a href="#">Machine Learning</a></li>
                  <li><a href="#">Python Programming</a></li>
                  <li><a href="#">Java Programming</a></li>
                </ul>
              </li> -->
              <li><a href="#team">Teams</a></li>
              <li><a href="#contact">Contact Us</a></li>
              <?php
                if(isset($_SESSION['staff_id']))
                {
                  header("Location: staff/index.php");
                } 
                if(isset($_SESSION['login_student']))
                {
                  $name=$_SESSION['login_student'];
              ?>
                <li class="drop-down"><a href=""><?php echo $name; ?></a>
                <ul>
                  <li><a href="student/index.php">My Courses</a></li>
                  <li><a href="logout.php">Logout</a></li>
                </ul>
              </li>
              <?php
                }
                else
                {
              ?>
                <li><a href="#modalLRFormDemo" data-toggle="modal" data-target="#modalLRFormDemo">LogIn</a></li>
              <?php
                }
              ?>

            </ul>
          </nav><!-- .nav-menu -->
        </div>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= Intro Section ======= -->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url(assets/img/intro-carousel/1.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown" style="display: inline-block;padding: 8px 32px;border-radius: 50px;transition: 0.3s;margin: 10px;color: #fff;background: #18d26e;">Education for Everyone</h2>
                <p class="animate__animated animate__fadeInUp">We provides always our best education for our students and  always<br> try to achieve our student's trust and satisfaction</p>
                <a href="#featured-services" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets/img/intro-carousel/2.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown" style="display: inline-block;padding: 8px 32px;border-radius: 50px;transition: 0.3s;margin: 10px;color: #fff;background: #18d26e;">Passion for learning new things</h2>
                <p class="animate__animated animate__fadeInUp">Was certainty remaining engrossed applauded sir how discovery. Settled opinion how enjoyed greater joy adapted too shy. Now properly surprise expenses</p>
                <a href="#featured-services" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets/img/intro-carousel/3.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown" style="display: inline-block;padding: 8px 32px;border-radius: 50px;transition: 0.3s;margin: 10px;color: #fff;background: #18d26e;">Enhance your experince</h2>
                <p class="animate__animated animate__fadeInUp">Experience is all everyone want. we provide a platform to gain experience with our courses</p>
                <a href="#featured-services" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets/img/intro-carousel/4.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown" style="display: inline-block;padding: 8px 32px;border-radius: 50px;transition: 0.3s;margin: 10px;color: #fff;background: #18d26e;">Learn with comfort</h2>
                <p class="animate__animated animate__fadeInUp">Larn with your convenience time and place. Utilize the benefits of our courses</p> 
                <a href="#featured-services" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
              </div>
            </div>
          </div>

          <div class="carousel-item" style="background-image: url(assets/img/intro-carousel/5.jpg)">
            <div class="carousel-container">
              <div class="container">
                <h2 class="animate__animated animate__fadeInDown" style="display: inline-block;padding: 8px 32px;border-radius: 50px;transition: 0.3s;margin: 10px;color: #fff;background: #18d26e;">Oppurtunity for getting placed</h2>
                <p class="animate__animated animate__fadeInUp">Learn with experts and be ready for your placement perspective in an Multinational Companies</p>
                <a href="#featured-services" class="btn-get-started scrollto animate__animated animate__fadeInUp">Get Started</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- End Intro Section -->

  <main id="main">

    <!-- ======= Featured Services Section Section ======= -->
    <section id="featured-services">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 box">
            <i class="ion-ios-bookmarks-outline"></i>
            <h4 class="title"><a href="">Learn from Anywhere</a></h4>
            <p class="description">You can access all the resources available anywhere through the browser</p>
          </div>

          <div class="col-lg-4 box box-bg">
            <i class="ion-ios-stopwatch-outline"></i>
            <h4 class="title"><a href="">Your convenience Time</a></h4>
            <p class="description">Access over the internet as per your comfort time througout the day and 24/7</p>
          </div>

          <div class="col-lg-4 box">
            <i class="ion-ios-heart-outline"></i>
            <h4 class="title"><a href="">Love our Courses</a></h4>
            <p class="description">All courses made with the intention to fulfill every individual need of users with all the materials</p>
          </div>

        </div>
      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3 class="section-title">Our Top Courses</h3>
        </header>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class=" col-lg-12">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All Courses</li>
            <li data-filter=".filter-app">AI / ML</li>
            <li data-filter=".filter-card">Programming</li>
            <li data-filter=".filter-web">Web Development</li>
            <a href="courses.php" class="ml-auto">View All</a>
          </ul> 
        </div>
      </div>

      <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
        <?php 
          $query = mysqli_query($con, "SELECT * FROM courses WHERE domain='AI' or domain='ML' LIMIT 6");
          while($row = mysqli_fetch_array($query))
          {
        ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <figure>
              <img src="assets/img/courses/<?php echo $row['profilePic']; ?>" class="img-fluid" alt="">
              <a href="assets/img/courses/<?php echo $row['profilePic']; ?>" class="link-preview venobox" data-gall="portfolioGallery" title=""><i class="ion ion-eye"></i></a>
              <a href="courseinfo.php?course=<?php echo $row['id']; ?>" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
            </figure>

            <div class="portfolio-info">
              <h4><a href="courseinfo.php?course=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></h4>
              <p><?php echo $row['domain']; ?></p>
            </div>
          </div>
        </div>
        <?php
          }
        ?>

        <?php 
          $query = mysqli_query($con, "SELECT * FROM courses WHERE domain='Web Development' LIMIT 6");
          while($row = mysqli_fetch_array($query))
          {
        ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
          <div class="portfolio-wrap">
            <figure>
              <img src="assets/img/courses/<?php echo $row['profilePic']; ?>" class="img-fluid" alt="">
              <a href="assets/img/courses/<?php echo $row['profilePic']; ?>" class="link-preview venobox" data-gall="portfolioGallery" title=""><i class="ion ion-eye"></i></a>
              <a href="courseinfo.php?course=<?php echo $row['id']; ?>" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
            </figure>

            <div class="portfolio-info">
              <h4><a href="courseinfo.php?course=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></h4>
              <p><?php echo $row['domain']; ?></p>
            </div>
          </div>
        </div>
        <?php
          }
        ?>


        <?php 
          $query = mysqli_query($con, "SELECT * FROM courses WHERE domain='Programming' LIMIT 6");
          while($row = mysqli_fetch_array($query))
          {
        ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-card">
          <div class="portfolio-wrap">
            <figure>
              <img src="assets/img/courses/<?php echo $row['profilePic']; ?>" class="img-fluid" alt="">
              <a href="assets/img/courses/<?php echo $row['profilePic']; ?>" class="link-preview venobox" data-gall="portfolioGallery" title=""><i class="ion ion-eye"></i></a>
              <a href="courseinfo.php?course=<?php echo $row['id']; ?>" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
            </figure>

            <div class="portfolio-info">
              <h4><a href="courseinfo.php?course=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></h4>
              <p><?php echo $row['domain']; ?></p>
            </div>
          </div>
        </div>
        <?php
          }
        ?>
      </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>About Us</h3>
          <p>Our efforts to provide students strong educational digital platform, as we believe we are responsible not just for enabling our students to learn but also to understand every minor details</p>
        </header>

        <div class="row about-cols">

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="about-col">
              <div class="img">
                <img src="assets/img/about-mission.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Quality Education</a></h2>
              <p>
                A good quality education is one that provides all learners with capabilities they require to become economically productive, develop sustainable livelihoods, contribute to peaceful and democratic societies and enhance individual well-being.
              </p>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="about-col">
              <div class="img">
                <img src="assets/img/about-plan.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-list-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">All Round Development of Students</a></h2>
              <p>
                "All Round Development" means that we focus and emphasize more than the academic development of the child. Instead, while that remains a key focus, we also undestand the essence in emphasizing & development.
              </p>
            </div>
          </div>

          <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
            <div class="about-col">
              <div class="img">
                <img src="assets/img/about-vision.jpg" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-eye-outline"></i></div>
              </div>
              <h2 class="title"><a href="#">Low Cost Education</a></h2>
              <p>
                Our mission is to offer low cost and affordable education to our students. So everyone can afford and take the benefits of our services and courses. So that they can access easily and use this opportunity wisely for their benefits and educational perspective. 
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End About Us Section -->


    <!-- ======= Facts Section ======= -->
    <section id="facts">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Facts</h3>
          <p>Facts about our platform</p>
        </header>

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">100</span>
            <p>Staff</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">200</span>
            <p>Courses</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">100</span>
            <p>Success Stories</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up">25</span>
            <p>Hard Workers</p>
          </div>

        </div>

        <div class="facts-img">
          <!-- <img src="assets/img/facts-img.png" alt="" class="img-fluid"> -->
        </div>

      </div>
    </section><!-- End Facts Section -->


    <!-- ======= Our Clients Section ======= -->
    <section id="clients">
      <div class="container" data-aos="zoom-in">

        <header class="section-header">
          <h3>Our Clients</h3>
        </header>

        <div class="owl-carousel clients-carousel">
          <img src="assets/img/clients/client-1.png" alt="">
          <img src="assets/img/clients/client-2.png" alt="">
          <img src="assets/img/clients/client-3.png" alt="">
          <img src="assets/img/clients/client-4.png" alt="">
          <img src="assets/img/clients/client-5.png" alt="">
          <img src="assets/img/clients/client-6.png" alt="">
          <img src="assets/img/clients/client-7.png" alt="">
          <img src="assets/img/clients/client-8.png" alt="">
        </div>
      </div>
    </section><!-- End Our Clients Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="section-bg">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h3>Testimonials</h3>
        </header>

        <div class="owl-carousel testimonials-carousel">

          <div class="testimonial-item">
            <img src="assets/img/testimonial-1.jpg" class="testimonial-img" alt="">
            <h3>Tauseef Ansari</h3>
            <h4>CEO &amp; Founder</h4>
            <p>
              <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                Start your career with good vibes and focused on your goal
              <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>


          <div class="testimonial-item">
            <img src="assets/img/testimonial-3.jpg" class="testimonial-img" alt="">
            <h3>Essani Mohsin</h3>
            <h4>CTO &amp; Co-Founder</h4>
            <p>
              <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                Keep working in a project, one day you will definitely succeed
              <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="assets/img/testimonial-4.jpg" class="testimonial-img" alt="">
            <h3>Hamza Chowdhury</h3>
            <h4>UI/UX Designer</h4>
            <p>
              <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                Designer needs creative mind, if you are creative you are designer 
              <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>

          <div class="testimonial-item">
            <img src="assets/img/testimonial-2.png" class="testimonial-img" alt="">
            <h3>Zakiya Khan</h3>
            <h4>Database Expert</h4>
            <p>
              <img src="assets/img/quote-sign-left.png" class="quote-sign-left" alt="">
                You can have data without information, but you cannot have information without data
              <img src="assets/img/quote-sign-right.png" class="quote-sign-right" alt="">
            </p>
          </div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Team Section ======= -->
    <section id="team">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h3>Team</h3>
          <p>Teamwork begins by building trust. And the only way to do that is to overcome our need for invulnerability</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <img src="assets/img/team-1.jpg" class="img-fluid" alt="" style="width: 400px; height: 215px;">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Tauseef Ansari</h4>
                  <span>Backend Developer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <img src="assets/img/team-2.jpg" class="img-fluid" alt="" style="width: 400px; height: 215px;">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Hamza Chowdhury</h4>
                  <span>UI/UX Designer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <img src="assets/img/team-3.jpg" class="img-fluid" alt="" style="width: 400px; height: 215px;">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Mohsin Essani</h4>
                  <span>UI & Graphics Designer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="400">
              <img src="assets/img/team-4.png" class="img-fluid" alt="" style="width: 400px; height: 215px;">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Zakiya Khan</h4>
                  <span>Database Expert</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="section-bg">

      <?php
      if(isset($_SESSION["status"]) && isset($_SESSION["message"]))
        {
      ?>
          <script>
            swal({
              title: "Email",
              text: "<?php echo $_SESSION["message"]; ?>",
              icon: "<?php echo $_SESSION["status"]; ?>",
              button: "Okay!",
          });
          </script>
      <?php
          unset($_SESSION['status']);
          unset($_SESSION['message']);
        }
      ?>

      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h3>Contact Us</h3>
          <p>You can contact us in many possible ways as per your convenience</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>8, Saboo Siddik Polytechnic Road, Mumbai - 08</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+919321391048">+91 9321 3910 48</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">help@expertise.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <form action="backend.php" method="post" class="php-email-form">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
                <div class="validate"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required/>
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message" required></textarea>
              <div class="validate"></div>
            </div>
            <div class="text-center"><button type="submit" name="sendmail">Send Message</button></div>
            <div class="loading">Loading</div>
          </form>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

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
                        <p><a href="javascript:void(0)" class="blue-text forget_btn_student">Forgot Password?</a></p>
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
                        <p><a href="javascript:void(0)" class="blue-text forget_btn_staff">Forgot Password?</a></p>
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
    $(document).ready(function(){
      //Staff
      $(".forget_btn_staff").click(function()
      {
          $("#modalLRFormDemo").hide();
          var email = null;
          swal({
              content: {
                  element: "input",
                  attributes: {
                      placeholder: "Enter your resistered email",
                      type: "email",
                  }
              }
          })
          .then(function(value) {
              email = value;
              $.ajax({
                type: "POST",
                url: "backend.php",
                data: {
                    "staff_set" : 1,
                    "email" : email,
                },
                success: function(dataResult)
                {
                  var res = JSON.parse(dataResult);
                  if(res.status == 1)
                  {
                    swal("Link to reset password sent to "+email,{
                     icon: "success",
                    }).then((result) => {
                    location.reload();
                  });
                  }
                  else
                  {
                    swal("Your email "+email+" is not registered!",{
                     icon: "error",
                    }).then((result) => {
                    location.reload();
                  });
                  }
                }
            });
          });
      });

      //Student
      $(".forget_btn_student").click(function()
      {
          $("#modalLRFormDemo").hide();
          var email = null;
          swal({
              content: {
                  element: "input",
                  attributes: {
                      placeholder: "Enter your resistered email",
                      type: "email",
                  }
              }
          })
          .then(function(value) {
              email = value;
              $.ajax({
                type: "POST",
                url: "backend.php",
                data: {
                    "student_set" : 1,
                    "email" : email,
                },
                success: function(dataResult)
                {
                  var res = JSON.parse(dataResult);
                  if(res.status == 1)
                  {
                    swal("Link to reset password sent to "+email,{
                     icon: "success",
                    }).then((result) => {
                    location.reload();
                  });
                  }
                  else
                  {
                    swal("Your email "+email+" is not registered!",{
                     icon: "error",
                    }).then((result) => {
                    location.reload();
                  });
                  }
                }
            });
          });
      });
    });
    
  </script>  

</body>

</html>