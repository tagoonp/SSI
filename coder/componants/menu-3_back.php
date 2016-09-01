<nav class="drawer-main">
    <ul class="nav nav-drawer">

        <li class="nav-item nav-drawer-header">Instruments</li>

        <li class="nav-item">
            <a href="registry.php">
              <?php
              $strSQL = sprintf("SELECT * FROM ".$tbprefix."registerrecord WHERE record_id = '%s' LIMIT 0,1", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
              $results1 = $db->select($strSQL,false,true);

              if($results1){
                ?><i class="ion-checkmark" style="color: teal;"></i><?php
              }
              ?>
              Birth registry</a>
        </li>

        <li class="nav-item">
            <a href="add-obstetric.php">
              <?php
              $strSQL = sprintf("SELECT * FROM ".$tbprefix."obstetric WHERE record_id = '%s' LIMIT 0,1", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
              $results = $db->select($strSQL,false,true);

              if($results){
                ?><i class="ion-checkmark" style="color: teal;"></i><?php
              }
              ?>
              Obstetric information</a>
        </li>

        <li class="nav-item">
            <a href="add-delivery.php">
              <?php
              $strSQL = sprintf("SELECT * FROM ".$tbprefix."delivery WHERE record_id = '%s' LIMIT 0,1", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
              $results = $db->select($strSQL,false,true);

              if($results){
                ?><i class="ion-checkmark" style="color: teal;"></i><?php
              }
              ?>
              Delivery information</a>
        </li>

        <li class="nav-item">
            <a href="add-newborn.php">
              <?php
              $strSQL = sprintf("SELECT * FROM ".$tbprefix."outcome WHERE record_id = '%s'", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
              $results = $db->select($strSQL,false,true);

              $nbNo = 0;
              if($results){
                $nbNo = sizeof($results);
                ?><i class="ion-checkmark" style="color: teal;"></i><?php
              }
              ?>
              Newborn charecteristics</a>
        </li>

        <li class="nav-item">
            <a href="add-complication.php">
              <?php
              $strSQL = sprintf("SELECT * FROM ".$tbprefix."complication_delivery WHERE record_id = '%s' LIMIT 0,1", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
              $results = $db->select($strSQL,false,true);

              if($results){
                ?><i class="ion-checkmark" style="color: teal;"></i><?php
              }
              ?>
              Complication</a>
        </li>

        <li class="nav-item">
            <a href="add-postnatal.php">
              <?php
              $strSQL = sprintf("SELECT * FROM ".$tbprefix."postnatal WHERE record_id = '%s' LIMIT 0,1", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
              $results = $db->select($strSQL,false,true);

              if($results){
                ?><i class="ion-checkmark" style="color: teal;"></i><?php
              }
              ?>
              Postnatal information</a>
        </li>

        <li class="nav-item">
            <a href="add-post-njewborn.php">
              <?php
              $strSQL = sprintf("SELECT * FROM ".$tbprefix."other_postnatal WHERE record_id = '%s' ", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
              $results = $db->select($strSQL,false,true);

              if($results){
                ?><i class="ion-checkmark" style="color: teal;"></i><?php
              }
              ?>
              Newborn at postnatal&nbsp;<br>
              <?php
              if($results){
                print sizeof($results)." of ".$nbNo;
              }
              ?>
            </a>
        </li>

        <!-- <li class="nav-item">
            <a href="case-report.php">Case report</a>
        </li> -->

        <li class="nav-item nav-drawer-header">Closing</li>

        <li class="nav-item">
            <a href="close_session.php"><i class="ion-close"></i> Close session</a>
        </li>

        <li class="nav-item">
            <a href="../signout.php"><i class="ion-log-out"></i> Sign out</a>
        </li>

        <?php
        if($results1[0]['confirm_status']!=1){
          ?>
          <li class="nav-item nav-drawer-header">Other function</li>
          <li class="nav-item">
              <a href="note.php"><i class="fa fa-envelope-o"></i> Note this case&nbsp;
                <?php
                $strSQL = sprintf("SELECT * FROM ".$tbprefix."note WHERE record_id = '%s' ", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
                $results = $db->select($strSQL,false,true);

                if($results){
                  ?>
                  <span class="badge" style="background: red; font-size: 1.2em;" ><?php print sizeof($results); ?></span>
                  <?php
                }

                ?></a>
          </li>
          <?php
        }
        ?>



    </ul>
</nav>
