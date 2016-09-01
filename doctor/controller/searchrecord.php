<?php
session_start();
include "../../database/database.class.php";
$db = new database();
$db->connect();

$tbprefix = $db->getTablePrefix();
$sessionName = $db->getSessionname();

$strSQL = sprintf("SELECT * FROM ".$tbprefix."registerrecord WHERE pid = '%s' AND username in (SELECT username FROM ".$tbprefix."userdescription WHERE institute_id in (SELECT institute_id FROM ".$tbprefix."userdescription WHERE username = '%s') ) ORDER BY date_adm DESC",
          mysql_real_escape_string($_POST['keyword']),
          mysql_real_escape_string($_SESSION[$sessionName.'sessUsername'])
        );
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
        <?php print $value['p_fname']." ".$value['p_mname']." ".$value['p_lname']; ?>
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
            <button class="btn btn-xs btn-app-teal" type="button" data-toggle="tooltip" title="Edit Client" onclick="createsession2('<?php print $value['record_id'];?>')"><i class="ion-edit"></i></button>
            <button class="btn btn-xs btn-app-teal" type="button" data-toggle="tooltip" title="Remove Client"><i class="ion-close"></i></button>
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
