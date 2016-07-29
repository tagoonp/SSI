<main class="app-layout-content">

  <!-- Page Content -->
  <div class="container-fluid p-y-md">
      <!-- Stats -->
      <div class="row">
        <div class="col-sm-6 text-left">
          <h3 style="margin-top: 0px;">Patient's ID : <?php print $_SESSION[$sessionName.'PID']; ?></h3>
        </div>
        <div class="col-sm-6 text-right">
          <button type="button" class="btn btn-app-red" onclick="xpl_custom_function.common_redirect('close_session.php')">Close session</button>
        </div>
      </div>
      <div class="row">
        <form class="js-validation-obstetric form-horizontal m-t-sm"  method="post" action="controller/insert-obstetric.php">
          <div class="col-xs-12">
            <!-- Add card -->
            <div class="card">
              <div class="card-header bg-teal bg-inverse">
                  <h4>View obstetric information</h4>
              </div>
              <div class="card-block" style="padding-top: 30px;">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Gravidity
                          </td>
                          <td>
                            <?php print $result[0]['gravidity']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Parity
                          </td>
                          <td>
                            <?php print $result[0]['parity']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Antenatal care attendance
                          </td>
                          <td>
                            <?php print $result[0]['anc_attend']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Gestational age at 1st ANC
                          </td>
                          <td>
                            <?php print $result[0]['ga1st']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Antenatal booking before 20 weeks gestation
                          </td>
                          <td>
                            <?php
                            switch($result[0]['ga20w']){
                              case '1': print "Yes"; break;
                              default: print "No";
                            }
                            ?>

                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Number of antenatal visits
                          </td>
                          <td>
                            <?php print $result[0]['no_anc']; ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Rh
                          </td>
                          <td>
                            <?php print $result[0]['rh']; ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Anti D Immunoglobulin to mother if Rh neg
                          </td>
                          <td>
                            <?php
                            switch($result[0]['anti_d']){
                              case '1': print "Yes"; break;
                              default: print "No";
                            }
                            ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            RPR
                          </td>
                          <td>
                            <?php
                            switch($result[0]['rpr']){
                              case '1': print "Done but no result"; break;
                              case '2': print "Result -"; break;
                              case '3': print "Result +"; break;
                              default: print "Not done";
                            }
                            ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            RPR treated
                          </td>
                          <td>
                            <?php
                            switch($result[0]['rpr_treated']){
                              case '1': print "Yes"; break;
                              case '99': print "Not applicable"; break;
                              default: print "No";
                            }
                            ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            HIV status (at registration)
                          </td>
                          <td>
                            <?php
                            switch($result[0]['hiv_status']){
                              case 'Neg': print "Neg"; break;
                              case 'Pos': print "Pos"; break;
                              default: print "Unknown";
                            }
                            ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            HIV 1st test
                          </td>
                          <td>
                            <?php
                            switch($result[0]['hiv_1st']){
                              case '1': print "Done but no result"; break;
                              case '2': print "Result -"; break;
                              case '3': print "Result +"; break;
                              default: print "Not done";
                            }
                            ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            HIV retest after 12 weeks
                          </td>
                          <td>
                            <?php
                            switch($result[0]['hiv_retest']){
                              case '1': print "Done but no result"; break;
                              case '2': print "Result -"; break;
                              case '3': print "Result +"; break;
                              default: print "Not done";
                            }
                            ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            CD4 labour/postpartum
                          </td>
                          <td>
                            <?php
                            switch($result[0]['cd4']){
                              case '1': print "Yes"; break;
                              default: print "No";
                            }
                            ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            CD4 count
                          </td>
                          <td>
                            <?php print $result[0]['cd4_count']; ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Initiate ART at delivery
                          </td>
                          <td>
                            <?php
                            switch($result[0]['initiate_art']){
                              case '1': print "Yes"; break;
                              default: print "No";
                            }
                            ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            On ART at delivery
                          </td>
                          <td>
                            <?php
                            switch($result[0]['on_art_delivery']){
                              case 'Dual': print "Dual"; break;
                              case 'Triple': print "Triple"; break;
                              case 'on_art_delivery': print "on_art_delivery"; break;
                              default: print "No";
                            }
                            ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Birth before arrival (BBA)
                          </td>
                          <td>
                            <?php
                            switch($result[0]['bba']){
                              case '1': print "Yes"; break;
                              default: print "No";
                            }
                            ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Gestational age at admission
                          </td>
                          <td>
                            <?php print $result[0]['ga_adm']; ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Stage of labor at admission
                          </td>
                          <td>
                            <?php
                            switch($result[0]['stage_of_labour']){
                              case '1': print "Latent phase"; break;
                              case '2': print "Active phase 3 - 4 cm"; break;
                              case '3': print "2nd stage of labor"; break;
                              case '4': print "Head out periniun"; break;
                              case '5': print "3rd stage of labor"; break;
                              default: print "No labour";
                            }
                            ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Date - Time of labor start
                          </td>
                          <td>
                            <?php print $result[0]['date_lbs']." ".$result[0]['time_lbs']; ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Date - Time of labor start
                          </td>
                          <td>
                            <?php print $result[0]['date_lbs']." ".$result[0]['time_lbs']; ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Date - Time of ruptured membranes
                          </td>
                          <td>
                            <?php print $result[0]['date_rm']." ".$result[0]['time_rm']; ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Date - Time at 3-4 cm
                          </td>
                          <td>
                            <?php print $result[0]['date_3cm']." ".$result[0]['time_3cm']; ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Date - Time at at fully dilated
                          </td>
                          <td>
                            <?php print $result[0]['date_fully']." ".$result[0]['time_fully']; ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Duration of active phase of labour
                          </td>
                          <td>
                            <?php print $result[0]['duration_active_phase']; ?>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- End row -->



              </div>
            </div>
            <!-- End card -->
          </div>
        </form>
      </div>
      <!-- End row -->
  </div>


</main>
