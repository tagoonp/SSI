<?php
session_start();
include "../../database/database.class.php";
$db = new database();
$db->connect();

$tbprefix = $db->getTablePrefix();
$sessionName = $db->getSessionname();

$strSQL = sprintf("SELECT * FROM fmn1_useraccount a inner join fmn1_userdescription b on a.username = b.username WHERE a.username = '%s'", mysql_real_escape_string($_SESSION[$sessionName.'sessUsername']));
$valueUserinfo = $db->select($strSQL,false,true);

?>
<table class="table table-bordered table-striped">
  <thead>
      <tr>
          <th class="text-center">#</th>
          <th>ID</th>
          <th>Name</th>
          <th>Trusted</th>
          <th class="text-center" style="width: 10%;">Actions</th>
      </tr>
  </thead>
  <tbody>
    <?php
    $strSQL = "SELECT * FROM fmn1_useraccount a inner join fmn1_userdescription b on a.username=b.username inner join ti_ba c on a.username = c.ba_username WHERE a.user_type_id = '5' and a.status = '1' and b.institute_id = '".$valueUserinfo[0]['institute_id']."' ORDER BY b.fname";

    if($_POST['keyword']!=""){
      $strSQL = "SELECT * FROM fmn1_useraccount a inner join fmn1_userdescription b on a.username=b.username inner join ti_ba c on a.username = c.ba_username WHERE a.user_type_id = '5' and a.status = '1' and b.institute_id = '".$valueUserinfo[0]['institute_id']."' and b.fname like '".$_POST['keyword']."%' or a.username like '".$_POST['keyword']."%' ORDER BY b.fname";
    }


    $result = $db->select($strSQL,false,true);
    if($result){
      $c = 1;
      foreach ($result as $value) {
        ?>
        <tr>
            <td class="text-center"><?php print $c; $c++; ?></td>
            <td>
              <?php print $value['username']; ?>
            </td>
            <td class="font-500"><?php print $value['fname']." ".$value['lname']; ?></td>
            <td style="font-size: 1.5em; padding-top: 10px;">
              <?php
              if($value['ba_status']=='Allow'){
                ?>
                <i class="ion-checkmark-circled" style="color: green;"></i>
                <?php
              }else{
                ?>
                <i class="ion-close-circled" style="color: red;"></i>
                <?php
              }
              ?>
            </td>
            <td class="text-center">
                <button type="button" name="button" class="btn btn-primary" onclick="fillBA('<?php print $value['username']; ?>', '<?php print $value['fname']." ".$value['lname']; ?>')"><i class="fa fa-check"></i></button>
            </td>
        </tr>
        <?php
      }
    }else{
      ?>
      <tr>
        <td colspan="5">
          No value
        </td>
      </tr>
      <?php
    }
    ?>

  </tbody>
</table>
