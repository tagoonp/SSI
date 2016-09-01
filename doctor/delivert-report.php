<?php
session_start();
include "../database/database.class.php";
include "../dist/function/session.inc.php";
include "../dist/function/checkuser.inc.php";

$start_date = date('Y')."-01-01";
// $start_date = "2015-01-01";
$end_date = date('Y-m')."-31";
// $end_date = "2015-12-31";

if(isset($_GET['startdate'])){ $start_date = $_GET['startdate']; }
if(isset($_GET['enddate'])){ $end_date = $_GET['enddate']; }

$totalLivebirth = 0;
$totalStillbirth = 0;
$totalLateneo = 0;
$totalEarlyneo = 0;
$totalAOD = 0;
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

                            <div class="col-lg-12">
                                <!-- Filter -->
                                <div class="card">
                                    <div class="card-header bg-red bg-inverse">
                                        <h3>Filter</h3>
                                    </div>
                                    <div class="card-block">
                                      <form class="form-horizontal m-t-sm" action="base_forms_pickers_select.html" method="post" onsubmit="return false;">
                                        <div class="row">
                                          <div class="col-sm-6">
                                            <div class="form-group" style="padding-top: 10px;">
                                                <div class="col-md-12">
                                                    <div class="form-material">
                                                        <input class="js-datepicker form-control" type="text" id="txt-startdate" name="txt-startdate" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php print $start_date; ?>">
                                                        <label for="example-datepicker4">Start date <span style="color: red;">**</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                          </div>

                                          <div class="col-sm-6">
                                            <div class="form-group"  style="padding-top: 10px;">
                                                <div class="col-md-12">
                                                    <div class="form-material">
                                                        <input class="js-datepicker form-control" type="text" id="txt-enddate" name="txt-enddate" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="<?php print $end_date; ?>">
                                                        <label for="example-datepicker5">End date <span style="color: red;">**</span></label>
                                                    </div>
                                                </div>
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

                            <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-header bg-teal bg-inverse">
                                      <h3>Delivery data for one month</h3>
                                  </div>
                                  <div class="card-block">
                                    <div class="row">
                                      <div class="col-lg-8 col-md-8">
                                        <h4 style="padding-top: 20px;">Delivery during this period</h4>
                                        <div class="table-responsive">
                                          <table class="table table-bordered table-condensed table-header-bg">
                                            <thead>
                                              <tr>
                                                <th class="col-sm-3" rowspan="2">

                                                </th>
                                                <th rowspan="2"  class="col-sm-2 text-center">
                                                  Total birth
                                                </th>
                                                <th class="col-sm-2 text-center" rowspan="2">
                                                  Stillbirth
                                                </th>
                                                <th colspan="2" class="text-center" style="border: solid; border-width: 0px 0px 1px 0px; border-color: white;">
                                                  Neonatal death
                                                </th>
                                                <th class="col-sm-2 text-center" rowspan="2">
                                                  Alive on discharge
                                                </th>
                                              </tr>
                                              <tr>
                                                <th class="col-sm-1 text-center">
                                                  Early
                                                </th>
                                                <th class="col-sm-1 text-center">
                                                  Late
                                                </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td>
                                                  500 - 999g
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolBirth-500-999.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolStillBirth-500-999.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolEarlyneo-500-999.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolLateneo-500-999.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolAOD-500-999.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  1,000 - 1,499g
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolBirth-1000-1499.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolStillBirth-1000-1499.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolEarlyneo-1000-1499.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolLateneo-1000-1499.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolAOD-1000-1499.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  1,500 - 1,999g
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolBirth-1500-1999.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolStillBirth-1500-1999.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolEarlyneo-1500-1999.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolLateneo-1500-1999.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolAOD-1500-1999.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  2,000 - 2,499g
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolBirth-2000-2499.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolStillBirth-2000-2499.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolEarlyneo-2000-2499.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolLateneo-2000-2499.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolAOD-2000-2499.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                2,500g+
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolBirth-2500.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolStillBirth-2500.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolEarlyneo-2500.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolLateneo-2500.php"; ?>
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolAOD-2500.php"; ?>
                                                </td>
                                              </tr>
                                              <tr style="background: #f3f3f3;">
                                                <td>
                                                  <strong>Total :</strong>
                                                </td>
                                                <td class="text-center">
                                                 <strong><?php print number_format($totalLivebirth); ?></strong>
                                                </td>
                                                <td class="text-center">
                                                  <strong><?php print number_format($totalStillbirth); ?></strong>
                                                </td>
                                                <td class="text-center">
                                                  <strong><?php print number_format($totalEarlyneo); ?></strong>
                                                </td>
                                                <td class="text-center">
                                                  <strong><?php print number_format($totalLateneo); ?></strong>
                                                </td>
                                                <td class="text-center">
                                                  <strong><?php print number_format($totalAOD); ?></strong>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>

                                        <div class="row">
                                          <div class="col-sm-6">
                                            <h4>Multiple pregnancies</h4>
                                            <div class="table-responsive">
                                              <table class="table table-bordered table-condensed table-header-bg">
                                                <thead>
                                                  <tr>
                                                    <th class="col-sm-6" rowspan="2">

                                                    </th>
                                                    <th rowspan="2"  class="text-center">
                                                      No. of cases
                                                    </th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>
                                                      Pregnancies
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/delivery/viewTotolNormalVaginal.php"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                      Neonates
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/delivery/viewTotolVentouse.php"; ?>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <!-- End table-responsive -->

                                            <h4>Antenatal care</h4>
                                            <div class="table-responsive">
                                              <table class="table table-bordered table-condensed table-header-bg">
                                                <thead>
                                                  <tr>
                                                    <th class="col-sm-6" rowspan="2">

                                                    </th>
                                                    <th rowspan="2"  class="text-center">
                                                      No. of cases
                                                    </th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>
                                                      Local clinic
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/delivery/viewTotolNormalVaginal.php"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                      Elseware
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/delivery/viewTotolVentouse.php"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                      None
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/delivery/viewTotolVentouse.php"; ?>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <!-- End table-responsive -->

                                            <h4>Born before arrival</h4>
                                            <div class="table-responsive">
                                              <table class="table table-bordered table-condensed table-header-bg">
                                                <thead>
                                                  <tr>
                                                    <th class="col-sm-6" rowspan="2">

                                                    </th>
                                                    <th rowspan="2"  class="text-center">
                                                      No. of cases
                                                    </th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>
                                                      Total
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/delivery/viewTotolBBA.php"; ?>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <!-- End table-responsive -->

                                            <h4>Parity</h4>
                                            <div class="table-responsive">
                                              <table class="table table-bordered table-condensed table-header-bg">
                                                <thead>
                                                  <tr>
                                                    <th class="col-sm-6" rowspan="2">

                                                    </th>
                                                    <th rowspan="2"  class="text-center">
                                                      No. of cases
                                                    </th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>
                                                      Primiparae
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/delivery/viewTotolParity1.php"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                      Multiparae
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/delivery/viewTotolParity2-4.php"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                      Grand multiparae
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/delivery/viewTotolParityGrand.php"; ?>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <!-- End table-responsive -->
                                          </div>
                                          <!-- End col-sm-6 -->

                                          <div class="col-sm-6">
                                            <h4>Morbidity marker</h4>
                                            <div class="table-responsive">
                                              <table class="table table-bordered table-condensed table-header-bg">
                                                <thead>
                                                  <tr>
                                                    <th class="col-sm-6" rowspan="2">

                                                    </th>
                                                    <th rowspan="2"  class="text-center">
                                                      No. of cases
                                                    </th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>
                                                      Anterpartum haemorrhage
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/viewTotolAntepartumHaemorrhage.php"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                      Postpartum haemorrhage
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/viewTotolPostpartumHaemorrhage.php"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                      Severe pre-eclampsia
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/viewTotolSeverePreEclampsia.php"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                      Eclampsia
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/viewTotolEclampsia.php"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                      Induction of labour
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/viewTotolInductionofLabour.php"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                      Prolonged rupture of membranes
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/viewTotolProlongedRuptureofMembraness.php"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                      Ruptured uterus
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/viewTotolRupturedUterus.php"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                      Sepsis
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/viewTotolSepsis.php"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                      Obstructed / prolonged labour
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/viewTotolObstructedorProlongedLabour.php"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                      Retained placenta
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/viewTotolRetainedPlacenta.php"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                      Manual removal of placenta
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/viewTotolManualRemovalofPlacenta.php"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                      Bag / mask neonatal resuscutation
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/delivery/viewTotolBagandMask.php"; ?>
                                                    </td>
                                                  </tr>

                                                </tbody>
                                              </table>
                                            </div>
                                            <!-- End table-responsive -->

                                            <h4>Syphilis serology</h4>
                                            <div class="table-responsive">
                                              <table class="table table-bordered table-condensed table-header-bg">
                                                <thead>
                                                  <tr>
                                                    <th class="col-sm-6" rowspan="2">

                                                    </th>
                                                    <th rowspan="2"  class="text-center">
                                                      No. of cases
                                                    </th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td>
                                                      Postive
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/delivery/viewTotolNormalVaginal.php"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                      Negative
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/delivery/viewTotolNormalVaginal.php"; ?>
                                                    </td>
                                                  </tr>
                                                  <tr>
                                                    <td>
                                                      Not done
                                                    </td>
                                                    <td class="text-center">
                                                      <?php include "componants/delivery/viewTotolNormalVaginal.php"; ?>
                                                    </td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <!-- End table-responsive -->
                                          </div>
                                          <!-- End col-sm-6 -->
                                        </div>
                                        <!-- End-row -->
                                      </div>
                                      <!-- End col-md-8 -->
                                      <div class="col-md-4">
                                        <h4 style="padding-top: 20px;">Delivery methods</h4>
                                        <div class="table-responsive">
                                          <table class="table table-bordered table-condensed table-header-bg">
                                            <thead>
                                              <tr>
                                                <th class="col-sm-6" rowspan="2">

                                                </th>
                                                <th rowspan="2"  class="text-center">
                                                  No. of cases
                                                </th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr style="background: #f3f3f3;">
                                                <td>
                                                  <strong>Mother with c-section</strong>
                                                </td>
                                                <td class="text-center">
                                                 <strong><?php include "componants/delivery/viewTotolMotherCaesareanSection.php"; ?></strong>
                                                </td>
                                              </tr>
                                              <tr style="background: #f3f3f3;">
                                                <td>
                                                  <strong>Baby birth</strong>
                                                </td>
                                                <td class="text-center">
                                                  <strong><?php include "componants/delivery/viewTotolBirth-all.php"; ?></strong>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  Normal vaginal
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolNormalVaginal.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  Ventouse
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolVentouse.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  Forceps
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolForceps.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  Vaginal breech
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolVaginalBreech.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  Caesarean section
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolCaesareanSection.php"; ?>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                        <!-- End table-responsive -->

                                        <h4 style="padding-top: 0px;">Maternal age</h4>
                                        <div class="table-responsive">
                                          <table class="table table-bordered table-condensed table-header-bg">
                                            <thead>
                                              <tr>
                                                <th class="col-sm-6" rowspan="2">

                                                </th>
                                                <th rowspan="2"  class="text-center">
                                                  No. of cases
                                                </th>
                                              </tr>
                                            </thead>
                                            <tbody>

                                              <tr>
                                                <td>
                                                  Younger than 18 yr.
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolMaternalAge18.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  18 - 19 yr
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolMaternalAge18-19.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  35 yr and older
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolMaternalAge35.php"; ?>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                        <!-- End table-responsive -->

                                        <h4>HIV serology</h4>
                                        <div class="table-responsive">
                                          <table class="table table-bordered table-condensed table-header-bg">
                                            <thead>
                                              <tr>
                                                <th class="col-sm-6" rowspan="2">

                                                </th>
                                                <th rowspan="2"  class="text-center">
                                                  No. of cases
                                                </th>
                                              </tr>
                                            </thead>
                                            <tbody>

                                              <tr>
                                                <td>
                                                  Positive
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolHIVPositive.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  Negative
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolHIVNegative.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  Not done
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolHIVNotdone.php"; ?>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                        <!-- End table-responsive -->

                                        <h4>Anti-retroviral therapy</h4>
                                        <div class="table-responsive">
                                          <table class="table table-bordered table-condensed table-header-bg">
                                            <thead>
                                              <tr>
                                                <th class="col-sm-6" rowspan="2">

                                                </th>
                                                <th rowspan="2"  class="text-center">
                                                  No. of cases
                                                </th>
                                              </tr>
                                            </thead>
                                            <tbody>

                                              <tr>
                                                <td>
                                                  HIV Positive mothers
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolNormalVaginal.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  Prophylactic ART
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolVentouse.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  Long-term ART
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolForceps.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  Intrapartum ART only
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolForceps.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  ART type unknown
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolForceps.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  Received no ART
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolForceps.php"; ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td colspan="2" style="background: #f3f3f3;">
                                                  <strong>Neonates of HIV positive mothers</strong>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td>
                                                  Received drugs
                                                </td>
                                                <td class="text-center">
                                                  <?php include "componants/delivery/viewTotolForceps.php"; ?>
                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </div>
                                        <!-- End table-responsive -->
                                      </div>
                                      <!-- End col-md-4 -->
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
