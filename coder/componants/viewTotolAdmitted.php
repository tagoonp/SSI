<?php
$strSQL = sprintf("SELECT count(*) titalAdm FROM ".$tbprefix."registerrecord WHERE confirm_status = 1 AND username in (SELECT a.username FROM ".$tbprefix."useraccount a inner join ".$tbprefix."userdescription b on a.username = b.username WHERE b.institute_id = '%s')", mysql_real_escape_string($valueUserinfo['institute_id']));
$result = $db->select($strSQL,false,true);

if($result){
  print number_format($result[0]['titalAdm']);
}else{
  print "0";
}
?>
