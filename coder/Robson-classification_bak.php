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
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400" />

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
                                                  <div class="progress">
                                                      <div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%">30%</div>
                                                  </div>
                                                  <?php include "componants/robson/robson-class1.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  2
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/robson/robson-class2.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  2a
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/robson/robson-class2a.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  2b
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/robson/robson-class2b.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  3
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/robson/robson-class3.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  4
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/robson/robson-class4.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  4a
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/robson/robson-class4a.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  4b
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/robson/robson-class4b.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  5
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/robson/robson-class5.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  6
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/robson/robson-class6.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  7
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/robson/robson-class7.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  8
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/robson/robson-class8.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  9
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/robson/robson-class9.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td class="text-center">
                                                  10
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/robson/robson-class10.php"; ?>
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

    </body>

</html>
