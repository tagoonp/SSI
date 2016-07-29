<?php
session_start();
include "../database/database.class.php";
$db = new database();
$db->connect();

$tbprefix = $db->getTablePrefix();
$sessionName = $db->getSessionname();

$strSQL = sprintf("SELECT * FROM ".$tbprefix."useraccount a inner join ".$tbprefix."userdescription b on a.username = b.username WHERE a.username = '%s' and a.password = '%s' and a.status = '%s' ",
          mysql_real_escape_string($_POST['username']),  mysql_real_escape_string(md5($_POST['password'])),mysql_real_escape_string('1'));
$resultAuthen = $db->select($strSQL,false,true);

if($resultAuthen){
  $_SESSION[$sessionName.'sessID'] = session_id();
  $_SESSION[$sessionName.'sessUsername'] = $resultAuthen[0]['username'];
  $_SESSION[$sessionName.'sessUtype'] = $resultAuthen[0]['user_type_id'];
  session_write_close();
  print "Y";
}else{
  print $strSQL;
}

$db->disconnect();


?>
