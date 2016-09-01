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
      ?>
      <script type="text/javascript">
        swal({
          title: "Sorry!",
          text: "Session time out!",
          type: "warning",
          showCancelButton: false,
          confirmButtonColor: "teal",
          confirmButtonText: "OK",
          closeOnConfirm: false
        }, function(){
          window.location = '../../signout.php';
        });
      </script>
      <?php
      exit();
    }
  }else{
    ?>
    <script type="text/javascript">
      swal({
        title: "Sorry!",
        text: "Session time out!",
        type: "warning",
        showCancelButton: false,
        confirmButtonColor: "teal",
        confirmButtonText: "OK",
        closeOnConfirm: false
      }, function(){
        window.location = '../../signout.php';
      });
    </script>
    <?php
    exit();
  }
}else{
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry!",
      text: "Session time out!",
      type: "warning",
      showCancelButton: false,
      confirmButtonColor: "teal",
      confirmButtonText: "OK",
      closeOnConfirm: false
    }, function(){
      window.location = '../../signout.php';
    });
  </script>
  <?php
  exit();
}

$id = '';
if(isset($_GET['record_id'])){
  $id = $_GET['record_id'];
}else{
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry!",
      text: "Sending parameter error!",
      type: "warning",
      showCancelButton: false,
      confirmButtonColor: "teal",
      confirmButtonText: "Back",
      closeOnConfirm: false
    }, function(){
      window.history.back();
    });
  </script>
  <?php
  exit();
}

$strSQL = sprintf("SELECT * FROM fmn1_registerrecord a inner join fmn1_delivery b on a.record_id = b.record_id  WHERE a.record_id = '%s' and a.confirm_status = '0' and b.ba_username = '%s'",
          mysql_real_escape_string($id),
          mysql_real_escape_string($_SESSION[$sessionName.'sessUsername']));
$resultSess = $db->select($strSQL,false,true);

if(!$resultSess){
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry!",
      text: "Record not found!",
      type: "warning",
      showCancelButton: false,
      confirmButtonColor: "teal",
      confirmButtonText: "Back",
      closeOnConfirm: false
    }, function(){
      window.history.back();
    });
  </script>
  <?php
  exit();
}

$strSQL = sprintf("UPDATE fmn1_registerrecord SET confirm_status = '1', confirm_username = '%s', confirm_datetime = '".date('Y-m-d H:i:s')."' WHERE record_id = '%s'", mysql_real_escape_string($_SESSION[$sessionName.'sessUsername']), mysql_real_escape_string($id));
$resultUpdate = $db->update($strSQL);
?>
<script type="text/javascript">
  swal({
    title: "Success!",
    text: "Confirmation success!",
    type: "success",
    showCancelButton: false,
    confirmButtonColor: "teal",
    confirmButtonText: "Back",
    closeOnConfirm: false
  }, function(){
    window.history.back();
  });
</script>
<?php
exit();


?>
