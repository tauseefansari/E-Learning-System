<?php 
  require '../database.php';
  require '../backend.php';
  error_reporting(0);

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
    nav ul li.active{
      background-color :  #18d26e;
    }

    .img-fluid{
      width: 120px;
      height: 120px;
      object-fit: cover;
    }

    :root {
		--white: #ffffff;
		--light: #f0eff3;
		--black: #000000;
		--dark-blue: #1f2029;
		--dark-light: #353746;
		--red: #da2c4d;
		--yellow: #f8ab37;
		--grey: #ecedf3;
	}

    .checkbox-tools:checked + label,
	.checkbox-tools:not(:checked) + label{
		position: relative;
		display: inline-block;
		padding: 20px;
		width: 110px;
		font-size: 14px;
		line-height: 20px;
		letter-spacing: 1px;
		margin: 0 auto;
		margin-left: 5px;
		margin-right: 5px;
		margin-bottom: 10px;
		text-align: center;
		border-radius: 4px;
		overflow: hidden;
		cursor: pointer;
		text-transform: uppercase;
		color: var(--yellow);
		-webkit-transition: all 300ms linear;
		transition: all 300ms linear; 
	}
	.checkbox-tools:not(:checked) + label{
		background-color: var(--black);
		box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
	}
	.checkbox-tools:checked + label{
		background-image: linear-gradient(298deg, var(--red), var(--yellow));
		color: var(--white);
		box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
	}
	.checkbox-tools:not(:checked) + label:hover{
		box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
	}
	.checkbox-tools:checked + label::before,
	.checkbox-tools:not(:checked) + label::before{
		position: absolute;
		color: var(--white);
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		border-radius: 4px;
		background-image: linear-gradient(298deg, var(--yellow), var(--red));
		z-index: -1;
	}
	.checkbox-tools:checked + label .uil,
	.checkbox-tools:not(:checked) + label .uil{
		color: var(--white);
		font-size: 24px;
		line-height: 24px;
		display: block;
		padding-bottom: 10px;
	}


  </style>

</head>

<body class="animated">

  <?php include_once('includes/header.php'); ?>

  <?php
      if(isset($_SESSION["already_present"]))
      {
   ?>
   <script>
      swal({
        title: "Enroll Courses",
        text: "<?php echo $_SESSION["already_present"]; ?>",
        icon: "info",
        button: "Okay!",
    });
    </script>
  <?php
      unset($_SESSION['already_present']);
    }
  ?>

  <!-- Main layout -->
  <main>

    <div class="container-fluid">

      <!-- Section: Create Page -->
      <section class="my-5 ml-3">

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-lg-9 wow animated bounceInDown">
            <h3 class="h3 blue-gradient text-light p-3 font-weight-bold text-center" style="border-radius:50px;">Students Placement</h3>
            <?php 
              $query = mysqli_query($con, "SELECT student.id AS ID,student.name AS SNAME, placement.name AS COMPANY, email,profilePic FROM student JOIN placement ON student.id=placement.studentId WHERE student.disable=0");
            ?>

            <table id="dt-cell-sellection" class="table table-hover" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th class="th-sm text-center">Student Name
                  </th>
                  <th class="th-sm text-center">Profile Pic
                  </th>
                  <th class="th-sm text-center">Email
                  </th>
                  <th class="th-sm text-center">Placed In
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  while ($row = mysqli_fetch_array($query))
                  {
                    if($row['COMPANY'] != "")
                    {
                ?>
                    <tr>
                      <td class="align-middle text-center"> <strong> <?php echo $row['SNAME']; ?> </strong> </td>
                      <td class="align-middle text-center"><img src="../assets/img/profile/<?php echo $row['profilePic']; ?>" style="width: 100px;height: 100px;border-radius: 50px;"></td>
                      <td class="align-middle text-center"> <?php echo $row['email']; ?> </td>
                      <td class="align-middle text-center">
                      	<input type="hidden" name="id" value="<?php echo $row['ID'];?>" class="delete_id_value">
                       <?php echo $row['COMPANY']; ?> <a href="javascript:void(0)" class="delete_btn_ajax"> <i class="fa fa-trash text-danger mr-2"> </i></a> </td>
                    </tr>
                <?php
                    }
                  }
                ?>
              </tbody>
            </table>

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-lg-3 wow animated bounceInUp" data-wow-delay="0.4s">
              <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header blue-gradient">
                <h4 class="font-weight-500 mb-0 font-weight-bold">Add Placement</h4>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade">
                <form method="post" id="placement">
                <div class="md-form mt-1 mb-2" style="display:block !important;">
                  <select class="mdb-select colorful-select dropdown-primary md-form" id="student" searchable="Search here.." required>
                  <option value="" disabled selected>- Select Student -</option>
                  <?php 
                    $student = mysqli_query($con, "SELECT id,name FROM student WHERE placement = 'No'");
                    while ($row = mysqli_fetch_array($student))
                    {
                  ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>  
                  <?php
                    }
                  ?>
                </select>
                <label class="mdb-main-label">Student</label>
              </div>
              <div id="show_data" style="display: none">
              	<label class="label p-2">Select Comapany</label>
                <div class="col-12 pb-5">
					<input class="checkbox-tools check" value="Morgan Stanley" type="radio" name="company" id="tool-1" checked>
					<label class="for-checkbox-tools" for="tool-1">
						<i class='uil fas fa-building'></i>
						Morgan Stanley
					</label><!--
					--><input class="checkbox-tools" value="Capegemini" type="radio" name="company" id="tool-2">
					<label class="for-checkbox-tools" for="tool-2">
						<i class='uil fas fa-building'></i>
						Capegemini
					</label><!--
					--><input class="checkbox-tools" value="Amazon" type="radio" name="company" id="tool-3">
					<label class="for-checkbox-tools" for="tool-3">
						<i class='uil fas fa-building'></i>
						Amazon
					</label><!--
					--><input class="checkbox-tools" value="Larsen & Turbo" type="radio" name="company" id="tool-4">
					<label class="for-checkbox-tools" for="tool-4">
						<i class='uil fas fa-building'></i>
						Larsen & Turbo
					</label><!--
					--><input class="checkbox-tools" value="Accenture" type="radio" name="company" id="tool-5">
					<label class="for-checkbox-tools" for="tool-5">
						<i class='uil fas fa-building'></i>
						Accenture
					</label><!--
					--><input class="checkbox-tools" value="Google" type="radio" name="company" id="tool-6">
					<label class="for-checkbox-tools" for="tool-6">
						<i class='uil fas fa-building'></i>
						Google
					</label>
				</div>
              	</div>
                <div class="text-right" style="position: relative;">
                  <button class="btn btn-primary" type="submit">Place</button>
                  <button class="btn btn-flat waves-effect" type="reset">Cancel</button>
                </div>
              </form>
              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->
            
          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </section>
      <!-- Section: Create Page -->

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

      $(document).ready(function () {
      $('.mdb-select').materialSelect();
    });

      $('#student').on('change', function()
      { 
        $('#show_data').css('display',"block");
      });
    });


    $('#placement').on('submit', function(e)
    {
      e.preventDefault();
      var company = $('input[name="company"]:checked').val();
      var id = $('#student').val();
      $.ajax({
          type: "POST",
          url: "../backend.php",
          data: {
              "placement_set" : 1,
              "id" : id,
              "company" : company,
          },
          success: function(response)
          {
            swal("Placement Added Successfully!",{
               icon: "success",
            }).then((result) => {
              location.reload();
            });
          }
      });
    });

    jQuery(document).ready(function($){
      $('.delete_btn_ajax').click(function(e){
        e.preventDefault();
        var deleteid = $(this).closest("td").find('.delete_id_value').val();
        swal({
              title: "Are you sure?",
              text: "Are you sure you want to remove this placement!",
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
                        "placement_delete_btn_set" : 1,
                        "delete_id" : deleteid,
                    },
                    success: function(response)
                    {
                        swal("Placement Removed Successfully!",{
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
