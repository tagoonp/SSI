<?php
$strSQL = sprintf("SELECT count(*) total FROM ".$tbprefix."registerrecord a inner join ".$tbprefix."complication_delivery b
          on a.record_id = b.record_id
          WHERE
          a.confirm_status = 1
          AND a.username in (SELECT a.username FROM ".$tbprefix."useraccount a inner join ".$tbprefix."userdescription b on a.username = b.username WHERE b.institute_id = '%s')
          AND b.rup = '1'", mysql_real_escape_string($valueUserinfo['institute_id']));
$result = $db->select($strSQL,false,true);

if($result){
  print number_format($result[0]['total']);
  // print $strSQL;
}else{
  print "0";
}
?>
