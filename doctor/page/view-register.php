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
                  <h4>Registery information</h4>
                  <ul class="card-actions">
                    <li>
                        <!-- To toggle card fullscreen, add the following properties to your button: data-toggle="card-action" data-action="fullscreen_toggle" -->
                        <button type="button" data-toggle="card-action" data-action="fullscreen_toggle"></button>
                    </li>
                  </ul>
              </div>
              <div class="card-block" style="padding-top: 30px;">
                <!-- Geolocation input div -->
                <div class="geolocation" style="display:none;">
                  <h3>Geolocation data</h3>

                  <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material">
                            <input class="form-control" type="text" id="txt-rid" name="txt-rid" placeholder="Please enter longitude" value="<?php print $_SESSION[$sessionName.'PID'];?>" />
                            <label for="material-text">Institute id</label>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material">
                            <input class="form-control" type="text" id="txt-inst" name="txt-inst" placeholder="Please enter longitude" value="<?php print $valueUserinfo['institute_id'];?>" />
                            <label for="material-text">Institute id</label>
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="col-sm-12">
                            <div class="form-material">
                                <input class="form-control" type="text" id="txt-lat" name="txt-lat" placeholder="Please enter longitude" />
                                <label for="material-text">Latitute</label>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="col-sm-12">
                            <div class="form-material">
                                <input class="form-control" type="text" id="txt-lng" name="txt-lng" placeholder="Please enter  latitude" />
                                <label for="material-text">Longtitute</label>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End geolocation input div -->
                <h3 style="font-weight: 400; color: teal;">Main admission data</h3>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Date-Time of admission
                          </td>
                          <td>
                            <?php if($result[0]['date_adm']!='0000-00-00') print $result[0]['date_adm']; ?>
                            <?php print " ".$result[0]['time_adm']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Folder number
                          </td>
                          <td>
                            <?php print $result[0]['folder_no']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Point of delivery folder no.
                          </td>
                          <td>
                            <?php print $result[0]['point_no']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Refer status
                          </td>
                          <td>
                            <?php
                            switch($result[0]['refer_in_status']){
                              case '1': print "Yes"; break;
                              default: print "No";
                            }
                            ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Refer from facility
                          </td>
                          <td>
                            <?php print $result[0]['refer_in_facility']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Stage of patient
                          </td>
                          <td>
                            <?php
                            switch($result[0]['refer_in_status']){
                              case '1': print "Stable"; break;
                              case '2': print "Unstable"; break;
                              case '3': print "Coma"; break;
                              default: print "N/A";
                            }
                            ?>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <!-- End row -->

                <!-- End geolocation input div -->
                <h3 style="font-weight: 400; color: teal;">Demographic information</h3>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            ID No, / Passport ID / Date of bitrh [YYMMDD]
                          </td>
                          <td>
                            <?php print $result[0]['pid']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Patient's Name, Midname, Surname
                          </td>
                          <td>
                            <?php print $result[0]['p_fname']." ".$result[0]['p_mname']." ".$result[0]['p_lname']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Address
                          </td>
                          <td>
                            <?php print $result[0]['p_address']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Phone number
                          </td>
                          <td>
                            <?php print $result[0]['p_phone']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Date of birth
                          </td>
                          <td>
                            <?php print $result[0]['p_dob']; ?>
                          </td>
                        </tr>
                        <tr>
                          <td class="col-sm-6 font-bold-500">
                            Age
                          </td>
                          <td>
                            <?php print $result[0]['p_cage']; ?>
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
