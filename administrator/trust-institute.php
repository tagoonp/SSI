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

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="../assets/js/plugins/datatables/jquery.dataTables.min.css" />

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
                                <button class="pull-left hidden-lg hidden-md navbar-toggle" type="button" data-toggle="layout" data-action="sidebar_toggle">
                        					<span class="sr-only">Toggle drawer</span>
                        					<span class="icon-bar"></span>
                        					<span class="icon-bar"></span>
                        					<span class="icon-bar"></span>
                        				</button>
                                <span class="navbar-page-title">
                        					Admin :: Trust center for institute / hospital
                        				</span>
                            </div>

                            <div class="collapse navbar-collapse" id="header-navbar-collapse">
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
                      <div class="row">
                        <div class="col-sm-12">
                          <button type="button" name="button" class="btn btn-app-teal" onclick="changepage('trust-institute-list.php')"><i class="fa fa-bars"></i>&nbsp;&nbsp;Trust list</button>
                        </div>
                      </div>
                      <div class="row"  style="padding-top: 10px;">
                        <div class="col-sm-12 col-lg-12">
                          <div class="card">
                              <div class="card-header bg-blue bg-inverse">
                                  <h4>Un-trusted institute / hospital list</h4>
                              </div>
                              <div class="card-block">
                                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                  <thead>
                                      <tr>
                                          <th class="text-center"></th>
                                          <th class="hidden-xs">Institute / Hospital / Facility's name</th>
                                          <th class="text-center" style="width: 10%;">Actions</th>
                                          <th class="text-center" style="width: 10%;">Actions</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $strSQL = sprintf("SELECT ti_institute fname FROM fmn1_trust_institute  where ti_institute != '' group by ti_institute order by ti_institute");
                                    $resultRecord = $db->select($strSQL,false,true);

                                    if($resultRecord){
                                      $c = 1;
                                      foreach ($resultRecord as $value) {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php print $c;?></td>
                                            <td class="font-500">
                                              <?php print $value['fname']; ?>
                                              </span>
                                            </td>
                                            <td class="font-500">
                                              <?php print $value['fname']; ?>
                                              </span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button class="btn btn-xs btn-app-blue" type="button" data-toggle="tooltip" title="Edit account" onclick="changepage('user-update.php?user_id=<?php print $value['username'];?>')"><i class="ion-edit"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                        $c++;
                                      }

                                    }
                                    ?>

                                    </tbody>
                                  </table>
                              </div>
                          </div>
                        </div>
                        <!-- .col-sm-6 -->
                      </div>
                      <!-- .row -->
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
        <script src="../library/sweetalert/dist/sweetalert.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="../assets/js/plugins/datatables/jquery.dataTables.min.js"></script>

        <!-- Page JS Code -->
        <script src="../assets/js/pages/base_tables_datatables.js"></script>

        <!-- Page JS Code -->
        <!-- <script src="../assets/js/pages/index.js"></script> -->


    </body>

</html>
