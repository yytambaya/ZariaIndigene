<?php
require("db_conn.php");
//Reg expressions
$reg_name = "/[A-Za-z]{50}+'/";
$reg_address = "/[A-Za-z0-9]{40}+',/";






if(isset($_POST['apply'])){

  if(isset($_POST['name'])){
    if(!empty($_POST['name'])){
      if(preg_match($_POST['name'], $reg_name)){
          $v_name = $_POST['name'];
      }
    }else{
      $name_error = "Name is not entered";
    }
  }

}



?>
