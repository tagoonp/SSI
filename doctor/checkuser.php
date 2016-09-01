<?php
$strSQL = sprintf("SELECT * FROM ".$tbprefix."user a inner join ".$tbprefix."userdetail b on a.username = b.usr_username WHERE a.username = '%s' and a.active_status = '%s' ",
          mysql_real_escape_string($_SESSION[$sessionName.'sessUsername']), mysql_real_escape_string('Yes'));
$resultAuthencheck = $db->select($strSQL,false,true);

$valueUserinfo = '';
if($resultAuthencheck){
  $valueUserinfo = $resultAuthencheck[0];
}else{
  header('Location: ../../');
  exit();
}
?>
