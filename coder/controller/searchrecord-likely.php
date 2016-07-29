<?php
session_start();
include "../../database/database.class.php";
$db = new database();
$db->connect();

$tbprefix = $db->getTablePrefix();
$sessionName = $db->getSessionname();

// $strSQL = "SELECT * FROM ".$tbprefix."registerrecord WHERE pid like '".$_POST['keyword']."%' or REPLACE(pid, ' ','') like '".$_POST['keyword']."%' ORDER BY date_adm DESC";
$strSQL = "SELECT * FROM ".$tbprefix."registerrecord WHERE (pid LIKE '".$_POST['keyword']."%' or REPLACE(pid, ' ','') like '".trim($_POST['keyword'])."%') AND username in (SELECT username FROM ".$tbprefix."userdescription WHERE institute_id in (SELECT institute_id FROM ".$tbprefix."userdescription WHERE username = '".$_SESSION[$sessionName.'sessUsername']."') )  ORDER BY date_adm DESC";
$result = $db->select($strSQL,false,true);

?>
<div class="table-responsive">
  <table class="table table-striped table-borderless table-vcenter">
    <thead>
        <tr>
            <th class="text-center w-10">#</th>
            <th>Full name</th>
            <th >Admission</th>
            <th >Confirm status</th>
            <th >Confirm by</th>
            <th class="text-center" style="width: 100px;">Actions</th>
        </tr>
    </thead>
    <tbody>
<?php

if($result){
  $c = 1;
  foreach ($result as $value) {
    ?>
    <tr>
      <td class="text-center">
        <?php print $c; $c++; ?>
      </td>
      <td>
        <?php print $value['p_fname']." ".$value['p_mname']." ".$value['p_lname']; ?><br>
        <strong>ID</strong> : <?php print $value['pid']; ?>
      </td>
      <td>
        <?php print $value['date_adm']; ?>
      </td>
      <td>
        <?php
        switch($value['confirm_status']){
          case '1': print "Yes"; break;
          default: print "No";
        }
        ?>
      </td>
      <td>
        <?php print $value['confirm_username']; ?>
      </td>
      <td class="text-center">
        <div class="btn-group">
          <?php
          if($value['confirm_status']==1){
            ?>
            <button class="btn btn-xs btn-app-teal" type="button" data-toggle="tooltip" title="View Client" onclick="createsession('<?php print $value['record_id'];?>')"><i class="ion-search"></i></button>
            <button class="btn btn-xs btn-app-light" type="button" data-toggle="tooltip" title="Edit Client" disable onclick="createsession('<?php print $value['record_id'];?>')"><i class="ion-edit"></i></button>
            <button class="btn btn-xs btn-app-light" type="button" data-toggle="tooltip" title="Remove Client" disable><i class="ion-close"></i></button>
            <?php
          }else{
            ?>
            <button class="btn btn-xs btn-app-teal" type="button" data-toggle="tooltip" title="Edit Client" onclick="createsession('<?php print $value['record_id'];?>')"><i class="ion-edit"></i></button>
            <button class="btn btn-xs btn-app-red" type="button" data-toggle="tooltip" title="Remove Client"><i class="ion-close"></i></button>
            <?php
          }
          ?>

        </div>
      </td>
    </tr>
    <?php
  }
}else{
  ?>
    <tr>
      <td colspan="6">
        No record found!
      </td>
    </tr>
  <?php
}

$db->disconnect();


?>
    </tbody>
  </table>
</div>
