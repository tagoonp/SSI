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

$oldID = '';
$strSQL = sprintf("SELECT * FROM ".$tbprefix."other_postnatal WHERE record_id = '%s' and nb_no = '%s'", mysql_real_escape_string($_SESSION[$sessionName.'PID']), mysql_real_escape_string($_POST['txt-nbid']));
$result = $db->select($strSQL,false,true);

if($result){
  $oldID = $result[0]['cmtct_rid'];
  $strSQL = sprintf("DELETE FROM ".$tbprefix."other_postnatal WHERE record_id = '%s' and nb_no = '%s' ", mysql_real_escape_string($_SESSION[$sessionName.'PID']), mysql_real_escape_string($_POST['txt-nbid']));
  $resultDelete = $db->delete($strSQL);
}

$strSQL = sprintf("INSERT INTO ".$tbprefix."other_postnatal VALUE ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
          mysql_real_escape_string($oldID),
          mysql_real_escape_string($_POST['radio-lbHiv']),
          mysql_real_escape_string($_POST['radio-pmtct']),
          mysql_real_escape_string($_POST['radio-azt']),
          mysql_real_escape_string($_POST['radio-nevirapine']),
          mysql_real_escape_string($_POST['radio-nevirapine72']),
          mysql_real_escape_string($_POST['radio-nevirapine6']),
          mysql_real_escape_string($_POST['radio-inftest']),
          mysql_real_escape_string($_POST['radio-inftest-result']),
          mysql_real_escape_string($_POST['radio-ifm']),
          mysql_real_escape_string($_POST['radio-vitk']),
          mysql_real_escape_string($_POST['radio-polio']),
          mysql_real_escape_string($_POST['radio-bcg']),
          mysql_real_escape_string($_POST['radio-admitted']),
          mysql_real_escape_string($_POST['txt-dateadm']),
          mysql_real_escape_string($_POST['txt-timeadm']),
          mysql_real_escape_string($_POST['radio-earlyneo']),
          mysql_real_escape_string($_POST['radio-lateneo']),
          mysql_real_escape_string('0'),
          mysql_real_escape_string($_POST['radio-refer']),
          mysql_real_escape_string($_POST['txt-refer_to_facility']),
          mysql_real_escape_string($_SESSION[$sessionName.'PID']),
          mysql_real_escape_string($_POST['txt-nbid'])
        );
$resultInsert = $db->insert($strSQL,false,true);

if($resultInsert){
  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "Success!",
      text: "Insert newborn information at postnatal success!",
      type: "success",
      showCancelButton: false,
      confirmButtonColor: "teal",
      confirmButtonText: "Back to newborn at postnatal",
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
      text: "Can not insert or update newborn information at postnatal!",
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
