<?php
session_start();
include "../database/database.class.php";
include "../dist/function/session.inc.php";
include "../dist/function/checkuser.inc.php";
include "../dist/function/patientsession.inc.php";
include "../dist/function/patienthistoryinfo.inc.php";

$resultNB = false;
if(isset($_GET['nbid'])){
  $strSQL = sprintf("SELECT * FROM ".$tbprefix."outcome WHERE nb_no = '%s' and record_id = '%s'", mysql_real_escape_string($_GET['nbid']), mysql_real_escape_string($info['record_id']));
  $resultNB = $db->select($strSQL, false, true);

  if(!$resultNB){
    header('Location: add-newborn.php');
    exit();
    // print $strSQL;
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
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400" />

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
                        					Newborn charecteristics
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
                        <div class="col-sm-6 text-left">
                          <h3 style="margin-top: 0px;">Patient's ID : <?php print $_SESSION[$sessionName.'PID']; ?></h3>
                        </div>
                        <div class="col-sm-6 text-right">
                          <?php
                          if($resultNB){
                            ?>
                            <button type="button" class="btn btn-app-blue" onclick="xpl_custom_function.common_redirect('add-newborn.php')">Add new baby</button>
                            <?php
                          }
                          ?>
                          <button type="button" class="btn btn-app-red" onclick="xpl_custom_function.common_redirect('close_session.php')">Close session</button>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="card">
                            <ul class="nav nav-tabs" data-toggle="tabs">
                                <li class="active">
                                    <a href="#btabs-static-home">Baby list</a>
                                </li>

                                <?php
                                if($info['confirm_status']!=1){
                                  ?>
                                  <li >
                                    <a id="tab2" href="#btabs-static-profile">
                                      <?php
                                      if($resultNB){
                                        print '<i class="fa fa-search"></i> View newborn information';
                                      }else{
                                        print '<i class="fa fa-plus"></i> Add new baby form';
                                      }
                                      ?>
                                    </a>
                                  </li>
                                  <?php
                                }
                                ?>


                            </ul>
                            <div class="card-block tab-content">
                                <div class="tab-pane active" id="btabs-static-home">
                                  <h3>Newborn list</h3>
                                  <div class="table-responsive">
                                    <table class="table table-striped table-borderless">
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style="width: 50px;">#</th>
                                                    <th>Gender</th>
                                                    <th class="hidden-xs w-10 text-center">Alive</th>
                                                    <th class="hidden-xs w-10 text-center">Stillbirth</th>
                                                    <th class="hidden-xs w-20">Birth weight</th>
                                                    <th class="text-center" style="width: 100px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              <?php
                                              $strSQL = sprintf("SELECT * FROM ".$tbprefix."outcome WHERE record_id = '%s'", mysql_real_escape_string($info['record_id']));
                                              $result = $db->select($strSQL, false, true);

                                              if($result){
                                                $c = 1;
                                                foreach ($result as $value) {
                                                  ?>
                                                  <tr>
                                                      <td class="text-center"><?php print $c; ?></td>
                                                      <td>
                                                        <?php
                                                        switch ($value['gender']) {
                                                          case 'Male':
                                                            print 'Male';
                                                            break;

                                                          default:
                                                            print 'Female';
                                                            break;
                                                        }
                                                        ?>
                                                      </td>
                                                      <td class="hidden-xs text-center">
                                                        <?php
                                                        switch ($value['alive']) {
                                                          case '1':
                                                            print "Yes";
                                                            break;

                                                          default:
                                                            print "No";
                                                            break;
                                                        }
                                                        ?>
                                                      </td>
                                                      <td class="hidden-xs text-center">
                                                        <?php
                                                        switch ($value['stillbirth']) {
                                                          case '1':
                                                            print "Fresh";
                                                            break;
                                                          case '2':
                                                            print "Macerated";
                                                            break;
                                                          default:
                                                            print "-";
                                                            break;
                                                        }
                                                        ?>
                                                      </td>
                                                      <td class="hidden-xs">
                                                        <?php
                                                        print number_format($value['birth_wieght']);
                                                        ?>
                                                      </td>
                                                      <?php
                                                        if($info['confirm_status']!=1){
                                                          ?>
                                                          <td class="text-center">
                                                              <div class="btn-group">
                                                                <button class="btn btn-xs btn-app-teal" type="button" data-toggle="tooltip" title="Edit info" onclick="xpl_custom_function.common_redirect('add-newborn.php?nbid=<?php print $value['nb_no'];?>')"><i class="ion-edit"></i></button>
                                                                <button class="btn btn-xs btn-app-teal" type="button" data-toggle="tooltip" title="Delete this baby" onclick="xpl_custom_function.confirm_redirect('controller/delete-newborn.php?nbid=<?php print $value['nb_no'];?>')"><i class="ion-close"></i></button>
                                                              </div>
                                                          </td>
                                                          <?php
                                                        }
                                                      ?>

                                                  </tr>
                                                  <?php
                                                  $c++;
                                                }
                                              }else{
                                                ?>
                                                <tr>
                                                  <td colspan="6">
                                                    No data found!
                                                  </td>
                                                </tr>
                                                <?php
                                              }
                                              ?>
                                              </tbody>
                                            </table>
                                  </div>
                                </div>
                                <?php
                                if($info['confirm_status']!=1){
                                  ?>
                                  <div class="tab-pane" id="btabs-static-profile">
                                    <?php include "page/insert-outcome.php"; ?>
                                  </div>
                                  <?php
                                }
                                ?>

                            </div>
                          </div>
                          <!-- End Card Tabs Default Style -->
                        </div>
                        <!-- End col-sm-12 -->

                      </div>
                      <!-- End row -->
                  </div>


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
        <script src="../dist/page/newborn/js/base_forms_validation.js"></script>
        <script src="../dist/page/newborn/js/custom-code.js"></script>
        <script src="../dist/plugin/js/facility.js"></script>
        <script src="../library/xpl/js/xpl.js"></script>
        <script>

        $(function()
        {
            // Init page helpers (BS Datepicker + BS Colorpicker + Select2 + Masked Input + Tags Inputs plugins)
            App.initHelpers(['datepicker']);
        });
        </script>

    </body>

</html>
