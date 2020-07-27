<?php
require_once("db_conn.php");

function generateCertNo(){
  //current_date+sec_code1-random_no+sec_code2
  $c_date = date("dmy");
  $sec_no1 = rand(0, 500000);
  $sec_no2 = rand(0, $sec_no1);
  $cert_no = "NG-".($sec_no1+$sec_no2)."-".$c_date;
  return $cert_no;
}
//echo (generateCertNo());

function getCertInfo($cert_no){
  $stm = "SELECT Applicant_sign.ID, FULLName, FATHERNAME, FATHERTRIBE, MOTHERNAME, MOTHERTRIBE, DATEOFBIRTH, PLACEOFBIRTH FROM Applicant_sign, USER_INFO, Certificate WHERE Certificate.Cert_No='$cert_no' AND Certificate.ID = USER_INFO.ID and Certificate.ID = Applicant_sign.ID";
  $conn = connect();
  if($conn){
    $r = get($stm);
      if($r)
      return $r;
      else {
        return 0;
      }

  }
}
function getCertInfo2($cert_no){
  $stm = "SELECT Applicant_sign.ID FROM Applicant_sign, Certificate WHERE Certificate.Cert_No='$cert_no'";
  $conn = connect();
  if($conn){
    $r = get($stm);
    return $r;
  }
}

//Print_r(getCertInfo('NG-190101-060819'));
//print("");
//Print_r(getCertInfo2('NG-190101-060819'));
function getLastID(){
  $id = get("SELECT MAX(ID) FROM Applicant_sign");
  return ($id[1]['MAX(ID)']);
}
//getLastID();

?>
