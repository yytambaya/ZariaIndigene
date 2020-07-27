<html>
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
<body>
  <?php
  session_start();
  if(isset($_SESSION['CERT_ID'])){ ?>
  <div class="container">
    <div class="conatiner">
      <nav class="navbar navbar-expand-md">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link text-success" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link text-success" href="indigene.php">Get Certificate</a></li>
        </ul>
      </nav>
    </div>
    <div class="jumbotron bg-light">
      <h3 class="text-muted">Application status</h3>
    <p class="text-success">Your application is submitted. You will review and get you a certificate. It takes 3 days</p>
    <p class="text-success">Your Certificate ID is <?php echo $_SESSION['CERT_ID']; ?></p>
  </div>
</div>
<?php } ?>
</body>
</html>
