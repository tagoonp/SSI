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
                <div class="row" style="padding-top: 20px;">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="col-sm-12">
                          <div class="form-material">
                            <input class="js-datepicker form-control" type="text" id="txt-dateadm" name="txt-dateadm" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php if($result[0]['date_adm']!='0000-00-00') print $result[0]['date_adm'];?>">
                            <label for="example-datepicker4">Date of admission <span style="color: red;">**</span></label>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="col-sm-12">
                          <div class="form-material">
                              <input class="form-control" type="time" id="txt-timeadm" name="txt-timeadm" placeholder="Please enter time of admission" value="<?php if($result[0]['time_adm']!='00:00:00'){ print $result[0]['time_adm']; } ?>" />
                              <label for="material-text">Time of admission <span style="color: red;">**</span></label>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End row -->
                <div class="form-group">
                  <div class="col-sm-12">
                      <div class="form-material">
                          <input class="form-control" type="text" id="txt-foldernumber" name="txt-foldernumber" placeholder="Please enter folder number" value="<?php print $result[0]['folder_no']; ?>" />
                          <label for="material-text">Folder number</label>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                      <div class="form-material">
                          <input class="form-control" type="text" id="txt-pointofdelivery" name="txt-pointofdelivery" placeholder="Please enter point of delivery number" value="<?php print $result[0]['point_no']; ?>" />
                          <label for="material-text">Point of delivery folder no</label>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                    <p>
                      <label for="material-text">Refer status</label>&nbsp;&nbsp;&nbsp;<br>
                      <label class="css-input switch switch-default switch-success">
                        No <input type="checkbox" name="cb-refer" id="cb-refer" <?php if($result[0]['refer_in_status']==1){ print "checked"; } ?> /><span></span> Yes
                      </label>
                    </p>
                  </div>
                </div>

                <div class="referCondition" style="display:<?php if($result[0]['refer_in_status']!=1){ print "none"; } ?>;">
                  <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material">
                            <input class="form-control" type="text" id="txt-referfacility" name="txt-referfacility" placeholder="Please enter facility name" value="<?php print $result[0]['refer_in_facility']; ?>" />
                            <label for="material-text">Refer from facility</label>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-xs-12">
                      <label for="material-text">Stage of patient</label>&nbsp;&nbsp;&nbsp;
                            <label class="css-input css-radio css-radio-lg css-radio-primary m-r-sm">
                              <input type="radio" name="radio-referstage" id="radio-referstage1" value="1" checked /><span></span> Stable
                            </label>&nbsp;&nbsp;
                            <label class="css-input css-radio css-radio-lg css-radio-warning">
                              <input type="radio" name="radio-referstage" id="radio-referstage2" value="2" <?php if($result[0]['stage_of_patient']==2){ print "checked"; } ?> /><span></span> Unstable
                            </label>&nbsp;&nbsp;
                            <label class="css-input css-radio css-radio-lg css-radio-danger">
                              <input type="radio" name="radio-referstage" id="radio-referstage3" value="3" <?php if($result[0]['stage_of_patient']==3){ print "checked"; } ?> /><span></span> Coma
                            </label>
                        </div>
                  </div>

                </div>
                <!-- End referCondition -->
                <h3 style="font-weight: 400; color: teal;">Demographic information</h3>

                  <div class="form-group" style="padding-top: 30px;">
                    <div class="col-sm-12">
                        <div class="form-material">
                            <input class="form-control" type="text" id="txt-pid" name="txt-pid" placeholder="Please enter patient's ID" readonly value="<?php print $result[0]['pid']; ?>" />
                            <label for="material-text">ID No, / Passport ID / Date of bitrh [YYMMDD] <span style="color: red;">**</span></label>
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <div class="col-sm-12">
                            <div class="form-material">
                                <input class="form-control" type="text" id="txt-fname" name="txt-fname" placeholder="Please enter patient's first name..." value="<?php print $result[0]['p_fname']; ?>" />
                                <label for="material-text">First name <span style="color: red;">**</span></label>
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <div class="col-sm-12">
                            <div class="form-material">
                                <input class="form-control" type="text" id="txt-mname" name="txt-mname" placeholder="Enter middle name..." value="<?php print $result[0]['p_mname']; ?>"/>
                                <label for="material-text">Middle name</label>
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <div class="form-group">
                        <div class="col-sm-12">
                            <div class="form-material">
                                <input class="form-control" type="text" id="txt-lname" name="txt-lname" placeholder="Enter last name..." value="<?php print $result[0]['p_lname']; ?>" />
                                <label for="material-text">Lastname</label>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End row -->
                  <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material">
                          <textarea class="form-control" name="txt-address" id="txt-address" rows="4" cols="40" placeholder="Enter patient's address..."><?php if($resultPinfo){ print $info['p_address']; } ?></textarea>
                          <label for="material-text">Address</label>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-12">
                        <div class="form-material">
                            <input class="form-control" type="text"  id="txt-phone" name="txt-phone" placeholder="Enter phone number..." value="<?php if($resultPinfo){ print $info['p_phone']; } ?>" />
                            <label for="material-text">Phone number</label>
                        </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="col-sm-12">
                            <div class="form-material">
                                <input class="js-datepicker form-control" type="text" id="txt-dob" name="txt-dob" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php if($resultPinfo){ print $info['p_dob']; } ?>">
                                <label for="material-text">Date of birth</label>
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="col-sm-12">
                            <div class="form-material">
                                <input class="form-control" type="text" id="txt-age" name="txt-age" placeholder="Please enter age of patient if system cannot calcuate automatically..." value="<?php if($resultPinfo){ print calcutateAge($info['p_dob']); } ?>" />
                                <label for="material-text">Age <span style="color: red;">**</span></label>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row narrow-gutter">
                      <div class="col-xs-12 text-right">
                          <button type="reset" class="btn btn-default">Cancel</button>
                          <button type="submit" class="btn btn-app-teal">Save</button>
                      </div>
                      <div class="col-xs-6">

                      </div>
                  </div>
              </div>
            </div>
            <!-- End card -->
          </div>
        </form>
      </div>
      <!-- End row -->
  </div>


</main>
