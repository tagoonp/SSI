<form class="js-validation-newborn form-horizontal m-t-sm"  id="form1" method="post" action="controller/insert-outcome.php" >

    <h3>Newborn information</h3>



    <div class="form-group" style="display:none;">
      <div class="col-sm-12">
          <div class="form-material">
              <input class="form-control" type="text" id="txt-nbid" name="txt-nbid" value="<?php if(isset($_GET['nbid'])){ print $_GET['nbid']; } ?>" />
              <label for="material-text">ID </label></label>
          </div>
      </div>
    </div>

    <div class="form-group" style="padding-top: 20px;">
      <div class="col-xs-12">
        <div class="radioDiv" id="gender">
          <label for="material-text" id="req-lable1">Gender <span style="color:red;">**</span></label>&nbsp;&nbsp;&nbsp;<br>
          <div class="" checked style="display:none;" >
            <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
              <input type="radio" name="radio-gender" id="radio-gender0" class="class-gender" value="0" checked=""  /><span></span>
            </label>&nbsp;&nbsp;
          </div>
          <label class="css-input css-radio css-radio-lg css-radio-success m-r-sm">
            <input type="radio" name="radio-gender" id="radio-gender1" class="class-gender" value="1" <?php if($resultNB){if($resultNB[0]['gender']=='Male'){ print "checked"; }} ?> /><span></span> Male
          </label>&nbsp;&nbsp;
          <label class="css-input css-radio css-radio-lg css-radio-success">
            <input type="radio" name="radio-gender" id="radio-gender2" class="class-gender" value="2" <?php if($resultNB){if($resultNB[0]['gender']=='Female'){ print "checked"; }} ?> /><span></span> Female
          </label>
        </div>
      </div>
    </div>

    <div class="form-group" style="padding-top: 10px;">
      <div class="col-sm-12">
          <div class="form-material">
              <select class="form-control" name="txt-birth" id="txt-birth">
                <option value="1" selected="selected">Normal delivery</option>
                <option value="2" <?php if($resultNB){if($resultNB[0]['mob']=='2'){ print "selected"; }} ?> >V/E</option>
                <option value="3" <?php if($resultNB){if($resultNB[0]['mob']=='3'){ print "selected"; }} ?> >F/E</option>
                <option value="4" <?php if($resultNB){if($resultNB[0]['mob']=='4'){ print "selected"; }} ?> >Caesarean section</option>
                <option value="5" <?php if($resultNB){if($resultNB[0]['mob']=='5'){ print "selected"; }} ?> >Vaginal breach</option>
              </select>
              <label for="material-text">Mode of birth</label>
          </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-12">
        <label for="material-text">Alive</label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-alive" id="radio-alive1" value="0"  onclick="toggle_value('radio-alive', 0);" <?php if($resultNB){if($resultNB[0]['alive']=='0'){ print "checked"; }} ?> /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-alive" id="radio-alive2" value="1" onclick="toggle_value('radio-alive', 1);" <?php if($resultNB){if($resultNB[0]['alive']=='1'){ print "checked"; }}else{ print "checked"; } ?>  /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="aliveCondition1" style="display:<?php if($resultNB){if($resultNB[0]['alive']=='1'){ print "none"; }}else{ print "none"; } ?>;">
      <div class="form-group" style="padding-top: 10px;">
        <div class="col-xs-12">
          <div class="radioDiv" id="alivecon">
            <label for="material-text"  id="req-lable2">Stillbirth type <span style="color:red;">**</span></label>&nbsp;&nbsp;&nbsp;<br>
            <div class="" checked style="display:none;" >
              <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                <input type="radio" name="radio-alivecon" id="radio-alivecon0" value="0" checked /><span></span>
              </label>&nbsp;&nbsp;
            </div>
            <label class="css-input css-radio css-radio-lg css-radio-success m-r-sm">
              <input type="radio" name="radio-alivecon" id="radio-alivecon1" value="1" <?php if($resultNB){if($resultNB[0]['stillbirth']=='1'){ print "checked"; }} ?> /><span></span> Fresh
            </label>&nbsp;&nbsp;
            <label class="css-input css-radio css-radio-lg css-radio-success">
              <input type="radio" name="radio-alivecon" id="radio-alivecon2" value="2" <?php if($resultNB){if($resultNB[0]['stillbirth']=='2'){ print "checked"; }} ?> /><span></span> Macerated
            </label>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-6">
        <div class="form-group" style="padding-top: 10px;">
          <div class="col-sm-12">
              <div class="form-material">
                  <select class="form-control" name="txt-ga5" id="txt-ga5">
                    <option value="99" selected="selected">Unknown</option>
                    <option value="0" <?php if($resultNB){ if($resultNB[0]['ag5']==0){ print "selected"; }} ?>>0</option>
                    <option value="1" <?php if($resultNB){ if($resultNB[0]['ag5']==1){ print "selected"; }} ?>>1</option>
                    <option value="2" <?php if($resultNB){ if($resultNB[0]['ag5']==2){ print "selected"; }} ?>>2</option>
                    <option value="3" <?php if($resultNB){ if($resultNB[0]['ag5']==3){ print "selected"; }} ?>>3</option>
                    <option value="4" <?php if($resultNB){ if($resultNB[0]['ag5']==4){ print "selected"; }} ?>>4</option>
                    <option value="5" <?php if($resultNB){ if($resultNB[0]['ag5']==5){ print "selected"; }} ?>>5</option>
                    <option value="6" <?php if($resultNB){ if($resultNB[0]['ag5']==6){ print "selected"; }} ?>>6</option>
                    <option value="7" <?php if($resultNB){ if($resultNB[0]['ag5']==7){ print "selected"; }} ?>>7</option>
                    <option value="8" <?php if($resultNB){ if($resultNB[0]['ag5']==8){ print "selected"; }} ?>>8</option>
                    <option value="9" <?php if($resultNB){ if($resultNB[0]['ag5']==9){ print "selected"; }} ?>>9</option>
                    <option value="10" <?php if($resultNB){ if($resultNB[0]['ag5']==10){ print "selected"; }} ?>>10</option>
                  </select>
                  <label for="material-text">Apgar score 5 min</label>
              </div>
          </div>
        </div>
      </div>

      <div class="col-xs-6">
        <div class="form-group" style="padding-top: 10px;">
          <div class="col-sm-12">
              <div class="form-material">
                  <select class="form-control" name="txt-ga10" id="txt-ga10">
                    <option value="99" selected="selected">Unknown</option>
                    <option value="0" <?php if($resultNB){ if($resultNB[0]['ag10']==0){ print "selected"; }} ?>>0</option>
                    <option value="1" <?php if($resultNB){ if($resultNB[0]['ag10']==1){ print "selected"; }} ?>>1</option>
                    <option value="2" <?php if($resultNB){ if($resultNB[0]['ag10']==2){ print "selected"; }} ?>>2</option>
                    <option value="3" <?php if($resultNB){ if($resultNB[0]['ag10']==3){ print "selected"; }} ?>>3</option>
                    <option value="4" <?php if($resultNB){ if($resultNB[0]['ag10']==4){ print "selected"; }} ?>>4</option>
                    <option value="5" <?php if($resultNB){ if($resultNB[0]['ag10']==5){ print "selected"; }} ?>>5</option>
                    <option value="6" <?php if($resultNB){ if($resultNB[0]['ag10']==6){ print "selected"; }} ?>>6</option>
                    <option value="7" <?php if($resultNB){ if($resultNB[0]['ag10']==7){ print "selected"; }} ?>>7</option>
                    <option value="8" <?php if($resultNB){ if($resultNB[0]['ag10']==8){ print "selected"; }} ?>>8</option>
                    <option value="9" <?php if($resultNB){ if($resultNB[0]['ag10']==9){ print "selected"; }} ?>>9</option>
                    <option value="10" <?php if($resultNB){ if($resultNB[0]['ag10']==10){ print "selected"; }} ?>>10</option>
                  </select>
                  <label for="material-text">Apgar score 10 min</label>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-12">
        <label for="material-text">Resuscitate bag & mask</label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-resus" id="radio-resus1" value="0" checked /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-resus" id="radio-resus2" value="1" <?php if($resultNB){if($resultNB[0]['rbm']=='2'){ print "checked"; }} ?> /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-12">
          <div class="form-material">
              <input class="form-control" type="text" id="txt-bw" name="txt-bw" placeholder="Enter birth weight (g.)" value="<?php if($resultNB){ print $resultNB[0]['birth_wieght']; } ?>" />
              <label for="material-text">Birth weight <span style="color:red;">**</span></label></label>
          </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-12">
          <div class="form-material">
              <input class="form-control" type="text" id="txt-hc" name="txt-hc" placeholder="Enter head circumference (cm), If no data enter 0" value="<?php if($resultNB){ print $resultNB[0]['hc']; } ?>" />
              <label for="material-text">Head circumference (cm) </label></label>
          </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-12">
          <div class="form-material">
              <input class="form-control" type="text" id="txt-fl" name="txt-fl" placeholder="Enter fetal length (cm), If no data enter 0" value="<?php if($resultNB){ print $resultNB[0]['fetal_length']; } ?>" />
              <label for="material-text">Fetal length (cm) </label></label>
          </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-12">
        <label for="material-text">Birth defects found</label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-bdf" id="radio-bdf1" value="0" checked onclick="toggle_value('radio-bdf', 0);" /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-bdf" id="radio-bdf2" value="1" onclick="toggle_value('radio-bdf', 1);" <?php if($resultNB){if($resultNB[0]['bdf']=='1'){ print "checked"; }} ?> /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="bdfCondition1" style="display: <?php if($resultNB){if($resultNB[0]['bdf']!='1'){ print "none"; }}else{ print "none"; } ?>;">
      <div class="form-group">
        <div class="col-sm-12">
            <div class="form-material">
                <textarea name="txt-bdfindentift" id="txt-bdfindentift" class="form-control" rows="4" cols="40" placeholder="Enter identify, please see http://www.birthregister.co.za/documentation"><?php if($resultNB){ print $resultNB[0]['bdf_identify']; } ?></textarea>
                <label for="material-text">Identify </label></label>
            </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-12">
          <label for="material-text">Birth defects notified</label>&nbsp;&nbsp;&nbsp;<br>
          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
            <input type="radio" name="radio-bdn" id="radio-bdn1" value="0" checked /><span></span> No
          </label>&nbsp;&nbsp;
          <label class="css-input css-radio css-radio-lg css-radio-success">
            <input type="radio" name="radio-bdn" id="radio-bdn2" value="1" <?php if($resultNB){if($resultNB[0]['bdn']=='1'){ print "checked"; }} ?> /><span></span> Yes
          </label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-12">
        <label for="material-text">Live birth to HIV positive woman</label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-lbhiv" id="radio-lbhiv" value="0" checked /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-lbhiv" id="radio-lbhiv" value="1" <?php if($resultNB){if($resultNB[0]['pmctv_lb']=='1'){ print "checked"; }} ?> /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-12">
        <label for="material-text">Exclusive breast feeding within 1 hour</label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-ebf" id="radio-ebf1" value="0" checked /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-ebf" id="radio-ebf2" value="1" <?php if($resultNB){if($resultNB[0]['ebf']=='1'){ print "checked"; }} ?>  /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-12">
        <label for="material-text">Breast feeding </label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-bf" id="radio-bf1" value="0" checked /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-bf" id="radio-bf2" value="1" <?php if($resultNB){if($resultNB[0]['bf']=='1'){ print "checked"; }} ?> /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-12">
        <label for="material-text">Formular feeding  </label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-ff" id="radio-ff1" value="0" checked /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-ff" id="radio-ff2" value="1" <?php if($resultNB){if($resultNB[0]['ff']=='1'){ print "checked"; }} ?> /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-12">
        <label for="material-text">Skin to Skin contact  </label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-s2s" id="radio-s2s1" value="0" checked /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-s2s" id="radio-s2s2" value="1" <?php if($resultNB){if($resultNB[0]['skin2skin']=='1'){ print "checked"; }} ?> /><span></span> Yes
        </label>
      </div>
    </div>

    <h3>Infant separation</h3>

    <div class="form-group" style="padding-top: 20px;">
      <div class="col-xs-12">
        <label for="material-text">Newborn admitted </label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-na" id="radio-na1" value="0" checked /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-na" id="radio-na2" value="1" <?php if($resultNB){if($resultNB[0]['nb_adm']=='1'){ print "checked"; }} ?> /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="row" style="padding-top: 20px; margin-bottom: 0px;">
      <div class="col-sm-6">
        <div class="form-group">
          <div class="col-sm-12">
              <div class="form-material">
                <input class="js-datepicker form-control" type="text" id="txt-dateadm" name="txt-dateadm" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd"  value="<?php if($resultNB){ if($resultNB[0]['nb_date_sep']!='0000-00-00'){ print $resultNB[0]['nb_date_sep']; }}?>">
                <label for="example-datepicker4">Date of separation </label>
              </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <div class="col-sm-12">
              <div class="form-material">
                  <input class="form-control" type="time" id="txt-timeadm" name="txt-timeadm" placeholder="Please enter time of admission" value="<?php if($resultNB){ if($resultNB[0]['nb_time_sep']!='00:00:00'){ print $resultNB[0]['nb_time_sep']; }}?>"  />
                  <label for="material-text">Time of separation </label>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group" style="padding-top: 0px;">
      <div class="col-xs-12">
        <label for="material-text">Separated by early neonatal death < 7days </label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-neo7" id="radio-neo71" value="0" checked /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-neo7" id="radio-neo72" value="1" <?php if($resultNB){if($resultNB[0]['nb_neonatal']=='1'){ print "checked"; }} ?> /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="form-group" style="padding-top: 0px;">
      <div class="col-xs-12">
        <label for="material-text">Separated by late neonatal death 7 - 28 days </label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-neo28" id="radio-neo281" value="0"  checked /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-neo28" id="radio-neo282" value="1"  <?php if($resultNB){if($resultNB[0]['nb_neonatal7']=='1'){ print "checked"; }} ?> /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="form-group" style="padding-top: 0px;">
      <div class="col-xs-12">
        <label for="material-text">Separated by transfer out </label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-sep" id="radio-sep1" value="0" onclick="toggle_value('radio-sep', 0);" checked /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-sep" id="radio-sep2" value="1" onclick="toggle_value('radio-sep', 1);" <?php if($resultNB){if($resultNB[0]['nb_refer']=='1'){ print "checked"; }} ?> /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="transOption" style="display:<?php if($resultNB){if($resultNB[0]['nb_refer']!='1'){ print "none"; }}else{ print "none"; } ?>;">
      <div class="form-group" style="padding-top: 0px;">
        <div class="col-sm-12">
            <div class="form-material">
                <input class="form-control" type="text" id="txt-tranfac" name="txt-tranfac" placeholder="Enter name of transfer facility" value="<?php if($resultNB){ print $resultNB[0]['nb_refer_facility']; }?>" />
                <label for="material-text">Transfer facility &nbsp;&nbsp;&nbsp;&nbsp;
                  <button class="btn btn-xs btn-app-teal-outline" data-toggle="modal" data-target="#modal-top" type="button" onclick="fillMedalData('txt-tranfac')"><i class="ion-android-arrow-dropdown"></i> Choose</button></label>
                </label>
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
    <!-- End referCondition -->
</form>
