<div class="row">
  <div class="col-xs-12" >
    <!-- Add card -->
    <h3>Newborn ID: <?php print $value['nb_no']; ?></h3>
    <div class="card" >
      <div class="card-header bg-teal bg-inverse">
          <h3>Outcome information</h3>
      </div>
      <div class="card-block" style="padding-top: 30px; padding: 0px; margin: 0px;">
        <div class="table-responsive" style="padding: 0px; margin: 0px;">
          <table class="table table-striped" style="padding: 0px; margin: 0px;">
            <tr>
              <td class="col-sm-6 font-bold-500">
                Gender
              </td>
              <td>
                <?php print $value['gender']; ?>
              </td>
            </tr>
            <tr>
              <td class="font-bold-500">
                Mode of birth
              </td>
              <td>
                <?php
                switch($value['mob']){
                  case 1: print "Normal delivery"; break;
                  case 2: print "V/E"; break;
                  case 3: print "F/E"; break;
                  case 4: print "Caesarean section"; break;
                  case 5: print "Vaginal breach"; break;
                  default: print "Normal delivery";
                }
                ?>
              </td>
            </tr>
            <tr>
              <td class="font-bold-500">
                Alive
              </td>
              <td>
                <?php
                switch($value['alive']){
                  case 0: print "No"; break;
                  default: print "Yes";
                }
                ?>
              </td>
            </tr>
            <tr>
              <td class="col-sm-6 font-bold-500">
                Stillbirth type
              </td>
              <td>
                <?php
                switch($value['stillbirth']){
                  case 1: print "Fresh"; break;
                  case 2: print "Macerated"; break;
                  default: print "-";
                }
                ?>
              </td>
            </tr>
            <tr>
              <td class="col-sm-6 font-bold-500">
                Apgar score 5 min / 10 min
              </td>
              <td>
                <?php
                print $value['ag5']." / ".$value['ag10'];
                ?>
              </td>
            </tr>
            <tr>
              <td class="col-sm-6 font-bold-500">
                Resuscitate bag & mask
              </td>
              <td>
                <?php
                switch($value['rbm']){
                  case '1': print "Yes"; break;
                  default: print "No";
                }
                ?>

              </td>
            </tr>
            <tr>
              <td class="col-sm-6 font-bold-500">
                Birth weight
              </td>
              <td>
                <?php print $value['birth_wieght']; ?>
              </td>
            </tr>

            <tr>
              <td class="col-sm-6 font-bold-500">
                Head circumference (cm)
              </td>
              <td>
                <?php print $value['hc']; ?>
              </td>
            </tr>

            <tr>
              <td class="col-sm-6 font-bold-500">
                Fetal length (cm)
              </td>
              <td>
                <?php print $value['fetal_length']; ?>
              </td>
            </tr>

            <tr>
              <td class="col-sm-6 font-bold-500">
                Birth defects found
              </td>
              <td>
                <?php
                switch($value['bdf']){
                  case 0: print "No"; break;
                  default: print "Yes";
                }
                ?>
              </td>
            </tr>

            <tr>
              <td class="col-sm-6 font-bold-500">
                Identify
              </td>
              <td>
                <?php
                if( $value['bdf_identify'] == ''){
                  print "-";
                }else{
                  print  $value['bdf_identify'];
                }

                ?>
              </td>
            </tr>

            <tr>
              <td class="col-sm-6 font-bold-500">
                Birth defects notified
              </td>
              <td>
                <?php
                switch($value['bdn']){
                  case 0: print "No"; break;
                  default: print "Yes";
                }
                ?>
              </td>
            </tr>

            <tr>
              <td class="col-sm-6 font-bold-500">
                Live birth to HIV positive woman
              </td>
              <td>
                <?php
                switch($value['pmctv_lb']){
                  case 0: print "No"; break;
                  default: print "Yes";
                }
                ?>
              </td>
            </tr>

            <tr>
              <td class="col-sm-6 font-bold-500">
                Exclusive breast feeding within 1 hour
              </td>
              <td>
                <?php
                switch($value['ebf']){
                  case 0: print "No"; break;
                  default: print "Yes";
                }
                ?>
              </td>
            </tr>

            <tr>
              <td class="col-sm-6 font-bold-500">
                Breast feeding
              </td>
              <td>
                <?php
                switch($value['bf']){
                  case 0: print "No"; break;
                  default: print "Yes";
                }
                ?>
              </td>
            </tr>

            <tr>
              <td class="col-sm-6 font-bold-500">
                Formular feeding
              </td>
              <td>
                <?php
                switch($value['ff']){
                  case 0: print "No"; break;
                  default: print "Yes";
                }
                ?>
              </td>
            </tr>

            <tr>
              <td class="col-sm-6 font-bold-500">
                Skin to Skin contact
              </td>
              <td>
                <?php
                switch($value['skin2skin']){
                  case 0: print "No"; break;
                  default: print "Yes";
                }
                ?>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="card" >
      <div class="card-header bg-teal bg-inverse">
          <h3>Infant separation</h3>
      </div>
      <div class="card-block" style="padding-top: 30px; padding: 0px; margin: 0px;">
        <div class="table-responsive" style="padding: 0px; margin: 0px;">
          <table class="table table-striped" style="padding: 0px; margin: 0px;">
            <tr>
              <td class="col-sm-6 font-bold-500">
                Newborn admitted
              </td>
              <td>
                <?php
                switch($value['nb_adm']){
                  case 0: print "No"; break;
                  default: print "Yes";
                }
                ?>
              </td>
            </tr>
            <tr>
              <td class="font-bold-500">
                Date - Time of separation
              </td>
              <td>
                <?php print $value['nb_date_sep']." ".$value['nb_time_sep']; ?>
              </td>
            </tr>
            <tr>
              <td class="font-bold-500">
                Separated by early neonatal death < 7days
              </td>
              <td>
                <?php
                switch($value['nb_neonatal']){
                  case 0: print "No"; break;
                  default: print "Yes";
                }
                ?>
              </td>
            </tr>
            <tr>
              <td class="col-sm-6 font-bold-500">
                Separated by late neonatal death 7 - 28 days
              </td>
              <td>
                <?php
                switch($value['nb_neonatal7']){
                  case 0: print "No"; break;
                  default: print "Yes";
                }
                ?>
              </td>
            </tr>

            <tr>
              <td class="col-sm-6 font-bold-500">
                Separated by transfer out
              </td>
              <td>
                <?php
                switch($value['nb_refer']){
                  case 0: print "No"; break;
                  default: print "Yes";
                }
                ?>

              </td>
            </tr>
            <tr>
              <td class="col-sm-6 font-bold-500">
                Transfer facility
              </td>
              <td>
                <?php
                if( $value['nb_refer_facility'] == ''){
                  print "-";
                }else{
                  print  $value['bdf_identify'];
                }
                ?>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
