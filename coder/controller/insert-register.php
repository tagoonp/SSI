<?php
session_start();
include "../../database/database.class.php";
$db = new database();
$db->connect();

$tbprefix = $db->getTablePrefix();
$sessionName = $db->getSessionname();

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

$refer = '0';
$referstage = '0';
if(isset($_POST['cb-refer'])){
  $refer = '1';
}

if(isset($_POST['radio-referstage'])){
  $referstage = $_POST['radio-referstage'];
}

$strSQL = sprintf("INSERT INTO ".$tbprefix."registerrecord VALUE ('', '".date('Y-m-d')."', '".date('H:i:s')."', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '', '', '%s')",
          mysql_real_escape_string($_POST['txt-dateadm']),
          mysql_real_escape_string($_POST['txt-timeadm']),
          mysql_real_escape_string($refer),
          mysql_real_escape_string($_POST['txt-referfacility']),
          mysql_real_escape_string($referstage),
          mysql_real_escape_string($_POST['txt-foldernumber']),
          mysql_real_escape_string($_POST['txt-pointofdelivery']),
          mysql_real_escape_string($_POST['txt-pid']),
          mysql_real_escape_string($_POST['txt-fname']),
          mysql_real_escape_string($_POST['txt-mname']),
          mysql_real_escape_string($_POST['txt-lname']),
          mysql_real_escape_string($_POST['txt-address']),
          mysql_real_escape_string($_POST['txt-phone']),
          mysql_real_escape_string($_POST['txt-dob']),
          mysql_real_escape_string($_POST['txt-age']),
          mysql_real_escape_string($_SESSION[$sessionName.'sessUsername']),
          mysql_real_escape_string('0')
        );
$resultInsert = $db->insert($strSQL,false,true);

$_SESSION[$sessionName.'PID'] = $resultInsert['id'];
session_write_close();

if($resultInsert){
  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "Good job?",
      text: "Register new record success!",
      type: "success",
      showCancelButton: false,
      confirmButtonColor: "teal",
      confirmButtonText: "Go to next step",
      closeOnConfirm: false
    }, function(){
      window.location = '../add-obstetric.php';
    });
  </script>
  <?php
}else{
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry",
      text: "Can not register new record!",
      type: "warning",
      showCancelButton: false,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Go back",
      closeOnConfirm: false
    }, function(){
      window.location = '../add-new-record.php';
    });
  </script>
  <?php
}
?>
