<?php
include "../../database/database.class.php";
$db = new database();
$db->connect();

$tbprefix = $db->getTablePrefix();
$sessionName = $db->getSessionname();
?>
<table class="table table-bordered table-striped">
  <thead>
      <tr>
          <th class="text-center">#</th>
          <th>Name</th>
          <th class="text-center" style="width: 10%;">Actions</th>
      </tr>
  </thead>
  <tbody>
    <?php
    $strSQL = "SELECT * FROM ti_institute WHERE ti_status = 'Allow' ORDER BY ti_name ASC";

    if($_POST['keyword']!=""){
      $strSQL = "SELECT * FROM ti_institute WHERE ti_status = 'Allow' and ti_name like '".$_POST['keyword']."%' ORDER BY ti_name ASC";
    }

    $result = $db->select($strSQL,false,true);
    if($result){
      $c = 1;
      foreach ($result as $value) {
        ?>
        <tr>
            <td class="text-center"><?php print $c; $c++; ?></td>
            <td class="font-500"><?php print $value['ti_name']; ?></td>
            <td class="text-center">
                <button type="button" name="button" class="btn btn-primary" onclick="fillFacility('<?php print $value['ti_name']; ?>')"><i class="fa fa-check"></i></button>
            </td>
        </tr>
        <?php
      }
    }else{
      ?>
      <tr>
        <td colspan="3">
          No value
        </td>
      </tr>
      <?php
    }
    ?>

  </tbody>
</table>
