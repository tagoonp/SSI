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


$strSQL = sprintf("SELECT * FROM ".$tbprefix."useraccount WHERE username = '%s'",
          mysql_real_escape_string($_POST['txt-username']));
$result = $db->select($strSQL,false,true);

if($result){
  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry",
      text: "Duplicate username!",
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

$strSQL = sprintf("INSERT INTO ".$tbprefix."useraccount (	username, password, reg_date, user_type_id, status)
          VALUES ('%s', '%s', '%s', '%s', '%s')",
          mysql_real_escape_string($_POST['txt-username']),
          mysql_real_escape_string(md5($_POST['txt-password1'])),
          mysql_real_escape_string(date('Y-m-d')),
          mysql_real_escape_string($_POST['txt-usertype']),
          mysql_real_escape_string('0')
          );
$resultInsert = $db->insert($strSQL, false, true);

if($resultInsert){

  $strSQL = sprintf("INSERT INTO ".$tbprefix."userdescription (	fname, lname, email, phone, address, institute_id, username)
            VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')",
            mysql_real_escape_string($_POST['txt-fname']),
            mysql_real_escape_string($_POST['txt-lname']),
            mysql_real_escape_string($_POST['txt-email']),
            mysql_real_escape_string($_POST['txt-phone']),
            mysql_real_escape_string($_POST['txt-address']),
            mysql_real_escape_string($_POST['txt-institute']),
            mysql_real_escape_string($_POST['txt-username'])
            );
  $resultInsert = $db->insert($strSQL, false, true);

  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "Success!",
      text: "Add new user account success!",
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
