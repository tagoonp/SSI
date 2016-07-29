<?php
$strSQL = sprintf("SELECT count(*) totalDel FROM ".$tbprefix."registerrecord x inner join ".$tbprefix."delivery y on x.record_id = y.record_id WHERE x.confirm_status = 1 AND x.username in (SELECT a.username FROM ".$tbprefix."useraccount a inner join ".$tbprefix."userdescription b on a.username = b.username WHERE b.institute_id = '%s')", mysql_real_escape_string($valueUserinfo['institute_id']));
$resultDel = $db->select($strSQL,false,true);

if($resultDel){
  print number_format($resultDel[0]['totalDel']);
}else{
  print "0";
}
?>
