<?php
session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SIMANH : Inp rogress....</title>
    <link rel="stylesheet" type="text/css" href="../../library/sweetalert/dist/sweetalert.css">
    <script src="../../library/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>

  </body>
</html>
<?php


include "../../database/database.class.php";
$db = new database();
$db->connect();

$tbprefix = $db->getTablePrefix();
$sessionName = $db->getSessionname();

if(isset($_SESSION[$sessionName.'sessID'])){
  if($_SESSION[$sessionName.'sessID']==session_id()){
    if(isset($_SESSION[$sessionName.'sessUsername'])){

    }else{
      header('Location: ../../');
      exit();
    }
  }else{
    header('Location: ../../');
    exit();
  }
}else{
  header('Location: ../../');
  exit();
}

if(isset($_SESSION[$sessionName.'PID'])){

}else{
  header('Location: ../../');
  exit();
}

$nbno = '';
if(isset($_GET['nbid'])){
  $nbno = $_GET['nbid'];
}else{
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry",
      text: "Newborn ID not found! - Code: err-101",
      type: "warning",
      showCancelButton: false,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Go back",
      closeOnConfirm: false
    }, function(){
      window.history.back();
    });
  </script>
  <?php
}

$strSQL = sprintf("SELECT * FROM ".$tbprefix."outcome WHERE nb_no = '%s' and record_id = '%s'",mysql_real_escape_string($nbno), mysql_real_escape_string($_SESSION[$sessionName.'PID']));
$result = $db->select($strSQL,false,true);

if(!$result){
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry",
      text: "Newborn ID not found! - Code: err-102",
      type: "warning",
      showCancelButton: false,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Go back",
      closeOnConfirm: false
    }, function(){
      window.history.back();
    });
  </script>
  <?php
}

$strSQL = sprintf("DELETE FROM ".$tbprefix."outcome WHERE nb_no = '%s' and record_id = '%s'",mysql_real_escape_string($nbno), mysql_real_escape_string($_SESSION[$sessionName.'PID']));
$resultDel = $db->delete($strSQL);

$strSQL = sprintf("DELETE FROM ".$tbprefix."other_postnatal WHERE nb_no = '%s' and record_id = '%s'",mysql_real_escape_string($nbno), mysql_real_escape_string($_SESSION[$sessionName.'PID']));
$resultDel = $db->delete($strSQL);


if($resultDel){
  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "Success!",
      text: "Delete newborn information success!",
      type: "success",
      showCancelButton: false,
      confirmButtonColor: "teal",
      confirmButtonText: "Go to next step",
      closeOnConfirm: false
    }, function(){
      window.location = '../add-newborn.php';
    });
  </script>
  <?php
}else{
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry",
      text: "Can not delete newborn information!",
      type: "warning",
      showCancelButton: false,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Go back",
      closeOnConfirm: false
    }, function(){
      window.history.back();
    });
  </script>
  <?php
}


?>
