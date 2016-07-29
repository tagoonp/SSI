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
                                <button class="pull-left hidden-lg hidden-md navbar-toggle" type="button" data-toggle="layout" data-action="sidebar_toggle">
                        					<span class="sr-only">Toggle drawer</span>
                        					<span class="icon-bar"></span>
                        					<span class="icon-bar"></span>
                        					<span class="icon-bar"></span>
                        				</button>
                                <span class="navbar-page-title">
                        					Admin :: hospital / institute management
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
                          <button type="button" name="button" class="btn btn-app-green" onclick="changepage('institute.php')"><i class="fa fa-bars"></i> Institute list</button>
                        </div>
                      </div>

                      <div class="row" style="padding-top: 10px;">
                        <div class="col-sm-12 col-lg-12">
                          <div class="card">
                              <div class="card-header bg-blue bg-inverse">
                                  <h4>Add new hospital / institute</h4>
                              </div>
                              <div class="card-block">
                                <div class="row">
                                  <div class="col-sm-6">
                                    <form class="js-validation-material form-horizontal m-t-sm" action="controller/institute-insert.php" method="post">

                                      <div class="form-group" style="padding-top: 20px;">
                                          <div class="col-xs-12">
                                              <div class="form-material">
                                                  <input class="form-control" type="text" id="txt-institutename" name="txt-institutename" placeholder="Enter name of institute or hospital..." />
                                                  <label for="register5-firstname">Institute's name <span style="color:red;">**</span></label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                        <div class="col-xs-12">
                                          <div class="form-material">
                                              <textarea class="form-control" name="txt-detail" id="txt-detail" rows="4" placeholder="Enter description.."></textarea>
                                              <label for="contact2-msg">Detail / Description</label>
                                          </div>
                                          <div class="help-block text-left">You can use these tags: &lt;blockquote&gt;, &lt;strong&gt;, &lt;em&gt;</div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                          <div class="col-xs-12">
                                              <div class="form-material">
                                                  <input class="form-control" type="text" id="txt-phone" name="txt-phone" placeholder="Enter institute or hospital phone number..." />
                                                  <label for="register5-firstname">Phone number</label>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-xs-12">
                                            <div class="form-material">
                                                <select class="form-control" id="txt-type" name="txt-type" size="1">
                                                  <option value="" selected="">--- Choose type ---</option>
                                                  <option value="1" >Monitoring Center</option>
                                                  <option value="2" >Hospital</option>
                                                  <option value="3" >Clinic</option>
                                                </select>
                                                <label for="contact2-subject">Type of institute <span style="color:red;">**</span></label>
                                            </div>
                                        </div>
                                      </div>

                                      <div class="row">
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                              <div class="col-xs-12">
                                                  <div class="form-material">
                                                      <input class="form-control" type="text" id="txt-lat" readonly name="txt-lat" placeholder="Enter institute or hospital phone number..." value="<?php print "-25.748688"; ?>" />
                                                      <label for="register5-firstname">Latitute </label>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                              <div class="col-xs-12">
                                                  <div class="form-material">
                                                      <input class="form-control" type="text" id="txt-lng" readonly name="txt-lng" placeholder="Enter institute or hospital phone number..." value="<?php print "28.223345"; ?>" />
                                                      <label for="register5-firstname">Longtitude</label>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group m-b-0">
                                                <div class="col-xs-12">
                                                    <button class="btn btn-app-teal" type="submit">Update</button>
                                                    <button class="btn btn-app-light" type="reset">Reset</button>
                                                </div>
                                            </div>


                                    </form>
                                  </div>
                                  <!-- .col-sm-6 -->

                                  <div class="col-sm-6">
                                    <div class="" id="map-canvas-info">

                                    </div>
                                    <div class="help-block text-left" style="color:red;">Drag marker for get point of location ( Latitute and Longtitude )</div>
                                  </div>
                                  <!-- .col-sm-6 -->
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

        <!-- Page JS Plugins -->
        <script src="../assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <script src="js/institute_forms_validation.js"></script>

        <script type="text/javascript">
          var map;
          function initMap() {
            map = new google.maps.Map(document.getElementById('map-canvas-info'), {
              center: {lat: parseFloat($('#txt-lat').val()), lng: parseFloat($('#txt-lng').val())},
              zoom: 13
            });

            var marker = new google.maps.Marker({
              position: {lat: parseFloat($('#txt-lat').val()), lng: parseFloat($('#txt-lng').val())},
              map: map,
              draggable:true,
              animation: google.maps.Animation.DROP,
              title: 'Hello World!'
            });

            google.maps.event.addListener(marker, 'dragend', function() {
          		var my_Point = marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
                  map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker

                  $("#txt-lat").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
                  $("#txt-lng").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value
          	});
          }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoKpUEmUdbVhA2z6Xz1FBtJ65d-mjC2DM&callback=initMap" async defer></script>
    </body>

</html>
