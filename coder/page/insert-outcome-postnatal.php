<form class="js-validation-newborn form-horizontal m-t-sm"  id="form1" method="post" action="controller/insert-outcome-postnatal.php" >

    <h3 style="font-weight: 400; color: teal;">Information of infant with HIV mother</h3>

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
        <label for="material-text" id="req-lable1">Live birth to HIV positive woman </label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-lbHiv" id="radio-lbHiv1" value="0" onclick="toggle_value('radio-lbHiv', 0);" checked /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-lbHiv" id="radio-lbHiv2" value="1" onclick="toggle_value('radio-lbHiv', 1);" <?php if($resultNB){if($resultNB[0]['lbHiv']=='1') { print "checked"; }}else{ print "checked"; } ?>  /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="hivCondition" style="display:<?php if($resultNB){ if($resultNB[0]['lbHiv']!='1'){ print "none"; } }else{ print "none"; }?>;">
      <div class="form-group" style="padding-top: 0px;">
        <div class="col-xs-12">
          <label for="material-text" id="req-lable1">PMTCT Visit (Nevirapine to mother and baby) </label>&nbsp;&nbsp;&nbsp;<br>
          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
            <input type="radio" name="radio-pmtct" id="radio-pmtct1" value="0" checked /><span></span> No
          </label>&nbsp;&nbsp;
          <label class="css-input css-radio css-radio-lg css-radio-success">
            <input type="radio" name="radio-pmtct" id="radio-pmtct2" value="1" <?php if($resultNB){if($resultNB[0]['pmtct_visit']=='1') { print "checked"; }}?>  /><span></span> Yes
          </label>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-12">
          <label for="material-text">Baby initiated on AZT within 72 hours after birth</label>&nbsp;&nbsp;&nbsp;<br>
          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
            <input type="radio" name="radio-azt" id="radio-azt1" value="0" checked /><span></span> No
          </label>&nbsp;&nbsp;
          <label class="css-input css-radio css-radio-lg css-radio-success">
            <input type="radio" name="radio-azt" id="radio-azt2" value="1" <?php if($resultNB){if($resultNB[0]['initiated_azt']=='1') { print "checked"; }}?>  /><span></span> Yes
          </label>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-12">
          <label for="material-text">Baby given Nevirapine</label>&nbsp;&nbsp;&nbsp;<br>
          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
            <input type="radio" name="radio-nevirapine" id="radio-nevirapine1" value="0" checked /><span></span> No
          </label>&nbsp;&nbsp;
          <label class="css-input css-radio css-radio-lg css-radio-success">
            <input type="radio" name="radio-nevirapine" id="radio-nevirapine2" value="1" <?php if($resultNB){if($resultNB[0]['given_nevirapine']=='1') { print "checked"; }}?>  /><span></span> Yes
          </label>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-12">
          <label for="material-text">Baby given Nevirapine within 72 hours after birth</label>&nbsp;&nbsp;&nbsp;<br>
          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
            <input type="radio" name="radio-nevirapine72" id="radio-nevirapine721" value="0" checked /><span></span> No
          </label>&nbsp;&nbsp;
          <label class="css-input css-radio css-radio-lg css-radio-success">
            <input type="radio" name="radio-nevirapine72" id="radio-nevirapine722" value="1" <?php if($resultNB){if($resultNB[0]['given_nevirapine72']=='1') { print "checked"; }}?>  /><span></span> Yes
          </label>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-12">
          <label for="material-text">Nevirapine 6 weeks dose given to baby on dicharge </label>&nbsp;&nbsp;&nbsp;<br>
          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
            <input type="radio" name="radio-nevirapine6" id="radio-nevirapine61" value="0" checked /><span></span> No
          </label>&nbsp;&nbsp;
          <label class="css-input css-radio css-radio-lg css-radio-success">
            <input type="radio" name="radio-nevirapine6" id="radio-nevirapine62" value="1" <?php if($resultNB){if($resultNB[0]['nevirapine6']=='1') { print "checked"; }}?> /><span></span> Yes
          </label>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-12">
          <label for="material-text">Infant PCR test at birth</label>&nbsp;&nbsp;&nbsp;<br>
          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
            <input type="radio" name="radio-inftest" id="radio-inftest1" value="99" checked /><span></span> Not Applicable
          </label>&nbsp;&nbsp;
          <label class="css-input css-radio css-radio-lg css-radio-success">
            <input type="radio" name="radio-inftest" id="radio-inftest2" value="0" <?php if($resultNB){if($resultNB[0]['inftest']=='0') { print "checked"; }}?> /><span></span> No
          </label>
          <label class="css-input css-radio css-radio-lg css-radio-success">
            <input type="radio" name="radio-inftest" id="radio-inftest3" value="1" <?php if($resultNB){if($resultNB[0]['inftest']=='1') { print "checked"; }}?> /><span></span> Yes
          </label>
        </div>
      </div>

      <div class="form-group">
        <div class="col-xs-12">
          <label for="material-text">Infant PCR test result at birth</label>&nbsp;&nbsp;&nbsp;<br>
          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
            <input type="radio" name="radio-inftest-result" id="radio-inftest_result1" value="Unknown" checked /><span></span> Unknown
          </label>&nbsp;&nbsp;
          <label class="css-input css-radio css-radio-lg css-radio-success">
            <input type="radio" name="radio-inftest-result" id="radio-inftest_result2" value="Neg" <?php if($resultNB){if($resultNB[0]['inftest_result']=='Neg') { print "checked"; }}?> /><span></span> Neg
          </label>
          <label class="css-input css-radio css-radio-lg css-radio-success">
            <input type="radio" name="radio-inftest-result" id="radio-inftest_result3" value="Pos" <?php if($resultNB){if($resultNB[0]['inftest_result']=='Pos') { print "checked"; }}?> /><span></span> Pos
          </label>
        </div>
      </div>
    </div>



    <h3 style="font-weight: 400; color: teal;">Newborn management</h3>

    <div class="form-group">
      <div class="col-xs-12">
        <label for="material-text">Infant feeding method</label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-ifm" id="radio-ifm1" value="0" checked  /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-ifm" id="radio-ifm2" value="1" <?php if($resultNB){if($resultNB[0]['ifm']=='1') { print "checked"; }}?> /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-12">
        <label for="material-text">Vitamin K to infant</label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-vitk" id="radio-vitk1" value="0" checked /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-vitk" id="radio-vitk2" value="1" <?php if($resultNB){if($resultNB[0]['vitk']=='1') { print "checked"; }}?> /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-12">
        <label for="material-text">Polio dose </label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-polio" id="radio-polio1" value="0" checked /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-polio" id="radio-polio2" value="1" <?php if($resultNB){if($resultNB[0]['polio']=='1') { print "checked"; }}?> /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="form-group">
      <div class="col-xs-12">
        <label for="material-text">BCG dose  </label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-bcg" id="radio-bcg1" value="0" checked /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-bcg" id="radio-bcg2" value="1" <?php if($resultNB){if($resultNB[0]['bcg']=='1') { print "checked"; }}?> /><span></span> Yes
        </label>
      </div>
    </div>

    <h3 style="font-weight: 400; color: teal;">Infant separation</h3>

    <div class="form-group" style="padding-top: 20px;">
      <div class="col-xs-12">
        <label for="material-text">Newborn admitted </label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-admitted" id="radio-admitted1" value="0" checked /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-admitted" id="radio-admitted2" value="1" <?php if($resultNB){if($resultNB[0]['admitted']=='1') { print "checked"; }}?> /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="row" style="padding-top: 20px; margin-bottom: 0px;">
      <div class="col-sm-6">
        <div class="form-group">
          <div class="col-sm-12">
              <div class="form-material">
                <input class="js-datepicker form-control" type="text" id="txt-dateadm" name="txt-dateadm" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd"  value="<?php if($resultNB){ if($resultNB[0]['seperate_date']!='0000-00-00'){ print $resultNB[0]['seperate_date']; }  } ?>">
                <label for="example-datepicker4">Date of separation </label>
              </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <div class="col-sm-12">
              <div class="form-material">
                  <input class="form-control" type="time" id="txt-timeadm" name="txt-timeadm" placeholder="Please enter time of admission" value="<?php if($resultNB){ if($resultNB[0]['seperate_time']!='00:00:00'){ print $resultNB[0]['seperate_time']; } } ?>"  />
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
          <input type="radio" name="radio-earlyneo" id="radio-earlyneo1" value="0" checked /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-earlyneo" id="radio-earlyneo2" value="1" <?php if($resultNB){if($resultNB[0]['earlyneo']=='1') { print "checked"; }}?> /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="form-group" style="padding-top: 0px;">
      <div class="col-xs-12">
        <label for="material-text">Separated by late neonatal death 7 - 28 days </label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-lateneo" id="radio-lateneo1" value="0"  checked /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-lateneo" id="radio-lateneo2" value="1" <?php if($resultNB){if($resultNB[0]['lateneo']=='1') { print "checked"; }}?> /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="form-group" style="padding-top: 0px;">
      <div class="col-xs-12">
        <label for="material-text">Separated by transfer out </label>&nbsp;&nbsp;&nbsp;<br>
        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
          <input type="radio" name="radio-refer" id="radio-refer1" value="0" onclick="toggle_value('radio-refer', 0);" checked /><span></span> No
        </label>&nbsp;&nbsp;
        <label class="css-input css-radio css-radio-lg css-radio-success">
          <input type="radio" name="radio-refer" id="radio-refer2" value="1" onclick="toggle_value('radio-refer', 1);" <?php if($resultNB){if($resultNB[0]['refer']=='1') { print "checked"; }}?> /><span></span> Yes
        </label>
      </div>
    </div>

    <div class="transOption" style="display: <?php if($resultNB){ if(($resultNB[0]['refer']=='0') || ($resultNB[0]['refer']==null)){ print "none"; }  }else{ print "none"; }?>;">
      <div class="form-group" style="padding-top: 0px;">
        <div class="col-sm-12">
            <div class="form-material">
              <?php //print $resultNB[0]['brefer']; ?>
                <input class="form-control" type="text" id="txt-refer_to_facility" name="txt-refer_to_facility" placeholder="Enter name of transfer facility" value="<?php if($resultNB){ print $resultNB[0]['refer_to_facility']; } ?>" />
                <label for="material-text">Transfer facility &nbsp;&nbsp;&nbsp;&nbsp;
                  <button class="btn btn-xs btn-app-teal-outline" data-toggle="modal" data-target="#modal-top" type="button" onclick="fillMedalData('txt-refer_to_facility')"><i class="ion-android-arrow-dropdown"></i> Choose</button></label>
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
