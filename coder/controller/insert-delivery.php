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
$strSQL = sprintf("SELECT * FROM ".$tbprefix."delivery WHERE record_id = '%s'", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
$result = $db->select($strSQL,false,true);

if($result){
  $oldID = $result[0]['del_rid'];
  $strSQL = sprintf("DELETE FROM ".$tbprefix."delivery WHERE record_id = '%s' ", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
  $resultDelete = $db->delete($strSQL);
}

$infact = 0;
$episio = 0;

if(isset($_POST['radio-perineum'])){
  if($_POST['radio-perineum']=='0'){
    $infact = 1;
  }else{
    $episio = 1;
  }
}

$strSQL = sprintf("INSERT INTO ".$tbprefix."delivery VALUE ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
          mysql_real_escape_string($oldID),
          mysql_real_escape_string($_POST['txt-gadel']),
          mysql_real_escape_string($_POST['txt-datedel']),
          mysql_real_escape_string($_POST['txt-timedel']),
          mysql_real_escape_string($_POST['txt_moddel']),
          mysql_real_escape_string($_POST['inditation']),
          mysql_real_escape_string($_POST['txt-typeba']),
          mysql_real_escape_string($_POST['txt-mt-ba']),
          mysql_real_escape_string($_POST['txt-mt-ba-id']),
          mysql_real_escape_string($infact),
          mysql_real_escape_string($episio),
          mysql_real_escape_string($_POST['radio-degree']),
          mysql_real_escape_string($_POST['radio-azt']),
          mysql_real_escape_string($_POST['radio-act']),
          mysql_real_escape_string($_POST['radio-tvd']),
          mysql_real_escape_string($_POST['txt-otherind']),
          mysql_real_escape_string($_POST['radio-mt']),
          mysql_real_escape_string($_POST['txt-dateadm']),
          mysql_real_escape_string($_POST['radio-mdeath']),
          mysql_real_escape_string($_POST['txt-mt-facility']),
          mysql_real_escape_string($_SESSION[$sessionName.'PID'])
        );
$resultInsert = $db->insert($strSQL,false,true);

if($resultInsert){
  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "Success!",
      text: "Insert delivery information success!",
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
      text: "Can not insert delivery information!",
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
