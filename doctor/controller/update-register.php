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

$strSQL = "SELECT * FROM ".$tbprefix."registerrecord WHERE record_id = '".$_POST['txt-rid']."'";
$result = $db->select($strSQL,false,true);

if($result){
  $strSQL = sprintf("UPDATE ".$tbprefix."registerrecord SET
            date_adm = '%s',
            time_adm = '%s',
            refer_in_status = '%s',
            refer_in_facility = '%s',
            stage_of_patient = '%s',
            folder_no = '%s',
            point_no = '%s',
            pid = '%s',
            p_fname = '%s',
            p_mname = '%s',
            p_lname = '%s',
            p_address = '%s',
            p_phone = '%s',
            p_dob = '%s',
            p_cage = '%s'
            WHERE record_id = '%s'
            ",
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
            mysql_real_escape_string($_POST['txt-rid'])
          );
  $resultUpdate = $db->update($strSQL);
  ?>
  <script type="text/javascript">
    swal({
      title: "Update success!",
      text: "Patient's session timeout!",
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
}else{
  ?>
  <script type="text/javascript">
    swal({
      title: "Success!",
      text: "Update register record success!",
      type: "success",
      showCancelButton: false,
      confirmButtonColor: "teal",
      confirmButtonText: "Go to next step",
      closeOnConfirm: false
    }, function(){
      window.location = '../close_session.php';
    });
  </script>
  <?php
}
?>
