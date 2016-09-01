<?php
session_start();

include "../../../database/database.class.php";
$db = new database();
$db->connect();

$tbprefix = $db->getTablePrefix();
$sessionName = $db->getSessionname();

$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];


$strSQL = sprintf("SELECT count(*) total FROM ".$tbprefix."registerrecord a
          left join ".$tbprefix."obstetric b on a.record_id = b.record_id
          left join ".$tbprefix."delivery c on a.record_id = c.record_id
          left join ".$tbprefix."complication_delivery e on a.record_id = e.record_id
          WHERE
          a.confirm_status = 1
          AND a.username in (SELECT a.username FROM ".$tbprefix."useraccount a inner join ".$tbprefix."userdescription b on a.username = b.username WHERE b.institute_id = '%s')
          AND b.parity = '0'
          AND c.indication in ('12')
          AND a.date_adm between '".$start_date."' and '".$end_date."' ", mysql_real_escape_string($_POST['institute']));
$result = $db->select($strSQL,false,true);

if($result){
  // print number_format($result[0]['total']);
  // print $strSQL;
  // print number_format(sizeof($result));
  print number_format($result[0]['total']);
}else{
  // print $strSQL;
  print "0";
}
?>
