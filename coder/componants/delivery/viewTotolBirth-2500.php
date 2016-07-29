<?php
$strSQL = sprintf("SELECT count(*) total FROM ".$tbprefix."registerrecord a left join ".$tbprefix."outcome b
          on a.record_id = b.record_id
          WHERE
          a.confirm_status = 1
          AND a.username in (SELECT a.username FROM ".$tbprefix."useraccount a inner join ".$tbprefix."userdescription b on a.username = b.username WHERE b.institute_id = '%s')
          AND b.birth_wieght >= '2500'
          AND a.date_adm between '".$start_date."' and '".$end_date."' ", mysql_real_escape_string($valueUserinfo['institute_id']));
$result = $db->select($strSQL,false,true);

if($result){
  print number_format($result[0]['total']);
  $totalLivebirth += intval($result[0]['total']);
}else{
  print "0";
}
?>
