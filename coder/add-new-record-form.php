<?php
session_start();
include "../database/database.class.php";
include "../dist/function/session.inc.php";
include "../dist/function/checkuser.inc.php";
// include "../dist/function/patientsession.inc.php";
// include "../dist/function/patienthistoryinfo.inc.php";
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
                        					Add new record
                        				</span>
                            </div>

                            <div class="collapse navbar-collapse" id="header-navbar-collapse">
                                <!-- Header search form -->


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
                        <form class="js-validation-register form-horizontal m-t-sm"  method="post" action="controller/insert-register.php">
                          <div class="col-xs-12">
                            <!-- Add card -->
                            <div class="card">
                              <div class="card-header bg-teal bg-inverse">
                                  <h4>Add new patient's record</h4>
                                  <ul class="card-actions">
                                    <li>
                                      <button type="button" data-toggle="card-action" data-action="fullscreen_toggle"></button>
                                    </li>
                                  </ul>
                              </div>
                              <div class="card-block" style="padding-top: 30px;">
                                <!-- Geolocation input div -->
                                <div class="geolocation"  style="display:none;">
                                  <h3 style="font-weight: 400; color: teal;">Geolocation data</h3>

                                  <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="form-material">
                                            <input class="form-control" type="text" id="txt-inst" name="txt-inst" placeholder="Please enter longitude" value="<?php print $valueUserinfo['institute_id'];?>" />
                                            <label for="material-text">Institute id</label>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="text" id="txt-lat" name="txt-lat" placeholder="Please enter longitude" />
                                                <label for="material-text">Latitute</label>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="text" id="txt-lng" name="txt-lng" placeholder="Please enter  latitude" />
                                                <label for="material-text">Longtitute</label>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- End geolocation input div -->
                                <h3 style="font-weight: 400; color: teal;">Main admission data</h3>
                                <div class="row" style="padding-top: 20px;">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <div class="col-sm-12">
                                          <div class="form-material">
                                            <input class="js-datepicker form-control" type="text" id="txt-dateadm" name="txt-dateadm" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="">
                                            <label for="example-datepicker4">Date of admission <span style="color: red;">**</span></label>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                      <div class="col-sm-12">
                                          <div class="form-material">
                                              <input class="form-control" type="time" id="txt-timeadm" name="txt-timeadm" placeholder="Please enter time of admission" value="" />
                                              <label for="material-text">Time of admission <span style="color: red;">**</span></label>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- End row -->
                                <div class="form-group">
                                  <div class="col-sm-12">
                                      <div class="form-material">
                                          <input class="form-control" type="text" id="txt-foldernumber" name="txt-foldernumber" placeholder="Please enter your username" />
                                          <label for="material-text">Folder number</label>
                                      </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-sm-12">
                                      <div class="form-material">
                                          <input class="form-control" type="text" id="txt-pointofdelivery" name="txt-pointofdelivery" placeholder="Please enter your username" />
                                          <label for="material-text">Point of delivery folder no</label>
                                      </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <div class="col-sm-12">
                                    <p>
                                      <label for="material-text">Refer status</label>&nbsp;&nbsp;&nbsp;<br>
                                      <label class="css-input switch switch-default switch-success">
                                        No <input type="checkbox" name="cb-refer" id="cb-refer"  /><span></span> Yes
                                      </label>
                                    </p>
                                  </div>
                                </div>

                                <div class="referCondition" style="display:none;">
                                  <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="form-material">
                                            <input class="form-control" type="text" id="txt-referfacility" name="txt-referfacility" placeholder="Please enter your username" />
                                            <label for="material-text">Refer from facility</label>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <div class="col-xs-12">
                                      <label for="material-text">Stage of patient</label>&nbsp;&nbsp;&nbsp;
                                            <label class="css-input css-radio css-radio-lg css-radio-primary m-r-sm">
                                              <input type="radio" name="radio-referstage" id="radio-referstage1" checked /><span></span> Stable
                                            </label>&nbsp;&nbsp;
                                            <label class="css-input css-radio css-radio-lg css-radio-warning">
                                              <input type="radio" name="radio-referstage" id="radio-referstage2" /><span></span> Unstable
                                            </label>&nbsp;&nbsp;
                                            <label class="css-input css-radio css-radio-lg css-radio-danger">
                                              <input type="radio" name="radio-referstage" id="radio-referstage3" /><span></span> Coma
                                            </label>
                                        </div>
                                  </div>

                                </div>
                                <!-- End referCondition -->
                                <h3 style="font-weight: 400; color: teal;">Demographic information</h3>

                                  <div class="form-group" style="padding-top: 30px;">
                                    <div class="col-sm-12">
                                        <div class="form-material">
                                            <input class="form-control" type="text" id="txt-pid" name="txt-pid" placeholder="Please enter patient's ID" readonly value="<?php print $_GET['pid']; ?>" />
                                            <label for="material-text">ID No, / Passport ID / Date of bitrh [YYMMDD] <span style="color: red;">**</span></label>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="text" id="txt-fname" name="txt-fname" placeholder="Please enter patient's first name..." value="" />
                                                <label for="material-text">First name <span style="color: red;">**</span></label>
                                            </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="text" id="txt-mname" name="txt-mname" placeholder="Enter middle name..." value=""/>
                                                <label for="material-text">Middle name</label>
                                            </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-sm-4">
                                      <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="text" id="txt-lname" name="txt-lname" placeholder="Enter last name..." value="" />
                                                <label for="material-text">Lastname</label>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- End row -->
                                  <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="form-material">
                                          <textarea class="form-control" name="txt-address" id="txt-address" rows="4" cols="40" placeholder="Enter patient's address..."></textarea>
                                          <label for="material-text">Address</label>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="form-material">
                                            <input class="form-control" type="text"  id="txt-phone" name="txt-phone" placeholder="Enter phone number..." value="" />
                                            <label for="material-text">Phone number</label>
                                        </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="js-datepicker form-control" type="text" id="txt-dob" name="txt-dob" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="">
                                                <label for="material-text">Date of birth</label>
                                            </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-sm-6">
                                      <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="form-material">
                                                <input class="form-control" type="text" id="txt-age" name="txt-age" placeholder="Please enter age of patient if system cannot calcuate automatically..." value="" />
                                                <label for="material-text">Age <span style="color: red;">**</span></label>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row narrow-gutter">
                                      <div class="col-xs-12 text-right">
                                          <button type="reset" class="btn btn-default">Cancel</button>
                                          <button type="submit" class="btn btn-app-teal">Save</button>
                                      </div>
                                      <div class="col-xs-6">

                                      </div>
                                  </div>
                              </div>
                            </div>
                            <!-- End card -->
                          </div>
                        </form>
                      </div>
                      <!-- End row -->
                  </div>


                </main>

            </div>
            <!-- .app-layout-container -->
        </div>
        <!-- .app-layout-canvas -->



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
       <script src="../library/sweetalert/dist/sweetalert.min.js"></script>
       <script src="../assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <script src="../dist/page/register/js/base_forms_validation.js"></script>
        <script src="../library/xpl/js/xpl.js"></script>

        <script src="../dist/page/register/js/geolocation.js" type="text/javascript"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAewI1LswH0coZUPDe8Pvy39j4sbxmgCZU" async defer></script>

        <script>
        $(function()
        {
            // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
            App.initHelpers(['datepicker']);
        });
        </script>

    </body>

</html>

<?php
function calcutateAge($dob){

        $dob = date("Y-m-d",strtotime($dob));

        $dobObject = new DateTime($dob);
        $nowObject = new DateTime();

        $diff = $dobObject->diff($nowObject);

        return $diff->y;

}
?>
