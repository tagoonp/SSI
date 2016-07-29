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

$strSQL = sprintf("SELECT * FROM ".$tbprefix."postnatal WHERE record_id = '%s'", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
$result = $db->select($strSQL,false,true);

if($result){
  $strSQL = sprintf("DELETE FROM ".$tbprefix."postnatal WHERE record_id = '%s' ", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
  $resultDelete = $db->delete($strSQL);
}

$strSQL = sprintf("INSERT INTO ".$tbprefix."postnatal VALUE ('', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
          mysql_real_escape_string($_POST['radio-pph']),
          mysql_real_escape_string($_POST['radio-ppe']),
          mysql_real_escape_string($_POST['radio-pps']),
          mysql_real_escape_string($_POST['radio-ster']),
          mysql_real_escape_string($_POST['radio-oral']),
          mysql_real_escape_string($_POST['radio-medrox']),
          mysql_real_escape_string($_POST['radio-nore']),
          mysql_real_escape_string($_POST['radio-condom']),
          mysql_real_escape_string($_POST['radio-iucd']),
          mysql_real_escape_string($_POST['radio-subderm']),
          mysql_real_escape_string($_POST['radio-sepbydist']),
          mysql_real_escape_string($_POST['txt-Date34']),
          mysql_real_escape_string($_POST['radio-sepbytrans']),
          mysql_real_escape_string($_POST['txt-transtfacility']),
          mysql_real_escape_string($_POST['radio-sepbymdeath']),
          mysql_real_escape_string('0'),
          mysql_real_escape_string($_SESSION[$sessionName.'PID'])
        );
$resultInsert = $db->insert($strSQL,false,true);

if($resultInsert){
  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "Success!",
      text: "Insert postnatal information success!",
      type: "success",
      showCancelButton: false,
      confirmButtonColor: "teal",
      confirmButtonText: "Go to next step",
      closeOnConfirm: false
    }, function(){
      window.location = '../add-post-njewborn.php';
    });
  </script>
  <?php
}else{
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry",
      text: "Can not insert or update postnatal information!",
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
