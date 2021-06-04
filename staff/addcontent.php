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

  if(isset($_GET['course']))
  {
  	$courseid = $_GET['course'];
  	$_SESSION['courseid'] = $courseid;
  }

  $query = mysqli_query($con, "SELECT * FROM courses WHERE id = '$courseid'");
  $row = mysqli_fetch_array($query);
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
  <script src="../assets/js/tinymce/tinymce.min.js"></script>

  <script type="text/javascript" src="../assets/js/jquery-3.4.1.min.js"></script>

  <script src="../assets/js/dropzone.js" type="text/javascript"></script>
  
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
      width: 200px;
      height: 200px;
    }

    nav ul li.active{
      background-color :  #18d26e;
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
        color: #bfc5ca;
        background-color: #eaeff4;
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
        border-left: 2px dashed #eaeff4;
      }

      .step .step-element:last-child .step-number::before {
        bottom: 1rem;
      }

      .fit-card{
      width: 20%;
      height: 20%;
    }
  </style>

</head>

<body class="animated">

  <?php include_once('includes/header.php'); ?>

  <?php
      if(isset($_SESSION["contentadded"]))
        {
          $status="";
          if($_SESSION['contentadded']=="Course content added successfully!")
          {
            $status = "success";  
          }
          else
          {
            $status = "error";
          }
      ?>
          <script>
            swal({
              title: "Course Content",
              text: "<?php echo $_SESSION["contentadded"]; ?>",
              icon: "<?php echo $status; ?>",
              button: "Okay!",
          });
          </script>
      <?php
          unset($_SESSION['contentadded']);
        }
      ?>

  <!-- Main layout -->
  <main>

    <div class="container-fluid">

      <!-- Section: Create Page -->
      <section class="my-5">

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-lg-7 wow animated swing">

            <!-- Card -->
            <div class="card card-cascade narrower mb-5">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header blue-gradient">
                <h4 class="font-weight-500 mb-0 font-weight-bold"><?php echo $row['name']; ?> Contents</h4>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade">
                <?php
                  $target_dir = "../assets/img/coursefiles/".$row['name']."/"; 
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
    		              <span class="number"><?php echo $count; ?></span>
    		            </div>
    		            <div class="step-excerpt col-lg-10">
    		              <h4 class="font-weight-bold dark-grey-text mb-3"><?php echo $row['title']; ?></h4>
    		              <!-- Accordion card -->
    		          <div class="card">

    		          <!-- Card header -->
    		          <div class="card-header">
    		            <h5 class="mb-0">
    		              <strong>Description</strong>
                      <input type="hidden" name="id" value="<?php echo $row['id'];?>" class="delete_id_value">
                      <a href="javascript:void(0)" class="delete_btn_ajax"> <i class="fas fa-trash pull-right ml-2" style="color: red;"></i> </a>
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
		          <!-- Accordion card -->
    		          
              <!--Accordion wrapper-->
				        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

				          <!-- Accordion card -->
				          <div class="card">

				            <!-- Card header -->
				            <div class="card-header" role="tab" id="heading<?php echo $count; ?>">
				              <a class="collapsed text-primary" data-toggle="collapse" data-parent="#accordionEx" href="#collapse<?php echo $count; ?>"
				                aria-expanded="false" aria-controls="collapse<?php echo $count; ?>">
				                <h5 class="mb-0">
				                  <strong>Course Files</strong>
				                  <i class="fas fa-angle-down rotate-icon"></i>
                          			<a href="fileupload.php?contentid=<?php echo $row['id']; ?>"><i class="fas fa-file-upload pull-right mr-3 text-primary"></i></a>
				                </h5>
				              </a>
				            </div>

				            <!-- Card body -->
				            <div id="collapse<?php echo $count; ?>" class="collapse" role="tabpanel" aria-labelledby="heading<?php echo $count; ?>"
				              data-parent="#accordionEx">
				              <div class="card-body">
				                <?php
				                	$query2 = mysqli_query($con, "SELECT * FROM coursefiles WHERE contentid = '$contentid' LIMIT 3");
				                	if(mysqli_num_rows($query2) == 0)
				                	{
				                		echo '<h4 class="font-weight-bold dark-grey-text text-center"> No Files found! <h6 class="text-center"> <a href="fileupload.php?contentid='.$row["id"].'" class="text-primary">Add Files </a></h6></h4>';
				                	}
				                	else
				                	{
				                ?>
					                <?php
					                  	while($row2 = mysqli_fetch_array($query2))
					                  	{ 
					                	$filePath = $target_dir.$row2["filename"]; 
	            						$fileMime = mime_content_type($filePath); 
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
						            
					        		}
				                ?>
				              </div>
				              <h6 class="text-center p-2"><a href="fileupload.php?contentid=<?php echo $row['id']; ?>" class="text-primary"><strong>View / Manage All Files </strong></a></h6>
				              <?php 
				              	}
				              ?>
				            </div>
				          </div>
				          <!-- Accordion card -->
    				    </div>
    				    <!-- Accordion wrapper-->
    		      </div>
    		    </li>
    		  </ol>
		      </div>
          <?php
            $count++; 
            }
          ?>
        </div>
        <!-- Card content -->

        </div>
        <!-- Card -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-lg-5 wow animated bounceInLeft" data-wow-delay="0.4s">
              <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header blue-gradient">
                <h4 class="font-weight-500 mb-0 font-weight-bold">Add Contents</h4>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade">
                <div class="md-form mt-1 mb-4 wow animated bounceInDown" data-wow-delay="0.5s">
                  <input type="text" id="form1" class="form-control" value="" required>
                  <label class="form-check-label" for="form1" class="">Content Title</label>
                </div>
                <!-- Second card -->
                <label>Content Description</label>
            <div class="card mb-4 wow animated bounceInDown" data-wow-delay="0.5s">
              <textarea name="" id="editor" required></textarea>
            </div>
            <div class="text-right">
                  <button class="btn btn-flat waves-effect">Discard</button>
                  <button class="btn btn-primary" id="add">Submit</button>
                </div>
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

  <script>
  

var useLightMode = window.matchMedia('(prefers-color-scheme: light)').matches;

tinymce.init({
  selector: 'textarea#editor',
  plugins: 'print preview paste importcss autolink autosave directionality code visualblocks visualchars link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable charmap emoticons',
  menubar: false,
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | quicktable | charmap | preview print |  link',
  quickbars_insert_toolbar: false,
  height: 200
 });

  
  jQuery(document).ready(function($){
      $('.delete_btn_ajax').click(function(e){
        e.preventDefault();
        var deleteid = $(this).closest("h5").find('.delete_id_value').val();
        swal({
              title: "Are you sure?",
              text: "Are you sure you want to remove this content!",
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
                        "content_delete_btn_set" : 1,
                        "delete_id" : deleteid,
                    },
                    success: function(response)
                    {
                        swal("Content Removed Successfully!",{
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

    $("#add").click(function(){
	  var title = $("#form1").val();
	  var desc = tinymce.get('editor').getContent();
	  if(title == "" || desc == "")
	  {
	  	swal("Both Fields are Mandatory!",{icon: "warning"})
	  }
	  else
	  {
	  	$.ajax({
            type: 'POST',
            url: 'upload.php',
            data: {title: title, desc: desc, add: 1},
            success: function(data)
            {
            	tinymce.activeEditor.setContent("");
                location.reload();
            }
        });
	  }
	});

</script>

</body>

</html>
