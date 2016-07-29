<?php
$strSQL = sprintf("SELECT count(*) totalBirth FROM ".$tbprefix."registerrecord x inner join ".$tbprefix."outcome y on x.record_id = y.record_id WHERE x.confirm_status = 1 AND x.username in (SELECT a.username FROM ".$tbprefix."useraccount a inner join ".$tbprefix."userdescription b on a.username = b.username WHERE b.institute_id = '%s')", mysql_real_escape_string($valueUserinfo['institute_id']));
$resultBirth = $db->select($strSQL,false,true);

if($resultBirth){
  print number_format($resultBirth[0]['totalBirth']);
}else{
  print "0";
}
?>
