<?php
session_start();
include "../database/database.class.php";
include "../dist/function/session.inc.php";
include "../dist/function/checkuser.inc.php";
include "../dist/function/patientsession.inc.php";
include "../dist/function/patienthistoryinfo-2.inc.php";

$strSQL = sprintf("SELECT * FROM ".$tbprefix."registerrecord WHERE record_id = '%s'", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
$resultCheck = $db->select($strSQL, false, true);

$strSQL = sprintf("SELECT * FROM ".$tbprefix."obstetric WHERE record_id = '%s'", mysql_real_escape_string($_SESSION[$sessionName.'PID']));
$result = $db->select($strSQL, false, true);

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

        <!-- AppUI CSS stylesheets -->
        <link rel="stylesheet" id="css-font-awesome" href="../assets/css/font-awesome.css" />
        <link rel="stylesheet" id="css-ionicons" href="../assets/css/ionicons.css" />
        <link rel="stylesheet" id="css-bootstrap" href="../assets/css/bootstrap.css" />
        <link rel="stylesheet" href="../assets/js/plugins/select2/select2.min.css" />
        <link rel="stylesheet" href="../assets/js/plugins/select2/select2-bootstrap.css" />
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
                        <?php include "componants/menu-3.php"; ?>
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
                        					Add note for this case
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
                  <div class="container-fluid p-y-md">
                    <div class="row">
                      <div class="col-sm-6 text-left">
                        <h3 style="margin-top: 0px;">Patient's ID : <?php print $_SESSION[$sessionName.'PID']; ?></h3>
                      </div>
                      <div class="col-sm-6 text-right">
                        <button type="button" class="btn btn-app-red" onclick="xpl_custom_function.common_redirect('close_session.php')">Close session</button>
                      </div>
                    </div>

                    <div class="row" style="padding-top: 15px;">
                      <div class="col-sm-12 col-lg-12">
                        <!-- Message List -->
                          <div class="card">
                            <div class="card-header bg-orange bg-inverse">
                                <div class="h4">Note form</div>
                                <ul class="card-actions">
                                    <li>
                                        <button type="button" data-toggle="card-action" data-action="fullscreen_toggle"></button>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-block">
                              <form class="js-validation-note form-horizontal m-t-sm" action="controller/insert-note.php" method="post">
                                <div class="form-group" style="display:none;">
                                  <div class="col-sm-12">
                                      <div class="form-material">
                                          <input class="form-control" type="text" id="txt-recordid" name="txt-recordid" value="<?php print $_SESSION[$sessionName.'PID']; ?>" />
                                          <label for="material-text">ID </label></label>
                                      </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="form-material">
                                            <textarea class="form-control" name="txt-note" id="txt-note" rows="4" cols="40" placeholder="Insert note here.."></textarea>
                                            <label for="val-username2" style="font-size: 1.2em;">Note <span style="color:red;">**</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row narrow-gutter">
                                    <div class="col-xs-12 text-right">
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                        <button type="submit" class="btn btn-app-teal">Save</button>
                                    </div>
                                </div>
                              </form>
                            </div>
                            <!-- End card-block -->
                          </div>
                        <!-- End card -->
                      </div>
                      <!-- End col-sm,-12 -->
                    </div>
                      <!-- End row -->
                    <div class="row">
                      <div class="col-sm-12 col-lg-12">
                        <!-- Message List -->
                        <div class="card">
                            <div class="card-header bg-blue bg-inverse">
                                <div class="h4">Note history</div>
                                <ul class="card-actions">
                                    <li>
                                        <button type="button" data-toggle="card-action" data-action="fullscreen_toggle"></button>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-block">
                                <div class="pull-r-l">
                                    <table class="js-table-checkable table table-hover table-vcenter m-b-0">
                                      <thead>
                                        <tr>
                                          <th class="text-center">
                                            #
                                          </th>
                                          <th>
                                            Message / Note
                                          </th>
                                          <th>
                                            Note date
                                          </th>
                                        </tr>
                                      </thead>
                                        <tbody>
                                          <?php
                                          $strSQL = "SELECT * FROM ".$tbprefix."note WHERE record_id = '".$_SESSION[$sessionName.'PID']."' ORDER BY note_id DESC";
                                          $resultNote = $db->select($strSQL,false,true);
                                          if(!$resultNote){
                                            ?>
                                            <tr>
                                                <td colspan="4">
                                                    No message found...
                                                </td>
                                            </tr>
                                            <?php
                                          }else{
                                            $c = 1;
                                            foreach($resultNote as $value){
                                              ?>
                                              <tr>
                                                  <td class="text-center">
                                                    <?php print $c; ?>
                                                  </td>
                                                  <td>
                                                      <span class="font-500"><?php print $value['note_msg']; ?></span>
                                                      <div class="text-muted">By: <?php print $value['note_by']; ?></div>
                                                  </td>
                                                  <td class="visible-lg text-muted w-15">
                                                      <em><?php print $value['note_date'] ?></em>
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
                                <!-- End Messages -->
                            </div>
                            <!-- .card-block -->
                        </div>
                        <!-- .card -->
                        <!-- End Message List -->
                      </div>
                      <!-- .col-sm-7 -->
                    </div>
                    <!-- End row -->
                  </div>
                  <!-- End container -->
                </main>


            </div>
            <!-- .app-layout-container -->
        </div>
        <!-- .app-layout-canvas -->
        <div class="app-ui-mask-modal"></div>

        <!-- Apps Modal -->
        <?php
        include "componants/medal.php";
        ?>


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
        <script src="../dist/page/note/js/base_forms_validation.js"></script>
        <script src="../dist/page/note/js/custom-code.js"></script>
        <script src="../library/xpl/js/xpl.js"></script>

    </body>

</html>
