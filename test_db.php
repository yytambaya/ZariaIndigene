<?php
require("db_conn.php");

function insert(){
  $stm = "INSERT INTO SCHOOL(Name, Certificate, DATE, ID) VALUES('Umar Secondary School', 'SSCE', '2000-1-16', NULL); INSERT INTO SCHOOL(Name, Certificate, DATE, ID) VALUES('Abba Secondary School', 'JSCE', '2001-3-46', NULL)";
  $result = set($stm);
  if($result == 1){
    echo "Your record was inserted";
  }else{
    echo "Your record was\'nt inserted";
  }
}

function select(){
  $stm2 = "SELECT * FROM SCHOOL;";
  $result2 = get($stm2);
  print_r($result2);

  if($result2[0] != 0){
    //print_r($result2[1]);
    //print_r($result2[1]);
    //print("My Name: ".$result2[1]['Name']."<br/>");

    foreach($result2[1] as $s_result){
      //echo "//</br>";
      //echo "My result";
      //print($s_result);
      //echo $s_result['Name']."<br/>";
      //echo $s_result['Certificate']."<br/>";
      //echo $s_result['DATE']."<br/>";
      //echo $s_result['ID']."<br/>";
      //echo "//";
    }

    }else{
      echo "The result is not available";
    }
  }

  insert();
  //select();

?>
