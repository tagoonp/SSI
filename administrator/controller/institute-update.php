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


$strSQL = sprintf("SELECT * FROM ".$tbprefix."institute WHERE institute_id = '%s'", mysql_real_escape_string($_POST['txt-instituteid']));
$result = $db->select($strSQL,false,true);

if(!$result){
  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry",
      text: "This institute's ID not found!",
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

$strSQL = sprintf("UPDATE ".$tbprefix."institute SET institute_name = '%s', 	institute_description = '%s', institute_phone = '%s', institute_latitute = '%s', institute_longitude = '%s', institute_type = '%s' WHERE institute_id = '%s'",
          mysql_real_escape_string($_POST['txt-institutename']),
          mysql_real_escape_string($_POST['txt-detail']),
          mysql_real_escape_string($_POST['txt-phone']),
          mysql_real_escape_string($_POST['txt-lat']),
          mysql_real_escape_string($_POST['txt-lng']),
          mysql_real_escape_string($_POST['txt-type']),
          mysql_real_escape_string($_POST['txt-instituteid'])
          );
$resultUpdate = $db->update($strSQL);

if($resultUpdate){
  $db->disconnect();
  ?>
  <script type="text/javascript">
    swal({
      title: "Success!",
      text: "Update institute information success!",
      type: "success",
      showCancelButton: false,
      confirmButtonColor: "teal",
      confirmButtonText: "Go to next step",
      closeOnConfirm: false
    }, function(){
      window.location = '../institute-info.php?inst_id=<?php print $_POST['txt-instituteid']; ?>';
    });
  </script>
  <?php
}else{
  ?>
  <script type="text/javascript">
    swal({
      title: "Sorry",
      text: "Can not update this institute information!",
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
