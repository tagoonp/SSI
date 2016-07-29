<?php
session_start();
include "../database/database.class.php";
include "../dist/function/session.inc.php";
include "../dist/function/checkuser.inc.php";

if(!isset($_GET['user_id'])){
  header('Location: user.php');
  exit();
}

$strSQL = sprintf("SELECT * FROM fmn1_useraccount a inner join fmn1_userdescription b on a.username = b.username WHERE a.username = '%s' ", mysql_real_escape_string($_GET['user_id']));
$resultUser = $db->select($strSQL,false,true);

if(!$resultUser){
  header('Location: user.php');
  exit();
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
                        					Admin :: User management
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
                          <button type="button" name="button" class="btn btn-app-green" onclick="changepage('users.php')"><i class="fa fa-bars"></i> User list</button>  <button type="button" name="button" class="btn btn-app-teal" onclick="changepage('user-add.php')"><i class="fa fa-plus"></i> Add new user</button>
                          <button type="button" name="button" class="btn btn-app-orange" onclick="changepage('user-update.php?user_id=<?php print $_GET['user_id'];?>')"><i class="fa fa-wrench"></i> Update info.</button>
                          <!-- <button type="button" name="button" class="btn btn-app-red" onclick="changepage_confirm('controller/user-delete.php?user_id=<?php //print $_GET['user_id'];?>')"><i class="fa fa-trash"></i> Delete</button> -->
                        </div>
                      </div>

                      <div class="row" style="padding-top: 10px;">
                        <div class="col-sm-12 col-lg-12">
                          <div class="card">
                              <div class="card-header bg-blue bg-inverse">
                                  <h4>User information</h4>
                              </div>
                              <div class="card-block">
                                <div class="row">
                                  <div class="col-sm-12">
                                    <table class="table table-bordered table-striped table-condensed">
                                      <tbody>
                                        <tr>
                                          <td class="col-sm-6 font-500">
                                            User ID
                                          </td>
                                          <td>
                                            <?php print $resultUser[0]['username']; ?>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="col-sm-6 font-500">
                                            Full name
                                          </td>
                                          <td>
                                            <?php print $resultUser[0]['fname']." ".$resultUser[0]['lname']; ?>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td  class="font-500">
                                            E-mail address
                                          </td>
                                          <td>
                                            <?php if($resultUser[0]['email']!=''){ print $resultUser[0]['email']; }else{ print "-";} ?>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="font-500">
                                            Phone number
                                          </td>
                                          <td>
                                            <?php if($resultUser[0]['phone']!=''){ print $resultUser[0]['phone']; }else{ print "-";} ?>
                                          </td>
                                        </tr>
                                        <tr>
                                          <td class="font-500">
                                            Address
                                          </td>
                                          <td>
                                            <?php if($resultUser[0]['address']!=''){ print $resultUser[0]['address']; }else{ print "-";} ?>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                                <!-- .row -->
                              </div>
                          </div>
                          <!-- .card -->

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
        <script type="text/javascript">
          var map;
          function initMap() {
            map = new google.maps.Map(document.getElementById('map-canvas-info'), {
              center: {lat: parseFloat($('#txt-lat').val()), lng: parseFloat($('#txt-lng').val())},
              zoom: 15
            });

            var marker = new google.maps.Marker({
              position: {lat: parseFloat($('#txt-lat').val()), lng: parseFloat($('#txt-lng').val())},
              map: map,
              animation: google.maps.Animation.DROP,
              title: 'Hello World!'
            });
          }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoKpUEmUdbVhA2z6Xz1FBtJ65d-mjC2DM&callback=initMap" async defer></script>
    </body>

</html>
