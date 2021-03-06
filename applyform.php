<?php
require("db_conn.php");
require("operations.php");
//Reg expressions
//$reg_name = "/^[A-Za-z\'\-\.]{2, 15}\s?[A-Za-z\'\-\.]\s?[A-Za-z\'\-\.]\s?$/";
$reg_name = "/^[A-Za-z-\'\s]{3,40}$/";
$reg_address = "/^[A-Za-z0-9-\s\']{3,50}$/";
$reg_date = "/^[\\0-9]{10}$/";
$reg_cert_no = "/[NG]{2}+-[0-9]{2,}+-[0-9]{2,}/";

if(isset($_POST['apply'])){
  $v = [];
  if(isset($_POST['name'])){
    if(!empty($_POST['name'])){
      if(preg_match($reg_name, $_POST['name'])){
          $v_name = $_POST['name'];
      }else{
          $name_error = "Incorrect Name";
      }
    }else{
      $name_error = "Name is not entered";
    }
  }
  if(isset($_POST['address'])){
    if(!empty($_POST['address'])){
      if(preg_match($reg_address, $_POST['address'])){
          $v_address = $_POST['address'];
      }else{
          $address_error = "Incorrect address";
      }
    }else{
      $address_error = "Address is not entered";
    }
  }
  if(isset($_POST['d_birth'])){
    if(!empty($_POST['d_birth'])){
      if(preg_match($reg_date, $_POST['d_birth'])){
          $v_d_birth = $_POST['d_birth'];
      }else{
          $d_birth_error = "Incorrect Date";
      }
    }else{
      $d_birth_error = "Date of Birth is not entered";
    }
  }
  if(isset($_POST['p_birth'])){
    if(!empty($_POST['p_birth'])){
      if(preg_match($reg_name, $_POST['p_birth'])){
          $v_p_birth = $_POST['p_birth'];
      }else{
          $p_birth_error = "Incorrect place of birth";
      }
    }else{
      $p_birth_error = "Place of Birth is not entered";
    }
  }
  if(isset($_POST['f_name'])){
    if(!empty($_POST['f_name'])){
      if(preg_match($reg_name, $_POST['f_name'])){
          $v_f_name = $_POST['f_name'];
      }else{
          $f_name_error = "Icorrect Father\'s name";
      }
    }else{
      $f_name_error = "Father\'s name is not entered";
    }
  }
  if(isset($_POST['f_tribe'])){
    if(!empty($_POST['f_tribe'])){
      if(preg_match($reg_name, $_POST['f_tribe'])){
          $v_f_tribe = $_POST['f_tribe'];
      }else{
          $f_tribe_error = "Incorrect Father\'s tribe";
      }
    }else{
      $f_tribe_error = "Father\'s tribe is not entered";
    }
  }
  if(isset($_POST['f_p_birth'])){
    if(!empty($_POST['f_p_birth'])){
      if(preg_match($reg_name, $_POST['f_p_birth'])){
          $v_f_p_birth = $_POST['f_p_birth'];
      }else{
          $f_p_birth_error = "Incorrect Father\'s place of birth";
      }
    }else{
      $f_p_birth_error = "Father\'s place of birth is not entered";
    }
  }
  if(isset($_POST['m_name'])){
    if(!empty($_POST['m_name'])){
      if(preg_match($reg_name, $_POST['m_name'])){
          $v_m_name = $_POST['m_name'];
      }else{
          $m_name_error = "Incorrect Mother\'s name";
      }
    }else{
      $m_name_error = "Mothers name is not entered";
    }
  }
  if(isset($_POST['m_tribe'])){
    if(!empty($_POST['m_tribe'])){
      if(preg_match($reg_name, $_POST['m_tribe'])){
          $v_m_tribe = $_POST['m_tribe'];
      }else{
          $m_tribe_error = "Incorrect Mother\'s tribe";
      }
    }else{
      $m_tribe_error = "Mother\'s tribe is not entered";
    }
  }
  if(isset($_POST['m_p_birth'])){
    if(!empty($_POST['m_p_birth'])){
      if(preg_match($reg_name, $_POST['m_p_birth'])){
          $v_m_p_birth = $_POST['m_p_birth'];
      }else{
          $m_p_birth_error = "Incorrect Mother\'s place of birth";
      }
    }else{
      $m_p_birth_error = "Mother\'s place of birth is not entered";
    }
  }
  if(isset($_POST['s_attended'])){
    if(!empty($_POST['s_attended'])){
      if(preg_match($reg_name, $_POST['s_attended'])){
          $v_s_attended = $_POST['s_attended'];

      }else{
          $s_attended_error = "Incorrect School name format";
      }
    }else{
      $s_attended_error = "Schools attended is not entered";
    }
  }
  if(isset($_FILES['a_sign'])){
    print("Signature set!!!!");
    print($_FILES['a_sign']['tmp_name']);
    $file = $_FILES['a_sign']['name'];
    $file_tmp = $_FILES['a_sign']['tmp_name'];

    if(getimagesize($_FILES['a_sign']['tmp_name'])){
          $num = 1;
          $ter_dir = "Signatures/";
          $s_path = "s_a_".$num;
          $s_id = $num;
          $path = $ter_dir.$s_path;
          move_uploaded_file($file_tmp, $path);
    }else{
      $a_sign_error = "This is not an image";
    }
  }
  if(isset($_POST['a_d_sign'])){
    if(!empty($_POST['a_d_sign'])){
      if(preg_match($_POST['a_d_sign'], $reg_name)){
          $v_a_d_sign = $_POST['a_d_sign'];
      }
    }else{
      $a_d_sign_error = "Applicants sign date is not entered";
    }
  }
  if(isset($_POST['wit'])){
    if(!empty($_POST['wit'])){
      if(preg_match($reg_name, $_POST['wit'])){
          $v_wit = $_POST['wit'];
      }
    }else{
      $wit_error = "Witness is not entered";
    }
  }
  if(isset($_FILES['wit_sign'])){
    print("Signature set!!!!");
    $file = $_FILES['wit_sign']['name'];
    $file_tmp = $_FILES['wit_sign']['tmp_name'];

    if(getimagesize($_FILES['wit_sign']['tmp_name'])){
          $num = 1;
          $ter_dir = "Signatures/";
          $s_path = "s_h_".$num;
          $s_id = $num;
          $path = $ter_dir.$s_path;
          move_uploaded_file($file_tmp, $path);
    }else{
      $wit_sign_error = "This is not an image";
    }
  }

  if(isset($_POST['wit_d_sign'])){
    if(!empty($_POST['wit_d_sign'])){
      if(preg_match($reg_date, $_POST['wit_d_sign'])){
          $v_wit_d_sign = $_POST['wit_d_sign'];
      }
    }else{
      $wit_d_sign_error = "Witness signature date is not entered";
    }
  }
  if(isset($_POST['head'])){
    if(!empty($_POST['head'])){
      if(preg_match($reg_name, $_POST['head'])){
          $v_head = $_POST['head'];
      }else{
        $head_error = "Incorrect head name";
      }
    }else{
      $head_error = "Head name is not entered";
    }
  }
  if(isset($_FILES['head_sign'])){
    $file = $_FILES['head_sign']['name'];
    $file_tmp = $_FILES['head_sign']['tmp_name'];

    if(getimagesize($_FILES['head_sign']['tmp_name'])){
          $num = 1;
          $ter_dir = "Signatures/";
          $s_path = "s_h_".$num;
          $s_id = $num;
          $path = $ter_dir.$s_path;
          move_uploaded_file($file_tmp, $path);
      }else{
        $head_sign_error = "Signature is not entered";
      }
  }

  if(isset($_POST['head_d_sign'])){
    if(!empty($_POST['head_d_sign'])){
      if(preg_match($reg_name, $_POST['head_d_sign'])){
          $v_head_d_sign = $_POST['head_d_sign'];
      }
    }else{
      $head_d_sign_error = "Head sign date is not entered";
    }
  }
  if(isset($_POST['sec'])){
    if(!empty($_POST['sec'])){
      if(preg_match($reg_name, $_POST['sec'])){
          $v_sec = $_POST['sec'];
      }else{
          $sec_error = "incorrect Secretary name";
      }
    }else{
      $sec_error = "Secretary name is not entered";
    }
  }
  if(isset($_FILES['sec_sign'])){
    $file = $_FILES['sec_sign']['name'];
    $file_tmp = $_FILES['sec_sign']['tmp_name'];

    if(getimagesize($_FILES['sec_sign']['tmp_name'])){
          $num = 1;
          $ter_dir = "Signatures/";
          $s_path = "s_s_".$num;
          $s_id = $num;
          $path = $ter_dir.$s_path;
          move_uploaded_file($file_tmp, $path);
    }else{
      $sec_sign_error = "Thi is not a image";
    }
  }
  if(isset($_POST['sec_d_sign'])){
    if(!empty($_POST['sec_d_sign'])){
      if(preg_match($reg_date, $_POST['sec_d_sign'])){
          $v_sec_d_sign = $_POST['sec_d_sign'];
      }else{
          $sec_d_sign_error = "invalid signature date";
      }
    }else{
      $sec_d_sign_error = "Sec sign date is not entered";
    }
  }
  if(isset($_POST['cert_no'])){
    if(!empty($_POST['cert_no'])){
      if(preg_match($reg_name, $_POST['cert_no'])){
          $v_cert_no = $_POST['cert_no'];
      }
    }else{
      $cert_no_error = "Cert No is not entered";
    }
  }
  if(isset($_FILES['cert_sign'])){
    $file = $_FILES['cert_sign']['name'];
    $file_tmp = $_FILES['cert_sign']['tmp_name'];

    if(getimagesize($_FILES['cert_sign']['tmp_name'])){
          $num = 1;
          $ter_dir = "Signatures/";
          $s_path = "s_c_".$num;
          $s_id = $num;
          $path = $ter_dir.$s_path;
          move_uploaded_file($file_tmp, $path);
    }else{
      $cert_sign_error = "This is not an image";
    }
  }
  if(isset($_POST['cert_d_sign'])){
    if(!empty($_POST['cert_d_sign'])){
      if(preg_match($reg_date, $_POST['cert_d_sign'])){
          $v_cert_d = $_POST['cert_d_sign'];
      }
    }else{
      $cert_d_sign_error = "Cert sign date is not entered";
    }
  }
    //print_r($v);
    if(count(array_keys($v)) == $_SERVER['CONTENT_LENGTH']){

      $conn = connect();
      if($conn){
        $cert_no = generateCertNo();
        $stm1 = "INSERT INTO user_info(ID, FullName, Address, DateOfBirth, PlaceOfBirth, FatherName, FatherTribe, FatherBirth, MotherName, MotherTribe, MotherBirth) VALUES(NULL, $v_name, $v_address, $v_d_birth, $v_p_birth, $v_f_name, $v_f_tribe, $v_f_p_birth, $v_m_name, $v_m_tribe, $v_m_p_birth)";
        $stm2 = "INSERT INTO School(NAME, CERTIFICATE, DATE, ID) VALUES($v_s_attended, 'SSCE', NOW(), NULL)";
        $stm3 = "INSERT INTO Applicant_sign(ID, APP_SIGN_DATE) VALUES(NULL, NOW())";
        $stm4 = "INSERT INTO Witness(ID, WIT_NAME, WIT_SIGN_DATE) VALUES(NULL, $v_wit_name, $v_wit_sign_date)";
        $stm5 = "INSERT INTO HEAD(ID, HEAD_NAME, HEAD_SIGN_DATE) VALUES(NULL, $v_head_name, $v_wit_sign_date)";
        $stm6 = "INSERT INTO Secretary(ID, SEC_NAME, SEC_SIGN_DATE) VALUES(NULL, $v_sec_name, $v_sec_sign_date)";
        $stm7 = "INSERT INTO certificate(ID, CERT_NO, CERT_SIGN_DATE) VALUES(NULL, $v_cert_no, $v_cert_sign_date)";
        echo "Good one";
      }else{
        echo $error = "Server not available";
      }
    }else{
      //header("Location: ");
      echo "data are not intact";
    }


  function uploadFile($filename){
    $terget = "C://";
    $path = $_FILES[filename]['name'];
    $t = $_FILES[filename]['type'];
    if($t){
      $error = 200;
    }else{
      $error = "Invalid signature";
    }
    return $error;
  }

  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Web based indigene certificate</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width.=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Zaria Local Goverment Indegine certificate">
    <meta name="description" content="A web based Indegine certificate for Zaria Local Goverment">
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

	<script>
		function addField(){
        var par = document.getElementById("snode").parentNode;
        child = par.children;
        if(child.length < 4){
          var node = document.createElement("input")
          par.appendChild(node)
        }else if(child.length == 4){ //It's because we have a label inside
          var node = document.createElement('p')
          var t_node = document.createTextNode("You can only add 3 more schools")
          par.append(t_node);

        }
    }
	</script>

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
	          <li class="nav-item cta"><a href="apply.php" class="nav-link" data-toggle="modal" data-target="#modalAppointment">Apply</a></li>
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
            <p><a href="#" class="btn btn-primary py-3 px-4" data-toggle="modal" data-target="#modalAppointment">Apply now</a></p>
          </div>
        </div>
      </div>
    </section>

    <!-- Info-->
    <section class="ftco-section ftco-counter ftco-no-pt ftco-no-pb img" id="section-counter">
    	<div class="container">
    		<div class="row d-md-flex align-items-center justify-content-end">
    			<div class="col-lg-12">
    				<div class="ftco-counter-wrap">
	    				<div class="row no-gutters d-md-flex align-items-center align-items-stretch">
			          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
			            <div class="block-18">
			              <div class="text">
			              	<div class="icon d-flex justify-content-center align-items-center">
			              		<span class="flaticon-house"></span>
			              	</div>
			                <strong class="number" data-number="50">0</strong>
			                <span>Years of Experience</span>
			              </div>
			            </div>
			          </div>
			          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
			            <div class="block-18">
			              <div class="text">
			              	<div class="icon d-flex justify-content-center align-items-center">
			              		<span class="flaticon-handshake"></span>
			              	</div>
			                <strong class="number" data-number="10000">0</strong>
			                <span>Trusted Partners</span>
			              </div>
			            </div>
			          </div>
			          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
			            <div class="block-18">
			              <div class="text">
			              	<div class="icon d-flex justify-content-center align-items-center">
			              		<span class="flaticon-lawyer"></span>
			              	</div>
			                <strong class="number" data-number="564">0</strong>
			                <span>Trusted Members</span>
			              </div>
			            </div>
			          </div>
			          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
			            <div class="block-18">
			              <div class="text">
			              	<div class="icon d-flex justify-content-center align-items-center">
			              		<span class="flaticon-medal"></span>
			              	</div>
			                <strong class="number" data-number="300">0</strong>
			                <span>Indigenes Issued</span>
			              </div>
			            </div>
			          </div>
		          </div>
		        </div>
          </div>
        </div>
    	</div>
    </section>
    <!-- Info-->
    <!-- Members-->

    <!-- Members-->

    <section class="ftco-about ftco-no-pt ftco-no-pb img ftco-section bg-light">
    	<div class="container">
    		<div class="row d-flex">
    			<div class="col-md-6 col-lg-6 d-flex">
    				<div class="img-about img d-flex align-items-stretch">
	    				<div class="img d-flex align-self-stretch align-items-end" style="background-image:url(images/about-1.jpg);">
	    				</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-6 pl-lg-5 py-5">
    				<div class="row justify-content-start pb-3">
		          <div class="col-md-12 heading-section ftco-animate pb-5">
		          	<span class="subheading">Testimonials</span>
		            <h2 class="mb-4" style="font-size: 44px; text-transform: capitalize;">Our Testimonials</h2>
		          </div>
		          <div class="col-md-12 testimony-section">
								<div class="owl-carousel carousel-testimony">
									<div class="item">
										<div class="testimony-wrap">
				          		<div class="text mb-5">
				          			<div class="icon">
				          				<span class="icon-quote-left"></span>
				          			</div>
				          			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				          		</div>
				          		<div class="d-flex">
				          			<div class="user-img img mr-3" style="background-image: url(images/person_1.jpg);"></div>
				          			<div>
				          				<p class="name mb-0">Luis Fox</p>
			                    <span class="position">Businessman</span>
				          			</div>
				          		</div>
				          	</div>
									</div>
									<div class="item">
										<div class="testimony-wrap">
				          		<div class="text mb-5">
				          			<div class="icon">
				          				<span class="icon-quote-left"></span>
				          			</div>
				          			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				          		</div>
				          		<div class="d-flex">
				          			<div class="user-img img mr-3" style="background-image: url(images/person_2.jpg);"></div>
				          			<div>
				          				<p class="name mb-0">Luis Fox</p>
			                    <span class="position">Businessman</span>
				          			</div>
				          		</div>
				          	</div>
									</div>
									<div class="item">
										<div class="testimony-wrap">
				          		<div class="text mb-5">
				          			<div class="icon">
				          				<span class="icon-quote-left"></span>
				          			</div>
				          			<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
				          		</div>
				          		<div class="d-flex">
				          			<div class="user-img img mr-3" style="background-image: url(images/person_3.jpg);"></div>
				          			<div>
				          				<p class="name mb-0">Luis Fox</p>
			                    <span class="position">Businessman</span>
				          			</div>
				          		</div>
				          	</div>
									</div>
								</div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>


    <section class="ftco-section bg-light" id="attorneys-section">
    	<div class="container">
    		<div class="row justify-content-center pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
          	<span class="subheading">About Us</span>
            <h2 class="mb-4">Our Legal Attorneys</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row">
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/staff-1.jpg);"></div>
							</div>
							<div class="text d-flex align-items-center pt-3 text-center">
								<div>
									<h3 class="mb-2">Lloyd Wilson</h3>
									<span class="position mb-4">CEO, Founder</span>
									<div class="faded">
										<ul class="ftco-social text-center">
			                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              </ul>
		              </div>
		            </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/staff-2.jpg);"></div>
							</div>
							<div class="text d-flex align-items-center pt-3 text-center">
								<div>
									<h3 class="mb-2">Rachel Parker</h3>
									<span class="position mb-4">Business Lawyer</span>
									<div class="faded">
										<ul class="ftco-social text-center">
			                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              </ul>
		              </div>
		            </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/staff-3.jpg);"></div>
							</div>
							<div class="text d-flex align-items-center pt-3 text-center">
								<div>
									<h3 class="mb-2">Ian Smith</h3>
									<span class="position mb-4">Insurance Lawyer</span>
									<div class="faded">
										<ul class="ftco-social text-center">
			                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              </ul>
		              </div>
		            </div>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url(images/staff-4.jpg);"></div>
							</div>
							<div class="text d-flex align-items-center pt-3 text-center">
								<div>
									<h3 class="mb-2">Alicia Henderson</h3>
									<span class="position mb-4">Criminal Law</span>
									<div class="faded">
										<ul class="ftco-social text-center">
			                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              </ul>
		              </div>
		            </div>
							</div>
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
                <li><a href="apply.php"><span class="icon-long-arrow-right mr-2"></span>Apply</a></li>
                <li><a href="contact.html"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>

          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-0">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Madaki Aliyu Shehu Idris secretariat, Kofar Fada, Zaria City</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">Zarialgc@yahoo.com</span></a></li>
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


  <!-- Modal -->
    <div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Name of Applicant</label>
                <input type="text" name="name" class="form-control" id="appointment_name">
                <span class="text-danger"><?php if(isset($name_error)) echo $name_error; ?></span>
              </div>
              <div class="form-group">
                <label for="appointment_name" class="text-black">Full Address</label>
                <input type="text" name="address" class="form-control" id="appointment_name">
                <span class="text-danger"><?php if(isset($address_error)) echo $address_error; ?></span>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_dat" class="text-black">Date of Birth</label>
                    <input type="date" name="d_birth" class="form-control" id="appointment_dat">
                    <span class="text-danger"><?php if(isset($d_birth_error)) echo $d_birth_error; ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_name" class="text-black">Place of Birth</label>
                    <input type="text"  name="p_birth" class="form-control" id="appointment_name">
                    <span class="text-danger"><?php if(isset($p_birth_error)) echo $p_birth_error; ?></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="appointment_name" class="text-black">Father's Name</label>
                <input type="text"  name="f_name" class="form-control" id="appointment_name">
                <span class="text-danger"><?php if(isset($f_name_error)) echo $f_name_error; ?></span>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_name" class="text-black">Father's Tribe</label>
                    <input type="text"  name="f_tribe"  class="form-control" id="appointment_name">
                    <span class="text-danger"><?php if(isset($f_tribe_error)) echo $f_tribe_error; ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_name" class="text-black">Father's Place of Birth</label>
                    <input type="text"  name="f_p_birth"  class="form-control" id="appointment_name">
                    <span class="text-danger"><?php if(isset($f_p_birth_error)) echo $f_p_birth_error; ?></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="appointment_name" class="text-black">Mother's Name</label>
                <input type="text" name="m_name" class="form-control" id="appointment_name">
                <span class="text-danger"><?php if(isset($p_birth_error)) echo $p_birth_error; ?></span>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_name" class="text-black">Mother's Tribe</label>
                    <input type="text" name="m_tribe" class="form-control" id="appointment_name">
                    <span class="text-danger"><?php if(isset($m_name_error)) echo $m_name_error; ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_name" class="text-black">Mother's Place of Birth</label>
                    <input type="text"  name="m_p_birth" class="form-control" id="appointment_name">
                    <span class="text-danger"><?php if(isset($m_p_birth_error)) echo $m_p_birth_error; ?></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_name" class="text-black">SCHOOL ATTENDED</label>
                    <input type="text"  name="s_attended"  class="form-control" id="appointment_name">
                    <span class="text-danger"><?php if(isset($s_attended_error)) echo $s_attended_error; ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" id="snode">
                    <p><a href="addSchool.php">Add School</a></p>
                    <label for="" class="text-black">Add SCHOOL</label>

                      <input type="button" onClick="addField()" name="add" style="background-color:blue;" class="form-contro btn text-white" value="Add" id="add_id"/>

                  </div>

                </div>
              </div>
              <p><span>I certify that the above information are correct</span>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_name" class="text-black">Applicant's Signature</label>
                    <input type="file"  name="a_sign" class="form-control-file-border" id="appointment_name">
                    <span class="text-danger"><?php if(isset($a_sign_error)) echo $a_sign_error; ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_dat" class="text-black">Date</label>
                    <input type="date"  name="a_d_sign"  class="form-control" id="appointment_dat">
                    <span class="text-danger"><?php if(isset($a_d_sign_error)) echo $a_d_sign_error; ?></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="appointment_name" class="text-black">WITNESS/GUARANTOR</label>
                <input type="text" name="wit" class="form-control" id="appointment_name">
                <span class="text-danger"><?php if(isset($wit_error)) echo $wit_error; ?></span>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_name" class="text-black">Signature</label>
                    <input type="file"  name="wit_sign" class="form-control-file-border" id="appointment_name">
                    <span class="text-danger"><?php if(isset($wit_sign_error)) echo $wit_sign_error; ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">Date</label>
                    <input type="date"  name="wit_d_sign" class="form-control" id="appointment_date">
                    <span class="text-danger"><?php if(isset($wit_d_sign_error)) echo $wit_d_sign_error; ?></span>
                  </div>
                </div>
              </div>
              <p><span>RECOMMENDATION BY APPLICANTS' VILLAGE/WARD HEAD</span>
              <div class="form-group">
                <label for="appointment_name" class="text-black">1. Original Document Sited by</label>
                <input type="text"  name="head" class="form-control" id="appointment_name">
                <span class="text-danger"><?php if(isset($head_error)) echo $head_error; ?></span>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_name" class="text-black">Signature</label>
                    <input type="file"  name="head_sign" class="form-control-file-border" id="appointment_name">
                    <span class="text-danger"><?php if(isset($head_sign_error)) echo $head_sign_error; ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">Date</label>
                    <input type="date" name="head_d_sign" class="form-control" id="appointment_date">
                    <span class="text-danger"><?php if(isset($head_d_sign_error)) echo $head_d_sign_error; ?></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="appointment_name" class="text-black">2. Approved by</label>
                <input type="text"  name="sec" class="form-control" id="appointment_name">
                <span class="text-danger"><?php if(isset($sec_error)) echo $sec_error; ?></span>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_name" class="text-black">Signature</label>
                    <input type="file"  name="sec_sign" class="form-control-file-border" id="appointment_name">
                    <span class="text-danger"><?php if(isset($p_birth_error)) echo $p_birth_error; ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">Date</label>
                    <input type="date"  name="sec_d_sign" class="form-control" id="appointment_date">
                    <span class="text-danger"><?php if(isset($sec_sign_error)) echo $sec_sign_error; ?></span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="appointment_name" class="text-black">3. Certificate No</label>
                <input type="text"  name="cert_no" class="form-control" id="appointment_name">
                <span class="text-danger"><?php if(isset($cert_no_error)) echo $cert_no_error; ?></span>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_name" class="text-black">Signature</label>
                    <input type="file"  name="cert_sign" class="form-control-file-border" id="appointment_name">
                    <span class="text-danger"><?php if(isset($cert_sign_error)) echo $cert_sign_error; ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">Date</label>
                    <input type="date"  name="cert_d_sign" class="form-control" id="appointment_date">
                    <span class="text-danger"><?php if(isset($cert_d_sign_error)) echo $cert_d_sign_error; ?></span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <input name="apply" type="submit" value="Apply" class="btn btn-primary">
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>


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
