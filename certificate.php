<?php
session_start();
require_once("operations.php");

if(isset($_SESSION['v_cert_no'])){
//echo "Set";
$info = getCertInfo($_SESSION['v_cert_no']);
if($info != 0){
//echo $info[1]['ID'];
//print($info[1]['FULLName']);
?>
<html>
<head>
  <title id="print2">Certificate</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width.=device-width, initial-scale=1">
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
    function printpage(){
      document.getElementById("print1").style.display = "none";
      document.getElementById("print2").style.display = "none";
      document.getElementById("print3").style.display = "none";
      //document.getElementById("print").style.display = "none";
      window.print();
    }
  </script>

<style>
.con{
    color: black;
}
#h1{
  padding: 10px;
  letter-spacing: 3px;
  word-spacing: 5px;
  color: green;

}
.info{
  padding: 15px;
}
#body{
  padding: 100px;
}
#Symbol{
  padding-top: 10px;
}
</style>


</head>

<body>
  <section>
    <div class="container"><p><a id="print3"  class="text-success" href="index.php">Home</a></p></div>
  </section>
  <section>
  <div class="container" id="body">
  <div class="container bg-success con">
    <div class="row">
      <div class="col-md-3">
        <div class="container" id="symbol"><img src="Signatures/symbol.jfif" width="80" height="60"></div>
      </div>
      <div class="col-md-6">
        <h3 id="h1" class="display-5"><b>Zaria Local Goverment</b></h3>
        <h5 class="con" id="h1"><b>KADUNA STATE, NIGERIA</b></h5>
      </div>
      <div class="col-md-3">
        <div class="conatiner" id="symbol"><img src="<?php echo "Signatures/passport".$info[1]['ID'].'.png'; ?>" width="80" height="60"></div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <h5 class="text-danger" id="h1">Certificate Of Indigenization</h5>
      </div>
      <div class="col-md-3"></div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h6 id="h1"><code class="text-dark">This is to certify that the person whose photography and particulars appear on this document is an indigine of Zaria Local Government</code></h6>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <h6 class="info">1. Name <u> <?php echo $info[1]['FULLName']; ?></u></h6>
        <h6 class="info">2a. Father's Name <u><?php echo $info[1]['FATHERNAME']; ?></u></h6>
        <h6 class="info">2b. Tribe <u><?php echo $info[1]['FATHERTRIBE']; ?></u></h6>
        <h6 class="info">2c. Home Town <u><?php echo " ZARIA"; ?></u></h6>
        <h6 class="info">3a. Mother's Name <u><?php echo $info[1]['MOTHERNAME']; ?></u></h6>
        <h6 class="info">3b. Tribe <u><?php echo $info[1]['MOTHERTRIBE']; ?></u></h6>
        <h6 class="info">3c. Home Town <u><?php echo " ZARIA"; ?></u></h6>
      </div>
      <div class="col-md-6">
        <h6  class="info">4. Date of Birth <u><?php echo $info[1]['DATEOFBIRTH']; ?></u></h6>
        <h6  class="info">5. Palce of Birth <u><?php echo $info[1]['PLACEOFBIRTH']; ?></u></h6>
        <h6  class="info">6. District <u><?php echo "Birni da kewaye "; ?></u></h6>
        <h6  class="info">7. Village <u><?php echo " Zaria"; ?></u></h6>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="card bg-important">
          <h6><code class="text-success">I <?php echo $info[1]['FULLName']; ?> solemnly declare that the above information</code>
            <code class="text-success">given by me are true and that I should be held responsibe if found to be false</code></h5>
            <img src="<?php echo 'Signatures/s_a_'.$info[1]['ID'].".png"; ?>" width="60" height="40">
            <h6><code>Signature</code></h6>
        </div>
      </div>
      <div class="col-md-4">
        <u><img src="<?php echo 'Signatures/s_s_'.$info[1]['ID'].".png"; ?>" width="60" height="40"></u>
        <h6><pre>Signature of Ward Head</pre></h6>
        <u><img src="<?php echo 'Signatures/s_h_'.$info[1]['ID'].".png"; ?>" width="60" height="40"></u>
        <h6><pre>Signature of District Head</pre></h6>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <h6><pre>Free paid <u>   N200  </u></pre></h4>
        <h6><pre>Revenue Collector's Reciept No <u>  7849  </u></pre></h6>
        <h6><pre>Date <u>   <?php echo date('d/m/y'); ?>  </u></pre></h6>
      </div>
      <div class="col-md-4">
        <u><img src="<?php echo 'Signatures/s_h_'.$info[1]['ID'].".png"; ?>" width="60" height="40"></u>
        <h6><pre>Signature of District Head</pre></h6>
        <h6><pre>Date <u><?php echo date('d/m/y'); ?>  </pre></u></h6>
      </div>
    </div>
  </div>
  <div class="container p-3">
    <button id="print1" onClick="printpage();" class="btn btn-success">Print</button>
  </div>
</div>
</section>


</body>

</html>
<?php
}else{
  unset($_SESSION['v_cert_no']);
  $_SESSION['cert_no_error'] = "Certificate not found, you need to apply first";
  header("Location: indigene.php");
}

}else{header("Location: indigene.php");} ?>
