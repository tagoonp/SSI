<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SIMANH : In progress....</title>
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


$strSQL = sprintf("SELECT * FROM ".$tbprefix."institute WHERE institute_name = '%s'",
          mysql_real_escape_string($_POST['txt-institutename']));
$result = $db->select($strSQL,false,true);

if($result){
  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry",
      text: "Duplicate institute's name!",
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

$strSQL = sprintf("INSERT INTO ".$tbprefix."institute (institute_name, institute_description, institute_phone, institute_latitute, institute_longitude, institute_type, institute_status)
          VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')",
          mysql_real_escape_string($_POST['txt-institutename']),
          mysql_real_escape_string($_POST['txt-detail']),
          mysql_real_escape_string($_POST['txt-phone']),
          mysql_real_escape_string($_POST['txt-lat']),
          mysql_real_escape_string($_POST['txt-lng']),
          mysql_real_escape_string($_POST['txt-type']),
          mysql_real_escape_string('1')
          );
$resultInsert = $db->update($strSQL);

if($resultInsert){
  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "Success!",
      text: "Add new institute success!",
      type: "success",
      showCancelButton: false,
      confirmButtonColor: "teal",
      confirmButtonText: "Go to next step",
      closeOnConfirm: false
    }, function(){
      window.location = '../institute.php';
    });
  </script>
  <?php
}else{
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry",
      text: "Can not add this institute!",
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
