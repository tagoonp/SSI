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

$strSQL = sprintf("SELECT * FROM ".$tbprefix."complication_delivery WHERE record_id = '%s'", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
$result = $db->select($strSQL,false,true);

if($result){
  $strSQL = sprintf("DELETE FROM ".$tbprefix."complication_delivery WHERE record_id = '%s' ", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
  $resultDelete = $db->delete($strSQL);
}

$strSQL = sprintf("INSERT INTO ".$tbprefix."complication_delivery VALUE ('', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
          mysql_real_escape_string($_POST['radio-induc']),
          mysql_real_escape_string($_POST['radio-ante']),
          mysql_real_escape_string($_POST['radio-ap']),
          mysql_real_escape_string($_POST['radio-pp']),
          mysql_real_escape_string($_POST['radio-post']),
          mysql_real_escape_string($_POST['radio-spe']),
          mysql_real_escape_string($_POST['radio-eclm']),
          mysql_real_escape_string($_POST['radio-prm']),
          mysql_real_escape_string($_POST['radio-rup']),
          mysql_real_escape_string($_POST['radio-sep']),
          mysql_real_escape_string($_POST['radio-opl']),
          mysql_real_escape_string($_POST['radio-rp']),
          mysql_real_escape_string($_POST['radio-mrp']),
          mysql_real_escape_string($_POST['radio-mater']),
          mysql_real_escape_string($_POST['radio-still']),
          mysql_real_escape_string($_POST['radio-neo']),
          mysql_real_escape_string($_POST['radio-pt']),
          mysql_real_escape_string($_POST['radio-lbw']),
          mysql_real_escape_string($_SESSION[$sessionName.'PID'])
        );
$resultInsert = $db->insert($strSQL,false,true);

if($resultInsert){
  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "Success!",
      text: "Insert complication information success!",
      type: "success",
      showCancelButton: false,
      confirmButtonColor: "teal",
      confirmButtonText: "Go to next step",
      closeOnConfirm: false
    }, function(){
      window.location = '../add-postnatal.php';
    });
  </script>
  <?php
}else{
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry",
      text: "Can not insert or update complication information!",
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
