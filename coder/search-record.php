<?php
session_start();
include "../database/database.class.php";
include "../dist/function/session.inc.php";
include "../dist/function/checkuser.inc.php";

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
                        					Add new record
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
                      <!-- Stats -->
                      <div class="row">
                        <form class="js-validation-before form-horizontal m-t-sm" id="add-new-record1" onsubmit="return false;">
                          <div class="col-xs-12">
                            <!-- Add card -->
                            <div class="card">
                              <div class="card-header bg-teal bg-inverse">
                                  <h4>Search patient's record</h4>
                              </div>
                              <div class="card-block" style="padding-top: 30px;">
                                <!-- <h3>Patient's ID or Keyword</h3> -->

                                <!-- <div class="alert alert-info">
                                  <p><strong>Remark!</strong>&nbsp;&nbsp;This session use for search any patient's history before adding new record. If you sure this patient's is new case (not follow-up case), you can enter patient's ID and click "Add new record" suddenly..</p>
                                </div> -->

                                <div class="form-group" style="padding-top: 30px;">
                                  <div class="col-sm-12">
                                      <div class="form-material">
                                          <input class="form-control" type="text" id="text-patient-id" name="text-patient-id" placeholder="Please enter patient's key, such as ID No, / Passport ID / Date of bitrh [YYMMDD]" />
                                          <label for="material-text">Patient's key <span style="color:red;">**</span></label>
                                      </div>
                                  </div>
                                </div>

                                <div class="row narrow-gutter">
                                    <div class="col-xs-12 text-left">
                                        <button type="reset" class="btn btn-default">Reset</button>
                                        <button type="submit" id="btnSearch1"class="btn btn-app-teal"><i class="ion-search"></i> Search history</button>
                                        <!-- <button type="button" id="btnAddnew1" class="btn btn-app-red"><i class="ion-plus"></i> Add new record</button> -->
                                    </div>
                                </div>
                              </div>
                            </div>
                            <!-- End card -->
                          </div>
                        </form>
                      </div>
                      <!-- End row -->

                      <div class="row">
                        <div class="col-sm-12">
                          <div class="card">
                            <div class="card-header bg-green bg-inverse">
                                <h4>Histories record</h4>
                            </div>
                            <div class="card-block">
                              <p>
                                <span id="historyResult">No result</span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>


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

        <!-- Page Plugins -->
        <script src="../library/sweetalert/dist/sweetalert.min.js"></script>
        <script src="../assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <!-- Page JS Code -->
        <script src="../dist/page/searchrecord/js/base_forms_validation.js"></script>


    </body>

</html>
