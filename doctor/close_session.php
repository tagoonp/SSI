<?php
session_start();

include "../database/database.class.php";
$db = new database();
$db->connect();

$sessionName = $db->getSessionname();

unset($_SESSION[$sessionName.'PID']);
session_write_close();
header('Location: index.php');
exit();
?>
