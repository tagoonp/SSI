<?php
session_start();
include "../database/database.class.php";
$db = new database();

$sessionName = $db->getSessionname();

switch($_SESSION[$sessionName.'sessUtype']){
  case 1: header('Location: ../superadministrator/'); break;
  case 2: header('Location: ../administrator/'); break;
  case 3: header('Location: ../coder/'); break;
  case 4: header('Location: ../actor/'); break;
  case 5: header('Location: ../doctor/'); break;
  default: header('Location: ../404-error.html');
}
?>
