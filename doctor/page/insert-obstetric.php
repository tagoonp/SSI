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
        <form class="form-horizontal m-t-sm"  method="post" action="controller/insert-obstetric.php">
          <div class="col-xs-12">
            <!-- Add card -->
            <div class="card">
              <div class="card-header bg-teal bg-inverse">
                  <h4>Obstetric information</h4>
              </div>
              <div class="card-block" style="padding-top: 30px;">

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="col-sm-12">
                          <div class="form-material">
                              <select class="form-control" name="txtGravd" id="txtGravd">
                                <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                  <option value="13">13</option>
                                  <option value="14">14</option>
                                  <option value="15">15</option>
                              </select>

                              <label for="material-text">Gravidity</label>
                          </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <div class="col-sm-12">
                          <div class="form-material">
                              <select class="form-control" name="txtParity" id="txtParity">
                                <option value="0">0</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                  <option value="11">11</option>
                                  <option value="12">12</option>
                                  <option value="13">13</option>
                                  <option value="14">14</option>
                                  <option value="15">15</option>
                              </select>

                              <label for="material-text">Parity</label>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                    <div class="form-material">
                        <input class="form-control" type="text" id="txt-ancplace" name="txt-ancplace" placeholder="Facility's name / Private / Unknown" />

                        <label for="material-text" >Antenatal care attendance&nbsp;&nbsp;&nbsp;&nbsp;
                          <button class="btn btn-xs btn-app-teal-outline" data-toggle="modal" data-target="#modal-top" type="button" onclick="fillMedalData('txt-ancplace')"><i class="ion-android-arrow-dropdown"></i> Choose</button>
                          <button class="btn btn-xs btn-app-teal-outline" type="button" id="btnUn1" onclick="autofill_unknown('txt-ancplace')"><i class="ion-android-arrow-dropdown"></i> Unknown</button>
                        </label></label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                      <div class="form-material">
                          <input class="form-control" type="text" id="txt-ga1st" name="txt-ga1st" placeholder="Enter GA at 1st ANC or Unknown" />
                          <label for="material-text">Gestational age at 1st ANC&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-xs btn-app-teal-outline" type="button" id="btnUn2" onclick="autofill_unknown('txt-ga1st')"><i class="ion-android-arrow-dropdown"></i> Unknown</button></label></label>
                      </div>
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="material-text">Antenatal booking before 20 weeks gestation</label>&nbsp;&nbsp;&nbsp;<br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-alter20w" id="radio-alter20w1" checked value="0" /><span></span> No
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-alter20w" id="radio-alter20w2" value="1" /><span></span> Yes
                          </label>
                      </div>
                </div>

                <div class="form-group" style="padding-top: 15px;">
                  <div class="col-sm-12">
                      <div class="form-material">
                          <input class="form-control" type="text" id="txt-noanc" name="txt-noanc" placeholder="Enter nomber of ANC or Unknown" />
                          <label for="material-text">Number of antenatal visits&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-xs btn-app-teal-outline" type="button" onclick="autofill_unknown('txt-noanc')"><i class="ion-android-arrow-dropdown"></i> Unknown</button></label></label>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="material-text">Rh</label>&nbsp;&nbsp;&nbsp;<br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-rh" id="radio-rh1" value="Unknown" checked onclick="toggle_value('txtRh','Unknown')" /><span></span> Unknown
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-rh" id="radio-rh2" value="Neg" onclick="toggle_value('txtRh','Neg')" /><span></span> Negative
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-rh" id="radio-rh3" value="Pos" onclick="toggle_value('txtRh','Pos')"  /><span></span> Positive
                          </label>
                      </div>
                </div>

                <div class="rhCondition" style="display:none;">
                  <div class="form-group">
                    <div class="col-xs-12">
                      <label for="material-text">Anti D Immunoglobulin to mother if Rh neg</label>&nbsp;&nbsp;&nbsp;<br>
                            <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                              <input type="radio" name="radio-antid" id="radio-antid1" checked value="0" /><span></span> No
                            </label>&nbsp;&nbsp;
                            <label class="css-input css-radio css-radio-lg css-radio-success">
                              <input type="radio" name="radio-antid" id="radio-antid2" value="1" /><span></span> Yes
                            </label>
                        </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="material-text">RPR</label>&nbsp;&nbsp;&nbsp;<br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-rpr" id="radio-rpr1" checked value="0" /><span></span> Not done
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-rpr" id="radio-rpr2" value="1" /><span></span> Done but no result
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-rpr" id="radio-rpr3" value="2" /><span></span> Result -
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-rpr" id="radio-rpr4" value="3" /><span></span> Result +
                          </label>
                      </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="material-text">RPR treated</label>&nbsp;&nbsp;&nbsp;<br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-rprt" id="radio-rprt1" checked value="99" /><span></span> Not applicable
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-rprt" id="radio-rprt2" value="0" /><span></span> No
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-rprt" id="radio-rprt3" value="1" /><span></span> Yes
                          </label>
                      </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="material-text">HIV status (at registration)</label>&nbsp;&nbsp;&nbsp;<br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-hiv" id="radio-hiv1" value="Unknown" checked onclick="toggle_value('txtHivreg','Unknown')" /><span></span> Unknown
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-hiv" id="radio-hiv2" value="Neg" onclick="toggle_value('txtHivreg','Neg')"/><span></span> Negative
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-hiv" id="radio-hiv3" value="Pos" onclick="toggle_value('txtHivreg','Pos')"/><span></span> Positive
                          </label>
                      </div>
                </div>

                <div class="hivCondition1" style="display:;">
                  <div class="form-group">
                    <div class="col-xs-12">
                      <label for="material-text">HIV 1st test</label>&nbsp;&nbsp;&nbsp;<br>
                            <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                              <input type="radio" name="radio-hiv1test" id="radio-hiv1test1" value="0" checked onclick="toggle_value('txtHiv1st',0)" /><span></span> Not done
                            </label>&nbsp;&nbsp;
                            <label class="css-input css-radio css-radio-lg css-radio-success">
                              <input type="radio" name="radio-hiv1test" id="radio-hiv1test2" value="1" onclick="toggle_value('txtHiv1st',1)" /><span></span> Done but no result
                            </label>&nbsp;&nbsp;
                            <label class="css-input css-radio css-radio-lg css-radio-success">
                              <input type="radio" name="radio-hiv1test" id="radio-hiv1test3" value="2" onclick="toggle_value('txtHiv1st',2)" /><span></span> Result -
                            </label>&nbsp;&nbsp;
                            <label class="css-input css-radio css-radio-lg css-radio-success">
                              <input type="radio" name="radio-hiv1test" id="radio-hiv1test4" value="3" onclick="toggle_value('txtHiv1st',3)" /><span></span> Result +
                            </label>
                        </div>
                  </div>
                </div>

                <div class="hivCondition2" style="display:none;">
                  <div class="form-group">
                    <div class="col-xs-12">
                      <label for="material-text">HIV retest after 12 weeks</label>&nbsp;&nbsp;&nbsp;<br>
                            <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                              <input type="radio" name="radio-hiv12test" id="radio-hiv12test1" value="0" checked onclick="toggle_value('txtHivre',0)" /><span></span> Not done
                            </label>&nbsp;&nbsp;
                            <label class="css-input css-radio css-radio-lg css-radio-success">
                              <input type="radio" name="radio-hiv12test" id="radio-hiv12test2" value="1" onclick="toggle_value('txtHivre',1)" /><span></span> Done but no result
                            </label>&nbsp;&nbsp;
                            <label class="css-input css-radio css-radio-lg css-radio-success">
                              <input type="radio" name="radio-hiv12test" id="radio-hiv12test3" value="2" onclick="toggle_value('txtHivre',2)" /><span></span> Result -
                            </label>&nbsp;&nbsp;
                            <label class="css-input css-radio css-radio-lg css-radio-success">
                              <input type="radio" name="radio-hiv12test" id="radio-hiv12test4" value="3" onclick="toggle_value('txtHivre',3)" /><span></span> Result +
                            </label>
                        </div>
                  </div>
                </div>

                <div class="hivCondition3" style="display:none;">
                  <div class="form-group">
                    <div class="col-xs-12">
                      <label for="material-text">On ART at delivery </label>&nbsp;&nbsp;&nbsp;<br>
                            <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                              <input type="radio" name="radio-onart" id="radio-onart1" value="No" checked /><span></span> No
                            </label>&nbsp;&nbsp;
                            <label class="css-input css-radio css-radio-lg css-radio-success">
                              <input type="radio" name="radio-onart" id="radio-onart2" value="Dual" /><span></span> Dual
                            </label>&nbsp;&nbsp;
                            <label class="css-input css-radio css-radio-lg css-radio-success">
                              <input type="radio" name="radio-onart" id="radio-onart3" value="Triple" /><span></span> Triple
                            </label>&nbsp;&nbsp;
                            <label class="css-input css-radio css-radio-lg css-radio-success">
                              <input type="radio" name="radio-onart" id="radio-onart4" value="Unknown" /><span></span> Unknown
                            </label>
                        </div>
                  </div>
                </div>

                <div class="hivCondition1-1" style="display:none;">
                  <div class="form-group">
                    <div class="col-xs-12">
                      <label for="material-text">CD4 labour/postpartum</label>&nbsp;&nbsp;&nbsp;<br>
                            <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                              <input type="radio" name="radio-cd4" id="radio-cd41" value="0" onclick="toggle_value('txtCd4lb', 0);" checked /><span></span> No
                            </label>&nbsp;&nbsp;
                            <label class="css-input css-radio css-radio-lg css-radio-success">
                              <input type="radio" name="radio-cd4" id="radio-cd42" value="1" onclick="toggle_value('txtCd4lb', 1);" /><span></span> Yes
                            </label>
                        </div>
                  </div>

                  <div class="hivCondition1-1-1" style="display:none;">
                    <div class="form-group" style="padding-top: 15px;">
                      <div class="col-sm-12">
                          <div class="form-material">
                              <input class="form-control" type="text" id="txt-cd4count" name="txt-cd4count" placeholder="Enter number 10 - 9999 or Unknown or Not applicable" />
                              <label for="material-text">CD4 count&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-xs btn-app-teal-outline" type="button" onclick="autofill_unknown('txt-cd4count')"><i class="ion-android-arrow-dropdown"></i> Unknown</button> <button class="btn btn-xs btn-app-teal-outline" type="button" onclick="autofill_na('txt-cd4count')"><i class="ion-android-arrow-dropdown"></i> Not applicable</button></label>
                          </div>
                      </div>
                    </div>
                  </div>

                  <div class="hivCondition1-2">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label for="material-text">Initiate ART at delivery </label>&nbsp;&nbsp;&nbsp;<br>
                        <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                          <input type="radio" name="radio-artdel" id="radio-artdel1" value="0" checked /><span></span> No
                        </label>&nbsp;&nbsp;
                        <label class="css-input css-radio css-radio-lg css-radio-success">
                          <input type="radio" name="radio-artdel" id="radio-artdel2" value="1" /><span></span> Yes
                        </label>
                      </div>
                    </div>
                  </div>

                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <label for="material-text">Birth before arrival (BBA)</label>&nbsp;&nbsp;&nbsp;<br>
                          <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                            <input type="radio" name="radio-bba" id="radio-bba1" checked /><span></span> No
                          </label>&nbsp;&nbsp;
                          <label class="css-input css-radio css-radio-lg css-radio-success">
                            <input type="radio" name="radio-bba" id="radio-bba2" /><span></span> Yes
                          </label>
                      </div>
                </div>

                <div class="form-group" style="padding-top: 15px;">
                  <div class="col-sm-12">
                      <div class="form-material">
                          <input class="form-control" type="text" id="txt-gaadm" name="txt-gaadm" placeholder="Enter GA at admission or Unknown" />
                          <label for="material-text">Gestational age at admission&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-xs btn-app-teal-outline" type="button" onclick="autofill_unknown('txt-gaadm')"><i class="ion-android-arrow-dropdown"></i> Unknown</button></label></label>
                      </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                      <div class="form-material">
                        <select class="form-control" id="txtLbstage" name="txtLbstage">
                          <option value="0" selected="selected">No labor</option>
                            <optgroup label="1st stage, which phase">
                              <option value="1">Latent phase</option>
                              <option value="2">Active phase 3 - 4 cm</option>
                              </optgroup>
                            <option value="3">2nd stage of labor</option>
                            <option value="4">Head out periniun</option>
                            <option value="5">3rd stage of labor</option>
                        </select>
                          <label for="material-text">Stage of labor at admission</label>
                      </div>
                  </div>
                </div>

                <div class="stageinfo" style="display:none;">
                  <div class="row" style="padding-top: 10px;">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="col-sm-12">
                            <div class="form-material">
                              <input class="js-datepicker form-control" type="text" id="txt-Datelbs" name="txt-Datelbs" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="">
                              <label for="example-datepicker4">Date of labor start </label>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="col-sm-12">
                            <div class="form-material">
                                <input class="form-control" type="time" id="txt-Timelbs" name="txt-Timelbs" placeholder="Please enter time of admission" value="" />
                                <label for="material-text">Time of labor start </label>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row" style="padding-top: 10px;">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="col-sm-12">
                            <div class="form-material">
                              <input class="js-datepicker form-control" type="text" id="txt-Daterm" name="txt-Daterm" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="">
                              <label for="example-datepicker4">Date of ruptured membranes</label>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="col-sm-12">
                            <div class="form-material">
                                <input class="form-control" type="time" id="txt-Timerm" name="txt-Timerm" placeholder="Please enter time of admission" value="" />
                                <label for="material-text">Time of ruptured membranes</label>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row" style="padding-top: 10px;">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="col-sm-12">
                            <div class="form-material">
                              <input class="js-datepicker form-control" type="text" id="txt-Date34" name="txt-Date34" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="">
                              <label for="example-datepicker4">Date at 3-4 cm</label>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="col-sm-12">
                            <div class="form-material">
                                <input class="form-control" type="time" id="txt-Time34" name="txt-Time34" placeholder="Please enter time of admission" value="" />
                                <label for="material-text">Time at 3-4 cm</label>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row" style="padding-top: 10px;">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="col-sm-12">
                            <div class="form-material">
                              <input class="js-datepicker form-control" type="text" id="txt-Datefd" name="txt-Datefd" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="">
                              <label for="example-datepicker4">Date at fully dilated</label>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="col-sm-12">
                            <div class="form-material">
                                <input class="form-control" type="time" id="txt-Timefd" name="txt-Timefd" placeholder="Please enter time of admission" value="" />
                                <label for="material-text">Time at fully dilated</label>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>


                <div class="form-group">
                  <div class="col-sm-12">
                      <div class="form-material">
                          <input class="form-control" type="text" id="txt-durr" name="txt-durr" placeholder="Enter in Hour:Minute format or Unknown" />
                          <label for="material-text">Duration of active phase of labour&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-xs btn-app-teal-outline" type="button" onclick="autofill_unknown('txt-durr')"><i class="ion-android-arrow-dropdown"></i> Unknown</button></label>
                      </div>
                      <p style="padding-top: 5px; font-size: 0.8em;">
                        <span><strong>Example 1 :</strong> If duration is 36 minutes, please enter -> 36</span><br>
                        <span><strong>Example 2 :</strong> If duration is 1 hour and 36 minutes, please enter -> 1:36</span>
                      </p>
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
