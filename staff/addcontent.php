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
  <script src="../assets/js/tinymce/tinymce.min.js"></script>
  
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

  </style>

</head>

<body class="animated">

  <?php include_once('includes/header.php'); ?>

  <!-- Main layout -->
  <main>

    <div class="container">

      <!-- Section: Create Page -->
      <section class="my-5">

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-lg-8">

            <!-- Card -->
            <div class="card card-cascade narrower mb-5">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header blue-gradient">
                <h4 class="font-weight-500 mb-0 font-weight-bold">Course Content</h4>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade">
                <div class="md-form mt-1 mb-4">
                  <input type="text" id="form1" class="form-control" value="">
                  <label class="form-check-label" for="form1" class="">Content Title</label>
                </div>
                <!-- Second card -->
                <label>Content Description</label>
            <div class="card mb-4">
              <textarea name="" id="editor"></textarea>
            </div>
            <!-- Second card -->
                
                <div class="text-right">
                  <button class="btn btn-flat waves-effect">Discard</button>
                  <button class="btn btn-primary">Submit</button>
                </div>

              </div>
              <!-- Card content -->

            </div>
            <!-- Card -->

          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-lg-4">
              <!-- Card -->
            <div class="card card-cascade narrower">

              <!-- Card image -->
              <div class="view view-cascade gradient-card-header blue-gradient">
                <h4 class="font-weight-500 mb-0 font-weight-bold">Contents</h4>
              </div>
              <!-- Card image -->

              <!-- Card content -->
              <div class="card-body card-body-cascade">
                <fieldset class="form-check mb-4">
                  <input class="form-check-input" type="checkbox" id="color-1">
                  <label class="form-check-label" for="color-1">Material Design</label>
                </fieldset>
                <fieldset class="form-check mb-4">
                  <input class="form-check-input" type="checkbox" id="color-2">
                  <label class="form-check-label" for="color-2">Tutorials</label>
                </fieldset>
                <fieldset class="form-check mb-4">
                  <input class="form-check-input" type="checkbox" id="color-3">
                  <label class="form-check-label" for="color-3">Marketing Automation</label>
                </fieldset>
                <fieldset class="form-check mb-4">
                  <input class="form-check-input" type="checkbox" id="color-4">
                  <label class="form-check-label" for="color-4">Design Resources</label>
                </fieldset>
                <fieldset class="form-check">
                  <input class="form-check-input" type="checkbox" id="color-5">
                  <label class="form-check-label" for="color-5">Random Stories</label>
                </fieldset>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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


<div class="modal fade wow animated rotateIn" id="myModal" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
         <div class="modal-content">

      <form class="text-center p-5" method="post" action="../backend.php" enctype="multipart/form-data"> 
          <h1 class="h3 text-primary mb-2"><b>Change Profile Picture</b></h1>
        <!-- image -->
        <div class="bgColor">
          <div id="targetOuter">
            <div id="targetLayer"></div>
            <img src="" class="icon-choose-image" />
            <div class="icon-choose-image">
            <input name="propic" id="propic" type="file" class="inputFile" onChange="showPreview(this);">
            </div>
          </div>
        </div>
          <!-- Send button -->
          <button class="btn btn-info btn-md ok" data-toggle="modal" data-target="#myModal" style="visibility: hidden;" name="upload_staff" type="submit">Upload</button>
          <button class="btn btn-danger btn-md" data-dismiss="modal" aria-label="Close">Cancel</button>
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

  <script>
  

var useLightMode = window.matchMedia('(prefers-color-scheme: light)').matches;

tinymce.init({
  selector: 'textarea#editor',
  plugins: 'print preview paste importcss autolink autosave directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable charmap emoticons',
  menubar: false,
  toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | quicktable | charmap emoticons | fullscreen  preview print |  link',
  quickbars_insert_toolbar: false,
  height: 400
 });

  
  $(".sub").click(function(){
        var str = tinymce.get('editor').getContent();
        alert("Hello "+str);
    });
</script>

</body>

</html>
