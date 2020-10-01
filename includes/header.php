<?php 
  session_start();
  include('database.php');
?>
<!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-dark">
    <div class="container-fluid">

      <div class="row justify-content-center">
        <div class="col-xl-11 d-flex align-items-center">
          <!-- <a href="index.html" class="logo mr-auto"> </a> -->
          <h1 class="logo mr-auto"> <a href="index.php">Expertise Learning </a> </h1>
          <!-- Uncomment below if you prefer to use an image logo -->
           

          <nav class="nav-menu d-none d-lg-block">
            <ul>
              <li><a href="index.php">Home</a></li>
              <li class="active"><a href="courses.php">Courses</a></li>
              <li><a href="index.php#about">About Us</a></li>
              <!-- <li class="drop-down"><a href="">Course</a>
                <ul>
                  <li><a href="#">Artificial Intelligence</a></li>
                  <li><a href="#">Machine Learning</a></li>
                  <li><a href="#">Python Programming</a></li>
                  <li><a href="#">Java Programming</a></li>
                </ul>
              </li> -->
              <li><a href="index.php#team">Teams</a></li>
              <li><a href="index.php#contact">Contact Us</a></li>
              <?php 
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