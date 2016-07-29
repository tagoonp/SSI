<?php
$strSQL = sprintf("SELECT * FROM ".$tbprefix."useraccount a inner join ".$tbprefix."userdescription b on a.username = b.username WHERE a.username = '%s' and a.status = '%s' ",
          mysql_real_escape_string($_SESSION[$sessionName.'sessUsername']), mysql_real_escape_string('1'));
$resultAuthencheck = $db->select($strSQL,false,true);

$valueUserinfo = '';
if($resultAuthencheck){
  $valueUserinfo = $resultAuthencheck[0];
}else{
  header('Location: ../');
  exit();
}
?>
