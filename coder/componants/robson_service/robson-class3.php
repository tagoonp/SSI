<?php
session_start();

include "../../../database/database.class.php";
$db = new database();
$db->connect();



$tbprefix = $db->getTablePrefix();
$sessionName = $db->getSessionname();

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$strSQL = sprintf("SELECT count(*) total FROM ".$tbprefix."registerrecord a left join ".$tbprefix."obstetric b
          on a.record_id = b.record_id
          left join ".$tbprefix."delivery c on a.record_id = c.record_id
          left join ".$tbprefix."outcome d on a.record_id = d.record_id
          WHERE
          a.confirm_status = 1
          AND c.mode_del = '4'
          AND a.username in (SELECT a.username FROM ".$tbprefix."useraccount a inner join ".$tbprefix."userdescription b on a.username = b.username WHERE b.institute_id = '%s')
          AND b.parity > '0'
          AND c.ga_del >= '37'
          AND a.date_adm between '".$start_date."' and '".$end_date."'
          AND c.indication not in ('3', '6', '12')
          AND b.stage_of_labour != '0'
          GROUP BY a.record_id HAVING COUNT(*) = 1", mysql_real_escape_string($_POST['institute']));
$result = $db->select($strSQL,false,true);

if($result){
  print number_format(sizeof($result));
}else{
  print "-";
}
?>
