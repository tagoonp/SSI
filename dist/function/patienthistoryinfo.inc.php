<?php
$info = '';
$strSQL = sprintf("SELECT * FROM fmn1_registerrecord WHERE pid = '%s' ORDER BY date_adm DESC limit 0,1", mysql_real_escape_string($_GET['pid']));
$resultPinfo = $db->select($strSQL,false,true);
if($resultPinfo){
  $info = $resultPinfo[0];
}
?>
