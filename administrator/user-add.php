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
                          <button type="button" name="button" class="btn btn-app-green" onclick="changepage('users.php')"><i class="fa fa-bars"></i> User list</button>
                        </div>
                      </div>

                      <div class="row" style="padding-top: 10px;">
                        <div class="col-sm-12 col-lg-12">
                          <div class="card">
                              <div class="card-header bg-blue bg-inverse">
                                  <h4>Add new user</h4>
                              </div>
                              <div class="card-block">
                                <form class="js-validation-material form-horizontal m-t-sm" action="controller/user-insert.php" method="post">
                                <div class="row">
                                  <div class="col-sm-8">
                                      <h3 style="margin-top: 10px;">User information</h3>
                                      <div class="row" style="padding-top: 10px;">
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                              <div class="col-xs-12">
                                                  <div class="form-material">
                                                      <input class="form-control" type="text" id="txt-fname" name="txt-fname" placeholder="Enter name of user..." />
                                                      <label for="register5-firstname">Fistname <span style="color:red;">**</span></label>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                              <div class="col-xs-12">
                                                  <div class="form-material">
                                                      <input class="form-control" type="text" id="txt-lname" name="txt-lname" placeholder="Enter surname of user.." />
                                                      <label for="register5-firstname">Surname </label>
                                                  </div>
                                              </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                          <div class="col-xs-12">
                                              <div class="form-material">
                                                  <input class="form-control" type="text" id="txt-email" name="txt-email" placeholder="Enter user's email address..." />
                                                  <label for="register5-firstname">Email address </label>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <div class="col-xs-12">
                                              <div class="form-material">
                                                  <input class="form-control" type="text" id="txt-phone" name="txt-phone" placeholder="Enter user's phone number..." />
                                                  <label for="register5-firstname">Phone number</label>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-xs-12">
                                          <div class="form-material">
                                              <textarea class="form-control" name="txt-address" id="txt-address" rows="4" placeholder="Enter user address.."></textarea>
                                              <label for="contact2-msg">Address</label>
                                          </div>
                                        </div>
                                      </div>



                                      <div class="form-group">
                                        <div class="col-xs-12">
                                            <div class="form-material">
                                                <select class="form-control" id="txt-institute" name="txt-institute" size="1">
                                                  <option value="" selected="">--- Choose institute ---</option>
                                                  <?php
                                                  $strSQL = sprintf("SELECT * FROM fmn1_institute WHERE institute_status = '1' ORDER BY institute_name ");
                                                  $resultInst = $db->select($strSQL,false,true);
                                                  if($resultInst){
                                                    foreach ($resultInst as $value) {
                                                      ?>
                                                      <option value="<?php print $value['institute_id'];?>"><?php print "[ ".$value['institute_id']." ] ".$value['institute_name'];?></option>
                                                      <?php
                                                    }
                                                  }
                                                  ?>
                                                </select>
                                                <label for="contact2-subject">Institute <span style="color:red;">**</span></label>
                                            </div>
                                        </div>
                                      </div>
                                  </div>
                                  <!-- .col-sm-6 -->

                                  <div class="col-sm-4">
                                    <h3 style="margin-top: 10px;">User account</h3>
                                    <div class="form-group" style="padding-top: 10px;">
                                        <div class="col-xs-12">
                                            <div class="form-material">
                                                <input class="form-control" type="text" id="txt-username" name="txt-username" placeholder="Enter name of institute or hospital..." />
                                                <label for="register5-firstname">Username <span style="color:red;">**</span></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <div class="form-material">
                                                <input class="form-control" type="password" id="txt-password1" name="txt-password1" placeholder="Enter name of institute or hospital..." />
                                                <label for="register5-firstname">Password <span style="color:red;">**</span></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <div class="form-material">
                                                <input class="form-control" type="password" id="txt-password2" name="txt-password2" placeholder="Enter name of institute or hospital..." />
                                                <label for="register5-firstname">Re-enter password <span style="color:red;">**</span></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                      <div class="col-xs-12">
                                          <div class="form-material">
                                              <select class="form-control" id="txt-usertype" name="txt-usertype" size="1">
                                                <option value="" selected="">--- Choose user type ---</option>
                                                <?php
                                                $strSQL = sprintf("SELECT * FROM fmn1_usertype WHERE user_type_id != 1 ORDER BY user_type_id ");
                                                $resultType = $db->select($strSQL,false,true);
                                                if($resultType){
                                                  foreach ($resultType as $value) {
                                                    ?>
                                                    <option value="<?php print $value['user_type_id'];?>"><?php print "[ ".$value['user_type_id']." ] ".$value['user_type_description'];?></option>
                                                    <?php
                                                  }
                                                }
                                                ?>
                                              </select>
                                              <label for="contact2-subject">User type <span style="color:red;">**</span></label>
                                          </div>
                                      </div>
                                    </div>

                                  </div>
                                  <div class="col-sm-12">
                                    <div class="form-group m-b-0">
                                              <div class="col-xs-12">
                                                  <button class="btn btn-app-teal" type="submit">Save</button>
                                                  <button class="btn btn-app-light" type="reset">Reset</button>
                                              </div>
                                          </div>
                                  </div>
                                  <!-- .col-sm-6 -->
                                </div>
                                <!-- .row -->
                                </form>
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
        <script src="js/account_forms_validation.js"></script>
      </body>

</html>
