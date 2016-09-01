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
        <form class="form-horizontal m-t-sm"  method="post" action="controller/insert-postnatal.php">
          <div class="col-xs-12">
            <!-- Add card -->
            <div class="card">
              <div class="card-header bg-teal bg-inverse">
                  <h4>Postnatal information</h4>
              </div>
              <div class="card-block" style="padding-top: 30px;">
                <h3>Complications in postpartum information</h3>
                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="material-text">Postpartum haemorrhage</label><br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-pph" id="radio-pph1" checked value="0" /><span></span> No
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-pph" id="radio-pph2" value="1" <?php if($result[0]['pos_com1']==1){ print "checked"; } ?> /><span></span> Yes
                          </label>
                      </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="material-text">Postpartum eclampsia </label><br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-ppe" id="radio-ppe1" checked value="0" /><span></span> No
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-ppe" id="radio-ppe2" value="1" <?php if($result[0]['pos_com2']==1){ print "checked"; } ?> /><span></span> Yes
                          </label>
                      </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="material-text">Postpartum sepsis </label><br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-pps" id="radio-pps1" checked value="0" /><span></span> No
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-pps" id="radio-pps2" value="1" <?php if($result[0]['pos_com3']==1){ print "checked"; } ?> /><span></span> Yes
                          </label>
                      </div>
                </div>

                <h3>Family planning</h3>

                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="material-text">Sterilisation </label><br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-ster" id="radio-ster1" checked value="0" /><span></span> No
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-ster" id="radio-ster2" value="1" <?php if($result[0]['sterilisation']==1){ print "checked"; } ?> /><span></span> Yes
                          </label>
                      </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="material-text">Oral contraception </label><br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-oral" id="radio-oral1" checked value="0" /><span></span> No
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-oral" id="radio-oral2" value="1" <?php if($result[0]['oral_con']==1){ print "checked"; } ?> /><span></span> Yes
                          </label>
                      </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="material-text">Medroxyprogesterone </label><br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-medrox" id="radio-medrox1" checked value="0" /><span></span> No
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-medrox" id="radio-medrox2" value="1" <?php if($result[0]['Medroxyprogesterone']==1){ print "checked"; } ?> /><span></span> Yes
                          </label>
                      </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="material-text">Norethisterone enanthate </label><br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-nore" id="radio-nore1" checked value="0" /><span></span> No
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-nore" id="radio-nore2" value="1" <?php if($result[0]['Norethisterone']==1){ print "checked"; } ?> /><span></span> Yes
                          </label>
                      </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="material-text">Condoms </label><br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-condom" id="radio-condom1" checked value="0" /><span></span> No
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-condom" id="radio-condom2" value="1" <?php if($result[0]['Condoms']==1){ print "checked"; } ?> /><span></span> Yes
                          </label>
                      </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="material-text">IUCD inserted </label><br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-iucd" id="radio-iucd1" checked value="0" /><span></span> No
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-iucd" id="radio-iucd2" value="1" <?php if($result[0]['IUCD']==1){ print "checked"; } ?> /><span></span> Yes
                          </label>
                      </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="material-text">Subdermal implant </label><br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-subderm" id="radio-subderm1" checked value="0" /><span></span> No
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-subderm" id="radio-subderm2" value="1" <?php if($result[0]['Subdermal']==1){ print "checked"; } ?> /><span></span> Yes
                          </label>
                      </div>
                </div>

                <h3>Marternal separation</h3>


                <div class="form-group" style="margin-bottom: 0px; padding-bottom: 0px;">
                  <div class="col-sm-12">
                      <div class="form-material">
                        <input class="js-datepicker form-control" type="text" id="txt-Date34" name="txt-Date34" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd"  value="<?php if($result[0]['mot_dis_date']!='0000-00-00'){ print $result[0]['mot_dis_date']; } ?>">
                        <label for="example-datepicker4">Date of separation</label>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12" style="margin-top: 0px; padding-top: 0px;">
                    <label for="material-text">Separated by discharged </label><br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-sepbydist" id="radio-sepbydist1" checked value="0" /><span></span> No
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-sepbydist" id="radio-sepbydist2" value="1" <?php if($result[0]['mot_dis']==1){ print "checked"; } ?> /><span></span> Yes
                          </label>
                      </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="material-text">Separated by transfer out </label><br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-sepbytrans" id="radio-sepbytrans1" checked onclick="toggle_value('radio-sepbytrans', 0);" value="0" /><span></span> No
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-sepbytrans" id="radio-sepbytrans2" value="1" <?php if($result[0]['mot_ref_status']==1){ print "checked"; } ?> onclick="toggle_value('radio-sepbytrans', 1);" /><span></span> Yes
                          </label>
                      </div>
                </div>

                <div class="separateOption" style="display: <?php if($result[0]['mot_ref_status']!=1){ print "none"; } ?>;">
                  <div class="form-group" style="margin-bottom: 0px; padding-bottom: 0px;">
                    <div class="col-sm-12">
                        <div class="form-material">
                            <input class="form-control" type="text" id="txt-transtfacility" name="txt-transtfacility" placeholder="Enter name of facility" value="<?php print $result[0]['mot_ref_to']; ?>" />
                            <label for="material-text">Transfer facility &nbsp;&nbsp;&nbsp;&nbsp;
                              <button class="btn btn-xs btn-app-teal-outline" data-toggle="modal" data-target="#modal-top" type="button" onclick="fillMedalData('txt-transtfacility')"><i class="ion-android-arrow-dropdown"></i> Choose</button>
                            </label>
                        </div>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="material-text">Separated by maternal death </label><br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-sepbymdeath" id="radio-sepbymdeath1" checked value="0" /><span></span> No
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-sepbymdeath" id="radio-sepbymdeath2" value="1" <?php if($result[0]['mot_death']==1){ print "checked"; } ?> /><span></span> Yes
                          </label>
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
                <!-- End referCondition -->



              </div>
            </div>
            <!-- End card -->
          </div>
        </form>
      </div>
      <!-- End row -->
  </div>


</main>
