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
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400" />

        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="../assets/js/plugins/slick/slick.min.css" />
        <link rel="stylesheet" href="../assets/js/plugins/slick/slick-theme.min.css" />

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
                        <!-- Stats -->
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <a class="card" href="javascript:void(0)">
                                    <div class="card-block clearfix">
                                        <div class="pull-right">
                                            <p class="h6 text-muted m-t-0 m-b-xs">Total Admitted</p>
                                            <p class="h3 text-blue m-t-sm m-b-0">
                                              <?php include "componants/viewTotolAdmitted.php"; ?>
                                            </p>
                                        </div>
                                        <div class="pull-left m-r">
                                            <span class="img-avatar img-avatar-48 bg-blue bg-inverse"><i class="ion-ios-people fa-1-5x"></i></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- .col-sm-6 -->

                            <div class="col-sm-6 col-lg-3">
                                <a class="card" href="javascript:void(0)">
                                    <div class="card-block clearfix">
                                        <div class="pull-right">
                                            <p class="h6 text-muted m-t-0 m-b-xs">Total delivery</p>
                                            <p class="h3 m-t-sm m-b-0">
                                              <?php include "componants/viewTotolDelivery.php"; ?>
                                            </p>
                                        </div>
                                        <div class="pull-left m-r">
                                            <span class="img-avatar img-avatar-48 bg-green bg-inverse"><i class="ion-ios-people fa-1-5x"></i></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- .col-sm-6 -->

                            <div class="col-sm-6 col-lg-3">
                                <a class="card" href="javascript:void(0)">
                                    <div class="card-block clearfix">
                                        <div class="pull-right">
                                            <p class="h6 text-muted m-t-0 m-b-xs">Total birth</p>
                                            <p class="h3 m-t-sm m-b-0">
                                              <?php include "componants/viewTotolBirth.php"; ?>
                                            </p>
                                        </div>
                                        <div class="pull-left m-r">
                                            <span class="img-avatar img-avatar-48 bg-teal bg-inverse"><i class="ion-ios-people fa-1-5x"></i></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- .col-sm-6 -->

                            <div class="col-sm-6 col-lg-3">
                                <a class="card" href="javascript:void(0)">
                                    <div class="card-block clearfix">
                                        <div class="pull-right">
                                            <p class="h6 text-muted m-t-0 m-b-xs">Total livebirth</p>
                                            <p class="h3 m-t-sm m-b-0">
                                              <?php include "componants/viewTotolLiveBirth.php"; ?>
                                            </p>
                                        </div>
                                        <div class="pull-left m-r">
                                            <span class="img-avatar img-avatar-48 bg-orange bg-inverse"><i class="ion-ios-people fa-1-5x"></i></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- .col-sm-6 -->
                        </div>
                        <!-- .row -->
                        <!-- End stats -->


                        <!-- .row -->

                        <div class="row">

                            <div class="col-lg-5">
                                <!-- Weekly users Widget -->
                                <div class="card">
                                    <div class="card-header bg-blue bg-inverse">
                                        <h4>Weekly delivery</h4>
                                    </div>
                                    <div class="card-block">
                                        <div style="height: 238px;"><canvas class="js-chartjs-bars"></canvas></div>
                                    </div>
                                </div>
                                <!-- .card -->
                                <!-- End Weekly users Widget -->
                            </div>
                            <!-- .col-lg-4 -->

                            <div class="col-lg-7">
                                <!-- Transactions history Widget -->
                                <div class="card">
                                    <div class="card-header bg-blue bg-inverse">
                                        <h4>Monthly delivery</h4>
                                    </div>
                                    <div class="card-block">
                                        <div style="height: 238px;"><canvas class="js-chartjs-lines3"></canvas></div>
                                    </div>
                                </div>
                                <!-- .card -->
                                <!-- End Transactions history Widget -->
                            </div>
                            <!-- .col-lg-8 -->
                        </div>
                        <!-- .row -->


                </main>

            </div>
            <!-- .app-layout-container -->
        </div>
        <!-- .app-layout-canvas -->

        <!-- Apps Modal -->
        <!-- Opens from the button in the header -->
        <div id="apps-modal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-sm modal-dialog modal-dialog-top">
                <div class="modal-content">
                    <!-- Apps card -->
                    <div class="card m-b-0">
                        <div class="card-header bg-app bg-inverse">
                            <h4>Apps</h4>
                            <ul class="card-actions">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                                </li>
                            </ul>
                        </div>
                        <div class="card-block">
                            <div class="row text-center">
                                <div class="col-xs-6">
                                    <a class="card card-block m-b-0 bg-app-secondary bg-inverse" href="index.html">
                                        <i class="ion-speedometer fa-4x"></i>
                                        <p>Admin</p>
                                    </a>
                                </div>
                                <div class="col-xs-6">
                                    <a class="card card-block m-b-0 bg-app-tertiary bg-inverse" href="frontend_home.html">
                                        <i class="ion-laptop fa-4x"></i>
                                        <p>Frontend</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- .card-block -->
                    </div>
                    <!-- End Apps card -->
                </div>
            </div>
        </div>
        <!-- End Apps Modal -->

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
        <script src="../assets/js/plugins/slick/slick.min.js"></script>
        <script src="../assets/js/plugins/chartjs/Chart.min.js"></script>
        <script src="../assets/js/plugins/flot/jquery.flot.min.js"></script>
        <script src="../assets/js/plugins/flot/jquery.flot.pie.min.js"></script>
        <script src="../assets/js/plugins/flot/jquery.flot.stack.min.js"></script>
        <script src="../assets/js/plugins/flot/jquery.flot.resize.min.js"></script>

        <!-- Page JS Code -->
        <script src="../assets/js/pages/index.js"></script>

        <script>
            $(function()
            {
                // Init page helpers (Slick Slider plugin)
                App.initHelpers('slick');
            });
        </script>

    </body>

</html>
