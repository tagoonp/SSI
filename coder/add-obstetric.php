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
        <link rel="stylesheet" href="../assets/js/plugins/slick/slick.min.css" />
        <link rel="stylesheet" href="../assets/js/plugins/slick/slick-theme.min.css" />
        <link rel="stylesheet" href="../assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css" />

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
                        					Obstetric information
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
                <!-- <link rel="stylesheet" href="https://twitter.github.io/typeahead.js/css/examples.css"> -->
                <?php
                if($result){
                  if($resultCheck[0]['confirm_status']==1){
                    include "page/view-obstetric.php";
                  }else{
                    include "page/update-obstetric.php";
                  }
                }else{
                  include "page/insert-obstetric.php";
                }
                ?>

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
        <!-- <script src="../dist/page/obstetric/js/base_forms_validation.js"></script> -->
        <script src="../dist/page/obstetric/js/custom-code.js"></script>
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

<?php
function calcutateAge($dob){

        $dob = date("Y-m-d",strtotime($dob));

        $dobObject = new DateTime($dob);
        $nowObject = new DateTime();

        $diff = $dobObject->diff($nowObject);

        return $diff->y;

}
?>
