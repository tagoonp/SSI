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

if(!isset($_GET['inst_id'])){
  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry",
      text: "Can not get institute's ID!",
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

$strSQL = sprintf("SELECT * FROM ".$tbprefix."institute WHERE institute_id = '%s'",
          mysql_real_escape_string($_GET['inst_id']));
$result = $db->select($strSQL,false,true);

if(!$result){
  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry",
      text: "Institute's ID not found!",
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

$strSQL = sprintf("UPDATE ".$tbprefix."registerrecord SET username = '%s' WHERE username in (SELECT username FROM fmn1_userdescription WHERE institute_id = '%s')",
          mysql_real_escape_string('Del-institute-'.$result[0]['institute_id']."-".$result[0]['institute_name']),
          mysql_real_escape_string($result[0]['institute_id'])
          );
$resultUpdate = $db->update($strSQL);

$strSQL = sprintf("DELETE FROM ".$tbprefix."useraccount WHERE username in (SELECT username FROM fmn1_userdescription WHERE institute_id = '%s') ", mysql_real_escape_string($_GET['inst_id']));
$resultDel = $db->delete($strSQL);

$strSQL = sprintf("DELETE FROM ".$tbprefix."institute WHERE institute_id = '%s'", mysql_real_escape_string($_GET['inst_id']));
$resultDel = $db->delete($strSQL);

$db->disconnect();
?>
<script type="text/javascript">
  swal({
    title: "Success!",
    text: "Delete institute success!",
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


?>
