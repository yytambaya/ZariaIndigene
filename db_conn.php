<?php
DEFINE("HOST", "LOCALHOST");
DEFINE("USER", "root");
DEFINE("PASS", "");
DEFINE("DB_NAME", "MyIndigene");

function connect(){
  $conn = new mysqli(HOST, USER, PASS, DB_NAME);
  if($conn->connect_error){
      die();
      return 0;
  }else{
    return $conn;
  }


}

function get($stm){
      $conn = connect();
      if($conn){
          $num = 0;
          $rows = [];
          $query = $conn->query($stm);
          if($query->num_rows > 0){
            $num = $query->num_rows;
              $rows = $query->fetch_assoc();
              //print_r($rows);
              //echo "</br>";
          }
      }
      return array($num, $rows);
}

function set($stm){
      $conn = connect();
      if($conn){
          $query = $conn->query($stm);
          if($query){
              $result = 1;

          }else{
            $result = 0;
            print("Cant submit query: ". $conn->error);
          }
      }
      return $result;
}

?>
