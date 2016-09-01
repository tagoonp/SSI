<?php
session_start();

include "../../database/database.class.php";
$db = new database();
$db->connect();

$tbprefix = $db->getTablePrefix();
$sessionName = $db->getSessionname();

if(isset($_SESSION[$sessionName.'sessID'])){
  if($_SESSION[$sessionName.'sessID']==session_id()){
    if(isset($_SESSION[$sessionName.'sessUsername'])){

    }else{
      print "N1";
      exit();
    }
  }else{
    print "N2";
    exit();
  }
}else{
  print "N3";
  exit();
}



$strSQL = sprintf("SELECT * FROM fmn1_useraccount a inner join fmn1_userdescription b on a.username = b.username WHERE a.username = '%s'", mysql_real_escape_string($_SESSION[$sessionName.'sessUsername']));
$resultSess = $db->select($strSQL,false,true);

if(!$resultSess){
  print "SD";
  exit();
}

$strSQL = sprintf("SELECT * FROM fmn1_useraccount WHERE username = '%s'", mysql_real_escape_string($_POST['baid']));
$result = $db->select($strSQL,false,true);
if($result){
  print "D";
  exit();
}

$strSQL = sprintf("INSERT INTO fmn1_useraccount VALUE ('%s', '%s', '%s', '', '%s', '%s')",
          mysql_real_escape_string($_POST['baid']),
          mysql_real_escape_string(md5($_POST['baid'])),
          mysql_real_escape_string(date('Y-m-d')),
          mysql_real_escape_string('5'),
          mysql_real_escape_string('1')
        );
$resultInsert = $db->insert($strSQL,false,true);

if($resultInsert){

  $strSQL = sprintf("INSERT INTO fmn1_userdescription (fname, email, institute_id, username) VALUE ('%s', '%s', '%s', '%s')",
            mysql_real_escape_string($_POST['baname']),
            mysql_real_escape_string($_POST['baemail']),
            mysql_real_escape_string($resultSess[0]['institute_id']),
            mysql_real_escape_string($_POST['baid'])
          );
  $resultInsert = $db->insert($strSQL,false,true);


  $strSQL = sprintf("INSERT INTO ti_ba VALUE ('', '%s', '%s', '%s')",
            mysql_real_escape_string($_POST['baid']),
            mysql_real_escape_string(''),
            mysql_real_escape_string('NA')
          );
  $resultInsert = $db->insert($strSQL,false,true);

  print "Y";
  $db->disconnect();
}else{
  print "N4";
  $db->disconnect();

}


?>
