<!DOCTYPE html>
<?php
session_start();
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

  if($_FILES['passport']['tmp_name']){
    //print("Signature set!!!!");
    $file = $_FILES['passport']['name'];
    $file_tmp = $_FILES['passport']['tmp_name'];
    //$ext = end(explode(".", $_FILES['passport']['name']));
    $ext = explode(".", $_FILES['passport']['name']);
    $i = count($ext)-1;
    if(getimagesize($_FILES['passport']['tmp_name']) and $ext[$i] == "png"){
          $num = getLastID()+1;
          $ter_dir = "Signatures/";
          $s_path = "passport".$num;
          $s_id = $num;
          $path = $ter_dir.$s_path;
          move_uploaded_file($file_tmp, $path);
          $v_passport = true;
    }else{
      $passport_error = "This is not an image or PNG file";
    }
  }else{
    $passport_error = "Passport is required";
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

  if(isset($_POST['c_type'])){
    if(!empty($_POST['c_type'])){
      if(preg_match($reg_name, $_POST['c_type'])){
          $v_c_type = $_POST['c_type'];

      }else{
          $c_type_error = "Incorrect certificate name format";
      }
    }else{
      $c_type_error = "Certificate type is not entered";
    }
  }

  if(isset($_POST['s_date'])){
    if(!empty($_POST['s_date'])){
      if(preg_match($reg_date, $_POST['s_date'])){
          $v_s_date = $_POST['s_date'];
      }
    }else{
      $s_d_error = " school attended date is not entered";
    }
  }


  if(isset($_POST['s_attended2'])){
    if(!empty($_POST['s_attended2'])){
      if(preg_match($reg_name, $_POST['s_attended2'])){
          $v_s_attended2 = $_POST['s_attended2'];

      }else{
          $s_attended2_error = "Incorrect School name format";
      }
    }
  }

  if(isset($_POST['c_type2'])){
    if(!empty($_POST['c_type2'])){
      if(preg_match($reg_name, $_POST['c_type2'])){
          $v_c_type2 = $_POST['c_type2'];

      }else{
          $c_type2_error = "Incorrect certificate name format";
      }
    }
  }

  if(isset($_POST['s_date2'])){
    if(!empty($_POST['s_date2'])){
      if(preg_match($reg_date, $_POST['s_date2'])){
          $v_s_date2 = $_POST['s_date2'];
      }else{
        $s_d2_error = "Invalid date";
      }
    }
  }

  if(isset($_POST['s_attended3'])){
    if(!empty($_POST['s_attended3'])){
      if(preg_match($reg_name, $_POST['s_attended3'])){
          $v_s_attended3 = $_POST['s_attended3'];

      }else{
          $s_attended3_error = "Incorrect School name format";
      }
    }else{
      $v_s_attended3 = "";
    }
  }

  if(isset($_POST['c_type3'])){
    if(!empty($_POST['c_type3'])){
      if(preg_match($reg_name, $_POST['c_type3'])){
          $v_c_type3 = $_POST['c_type3'];

      }else{
          $c_type3_error = "Incorrect certificate name format";
      }
    }else{
      $v_c_type3 = "";
    }
  }

  if(isset($_POST['s_date3'])){
    if(!empty($_POST['s_date3'])){
      if(preg_match($reg_date, $_POST['s_date3'])){
          $v_s_date3 = $_POST['s_date3'];
      }else{
        $s_d3_error = "Invalid date";
      }
    }else{
        $v_s_date3 = "";
    }
  }



  if($_FILES['a_sign']['tmp_name']){
    print("Signature set!!!!");
    print($_FILES['a_sign']['tmp_name']);
    $file = $_FILES['a_sign']['name'];
    $file_tmp = $_FILES['a_sign']['tmp_name'];
    $v_a_sign = $_FILES['a_sign']['name'];
    $ext = explode(".", $_FILES['a_sign']['name']);
    $i = count($ext)-1;
    if(getimagesize($_FILES['a_sign']['tmp_name']) and $ext[$i] == "png"){
          $num = getLastID()+1;
          //echo $num;
          $ter_dir = "Signatures/";
          $s_path = "s_a_".$num;
          $s_id = $num;
          $path = $ter_dir.$s_path;
          move_uploaded_file($file_tmp, $path);
          $v_a_sig = true;
    }else{
      $a_sign_error = "This is not an image or PNG file";
    }
  }else{
    $a_sign_error = "Signature is required";
  }

  if(isset($_POST['wit'])){
    if(!empty($_POST['wit'])){
      if(preg_match($reg_name, $_POST['wit'])){
          $v_wit_name = $_POST['wit'];
      }
    }else{
      $wit_error = "Witness is not entered";
    }
  }
  if($_FILES['wit_sign']['tmp_name']){
    print("Signature set!!!!");
    $file = $_FILES['wit_sign']['name'];
    $file_tmp = $_FILES['wit_sign']['tmp_name'];
    $ext = explode(".", $_FILES['wit_sign']['name']);
    $i = count($ext)-1;
    if(getimagesize($_FILES['wit_sign']['tmp_name']) and $ext[$i] == "png"){
          $num = 1;
          $ter_dir = "Signatures/";
          $s_path = "s_h_".$num;
          $s_id = $num;
          $path = $ter_dir.$s_path;
          move_uploaded_file($file_tmp, $path);
          $v_wit_sign = true;
    }else{
      $wit_sign_error = "This is not a valid signature or PNG file";
    }
  }else{
    $wit_sign_error = "Signature is required";
  }

  if(isset($_POST['wit_d_sign'])){
    if(!empty($_POST['wit_d_sign'])){
      if(preg_match($reg_date, $_POST['wit_d_sign'])){
          $v_wit_d_sign = $_POST['wit_d_sign'];
      }else{
        $wit_d_sign_error = "Witness signature date is not correct";
      }
    }else{
      $wit_d_sign_error = "Witness signature date is not entered";
    }
  }
  if(isset($_POST['head'])){
    if(!empty($_POST['head'])){
      if(preg_match($reg_name, $_POST['head'])){
          $v_head_name = $_POST['head'];
      }else{
        $head_error = "Incorrect header name";
      }
    }else{
      $head_error = "Header name is not entered";
    }
  }
  if($_FILES['head_sign']['tmp_name']){
    $file = $_FILES['head_sign']['name'];
    $file_tmp = $_FILES['head_sign']['tmp_name'];
    $ext = explode(".", $_FILES['head_sign']['name']);
    $i = count($ext)-1;
    if(getimagesize($_FILES['head_sign']['tmp_name']) and $ext[$i] == "png"){
          $num = 1;
          $ter_dir = "Signatures/";
          $s_path = "s_h_".$num;
          $s_id = $num;
          $path = $ter_dir.$s_path;
          move_uploaded_file($file_tmp, $path);
          $v_head_sign = true;
      }else{
        $head_sign_error = "Signature is not valid or is not a PNG file";
      }
  }else{
    $head_sign_error = "Signature is not entered";
  }

  if(isset($_POST['head_d_sign'])){
    if(!empty($_POST['head_d_sign'])){
      if(preg_match($reg_date, $_POST['head_d_sign'])){
          $v_head_d_sign = $_POST['head_d_sign'];
      }
    }else{
      $head_d_sign_error = "Head signature date is not entered";
    }
  }
  if(isset($_POST['sec'])){
    if(!empty($_POST['sec'])){
      if(preg_match($reg_name, $_POST['sec'])){
          $v_sec_name = $_POST['sec'];
      }else{
          $sec_error = "incorrect Secretary name";
      }
    }else{
      $sec_error = "Secretary name is not entered";
    }
  }
  if($_FILES['sec_sign']['tmp_name']){
    $file = $_FILES['sec_sign']['name'];
    $file_tmp = $_FILES['sec_sign']['tmp_name'];
    $ext = explode(".", $_FILES['sec_sign']['name']);
    $i = count($ext)-1;
    if(getimagesize($_FILES['sec_sign']['tmp_name']) and $ext[$i] == "png"){
          $num = 1;
          $ter_dir = "Signatures/";
          $s_path = "s_s_".$num;
          $s_id = $num;
          $path = $ter_dir.$s_path;
          move_uploaded_file($file_tmp, $path);
          $v_sec_sign = true;
    }else{
      $sec_sign_error = "Inavlid signature or not a PNG file";
    }
  }else{
    $sec_sign_error = "Signature is required";
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

    if(isset($v_name) and isset($v_address) and isset($v_d_birth) and isset($v_p_birth) and isset($v_passport) and isset($v_f_name) and isset($v_f_tribe) and isset($v_f_p_birth) and isset($v_m_name) and isset($v_m_tribe) and isset($v_m_p_birth) ){

      $v_cert_no = generateCertNo(); //Certificate ID

        if(isset($v_s_attended) and isset($v_c_type) and isset($v_s_date) and isset($v_wit_name) and isset($v_wit_d_sign) and isset($v_head_name) and isset($v_head_d_sign) and isset($v_sec_name) and isset($v_sec_d_sign) and isset($v_cert_no)){
          if(isset($v_a_sign) and isset($v_head_sign) and isset($v_wit_sign) and isset($v_sec_sign)){
          //echo "The second data is set too";
          $conn = connect();
          if($conn){
            $stm1 = "INSERT INTO user_info(ID, FullName, Address, DateOfBirth, PlaceOfBirth, FatherName, FatherTribe, FatherBirth, MotherName, MotherTribe, MotherBirth) VALUES(NULL, '$v_name', '$v_address', '$v_d_birth','$v_p_birth', '$v_f_name', '$v_f_tribe', '$v_f_p_birth', '$v_m_name', '$v_m_tribe', '$v_m_p_birth')";
            //$stm1 = "INSERT INTO user_info(ID, FullName, Address, DateOfBirth, PlaceOfBirth, FatherName, FatherTribe, FatherBirth, MotherName, MotherTribe, MotherBirth) VALUES(NULL, '$v_name', '$v_address', $v_d_birth, 'Kaduna', 'Hamza Sani Ummar', 'Hausa', 'Kano', 'Hafsatu Sani Sadiq', 'Igbo', 'Abuja')";
            $query1 = set($stm1);
            if($query1){
              $stm2 = "INSERT INTO School(NAME, CERTIFICATE, DATE, ID) VALUES('$v_s_attended', '$v_c_type', '$v_s_date' , NULL)";
              $query2 = set($stm2);
              if($query2){
              $stm3 = "INSERT INTO Applicant_sign(ID, APP_SIG_DATE) VALUES(NULL, NOW())";
              $query3 = set($stm3);
              if($query3){
                $stm4 = "INSERT INTO Witness(ID, WIT_NAME, WIT_SIG_DATE) VALUES(NULL, '$v_wit_name', '$v_wit_d_sign')";
                $query4 = set($stm4);
                if($query4){
                  $stm5 = "INSERT INTO HEAD(ID, HEAD_NAME, HEAD_SIG_DATE) VALUES(NULL, '$v_head_name', '$v_head_d_sign')";
                  $query5 = set($stm5);
                  if($query5){
                    $stm6 = "INSERT INTO Secretary(ID, SEC_NAME, SEC_SIG_DATE) VALUES(NULL, '$v_sec_name', '$v_sec_d_sign')";
                    $query6 = set($stm6);
                    if($query6){
                      $stm7 = "INSERT INTO certificate(ID, CERT_NO, CERT_SIG_DATE) VALUES(NULL, '$v_cert_no', NOW())";
                      $query7 = set($stm7);
                      if($query7){
                        $stm8 = "INSERT INTO AdditionalSchools(ID, NAME1, CERTIFICATE1, DATE1, NAME2, CERTIFICATE2, DATE2) VALUES(NULL, '$v_s_attended2', '$v_c_type2', '$v_s_date2', '$v_s_attended3', '$v_c_type3', '$v_s_date3' )";
                        $query8 = set($stm8);
                        if($query8){
                          $_SESSION['CERT_ID'] = $v_cert_no;
                          header("Location: result.php");
                        }
                      }
                    }
                  }
                  }
                }
              }
            }

          }else{
             $error = "Server not available";
          }
        }else{
          //header("Location: ");
          //echo "Data are not ok";
        }
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

    <script>
  		function addField(){
          var par = document.getElementById("snode").parentNode;
          child = par.children;
          if(child.length < 16){
              var node1 = document.createElement("input")
              par.appendChild(node1)
              var node2 = document.createElement("input")
              par.appendChild(node2)
              var node3 = document.createElement("input")
              par.appendChild(node3)


          }else if(child.length == 4){ //It's because we have a label inside
            //var node = document.createElement('p')
            //var t_node = document.createTextNode("You can only add 3 more schools")
            //par.append(t_node);

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

    <section>
      <div class="col-md-8">
        <div class="container"><h3>Apply here</h3></div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="appointment_name" class="text-black">Name of Applicant</label>
            <input type="text" name="name" class="form-control" id="appointment_name" value="<?php if(isset($v_name)) echo $v_name; ?>">
            <span class="text-danger"><?php if(isset($name_error)) echo $name_error; ?></span>
          </div>
          <div class="form-group">
            <label for="appointment_name" class="text-black">Full Address</label>
            <input type="text" name="address" class="form-control" id="appointment_name" value="<?php if(isset($v_address)) echo $v_address; ?>">
            <span class="text-danger"><?php if(isset($address_error)) echo $address_error; ?></span>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_dat" class="text-black">Date of Birth</label>
                <input type="date" name="d_birth" class="form-control" id="appointment_dat" value="<?php if(isset($v_d_birth)) echo $v_d_birth; ?>">
                <span class="text-danger"><?php if(isset($d_birth_error)) echo $d_birth_error; ?></span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Place of Birth</label>
                <input type="text"  name="p_birth" class="form-control" id="appointment_name" value="<?php if(isset($v_p_birth)) echo $v_p_birth; ?>">
                <span class="text-danger"><?php if(isset($p_birth_error)) echo $p_birth_error; ?></span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Applicant's Passport</label>
                <input type="file"  name="passport" class="form-control-file" id="appointment_name" value="<?php if(isset($v_passport)) echo $v_passport; ?>">
                <span class="text-danger"><?php if(isset($passport_error)) echo $passport_error; ?></span>
              </div>
            </div>
            </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">Father's Name</label>
            <input type="text"  name="f_name" class="form-control" id="appointment_name" value="<?php if(isset($v_f_name)) echo $v_f_name; ?>">
            <span class="text-danger"><?php if(isset($f_name_error)) echo $f_name_error; ?></span>
          </div>
        </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Father's Tribe</label>
                <input type="text"  name="f_tribe"  class="form-control" id="appointment_name" value="<?php if(isset($v_f_tribe)) echo $v_f_tribe; ?>">
                <span class="text-danger"><?php if(isset($f_tribe_error)) echo $f_tribe_error; ?></span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Father's Place of Birth</label>
                <input type="text"  name="f_p_birth"  class="form-control" id="appointment_name" value="<?php if(isset($v_f_p_birth)) echo $v_f_p_birth; ?>">
                <span class="text-danger"><?php if(isset($f_p_birth_error)) echo $f_p_birth_error; ?></span>
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">Mother's Name</label>
            <input type="text" name="m_name" class="form-control" id="appointment_name" value="<?php if(isset($v_m_name)) echo $v_m_name; ?>">
            <span class="text-danger"><?php if(isset($p_birth_error)) echo $p_birth_error; ?></span>
          </div>
          </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Mother's Tribe</label>
                <input type="text" name="m_tribe" class="form-control" id="appointment_name" value="<?php if(isset($v_m_tribe)) echo $v_m_tribe; ?>">
                <span class="text-danger"><?php if(isset($m_name_error)) echo $m_name_error; ?></span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Mother's Place of Birth</label>
                <input type="text"  name="m_p_birth" class="form-control" id="appointment_name" value="<?php if(isset($v_m_p_birth)) echo $v_m_p_birth; ?>">
                <span class="text-danger"><?php if(isset($m_p_birth_error)) echo $m_p_birth_error; ?></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_name" class="text-black">SCHOOL ATTENDED 1</label>
                <input type="text"  name="s_attended"  class="form-control" id="appointment_name" value="<?php if(isset($v_s_attended)) echo $v_s_attended; ?>" placeholder="Required">
                <span class="text-danger"><?php if(isset($s_attended_error)) echo $s_attended_error; ?></span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Certificate Type</label>
                <input type="text"  name="c_type"  class="form-control" id="appointment_name" value="<?php if(isset($v_c_type)) echo $v_c_type; ?>">
                <span class="text-danger"><?php if(isset($c_type_error)) echo $c_type_error; ?></span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_dat" class="text-black">Date attended </label>
                <input type="date"  name="s_date"  class="form-control" id="appointment_dat" value="<?php if(isset($v_s_date)) echo $v_s_date; ?>">
                <span class="text-danger"><?php if(isset($s_d_error)) echo $s_d_error; ?></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_name" class="text-black">SCHOOL ATTENDED 2</label>
                <input type="text"  name="s_attended2"  class="form-control" id="appointment_name" value="<?php if(isset($v_s_attended2)) echo $v_s_attended2; ?>" placeholder="Optional">
                <span class="text-danger"><?php if(isset($s_attended2_error)) echo $s_attended2_error; ?></span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Certificate Type</label>
                <input type="text"  name="c_type2"  class="form-control" id="appointment_name" value="<?php if(isset($v_c_type2)) echo $v_c_type2; ?>">
                <span class="text-danger"><?php if(isset($c_type2_error)) echo $c_type2_error; ?></span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_dat" class="text-black">Date attended</label>
                <input type="date"  name="s_date2"  class="form-control" id="appointment_dat" value="<?php if(isset($v_s_date2)) echo $v_s_date2; ?>">
                <span class="text-danger"><?php if(isset($s_d2_error)) echo $s_d2_error; ?></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_name" class="text-black">SCHOOL ATTENDED 3</label>
                <input type="text"  name="s_attended3"  class="form-control" id="appointment_name" value="<?php if(isset($v_s_attended3)) echo $v_s_attended3; ?>" placeholder="optional">
                <span class="text-danger"><?php if(isset($s_attended3_error)) echo $s_attended3_error; ?></span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Certificate Type</label>
                <input type="text"  name="c_type3"  class="form-control" id="appointment_name" value="<?php if(isset($v_c_type3)) echo $v_c_type3; ?>">
                <span class="text-danger"><?php if(isset($c_type3_error)) echo $c_type3_error; ?></span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_dat" class="text-black">Date attended</label>
                <input type="date"  name="s_date3"  class="form-control" id="appointment_dat" value="<?php if(isset($v_s_date3)) echo $v_s_date3; ?>">
                <span class="text-danger"><?php if(isset($s_d3_error)) echo $s_d3_error; ?></span>
              </div>
            </div>
          </div>

          <p><span>I certify that the above information are correct</span>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Applicant's Signature</label>
                <input type="file"  name="a_sign" class="form-control-file-border" id="appointment_name" value="<?php if(isset($v_a_sign)) echo $v_a_sign; ?>">
                <span class="text-danger"><?php if(isset($a_sign_error)) echo $a_sign_error; ?></span>
              </div>
            </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">WITNESS/GUARANTOR</label>
            <input type="text" name="wit" class="form-control" id="appointment_name" value="<?php if(isset($v_wit_name)) echo $v_wit_name; ?>">
            <span class="text-danger"><?php if(isset($wit_error)) echo $wit_error; ?></span>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">Signature</label>
            <input type="file"  name="wit_sign" class="form-control-file-border" id="appointment_name" value="<?php if(isset($v_wit_sign)) echo $v_wit_sign; ?>">
            <span class="text-danger"><?php if(isset($wit_sign_error)) echo $wit_sign_error; ?></span>
          </div>
        </div>
      </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_dat" class="text-black">Date</label>
                <input type="date"  name="wit_d_sign" class="form-control" id="appointment_dat" value="<?php if(isset($v_wit_d_sign)) echo $v_wit_d_sign; ?>">
                <span class="text-danger"><?php if(isset($wit_d_sign_error)) echo $wit_d_sign_error; ?></span>
              </div>
            </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="appointment_name" class="text-black">1. Original Document Sited by</label>
            <input type="text"  name="head" class="form-control" id="appointment_name" value="<?php if(isset($v_head_name)) echo $v_head_name; ?>">
            <span class="text-danger"><?php if(isset($head_error)) echo $head_error; ?></span>
          </div>
        </div>
      </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Signature</label>
                <input type="file"  name="head_sign" class="form-control-file-border" id="appointment_name" value="<?php if(isset($v_head_sign)) echo $v_head_sign; ?>">
                <span class="text-danger"><?php if(isset($head_sign_error)) echo $head_sign_error; ?></span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_dat" class="text-black">Date</label>
                <input type="date" name="head_d_sign" class="form-control" id="appointment_dat" value="<?php if(isset($v_head_d_sign)) echo $v_head_d_sign; ?>">
                <span class="text-danger"><?php if(isset($head_d_sign_error)) echo $head_d_sign_error; ?></span>
              </div>
            </div>
          </div>

          <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="appointment_name" class="text-black">2. Approved by</label>
              <input type="text"  name="sec" class="form-control" id="appointment_name" value="<?php if(isset($v_sec_name)) echo $v_sec_name; ?>">
              <span class="text-danger"><?php if(isset($sec_error)) echo $sec_error; ?></span>
            </div>
          </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Signature</label>
                <input type="file"  name="sec_sign" class="form-control-file-border" id="appointment_name" value="<?php if(isset($v_sec_sign)) echo $v_sec_sign; ?>">
                <span class="text-danger"><?php if(isset($sec_sign_error)) echo $sec_sign_error; ?></span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="appointment_dat" class="text-black">Date</label>
                <input type="date"  name="sec_d_sign" class="form-control" id="appointment_dat" value="<?php if(isset($v_sec_d_sign)) echo $v_sec_d_sign; ?>">
                <span class="text-danger"><?php if(isset($sec_d_sign_error)) echo $sec_d_sign_error; ?></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <input name="apply" type="submit" value="Apply" class="btn btn-primary">
          </div>
        </form>
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
