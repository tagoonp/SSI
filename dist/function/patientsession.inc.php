<?php
if(isset($_SESSION[$sessionName.'PID'])){

}else{
  header('Location: ./');
  exit();
}
?>
