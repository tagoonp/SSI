<?php
$strSQL = sprintf("SELECT count(*) total FROM ".$tbprefix."registerrecord a left join ".$tbprefix."obstetric b
          on a.record_id = b.record_id
          WHERE
          a.confirm_status = 1
          AND a.username in (SELECT a.username FROM ".$tbprefix."useraccount a inner join ".$tbprefix."userdescription b on a.username = b.username WHERE b.institute_id = '%s')
          AND b.hiv_status in ('Unknown', 'Neg')
          AND (b.hiv_1st = '0' OR b.hiv_retest = '0' )
          AND a.date_adm between '".$start_date."' and '".$end_date."' ", mysql_real_escape_string($valueUserinfo['institute_id']));
$result = $db->select($strSQL,false,true);

if($result){
  print number_format($result[0]['total']);
}else{
  print "-";
}
?>
