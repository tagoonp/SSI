<?php
session_start();
include "../database/database.class.php";
include "../dist/function/session.inc.php";
include "../dist/function/checkuser.inc.php";

// // $start_date = date('Y')."-01-01";
// $start_date = "2015-01-01";
// // $end_date = date('Y-m')."-31";
// $end_date = "2015-12-31";
//
// if(isset($_GET['startdate'])){ $start_date = $_GET['startdate']; }
// if(isset($_GET['enddate'])){ $end_date = $_GET['enddate']; }

$start_date = date('Y-m')."-01";
$end_date = date('Y-m')."-31";

if(isset($_GET['start'])){
  if($_GET['start']!=''){
    $start_date = $_GET['start'];
  }
}

if(isset($_GET['end'])){
  if($_GET['end']!=''){
    $end_date = $_GET['end'];
  }
}

$totalRob2 = 0; $totalRob4 = 0;
?>
<!DOCTYPE html>

<html class="app-ui">

    <head>
        <!-- Meta -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

        <!-- Document title -->
        <title>Welcome to SIMANH</title>

        <meta name="description" content="AppUI - Admin Dashboard Template & UI Framework" />
        <meta name="author" content="rustheme" />
        <meta name="robots" content="noindex, nofollow" />

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="../assets/img/favicons/apple-touch-icon.png" />
        <link rel="icon" href="../assets/img/favicons/favicon.ico" />

        <!-- Google fonts -->
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400" />

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="../assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css" />

        <!-- AppUI CSS stylesheets -->
        <link rel="stylesheet" id="css-font-awesome" href="../assets/css/font-awesome.css" />
        <link rel="stylesheet" id="css-ionicons" href="../assets/css/ionicons.css" />
        <link rel="stylesheet" id="css-bootstrap" href="../assets/css/bootstrap.css" />
        <link rel="stylesheet" id="css-app" href="../assets/css/app.css" />
        <link rel="stylesheet" id="css-app-custom" href="../assets/css/app-custom.css" />
        <link rel="stylesheet" type="text/css" href="../library/sweetalert/dist/sweetalert.css">
        <!-- End Stylesheets -->
    </head>

    <body class="app-ui layout-has-drawer layout-has-fixed-header">
        <div class="app-layout-canvas">
            <div class="app-layout-container">

                <!-- Drawer -->
                <aside class="app-layout-drawer">

                    <!-- Drawer scroll area -->
                    <div class="app-layout-drawer-scroll">
                        <!-- Drawer logo -->
                        <div id="logo" class="drawer-header">
                            <a href="index.html"><img class="img-responsive" src="../assets/img/logo/logo-backend.png" title="AppUI" alt="AppUI" /></a>
                        </div>

                        <!-- Drawer navigation -->
                        <?php include "componants/menu.php"; ?>
                        <!-- End drawer navigation -->

                    </div>
                    <!-- End drawer scroll area -->
                </aside>
                <!-- End drawer -->

                <!-- Header -->
                <header class="app-layout-header">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse" aria-expanded="false">
                        					<span class="sr-only">Toggle navigation</span>
                        					<span class="icon-bar"></span>
                        					<span class="icon-bar"></span>
                        					<span class="icon-bar"></span>
                        				</button> -->
                                <button class="pull-left hidden-lg hidden-md navbar-toggle" type="button" data-toggle="layout" data-action="sidebar_toggle">
                        					<span class="sr-only">Toggle drawer</span>
                        					<span class="icon-bar"></span>
                        					<span class="icon-bar"></span>
                        					<span class="icon-bar"></span>
                        				</button>
                                <span class="navbar-page-title">
                        					Robson's classification system
                        				</span>
                            </div>

                            <div class="collapse navbar-collapse" id="header-navbar-collapse">
                                <!-- Header search form -->
                                <!-- <form class="navbar-form navbar-left app-search-form" role="search">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control" type="search" id="search-input" placeholder="Patient's keyword" />
                                            <span class="input-group-btn">
                              								<button class="btn" type="button"><i class="ion-ios-search-strong"></i></button>
                              							</span>
                                        </div>
                                    </div>
                                </form> -->

                                <!-- .navbar-left -->
                                <?php include "componants/nav-left.php"; ?>
                                <!-- .navbar-right -->

                            </div>
                        </div>
                        <!-- .container-fluid -->
                    </nav>
                    <!-- .navbar-default -->
                </header>
                <!-- End header -->

                <main class="app-layout-content">

                    <!-- Page Content -->
                    <div class="container-fluid p-y-md">
                        <!-- .row -->
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="card">
                              <div class="card-header bg-teal bg-inverse">
                                  <h4><i class="fa fa-search"></i> Filter</h4>
                                  <ul class="card-actions">
                                      <li>
                                          <button type="button" data-toggle="card-action" data-action="content_toggle"></button>
                                      </li>
                                  </ul>
                              </div>
                              <div class="card-block">
                                <div class="row">
                                  <div class="col-sm-5">
                                    <div class="form-group" style="padding-top: 10px; display:none;">
                                        <div class="col-md-12">
                                            <div class="form-material">
                                                <input class="js-datepicker form-control" type="text" id="txt-institute" name="txt-institute" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php print $valueUserinfo['institute_id']; ?>">
                                                <label for="example-datepicker4">Start date <span style="color: red;">**</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-12" for="login1-username">Start</label>
                                        <div class="col-xs-12">
                                          <input class="js-datepicker form-control" readonly type="text" id="txt-startdate" name="txt-startdate" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php print $start_date;?>">
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-sm-5">
                                    <div class="form-group">
                                        <label class="col-xs-12" for="login1-username">End</label>
                                        <div class="col-xs-12">
                                          <input class="js-datepicker form-control" readonly type="text" id="txt-enddate" name="txt-enddate" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php print $end_date;?>">
                                        </div>
                                    </div>
                                  </div>

                                  <div class="col-sm-2">
                                    <div class="form-group" style="padding-top: 25px;">
                                      <button class="btn btn-app-red btn-block" type="button" id="btn-calculate1">Calculate</button>
                                    </div>
                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">



                            <div class="col-md-12">
                              <div class="card">
                                  <div class="card-header bg-teal bg-inverse">
                                      <h3>The Robson ten-group classification system</h3>
                                  </div>
                                  <div class="card-block">
                                    <div class="row">
                                      <div class="col-sm-12">
                                        <div class="table-responsive">
                                          <table class="table table-bordered table-condensed table-header-bg">
                                            <thead>
                                              <tr>
                                                <th class="col-sm-2 text-center">
                                                  Classification
                                                </th>
                                                <th class="col-sm-5">
                                                  Description
                                                </th>
                                                <th class="text-center">
                                                  No. of Cases
                                                </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td class="text-center">
                                                  1
                                                </td>
                                                <td>
                                                  Nulliparous<br>
                                                  Singleton<br>
                                                  Cephalic<br>
                                                  >= 37 week's gestation<br>
                                                  In spontaneous labor
                                                </td>
                                                <td class="text-center">
                                                  <!-- <div id="pg1" class="progress active" style="padding: 0px; margin: 0px;">
                                                      <div id="progress-bar1" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"><span id="loadLabel1">0%</span></div>
                                                  </div>
                                                  <div id="pgr1" style="display:none;"></div> -->
                                                  <div id="loading1">
                                                    <img src="../images/loading_animation.gif" alt="" width="50" />
                                                  </div>
                                                  <div id="value1" style="display:none;"></div>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  2
                                                </td>
                                                <td>
                                                  Nulliparous<br>
                                                  Singleton<br>
                                                  Cephalic<br>
                                                  >= 37 week's gestation<br>
                                                  Induced labour or cesarean section before labour
                                                </td>
                                                <td class="text-center">
                                                  <div id="loading2">
                                                    <img src="../images/loading_animation.gif" alt="" width="50" />
                                                  </div>
                                                  <div id="value2" style="display:none;"></div>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  2a
                                                </td>
                                                <td>
                                                  Nulliparous<br>
                                                  Singleton<br>
                                                  Cephalic<br>
                                                  >= 37 week's gestation<br>
                                                  Induced labour
                                                </td>
                                                <td class="text-center">
                                                  <div id="loading2a">
                                                    <img src="../images/loading_animation.gif" alt="" width="50" />
                                                  </div>
                                                  <div id="value2a" style="display:none;"></div>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  2b
                                                </td>
                                                <td>
                                                  Nulliparous<br>
                                                  Singleton<br>
                                                  Cephalic<br>
                                                  >= 37 week's gestation<br>
                                                  Cesarean section befor labour
                                                </td>
                                                <td class="text-center">
                                                  <div id="loading2b">
                                                    <img src="../images/loading_animation.gif" alt="" width="50" />
                                                  </div>
                                                  <div id="value2b" style="display:none;"></div>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  3
                                                </td>
                                                <td>
                                                  Multiparous (excluding previous cesarean section)<br>
                                                  Singleton<br>
                                                  Cephalic<br>
                                                  >= 37 week's gestation<br>
                                                  In spontaneous labor
                                                </td>
                                                <td class="text-center">
                                                  <div id="loading3">
                                                    <img src="../images/loading_animation.gif" alt="" width="50" />
                                                  </div>
                                                  <div id="value3" style="display:none;"></div>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  4
                                                </td>
                                                <td>
                                                  Multiparous (excluding previous cesarean section)<br>
                                                  Singleton<br>
                                                  Cephalic<br>
                                                  >= 37 week's gestation<br>
                                                  Induced labour or cesarean section before labour
                                                </td>
                                                <td class="text-center">
                                                  <div id="loading4">
                                                    <img src="../images/loading_animation.gif" alt="" width="50" />
                                                  </div>
                                                  <div id="value4" style="display:none;"></div>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  4a
                                                </td>
                                                <td>
                                                  Multiparous (excluding previous cesarean section)<br>
                                                  Singleton<br>
                                                  Cephalic<br>
                                                  >= 37 week's gestation<br>
                                                  Induced labour
                                                </td>
                                                <td class="text-center">
                                                  <?php //include "componants/robson/robson-class4a.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  4b
                                                </td>
                                                <td>
                                                  Multiparous (excluding previous cesarean section)<br>
                                                  Singleton<br>
                                                  Cephalic<br>
                                                  >= 37 week's gestation<br>
                                                  Cesarean section befor labour
                                                </td>
                                                <td class="text-center">
                                                  <?php //include "componants/robson/robson-class4b.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  5
                                                </td>
                                                <td>
                                                  Previous cesarean section<br>
                                                  Singleton<br>
                                                  Cephalic<br>
                                                  >= 37 week's gestation
                                                </td>
                                                <td class="text-center">
                                                  <div id="loading5">
                                                    <img src="../images/loading_animation.gif" alt="" width="50" />
                                                  </div>
                                                  <div id="value5" style="display:none;"></div>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  6
                                                </td>
                                                <td>
                                                  Nulliparous<br>
                                                  Single breech
                                                </td>
                                                <td class="text-center">
                                                  <div id="loading6">
                                                    <img src="../images/loading_animation.gif" alt="" width="50" />
                                                  </div>
                                                  <div id="value6" style="display:none;"></div>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  7
                                                </td>
                                                <td>
                                                  Multiparous<br>
                                                  Single breech
                                                </td>
                                                <td class="text-center">
                                                  <div id="loading7">
                                                    <img src="../images/loading_animation.gif" alt="" width="50" />
                                                  </div>
                                                  <div id="value7" style="display:none;"></div>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  8
                                                </td>
                                                <td>
                                                  Multiple pregnancies
                                                </td>
                                                <td class="text-center">
                                                  <div id="loading8">
                                                    <img src="../images/loading_animation.gif" alt="" width="50" />
                                                  </div>
                                                  <div id="value8" style="display:none;"></div>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  9
                                                </td>
                                                <td>
                                                  Singleton<br>
                                                  Transverse or oblique lie
                                                </td>
                                                <td class="text-center">
                                                  <div id="loading9">
                                                    <img src="../images/loading_animation.gif" alt="" width="50" />
                                                  </div>
                                                  <div id="value9" style="display:none;"></div>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  10
                                                </td>
                                                <td>
                                                  Singleton<br>
                                                  Cephalic<br>
                                                  < 37  week's gestation
                                                </td>
                                                <td class="text-center">
                                                  <div id="loading10">
                                                    <img src="../images/loading_animation.gif" alt="" width="50" />
                                                  </div>
                                                  <div id="value10" style="display:none;"></div>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                        <!-- End table-responsive -->
                                      </div>
                                      <!-- End col-sm-12 -->
                                    </div>
                                    <!-- End row -->
                                  </div>
                                  <!-- End card-block -->
                              </div>
                              <!-- .card -->
                            </div>


                        </div>
                        <!-- .row -->


                </main>

            </div>
            <!-- .app-layout-container -->
        </div>
        <!-- .app-layout-canvas -->


        <div class="app-ui-mask-modal"></div>

        <!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
        <script src="../assets/js/core/jquery.min.js"></script>
        <script src="../assets/js/core/bootstrap.min.js"></script>
        <script src="../assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="../assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="../assets/js/core/jquery.placeholder.min.js"></script>
        <script src="../assets/js/app.js"></script>
        <script src="../assets/js/app-custom.js"></script>


        <!-- Page JS Plugins -->
        <script src="../library/sweetalert/dist/sweetalert.min.js"></script>
        <script src="../assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

        <!-- Page JS Code -->
        <script src="../library/xpl/js/xpl.js"></script>
        <!-- Page JS Code -->
        <script>
            $(function()
            {
                // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
                App.initHelpers(['datepicker']);
                $('#btn-calculate1').click(function(){
                  var x = new Date($('#txt-startdate').val());
                  var y = new Date($('#txt-enddate').val());

                  if(x <= y){

                    window.location = 'Robson-classification.php?start=' + $('#txt-startdate').val() + '&end=' + $('#txt-enddate').val();
                  }else{
                    // alert('Invalid date');
                    swal('Invalid date range!');
                  }

                });

            });

            function common_redirect(){
              window.location = 'delivert-report.php?startdate=' + $('#txt-startdate').val() + '&enddate=' + $('#txt-enddate').val();
            }
        </script>
        <script type="text/javascript">
          $i = 0; $j = 0; $k = 0; $l = 0; $m = 0;
          $rob1 = 0; $rob2 = 0; $rob3 = 0; $rob4 = 0; $rob5 = 0;
          $(document).ready(function(){
            // iniInterval($i);
            loading1_case1();
            loading1_case2();
            loading1_case2a();
            loading1_case2b();
            loading1_case3();
            loading1_case4();
            loading1_case5();
            loading1_case6();
            loading1_case7();
            loading1_case8();
            loading1_case9();
            loading1_case10();

          });

          function loading1_case1(){
            var jqxhr = $.post( "componants/robson_service/robson-class1.php", { start_date : $('#txt-startdate').val(), end_date : $('#txt-enddate').val(), institute: $('#txt-institute').val()},function(result) {});
            jqxhr.always(function(result) {
              $('#loading1').hide();
              $('#value1').show();
              $('#value1').text(result);
            });
          }

          function loading1_case2(){
            var jqxhr = $.post( "componants/robson_service/robson-class2.php", { start_date : $('#txt-startdate').val(), end_date : $('#txt-enddate').val(), institute: $('#txt-institute').val()},function(result) {});
            jqxhr.always(function(result) {
              $('#loading2').hide();
              $('#value2').show();
              $('#value2').text(result);
            });
          }

          function loading1_case2a(){
            var jqxhr = $.post( "componants/robson_service/robson-class2a.php", { start_date : $('#txt-startdate').val(), end_date : $('#txt-enddate').val(), institute: $('#txt-institute').val()},function(result) {});
            jqxhr.always(function(result) {
              $('#loading2a').hide();
              $('#value2a').show();
              $('#value2a').text(result);
            });
          }

          function loading1_case2b(){
            var jqxhr = $.post( "componants/robson_service/robson-class2b.php", { start_date : $('#txt-startdate').val(), end_date : $('#txt-enddate').val(), institute: $('#txt-institute').val()},function(result) {});
            jqxhr.always(function(result) {
              $('#loading2b').hide();
              $('#value2b').show();
              $('#value2b').text(result);
            });
          }

          function loading1_case3(){
            var jqxhr = $.post( "componants/robson_service/robson-class3.php", { start_date : $('#txt-startdate').val(), end_date : $('#txt-enddate').val(), institute: $('#txt-institute').val()},function(result) {});
            jqxhr.always(function(result) {
              $('#loading3').hide();
              $('#value3').show();
              $('#value3').text(result);
            });
          }

          function loading1_case4(){
            var jqxhr = $.post( "componants/robson_service/robson-class4.php", { start_date : $('#txt-startdate').val(), end_date : $('#txt-enddate').val(), institute: $('#txt-institute').val()},function(result) {});
            jqxhr.always(function(result) {
              $('#loading4').hide();
              $('#value4').show();
              $('#value4').text(result);
            });
          }

          function loading1_case5(){
            var jqxhr = $.post( "componants/robson_service/robson-class5.php", { start_date : $('#txt-startdate').val(), end_date : $('#txt-enddate').val(), institute: $('#txt-institute').val()},function(result) {});
            jqxhr.always(function(result) {
              $('#loading5').hide();
              $('#value5').show();
              $('#value5').text(result);
            });
          }

          function loading1_case6(){
            var jqxhr = $.post( "componants/robson_service/robson-class6.php", { start_date : $('#txt-startdate').val(), end_date : $('#txt-enddate').val(), institute: $('#txt-institute').val()},function(result) {});
            jqxhr.always(function(result) {
              $('#loading6').hide();
              $('#value6').show();
              $('#value6').text(result);
            });
          }

          function loading1_case7(){
            var jqxhr = $.post( "componants/robson_service/robson-class7.php", { start_date : $('#txt-startdate').val(), end_date : $('#txt-enddate').val(), institute: $('#txt-institute').val()},function(result) {});
            jqxhr.always(function(result) {
              $('#loading7').hide();
              $('#value7').show();
              $('#value7').text(result);
            });
          }

          function loading1_case8(){
            var jqxhr = $.post( "componants/robson_service/robson-class8.php", { start_date : $('#txt-startdate').val(), end_date : $('#txt-enddate').val(), institute: $('#txt-institute').val()},function(result) {});
            jqxhr.always(function(result) {
              $('#loading8').hide();
              $('#value8').show();
              $('#value8').text(result);
            });
          }

          function loading1_case9(){
            var jqxhr = $.post( "componants/robson_service/robson-class9.php", { start_date : $('#txt-startdate').val(), end_date : $('#txt-enddate').val(), institute: $('#txt-institute').val()},function(result) {});
            jqxhr.always(function(result) {
              $('#loading9').hide();
              $('#value9').show();
              $('#value9').text(result);
            });
          }

          function loading1_case10(){
            var jqxhr = $.post( "componants/robson_service/robson-class10.php", { start_date : $('#txt-startdate').val(), end_date : $('#txt-enddate').val(), institute: $('#txt-institute').val()},function(result) {});
            jqxhr.always(function(result) {
              $('#loading10').hide();
              $('#value10').show();
              $('#value10').text(result);
            });
          }


        </script>
        <script type="text/javascript">
          var LoadData = function(){
            var init = function(){
              LoadData.loadBar(1,$i);
            }();

            var loadBar = function(){

            }

          }

          jQuery( function() {
            // LoadData.init();
          });
        </script>

    </body>

</html>
