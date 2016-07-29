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

if((!isset($_GET['user_id'])) || (!isset($_GET['to']))){
  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry",
      text: "Can not get user ID!",
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

$strSQL = sprintf("SELECT * FROM ".$tbprefix."useraccount WHERE username = '%s'",
          mysql_real_escape_string($_GET['user_id']));
$result = $db->select($strSQL,false,true);

if(!$result){
  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry",
      text: "User's ID not found!",
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

$strSQL = sprintf("UPDATE ".$tbprefix."useraccount SET status = '%s' WHERE username = '%s'",
          mysql_real_escape_string($_GET['to']),
          mysql_real_escape_string($result[0]['username'])
          );
$resultUpdate = $db->update($strSQL);

$db->disconnect();
?>
<script type="text/javascript">
  swal({
    title: "Success!",
    text: "Update user account success!",
    type: "success",
    showCancelButton: false,
    confirmButtonColor: "teal",
    confirmButtonText: "Go to next step",
    closeOnConfirm: false
  }, function(){
    window.location = '../users.php';
  });
</script>
<?php


?>
