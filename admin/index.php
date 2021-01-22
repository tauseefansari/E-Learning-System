<?php
    session_start();
    error_reporting(0);
    include('../database.php');
    if(isset($_SESSION['userid'])) 
    {
        header('location: dashboard.php');
    }
?>
    
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Expertise Learning :: Admin</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../assets/css/mdb.min.css" rel="stylesheet">

  <script src="../assets/js/sweetalert.js"></script>

  <style>
    html,
    body,
    header,
    .view {
      height: 100vh;
    }
    @media (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 700px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 650px;
      }
    }
  </style>
</head>

<body class="login-page" style="background-image: url(../assets/img/backgrounds.jpg); background-repeat: no-repeat; background-size: cover; background-position: center center;">

  <!-- Main Navigation -->

  <header>

    <!-- Intro Section -->
    <section class="view intro-2">
      <div class="mask rgba-indigo-light h-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <h1 class="text-center text-white my-5"> <strong> Expertise Learning</strong> </h1>
            <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

              <!-- Form with header -->
              <div class="card wow fadeIn" data-wow-delay="0.3s">
                <div class="card-body">

                  <!-- Header -->
                  <div class="form-header blue-gradient">
                    <h3>
                      <i class="fas fa-users-cog mt-2 mb-2"></i> <strong> Administrator </strong> </h3>
                  </div>

                  <!-- Body -->
                  <form method="post">
                      <div class="md-form mb-0">
                        <i class="far fa-user prefix"></i>
                        <input type="text" id="email" name="username" class="form-control" required>
                        <label for="email">Username</label>
                      </div>

                      <div class="md-form mb-0">
                        <i class="far fa-eye prefix"></i>
                        <input type="password" id="pass" name="password" class="form-control" required>
                        <label for="pass">Password</label>
                      </div>
                      <br>
                      <div class="text-center">
                        <button type="submit" name="login" class="btn blue-gradient btn-lg">Login</button>
                      </div>
                    </form>
                </div>
              </div>
              <!-- Form with header -->

              <?php 
                if(isset($_POST['login'])) 
                {
                    $username = $_POST['username'];
                    $password = md5($_POST['password']);

                    $sql = "SELECT id FROM admin WHERE username='$username' and password='$password'";
                    $query = mysqli_query($con, $sql);
                    $results = mysqli_fetch_array($query);
                    if(mysqli_num_rows($query) > 0)
                    {
                        $_SESSION['userid'] = $results['id'];
                        $_SESSION['login'] = $_POST['username'];
                        echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
                        }
                    else
                    {
                        echo    '<script>
                                    swal({
                                        title: "Email",
                                        text: "Invalid Username or Password",
                                        icon: "error",
                                        button: "Okay!",
                                    });
                                </script>';
                    }
                }
              ?>

            </div>
          </div>
        </div>
      </div>
    </section>

  </header>
  <!-- Main Navigation -->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="../assets/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../assets/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../assets/js/mdb.min.js"></script>
  <script>
    new WOW().init();
  </script>
</body>

</html>
