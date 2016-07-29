<?php
session_start();
include "../../database/database.class.php";
$db = new database();
$db->connect();

$tbprefix = $db->getTablePrefix();
$sessionName = $db->getSessionname();

$_SESSION[$sessionName.'PID'] = $_POST['keyword'];
session_write_close();
print "Y";
$db->disconnect();


?>
