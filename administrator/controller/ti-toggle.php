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

if((!isset($_GET['ti_id'])) || (!isset($_GET['to']))){
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

$strSQL = sprintf("SELECT * FROM ti_institute WHERE ti_id = '%s'",
          mysql_real_escape_string($_GET['ti_id']));
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

$to_con = 'NA';
if($_GET['to']==1){
  $to_con = 'Allow';
}else if($_GET['to']==2){
  $to_con = 'Dis-allow';
}

$strSQL = sprintf("UPDATE ti_institute SET ti_status = '%s', ti_by = '%s' WHERE ti_id = '%s'",
          mysql_real_escape_string($to_con),
          mysql_real_escape_string($_SESSION[$sessionName.'sessUsername']),
          mysql_real_escape_string($result[0]['ti_id'])
          );
$resultUpdate = $db->update($strSQL);

$db->disconnect();
?>
<script type="text/javascript">
  // swal({
  //   title: "Success!",
  //   text: "Update institute success!",
  //   type: "success",
  //   showCancelButton: false,
  //   confirmButtonColor: "teal",
  //   confirmButtonText: "Go to next step",
  //   closeOnConfirm: false
  // }, function(){
  //   window.location = '../institute.php';
  // });
  window.history.back();
</script>
<?php


?>
