<?php
session_start();
include "../database/database.class.php";
include "../dist/function/session.inc.php";
include "../dist/function/checkuser.inc.php";

$start_date = date('Y')."-01-01";
$end_date = date('Y')."-12-31";

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
        <link rel="stylesheet" href="../assets/js/plugins/slick/slick.min.css" />
        <link rel="stylesheet" href="../assets/js/plugins/slick/slick-theme.min.css" />
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
                        					Summary report
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

                            <div class="col-lg-12">
                                <!-- Weekly users Widget -->
                                <div class="card">
                                    <div class="card-header bg-blue bg-inverse">
                                        <h4>Table of summary</h4>
                                    </div>
                                    <div class="card-block">
                                        <h4>Indicator</h4>
                                        <div class="table-responsive">
                                          <table class="table table-bordered table-condensed">
                                            <thead>
                                              <tr>
                                                <th class="col-sm-1">
                                                  #
                                                </th>
                                                <th>
                                                  Indicator
                                                </th>
                                                <th class="col-sm-5">
                                                  Number of case
                                                </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td>
                                                  1
                                                </td>
                                                <td>
                                                  Total admitted
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolAdmitted.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  2
                                                </td>
                                                <td>
                                                  Total delivery
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolDelivery.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  3
                                                </td>
                                                <td>
                                                  Total birth
                                                </td>
                                                <td>
                                                    <?php include "componants/viewTotolBirth.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  4
                                                </td>
                                                <td>
                                                  Total livebirth
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolLiveBirth.php"; ?>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                        <h4>Complication in delivery</h4>
                                        <div class="table-responsive">
                                          <table class="table table-bordered table-condensed">
                                            <thead>
                                              <tr>
                                                <th class="col-sm-1">
                                                  #
                                                </th>
                                                <th>
                                                  Indicator
                                                </th>
                                                <th class="col-sm-5">
                                                  Number of case
                                                </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td>
                                                  1
                                                </td>
                                                <td>
                                                  Induction of labour
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolInductionofLabour.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  2
                                                </td>
                                                <td>
                                                  Antepartum haemorrhage
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolAntepartumHaemorrhage.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  3
                                                </td>
                                                <td>
                                                  AP : Abruptio placenta
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolAbruptioPlacenta.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  4
                                                </td>
                                                <td>
                                                  PP : Placenta previa
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolPlacentaPrevia.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  5
                                                </td>
                                                <td>
                                                  Postpartum haemorrhage
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolPostpartumHaemorrhage.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  6
                                                </td>
                                                <td>
                                                  Severe pre eclampsia
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolSeverePreEclampsia.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  7
                                                </td>
                                                <td>
                                                  Eclampsia
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolEclampsia.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  8
                                                </td>
                                                <td>
                                                  Prolonged rupture of membranes
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolProlongedRuptureofMembraness.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  9
                                                </td>
                                                <td>
                                                  Ruptured uterus
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolRupturedUterus.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  10
                                                </td>
                                                <td>
                                                  Sepsis
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolSepsis.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  11
                                                </td>
                                                <td>
                                                  Obstructed or prolonged labour
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolObstructedorProlongedLabour.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  12
                                                </td>
                                                <td>
                                                  Retained placenta
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolRetainedPlacenta.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  13
                                                </td>
                                                <td>
                                                  Manual removal of placenta
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolManualRemovalofPlacenta.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  14
                                                </td>
                                                <td>
                                                  Maternal death
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolMaternalDeath.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  15
                                                </td>
                                                <td>
                                                  Stillbirth
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolStillbirth.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  16
                                                </td>
                                                <td>
                                                  Neonatal death
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolNeonatal.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  17
                                                </td>
                                                <td>
                                                  Preterm birth
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolPreterm.php"; ?>
                                                </td>
                                              </tr>

                                              <tr>
                                                <td>
                                                  18
                                                </td>
                                                <td>
                                                  Low birth weight
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolLBW.php"; ?>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>

                                        <h4>Complication in postnatal</h4>
                                        <div class="table-responsive">
                                          <table class="table table-bordered table-condensed">
                                            <thead>
                                              <tr>
                                                <th class="col-sm-1">
                                                  #
                                                </th>
                                                <th>
                                                  Indicator
                                                </th>
                                                <th class="col-sm-5">
                                                  Number of case
                                                </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td>
                                                  1
                                                </td>
                                                <td>
                                                  Postpartum haemorrhage
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolPH.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  2
                                                </td>
                                                <td>
                                                  Postpartum eclampsia
                                                </td>
                                                <td>
                                                  <?php include "componants/viewTotolPE.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  3
                                                </td>
                                                <td>
                                                  Postpartum sepsis
                                                </td>
                                                <td>
                                                    <?php include "componants/viewTotolPS.php"; ?>
                                                </td>
                                              </tr>

                                            </tbody>
                                          </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- .card -->
                                <!-- End Weekly users Widget -->
                            </div>
                            <!-- .col-lg-4 -->


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

        <!-- Page Plugins -->
        <script src="../library/sweetalert/dist/sweetalert.min.js"></script>
        <script src="../assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <!-- Page JS Code -->
        <!-- <script src="../assets/js/pages/index.js"></script> -->

        <script>
            $(function()
            {
                // Init page helpers (Slick Slider plugin)
                // App.initHelpers('slick');
                App.initHelpers(['datepicker']);

                $('#btn-calculate1').click(function(){
                  var x = new Date($('#txt-startdate').val());
                  var y = new Date($('#txt-enddate').val());

                  if(x <= y){

                    window.location = 'summary.php?start=' + $('#txt-startdate').val() + '&end=' + $('#txt-enddate').val();
                  }else{
                    // alert('Invalid date');
                    swal('Invalid date range!');
                  }

                });
            });
        </script>

    </body>

</html>
