<?php
session_start();
include "../database/database.class.php";
include "../dist/function/session.inc.php";
include "../dist/function/checkuser.inc.php";

// $start_date = date('Y')."-01-01";
$start_date = "2015-01-01";
// $end_date = date('Y-m')."-31";
$end_date = "2015-12-31";

if(isset($_GET['startdate'])){ $start_date = $_GET['startdate']; }
if(isset($_GET['enddate'])){ $end_date = $_GET['enddate']; }

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
                        					Dashboard
                        				</span>
                            </div>

                            <div class="collapse navbar-collapse" id="header-navbar-collapse">
                                <!-- Header search form -->
                                <form class="navbar-form navbar-left app-search-form" role="search">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input class="form-control" type="search" id="search-input" placeholder="Patient's keyword" />
                                            <span class="input-group-btn">
                              								<button class="btn" type="button"><i class="ion-ios-search-strong"></i></button>
                              							</span>
                                        </div>
                                    </div>
                                </form>

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

                            <div class="col-md-4">
                                <!-- Filter -->
                                <div class="card">
                                    <div class="card-header bg-red bg-inverse">
                                        <h3>Filter</h3>
                                    </div>
                                    <div class="card-block">
                                      <form class="form-horizontal m-t-sm" action="base_forms_pickers_select.html" method="post" onsubmit="return false;">
                                        <div class="form-group" style="padding-top: 10px;">
                                            <div class="col-md-12">
                                                <div class="form-material">
                                                    <input class="js-datepicker form-control" type="text" id="txt-institute" name="txt-institute" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php print $valueUserinfo['institute_id']; ?>">
                                                    <label for="example-datepicker4">Start date <span style="color: red;">**</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="padding-top: 10px;">
                                            <div class="col-md-12">
                                                <div class="form-material">
                                                    <input class="js-datepicker form-control" type="text" id="txt-startdate" name="txt-startdate" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php print $start_date; ?>">
                                                    <label for="example-datepicker4">Start date <span style="color: red;">**</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group"  style="padding-top: 10px;">
                                            <div class="col-md-12">
                                                <div class="form-material">
                                                    <input class="js-datepicker form-control" type="text" id="txt-enddate" name="txt-enddate" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php print $end_date; ?>">
                                                    <label for="example-datepicker5">End date <span style="color: red;">**</span></label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group m-b-0">
                                            <div class="col-md-12 text-right">
                                                <button type="reset" class="btn btn-app-light" name="button">Reset</button>
                                                <button class="btn btn-app" type="button" onclick="common_redirect()">Submit</button>
                                            </div>
                                        </div>


                                        </form>
                                    </div>
                                </div>
                                <!-- End filter -->
                            </div>
                            <!-- .col-lg-4 -->

                            <div class="col-md-8">
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
                                                <th class="col-sm-6 text-center">
                                                  Classification
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
                                                <td class="text-center">
                                                  <div id="pg1" class="progress active" style="padding: 0px; margin: 0px;">
                                                      <div id="progress-bar1" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"><span id="loadLabel1">0%</span></div>
                                                  </div>
                                                  <div id="pgr1" style="display:none;"></div>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  2
                                                </td>
                                                <td class="text-center">
                                                  <div id="pg2" class="progress active" style="padding: 0px; margin: 0px;">
                                                      <div id="progress-bar2" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"><span id="loadLabel2">0%</span></div>
                                                  </div>
                                                  <div id="pgr2" style="display:none;"></div>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  2a
                                                </td>
                                                <td class="text-center">
                                                  <?php //include "componants/robson/robson-class2a.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  2b
                                                </td>
                                                <td class="text-center">
                                                  <?php //include "componants/robson/robson-class2b.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  3
                                                </td>
                                                <td class="text-center">
                                                  <div id="pg3" class="progress active" style="padding: 0px; margin: 0px;">
                                                      <div id="progress-bar3" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"><span id="loadLabel3">0%</span></div>
                                                  </div>
                                                  <div id="pgr3" style="display:none;"></div>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  4
                                                </td>
                                                <td class="text-center">
                                                  <div id="pg4" class="progress active" style="padding: 0px; margin: 0px;">
                                                      <div id="progress-bar4" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"><span id="loadLabel4">0%</span></div>
                                                  </div>
                                                  <div id="pgr4" style="display:none;"></div>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  4a
                                                </td>
                                                <td class="text-center">
                                                  <?php //include "componants/robson/robson-class4a.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  4b
                                                </td>
                                                <td class="text-center">
                                                  <?php //include "componants/robson/robson-class4b.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  5
                                                </td>
                                                <td class="text-center">
                                                  <div id="pg5" class="progress active" style="padding: 0px; margin: 0px;">
                                                      <div id="progress-bar5" class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"><span id="loadLabel5">0%</span></div>
                                                  </div>
                                                  <div id="pgr5" style="display:none;"></div>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  6
                                                </td>
                                                <td class="text-center">
                                                  <?php //include "componants/robson/robson-class6.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  7
                                                </td>
                                                <td class="text-center">
                                                  <?php //include "componants/robson/robson-class7.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  8
                                                </td>
                                                <td class="text-center">
                                                  <?php //include "componants/robson/robson-class8.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  9
                                                </td>
                                                <td class="text-center">
                                                  <?php //include "componants/robson/robson-class9.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  10
                                                </td>
                                                <td class="text-center">
                                                  <?php //include "componants/robson/robson-class10.php"; ?>
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
        <script src="../assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

        <!-- Page JS Code -->
        <script src="../library/xpl/js/xpl.js"></script>
        <!-- Page JS Code -->
        <script>
            $(function()
            {
                // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
                App.initHelpers(['datepicker']);
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
            loadBar1($i);
            setTimeout(function(){
              loadBar2($j);
            }, 300);

            setTimeout(function(){
              loadBar3($k);
            }, 600);

            setTimeout(function(){
              loadBar4($l);
            }, 900);

            setTimeout(function(){
              loadBar5($m);
            }, 200);

            loadGroup1();
            loadGroup2();
            loadGroup3();
            loadGroup4();
            loadGroup5();

          });

          function loadBar1(i){
            $('#progress-bar1').css('width', i+'%').attr('aria-valuenow', i);
            $('#loadLabel1').text(((i)-1 )+ '%');
            $i++;
            iniInterval1($i);
          }

          function loadBar2(j){
            $('#progress-bar2').css('width', j+'%').attr('aria-valuenow', j);
            $('#loadLabel2').text(((j)-1 )+ '%');
            $j++;
            iniInterval2($j);
          }

          function loadBar3(k){
            $('#progress-bar3').css('width', k+'%').attr('aria-valuenow', k);
            $('#loadLabel3').text(((k)-1 )+ '%');
            $k++;
            iniInterval3($k);
          }

          function loadBar4(l){
            $('#progress-bar4').css('width', l+'%').attr('aria-valuenow', l);
            $('#loadLabel4').text(((l)-1 )+ '%');
            $l++;
            iniInterval4($l);
          }

          function loadBar5(m){
            $('#progress-bar5').css('width', m+'%').attr('aria-valuenow', m);
            $('#loadLabel5').text(((m)-1 )+ '%');
            $m++;
            iniInterval5($m);
          }

          function loadGroup1(){
            var jqxhr = $.post( "componants/robson_service/robson-class1.php", { start_date : $('#txt-startdate').val(), end_date : $('#txt-enddate').val(), institute: $('#txt-institute').val()},function() {});

            jqxhr.done(function() {
              $('#progress-bar1').css('width', '60%').attr('aria-valuenow', '60');
              $('#loadLabel1').text('60%');
              $rob1 = 1;
              $i = 60;
            });

            jqxhr.always(function(result) {
              $('#progress-bar1').css('width', '100%').attr('aria-valuenow', '100');
              $('#loadLabel1').text('100%');
              $rob1 = 2;
              $i = 100;
              setTimeout(function(){
                $('#pg1').hide();
                $('#pgr1').show();
                $('#pgr1').text(result);
              },500);

            });
          }

          function loadGroup2(){
            var jqxhr = $.post( "componants/robson_service/robson-class2.php", { start_date : $('#txt-startdate').val(), end_date : $('#txt-enddate').val(), institute: $('#txt-institute').val()},function() {});

            jqxhr.done(function() {
              $('#progress-bar2').css('width', '60%').attr('aria-valuenow', '60');
              $('#loadLabel2').text('60%');
              $rob2 = 1;
              $j = 60;
            });

            jqxhr.always(function(result) {
              $('#progress-bar2').css('width', '100%').attr('aria-valuenow', '100');
              $('#loadLabel2').text('100%');
              $rob2 = 2;
              $j = 100;
              setTimeout(function(){
                $('#pg2').hide();
                $('#pgr2').show();
                $('#pgr2').text(result);
              },500);
            });
          }

          function loadGroup3(){
            var jqxhr = $.post( "componants/robson_service/robson-class3.php", { start_date : $('#txt-startdate').val(), end_date : $('#txt-enddate').val(), institute: $('#txt-institute').val()},function() {});

            jqxhr.done(function() {
              $('#progress-bar3').css('width', '60%').attr('aria-valuenow', '60');
              $('#loadLabel3').text('60%');
              $rob3 = 1;
              $k = 60;
            });

            jqxhr.always(function(result) {
              $('#progress-bar3').css('width', '100%').attr('aria-valuenow', '100');
              $('#loadLabel3').text('100%');
              $rob3 = 2;
              $k = 100;
              setTimeout(function(){
                $('#pg3').hide();
                $('#pgr3').show();
                $('#pgr3').text(result);
              },500);
            });
          }

          function loadGroup4(){
            var jqxhr = $.post( "componants/robson_service/robson-class4.php", { start_date : $('#txt-startdate').val(), end_date : $('#txt-enddate').val(), institute: $('#txt-institute').val()},function() {});

            jqxhr.done(function() {
              $('#progress-bar4').css('width', '60%').attr('aria-valuenow', '60');
              $('#loadLabel4').text('60%');
              $rob4 = 1;
              $l = 60;
            });

            jqxhr.always(function(result) {
              $('#progress-bar4').css('width', '100%').attr('aria-valuenow', '100');
              $('#loadLabel4').text('100%');
              $rob4 = 2;
              $l = 100;
              setTimeout(function(){
                $('#pg4').hide();
                $('#pgr4').show();
                $('#pgr4').text(result);
              },500);
            });
          }

          function loadGroup5(){
            var jqxhr = $.post( "componants/robson_service/robson-class5.php", { start_date : $('#txt-startdate').val(), end_date : $('#txt-enddate').val(), institute: $('#txt-institute').val()},function() {});

            jqxhr.done(function() {
              $('#progress-bar5').css('width', '60%').attr('aria-valuenow', '60');
              $('#loadLabel5').text('60%');
              $rob5 = 1;
              $m = 60;
            });

            jqxhr.always(function(result) {
              $('#progress-bar5').css('width', '100%').attr('aria-valuenow', '100');
              $('#loadLabel5').text('100%');
              $rob5 = 2;
              $m = 100;
              setTimeout(function(){
                $('#pg5').hide();
                $('#pgr5').show();
                $('#pgr5').text(result);
              },500);
            });
          }

          function iniInterval1(i){
            setTimeout(function(){
              if($rob1 != 2){
                loadBar1($i);
              }
            },1000);
          }

          function iniInterval2(j){
            setTimeout(function(){
              if($rob2 != 2){
                loadBar2($j);
              }
            },1000);
          }

          function iniInterval3(k){
            setTimeout(function(){
              if($rob3 != 2){
                loadBar3($k);
              }
            },1000);
          }

          function iniInterval4(k){
            setTimeout(function(){
              if($rob4 != 2){
                loadBar4($l);
              }
            },1000);
          }

          function iniInterval5(m){
            setTimeout(function(){
              if($rob5 != 2){
                loadBar5($m);
              }
            },1000);
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
            LoadData.init();
          });
        </script>

    </body>

</html>
