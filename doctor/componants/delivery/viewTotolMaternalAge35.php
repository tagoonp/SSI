<?php
$strSQL = sprintf("SELECT count(*) total FROM ".$tbprefix."registerrecord a
          WHERE
          a.confirm_status = 1
          AND a.username in (SELECT a.username FROM ".$tbprefix."useraccount a inner join ".$tbprefix."userdescription b on a.username = b.username WHERE b.institute_id = '%s')
          AND a.p_cage >= '35'
          AND a.date_adm between '".$start_date."' and '".$end_date."' ", mysql_real_escape_string($valueUserinfo['institute_id']));
$result = $db->select($strSQL,false,true);

if($result){
  print number_format($result[0]['total']);
}else{
  print "-";
}
?>
