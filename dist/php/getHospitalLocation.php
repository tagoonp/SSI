<?php
include "../../database/database.class.php";
$db = new database();
$db->connect();

$tbprefix = $db->getTablePrefix();

$strSQL = sprintf("SELECT institute_latitute, institute_longitude FROM ".$tbprefix."institute WHERE institute_id = '%s'", mysql_real_escape_string($_POST['institute_id']));
$result = $db->select($strSQL,false,true);

$return = '';
if($result){
  for ($i=0; $i < sizeof($result); $i++) {
    $return[$i]['lat'] = $result[$i]['institute_latitute'];
    $return[$i]['lng'] = $result[$i]['institute_longitude'];
  }
}

echo json_encode($return);
$db->disconnect();
?>
