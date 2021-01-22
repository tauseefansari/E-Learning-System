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
    .multiple-select-dropdown li [type=checkbox]+label {
      height: 1rem;
    }

    .img-fluid{
      width: 120px;
      height: 120px;
      object-fit: cover;
    }

    .chips{
      padding: 11px;
      border-radius: 21px;
      display: inline-block;
      /* margin-top: 3px; */
      height: 35px;
      margin-left: 2px;
    }

    nav ul li.active{
      background-color :  #18d26e;
    }

  </style>

</head>

<body class="animated">

  <?php include_once('includes/header.php'); ?>

  <?php
      if(isset($_SESSION["addstudents"]))
        {
          $status="";
          if($_SESSION['addstudents']=="Email already taken! Use Different Email")
          {
            $status = "info";  
          }
          else if($_SESSION['addstudents']=="Profile Picture is invalid Format")
          {
            $status = "warning";  
          }
          else
          {
            $status = "success";
          }
      ?>
          <script>
            swal({
              title: "Student Registration",
              text: "<?php echo $_SESSION["addstudents"]; ?>",
              icon: "<?php echo $status; ?>",
              button: "Okay!",
          });
          </script>
      <?php
          unset($_SESSION['addstudents']);
        }
      ?>

      <?php
    if(isset($_SESSION["password_changed_staff"]))
      {
        $status="";
        if($_SESSION['password_changed_staff']=="Password changed successfully!")
        {
          $status = "success";  
        }
        else
        {
          $status = "warning";
        }
    ?>
        <script>
          swal({
            title: "Change Password",
            text: "<?php echo $_SESSION["password_changed_staff"]; ?>",
            icon: "<?php echo $status; ?>",
            button: "Okay!",
        });
        </script>
    <?php
        unset($_SESSION['password_changed_staff']);
      }
    ?>

  <!-- Main Container -->
  <div class="container mt-1 pt-3 animated bounce">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bcolor mt-5 mb-2">

      <!-- Navbar brand -->
      <a class="h4 font-weight-bold white-text mr-4" href="#">Registered Students</a>

      <!-- Collapsible content -->
      <div class="navbar-nav ml-auto" id="navbarSupportedContent1">

        <button class="btn btn-danger" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-circle"></i> &nbsp; Add Student</button>
        
      </div>

      </div>
      <!-- Collapsible content -->

    </nav>

    <!-- Navbar -->

    <?php 
      $query = mysqli_query($con, "SELECT * FROM student WHERE disable=0");
    ?>

    <!-- Inside Main Container -->
  <div class="container table-responsive wow animated bounceInDown">

    <table id="dt-cell-sellection" class="table table-hover" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th class="th-sm text-center">Student Name
          </th>
          <th class="th-sm text-center">Profile Pic
          </th>
          <th class="th-sm text-center">Email
          </th>
          <th class="th-sm text-center">Joining Date
          </th>
          <th class="th-sm text-center">Mobile
          </th>
          <th class="th-sm text-center">Qualification
          </th>
          <th class="th-sm text-center">Actions
          </th>
        </tr>
      </thead>
      <tbody>
        <?php 
          while ($row = mysqli_fetch_array($query))
          {
        ?>
            <tr>
              <td class="align-middle"> <strong> <?php echo $row['name']; ?> </strong> </td>
              <td class="align-middle"><img src="../assets/img/profile/<?php echo $row['profilePic']; ?>" style="width: 100px;height: 100px;border-radius: 50px;"></td>
              <td class="align-middle"><?php echo $row['email']; ?></td>
              <td class="align-middle"><?php echo $row['joiningDate']; ?></td>
              <td class="align-middle"><?php echo $row['mobile']; ?></td>
              <td class="align-middle"><?php echo $row['qualification']; ?></td>
              <td class="align-middle">
                <input type="hidden" name="id" value="<?php echo $row['id'];?>" class="delete_id_value">
                <a href="javascript:void(0)" class="btn btn-danger delete_btn_ajax"> <i class="fa fa-trash"></i> </a>
              </td>
            </tr>
        <?php
          }
        ?>
      </tbody>
    </table>

  </div>
  <!-- Inside Main Container -->

    <?php include_once('includes/footer.php'); ?>

    <div class="modal fade wow animated rotateIn" id="myModal" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
        	<div class="modal-header text-center bg-primary text-white">
        		<h4 class="modal-title w-100 font-weight-bold">Student Registration</h4>
      		</div>

      <form class="text-center p-5" method="post" action="../backend.php" enctype="multipart/form-data"> 
        <!-- image -->
        <div class="bgColor">
          <div id="targetOuter">
            <div id="targetLayer"></div>
            <img src="" class="icon-choose-image" />
            <div class="icon-choose-image" >
            <input name="propic" id="propic" type="file" class="inputFile" onChange="showPreview(this);" />
            </div>
          </div>
        </div>

          <div class="md-form"> 
              <input type="text" id="name" name="sname" class="form-control" required>
              <label for="name">Student Name</label>
          </div>
          <div class="md-form"> 
              <input type="email" id="email" name="email" class="form-control" required>
              <label for="email">Student Email</label>
          </div>
        <div class="md-form"> 
              <input type="text" id="mobile" name="mobile" pattern="\d*" maxlength="10" class="form-control" required>
              <label for="mobile">Mobile</label>
          </div>    

          <div class="md-form">
            <select name="qualification" class="form-control" required>
                <option value="">Select Qualification</option>
                <option value="Diploma">Diploma</option>
                <option value="Engineer">Engineer</option>
                <option value="Masters">Masters</option>
                <option value="Others">Others</option>
            </select>
        </div>

        <div class="md-form">
            <textarea type="text" id="address" name="address" class="md-textarea form-control" rows="3" required></textarea>
              <label for="address">Address</label>
          </div>

          <!-- Send button -->
          <button class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal" name="addstudent" type="submit">Add</button>
          <button class="btn btn-danger btn-md" data-dismiss="modal" aria-label="Close">Cancel</button>
      </form>
    </div>
  </div>
</div>

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

    function showPreview(objFileInput) {
        if (objFileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
          $("#targetLayer").html('<img src="'+e.target.result+'" width="100px" height="100px" style="border-radius: 50px;" class="upload-preview" />');
          $(".icon-choose-image").css('opacity','1.0');
            }
        fileReader.readAsDataURL(objFileInput.files[0]);
        }
    }

    jQuery(document).ready(function($){

      $('#dt-cell-sellection').dataTable({
        select: {
          style: 'os',
          items: 'cell'
        }
      });
    });

    

  </script>

  <script>
        jQuery(document).ready(function($){
          $('.delete_btn_ajax').click(function(e){
                e.preventDefault();
                var deleteid = $(this).closest("tr").find('.delete_id_value').val();
                swal({
                      title: "Are you sure?",
                      text: "Once deleted, you will not be able to recover this Student!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "../backend.php",
                            data: {
                                "delete_btn_set" : 1,
                                "delete_id" : deleteid,
                            },
                            success: function(response)
                            {
                                swal("Student Deleted Successfully!",{
                                   icon: "success",
                                }).then((result) => {
                                  location.reload();
                                });
                            }
                        });
                      }
                   });
            });
        });
    </script>

</body>

</html>
