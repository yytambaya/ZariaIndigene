<!DOCTYPE>
<?php
session_start();
require_once("operations.php");
if(isset($_POST['getcert'])){

  $reg_cert_no = "/^NG-[0-9]+-[0-9]+$/";
  if(isset($_POST['cert_no'])){
    if(!empty($_POST['cert_no'])){
      if(preg_match($reg_cert_no, $_POST['cert_no'])){
        if(getCertInfo2($_POST['cert_no'])[0] != 0){
          $_SESSION['v_cert_no'] = $_POST['cert_no'];
          header('Location: certificate.php');
        }else{
          $cert_no_error = "This certificate number is not given by us";
        }
      }else{
          $cert_no_error = "This Certificate ID is invalid";
      }
    }else{
      $cert_no_error = "Certificate ID is not entered";
    }
  }
}
?>

<html lang="en">
  <head>..
    <title>Web based indigene certificate</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width.=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Zaria Local Goverment Indegine certificate">
    <meta name="description" content="A web based Indegine certificate for Zaria Local Government">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">



  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Zaria Local Goverment Indigene</a>
	      <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link"><span>Home</span></a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link"><span>About</span></a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link"><span>Contact Us</span></a></li>
            <li class="nav-item"><a href="indigene.php" class="nav-link"><span>Get Certificate</span></a></li>
	          <li class="nav-item cta"><a href="apply.php" class="nav-link">Apply</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>

	  <section class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-section="home">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Apply to get your Indigene online</h1>
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Made easy with our online system</p>
            <p><a href="apply.php" class="btn btn-primary py-3 px-4" data-toggle="modal" data-target="#modalAppointment">Apply now</a></p>
          </div>
        </div>
      </div>
    </section>

      <section class="ftco-section bg-light" id="attorneys-section">
        <div class="container">
      		<div class="row justify-content-center pb-5">
            <div class="col-md-10 heading-section text-center ftco-animate">
      	<div class="col-md-8">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="appointment_name" class="text-black">Certificate ID</label>
            <input type="text" name="cert_no" class="form-control" id="appointment_name" value="<?php if(isset($v_cert_no)) echo $v_cert_no; ?>">
            <span class="text-danger"><?php if(isset($cert_no_error)) echo $cert_no_error; else if(isset($_SESSION['cert_no_error'])) echo $_SESSION['cert_no_error']; ?></span>
          </div>
          <div class="form-group">
            <input name="getcert" type="submit" value="Get Certificate" class="btn btn-primary">
          </div>
        </form>
    </div>
  </div>
</div>
</div>
</section>
    <footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About <span>Zaria LG Indigene</span></h2>
              <p><i>Our online indigene processing system</i></p>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="index.php"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                <li><a href="about.html"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                <li><a href="apply.html"><span class="icon-long-arrow-right mr-2"></span>Apply</a></li>
                <li><a href="contact.html"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>

          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-0">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Kofan Fada, Zaria City</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">zlg-indigene@zlg-indigene.com</span></a></li>
	              </ul>
	            </div>
	            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-4">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved </i> by <a href="https://zlg-Indigene.com" target="_blank">ZLG-Indigene</a>
  </p>
          </div>
        </div>
      </div>
    </footer>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>

  <script src="js/main.js"></script>

  </body>
</html>
