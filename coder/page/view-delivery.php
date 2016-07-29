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
        <form class="js-validation-register form-horizontal m-t-sm"  method="post" action="controller/update-register.php">
          <div class="col-xs-12">
            <!-- Add card -->
            <div class="card">
              <div class="card-header bg-teal bg-inverse">
                  <h4>View delivery information</h4>
                  <ul class="card-actions">
                    <li>
                        <!-- To toggle card fullscreen, add the following properties to your button: data-toggle="card-action" data-action="fullscreen_toggle" -->
                        <button type="button" data-toggle="card-action" data-action="fullscreen_toggle"></button>
                    </li>
                  </ul>
              </div>
              <div class="card-block" style="padding-top: 30px;">
                <!-- End geolocation input div -->
                <h3 style="font-weight: 400; color: teal;">Delivery information</h3>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Gestational age at delivery
                          </td>
                          <td>
                            <?php print $result[0]['ga_del']; ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Date - Time of delivery
                          </td>
                          <td>
                            <?php if($result[0]['date_del']!='0000-00-00') print $result[0]['date_del']; ?>
                            <?php print " ".$result[0]['time_del']; ?>
                          </td>
                        </tr>

                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Mode of delivery
                          </td>
                          <td>
                            <?php
                            switch($result[0]['mode_del']){
                              case '2': print "V/E"; break;
                              case '3': print "F/E"; break;
                              case '4': print "Caesarean section"; break;
                              case '5': print "Vaginal breach"; break;
                              default: print "Normal delivery";
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Indication
                          </td>
                          <td>
                            <?php
                            $strSQL = sprintf("SELECT * FROM fmn1_indication WHERE ind_id = '%s' ", mysql_real_escape_string($result[0]['indication']));
                            $r = $db->select($strSQL,false,true);
                            if($r){
                              print $r[0]['ind_name'];
                            }else{
                              print "-";
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Other indication
                          </td>
                          <td>
                            <?php
                            if($result[0]['ind_other']!=''){
                              print $result[0]['ind_other'];
                            }else{
                              print "-";
                            };
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Type of birth attendant
                          </td>
                          <td>
                            <?php
                            switch($result[0]['type_ba']){
                              case '1': print "Midwife"; break;
                              case '2': print "Professional Nurse"; break;
                              case '3': print "Medical student"; break;
                              case '4': print "Medical officer"; break;
                              case '5': print "Registrar"; break;
                              case '6': print "Obstetrician"; break;
                              default: print "No data";
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Birth attendant
                          </td>
                          <td>
                            <?php print $result[0]['ba_full_info']; ?>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- End row -->

                <!-- End geolocation input div -->
                <h3 style="font-weight: 400; color: teal;">Perineum</h3>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Intact
                          </td>
                          <td>
                            <?php
                            switch($result[0]['intact']){
                              case '1': print "Yes"; break;
                              default: print "No";
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Episiotomy
                          </td>
                          <td>
                            <?php
                            switch($result[0]['episiotomy']){
                              case '1': print "Yes"; break;
                              default: print "No";
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Degree tear
                          </td>
                          <td>
                            <?php
                            switch($result[0]['degree_tear']){
                              case '1': print "1"; break;
                              case '2': print "2"; break;
                              case '3': print "3"; break;
                              default: print "No";
                            }
                            ?>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- End row -->

                <h3 style="font-weight: 400; color: teal;">ART</h3>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Antenatal client on AZT before labour
                          </td>
                          <td>
                            <?php
                            switch($result[0]['m_art1']){
                              case '1': print "Yes"; break;
                              default: print "No";
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Antenatal client Nevirapine taken during labour
                          </td>
                          <td>
                            <?php
                            switch($result[0]['m_art2']){
                              case '1': print "Yes"; break;
                              default: print "No";
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Truvada given to woman after delivery
                          </td>
                          <td>
                              <?php
                              switch($result[0]['m_art3']){
                                case '1': print "Yes"; break;
                                default: print "No";
                              }
                              ?>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- End row -->

                <h3 style="font-weight: 400; color: teal;">Maternal separation</h3>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Date of separation
                          </td>
                          <td>
                            <?php print $result[0]['mater_sep_date']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Separated by transfer out
                          </td>
                          <td>
                            <?php
                            switch($result[0]['mater_sep_trans']){
                              case '1': print "Yes"; break;
                              default: print "No";
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
                            if($result[0]['mater_sep_tfacility']!=''){
                              print $result[0]['mater_sep_tfacility'];
                            }else{
                              print "-";
                            };
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Separated by maternal death
                          </td>
                          <td>
                            <?php
                            switch($result[0]['mater_sep_death']){
                              case '1': print "Yes"; break;
                              default: print "No";
                            }
                            ?>
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
