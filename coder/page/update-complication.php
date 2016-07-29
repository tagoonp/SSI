<?php
//Check prolong rupture membrane
$prm = false; $resultOutcome_prm = false; $resultOutcome_prm2 = false;
$strSQL = sprintf("SELECT * FROM ".$tbprefix."%s WHERE record_id = '%s' and duration_active_phase > '24' ",
      mysql_real_escape_string("obstetric"),
      mysql_real_escape_string($info['record_id'])
      );
$resultOutcome_prm = $db->select($strSQL,false,true);
if($resultOutcome_prm){
    $prm = true;
}else{
    $strSQL = sprintf("SELECT * FROM ".$tbprefix."%s WHERE record_id = '%s' and prl = '1' ",
        mysql_real_escape_string("complication_delivery"),
        mysql_real_escape_string($info['record_id'])
        );
    $resultOutcome_prm2 = $db->select($strSQL,false,true);
    if($resultOutcome_prm2){
      $prm = true;
    }
}

//Check maternal death
$md = false; $resultOutcome_md = false; $resultOutcome_md2 = false;
$strSQL = sprintf("SELECT * FROM ".$tbprefix."%s WHERE record_id = '%s' and mater_sep_death = '1' ",
      mysql_real_escape_string("delivery"),
      mysql_real_escape_string($info['record_id'])
      );
$resultOutcome_md = $db->select($strSQL,false,true);
if($resultOutcome_md){
    $md = true;
}else{
    $strSQL = sprintf("SELECT * FROM ".$tbprefix."%s WHERE record_id = '%s' and md = '1' ",
        mysql_real_escape_string("complication_delivery"),
        mysql_real_escape_string($info['record_id'])
        );
    $resultOutcome_md2 = $db->select($strSQL,false,true);
    if($resultOutcome_md2){
      $md = true;
    }
}

//Check newborn neonatal
$neo = false; $resultOutcome_neo = false; $resultOutcome_neo2 = false;
$strSQL = sprintf("SELECT * FROM ".$tbprefix."%s WHERE record_id = '%s' and (nb_neonatal = '1' or nb_neonatal7 = '1') ",
      mysql_real_escape_string("outcome"),
      mysql_real_escape_string($info['record_id'])
      );
$resultOutcome_neo = $db->select($strSQL,false,true);
if($resultOutcome_neo){
    $neo = true;
}else{
    $strSQL = sprintf("SELECT * FROM ".$tbprefix."%s WHERE record_id = '%s' and neo = '1' ",
        mysql_real_escape_string("complication_delivery"),
        mysql_real_escape_string($info['record_id'])
        );
    $resultOutcome_neo2 = $db->select($strSQL,false,true);
    if($resultOutcome_neo2){
      $neo = true;
    }
}

// Check stillbirth
$still = false; $resultOutcome_still = false; $resultOutcome_still2 = false;
$strSQL = sprintf("SELECT * FROM ".$tbprefix."%s WHERE record_id = '%s' and alive = '0' ",
		  mysql_real_escape_string("outcome"),
		  mysql_real_escape_string($info['record_id'])
		  );
$resultOutcome_still = $db->select($strSQL,false,true);
if($resultOutcome_still){
    $still = true;
}else{
    $strSQL = sprintf("SELECT * FROM ".$tbprefix."%s WHERE record_id = '%s' and stil = '1' ",
        mysql_real_escape_string("complication_delivery"),
        mysql_real_escape_string($info['record_id'])
        );
    $resultOutcome_still2 = $db->select($strSQL,false,true);
    if($resultOutcome_still2){
      $still = true;
    }
}

//Check newborn preterm
$pt = false;
$strSQL = sprintf("SELECT * FROM ".$tbprefix."%s WHERE record_id = '%s' and ga_del < '37' ",
		  mysql_real_escape_string("delivery"),
		  mysql_real_escape_string($info['record_id'])
		  );
$resultOutcome_pt = $db->select($strSQL,false,true);
if($resultOutcome_pt){
    $pt = true;
}else{
    $strSQL = sprintf("SELECT * FROM ".$tbprefix."%s WHERE record_id = '%s' and pret = '1' ",
        mysql_real_escape_string("complication_delivery"),
        mysql_real_escape_string($info['record_id'])
        );
    $resultOutcome_pt2 = $db->select($strSQL,false,true);
    if($resultOutcome_pt2){
      $pt = true;
    }
}

//Check newborn low birth weight remark
$lwb = false; $resultOutcome_lbw = false; $resultOutcome_lbw2 = false;
$strSQL = sprintf("SELECT * FROM ".$tbprefix."%s WHERE record_id = '%s' and birth_wieght < '2500'",
     mysql_real_escape_string("outcome"),
     mysql_real_escape_string($info['record_id'])
     );
$resultOutcome_lbw = $db->select($strSQL,false,true);
if($resultOutcome_lbw){
   $lwb = true;
}else{
   $strSQL = sprintf("SELECT * FROM ".$tbprefix."%s WHERE record_id = '%s' and lbw = '1' ",
       mysql_real_escape_string("complication_delivery"),
       mysql_real_escape_string($info['record_id'])
       );
   $resultOutcome_lbw2 = $db->select($strSQL,false,true);
   if($resultOutcome_lbw2){
     $lbw = true;
   }
}

$il = false; $ah = false; $AP = false; $PP = false; $ph = false; $spe = false; $ecl = false;  $rup = false; $sep = false; $opl = false; $ret = false; $mrp = false;


$strSQL = sprintf("SELECT
      il, ah, AP, PP, ph, spe, ecl, rup, sep, opl, ret, mrp
      FROM ".$tbprefix."%s WHERE record_id = '%s'",
      mysql_real_escape_string("complication_delivery"),
      mysql_real_escape_string($info['record_id'])
      );
$resultCom = $db->select($strSQL,false,true);
if($resultCom){
    if($resultCom[0]['il']==1){ $il = true; }
    if($resultCom[0]['ah']==1){ $ah = true; }
    if($resultCom[0]['AP']==1){ $AP = true; }
    if($resultCom[0]['PP']==1){ $PP = true; }
    if($resultCom[0]['ph']==1){ $ph = true; }
    if($resultCom[0]['spe']==1){ $spe = true; }
    if($resultCom[0]['ecl']==1){ $ecl = true; }
    if($resultCom[0]['rup']==1){ $rup = true; }
    if($resultCom[0]['sep']==1){ $sep = true; }
    if($resultCom[0]['opl']==1){ $opl = true; }
    if($resultCom[0]['ret']==1){ $ret = true; }
    if($resultCom[0]['mrp']==1){ $mrp = true; }
}

?>

<main class="app-layout-content">

  <!-- Page Content -->
  <div class="container-fluid p-y-md">
      <!-- Stats -->
      <div class="row">
        <div class="col-sm-6 text-left">
          <h3 style="margin-top: 0px;">Patient's ID : <?php print $_SESSION[$sessionName.'PID']; ?></h3>
        </div>
        <div class="col-sm-6 text-right">
          <button type="button" class="btn btn-app-red" onclick="xpl_custom_function.common_redirect('close_session.php')">Close session</button>
        </div>
      </div>
      <div class="row">
        <form class="form-horizontal m-t-sm"  method="post" action="controller/insert-complication.php">
          <div class="col-xs-12">
            <!-- Add card -->
            <div class="card">
              <div class="card-header bg-teal bg-inverse">
                  <h4>Complications in labour / delivery</h4>
              </div>
              <div class="card-block" style="padding-top: 30px;">
                <div class="row">
                  <div class="col-sm-12">
                     <div class="table-responsive">
                       <table class="table table-striped table-bordered">
                         <thead>
                           <tr>
                             <th>
                               Complication
                             </td>
                             <th class="col-sm-4">
                               Status
                             </td>
                             <th>
                               Remark
                             </td>
                           </tr>
                         </thead>
                         <tbody>
                           <tr>
                             <td>
                               Induction of labour
                             </td>
                             <td>
                               <?php
                                 if($info['confirm_status']==1){
                                   if($il){
                                     ?>
                                     <span class="label label-success" style="font-size: 0.8em;">Yes</span>
                                     <div class="" style="display:none;">
                                       <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                         <input type="radio" name="radio-induc" id="radio-induc1" value="0"  checked /><span></span> No
                                       </label>&nbsp;&nbsp;
                                       <label class="css-input css-radio css-radio-lg css-radio-success">
                                         <input type="radio" name="radio-induc" id="radio-induc2" value="1" <?php if($il){ print "checked"; } ?> /><span></span> Yes
                                       </label>
                                     </div>
                                     <?php
                                   }else{
                                     ?>
                                     <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                       <input type="radio" name="radio-induc" id="radio-induc1" value="0"  checked /><span></span> No
                                     </label>&nbsp;&nbsp;
                                     <label class="css-input css-radio css-radio-lg css-radio-success">
                                       <input type="radio" name="radio-induc" id="radio-induc2" value="1" <?php if($il){ print "checked"; } ?> /><span></span> Yes
                                     </label>
                                     <?php
                                   }
                                 }else{
                                   ?>
                                   <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                     <input type="radio" name="radio-induc" id="radio-induc1" value="0"  checked /><span></span> No
                                   </label>&nbsp;&nbsp;
                                   <label class="css-input css-radio css-radio-lg css-radio-success">
                                     <input type="radio" name="radio-induc" id="radio-induc2" value="1" <?php if($il){ print "checked"; } ?> /><span></span> Yes
                                   </label>
                                   <?php
                                 }
                               ?>


                             </td>
                             <td>
                               -
                             </td>
                           </tr>
                           <tr>
                             <td>
                               Antepartum haemorrhage
                             </td>
                             <td>
                               <?php
                                 if($info['confirm_status']==1){
                                   if($ah){
                                     ?>
                                     <span class="label label-success" style="font-size: 0.8em;">Yes</span>
                                     <div class="" style="display:none;">
                                       <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                         <input type="radio" name="radio-ante" id="radio-ante1" value="0" onclick="toggle_value('radio-ante', 0);" checked /><span></span> No
                                       </label>&nbsp;&nbsp;
                                       <label class="css-input css-radio css-radio-lg css-radio-success">
                                         <input type="radio" name="radio-ante" id="radio-ante2" value="1" onclick="toggle_value('radio-ante', 1);" <?php if($ah){ print "checked"; } ?> /><span></span> Yes
                                       </label>
                                     </div>
                                     <?php
                                   }else{
                                     ?>
                                     <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                       <input type="radio" name="radio-ante" id="radio-ante1" value="0" onclick="toggle_value('radio-ante', 0);" checked /><span></span> No
                                     </label>&nbsp;&nbsp;
                                     <label class="css-input css-radio css-radio-lg css-radio-success">
                                       <input type="radio" name="radio-ante" id="radio-ante2" value="1" onclick="toggle_value('radio-ante', 1);" <?php if($ah){ print "checked"; } ?> /><span></span> Yes
                                     </label>
                                     <?php
                                   }
                                 }else{
                                   ?>
                                   <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                     <input type="radio" name="radio-ante" id="radio-ante1" value="0" onclick="toggle_value('radio-ante', 0);" checked /><span></span> No
                                   </label>&nbsp;&nbsp;
                                   <label class="css-input css-radio css-radio-lg css-radio-success">
                                     <input type="radio" name="radio-ante" id="radio-ante2" value="1" onclick="toggle_value('radio-ante', 1);" <?php if($ah){ print "checked"; } ?> /><span></span> Yes
                                   </label>
                                   <?php
                                 }
                               ?>

                             </td>
                             <td>
                               -
                             </td>
                           </tr>

                           <tr class="anteOption" style="display:<?php if(!$ah){ print "none"; } ?>;">
                             <td>
                               AP : Abruptio placenta
                             </td>
                             <td>
                               <?php
                                 if($info['confirm_status']==1){
                                   if($AP){
                                     ?>
                                     <span class="label label-success" style="font-size: 0.8em;">Yes</span>
                                     <div class="" style="display:none;">
                                       <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                         <input type="radio" name="radio-ap" id="radio-ap1" value="0"  checked /><span></span> No
                                       </label>&nbsp;&nbsp;
                                       <label class="css-input css-radio css-radio-lg css-radio-success">
                                         <input type="radio" name="radio-ap" id="radio-ap2" value="1" <?php if($AP){ print "checked"; } ?> /><span></span> Yes
                                       </label>
                                     </div>
                                     <?php
                                   }else{
                                     ?>
                                     <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                       <input type="radio" name="radio-ap" id="radio-ap1" value="0"  checked /><span></span> No
                                     </label>&nbsp;&nbsp;
                                     <label class="css-input css-radio css-radio-lg css-radio-success">
                                       <input type="radio" name="radio-ap" id="radio-ap2" value="1" <?php if($AP){ print "checked"; } ?> /><span></span> Yes
                                     </label>
                                     <?php
                                   }
                                 }else{
                                   ?>
                                   <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                     <input type="radio" name="radio-ap" id="radio-ap1" value="0"  checked /><span></span> No
                                   </label>&nbsp;&nbsp;
                                   <label class="css-input css-radio css-radio-lg css-radio-success">
                                     <input type="radio" name="radio-ap" id="radio-ap2" value="1" <?php if($AP){ print "checked"; } ?> /><span></span> Yes
                                   </label>
                                   <?php
                                 }
                               ?>

                             </td>
                             <td>
                               -
                             </td>
                           </tr>

                           <tr class="anteOption" style="display:<?php if(!$ah){ print "none"; } ?>;">
                             <td>
                               PP : Placenta previa
                             </td>
                             <td>
                               <?php
                                 if($info['confirm_status']==1){
                                   if($PP){
                                     ?>
                                     <span class="label label-success" style="font-size: 0.8em;">Yes</span>
                                     <div class="" style="display:none;">
                                       <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                         <input type="radio" name="radio-pp" id="radio-pp1" value="0"  checked /><span></span> No
                                       </label>&nbsp;&nbsp;
                                       <label class="css-input css-radio css-radio-lg css-radio-success">
                                         <input type="radio" name="radio-pp" id="radio-pp2" value="1"  <?php if($PP){ print "checked"; } ?> /><span></span> Yes
                                       </label>
                                     </div>
                                     <?php
                                   }else{
                                     ?>
                                     <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                       <input type="radio" name="radio-pp" id="radio-pp1" value="0"  checked /><span></span> No
                                     </label>&nbsp;&nbsp;
                                     <label class="css-input css-radio css-radio-lg css-radio-success">
                                       <input type="radio" name="radio-pp" id="radio-pp2" value="1"  <?php if($PP){ print "checked"; } ?> /><span></span> Yes
                                     </label>
                                     <?php
                                   }
                                 }else{
                                   ?>
                                   <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                     <input type="radio" name="radio-pp" id="radio-pp1" value="0"  checked /><span></span> No
                                   </label>&nbsp;&nbsp;
                                   <label class="css-input css-radio css-radio-lg css-radio-success">
                                     <input type="radio" name="radio-pp" id="radio-pp2" value="1"  <?php if($PP){ print "checked"; } ?> /><span></span> Yes
                                   </label>
                                   <?php
                                 }
                               ?>

                             </td>
                             <td>
                               -
                             </td>
                           </tr>

                           <tr>
                             <td>
                               Postpartum haemorrhage
                             </td>
                             <td>
                               <?php
                                 if($info['confirm_status']==1){
                                   if($ph){
                                     ?>
                                     <span class="label label-success" style="font-size: 0.8em;">Yes</span>
                                     <div class="" style="display:none;">
                                       <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                         <input type="radio" name="radio-post" id="radio-post1" value="0"  checked /><span></span> No
                                       </label>&nbsp;&nbsp;
                                       <label class="css-input css-radio css-radio-lg css-radio-success">
                                         <input type="radio" name="radio-post" id="radio-post2" value="1"  <?php if($ph){ print "checked"; } ?> /><span></span> Yes
                                       </label>
                                     </div>
                                     <?php
                                   }else{
                                     ?>
                                     <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                       <input type="radio" name="radio-post" id="radio-post1" value="0"  checked /><span></span> No
                                     </label>&nbsp;&nbsp;
                                     <label class="css-input css-radio css-radio-lg css-radio-success">
                                       <input type="radio" name="radio-post" id="radio-post2" value="1"  <?php if($ph){ print "checked"; } ?> /><span></span> Yes
                                     </label>
                                     <?php
                                   }
                                 }else{
                                   ?>
                                   <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                     <input type="radio" name="radio-post" id="radio-post1" value="0"  checked /><span></span> No
                                   </label>&nbsp;&nbsp;
                                   <label class="css-input css-radio css-radio-lg css-radio-success">
                                     <input type="radio" name="radio-post" id="radio-post2" value="1"  <?php if($ph){ print "checked"; } ?> /><span></span> Yes
                                   </label>
                                   <?php
                                 }
                               ?>

                             </td>
                             <td>
                               -
                             </td>
                           </tr>
                           <tr>
                             <td>
                               Severe pre eclampsia
                             </td>
                             <td>
                               <?php
                                 if($info['confirm_status']==1){
                                   if($sep){
                                     ?>
                                     <span class="label label-success" style="font-size: 0.8em;">Yes</span>
                                     <div class="" style="display:none;">
                                       <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                         <input type="radio" name="radio-spe" id="radio-eclm1" value="0"  checked /><span></span> No
                                       </label>&nbsp;&nbsp;
                                       <label class="css-input css-radio css-radio-lg css-radio-success">
                                         <input type="radio" name="radio-spe" id="radio-eclm2" value="1"  <?php if($sep){ print "checked"; } ?> /><span></span> Yes
                                       </label>
                                     </div>
                                     <?php
                                   }else{
                                     ?>
                                     <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                       <input type="radio" name="radio-spe" id="radio-eclm1" value="0"  checked /><span></span> No
                                     </label>&nbsp;&nbsp;
                                     <label class="css-input css-radio css-radio-lg css-radio-success">
                                       <input type="radio" name="radio-spe" id="radio-eclm2" value="1"  <?php if($sep){ print "checked"; } ?> /><span></span> Yes
                                     </label>
                                     <?php
                                   }
                                 }else{
                                   ?>
                                   <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                     <input type="radio" name="radio-spe" id="radio-eclm1" value="0"  checked /><span></span> No
                                   </label>&nbsp;&nbsp;
                                   <label class="css-input css-radio css-radio-lg css-radio-success">
                                     <input type="radio" name="radio-spe" id="radio-eclm2" value="1"  <?php if($sep){ print "checked"; } ?> /><span></span> Yes
                                   </label>
                                   <?php
                                 }
                               ?>

                             </td>
                             <td>
                               -
                             </td>
                           </tr>
                           <tr>
                             <td>
                               Eclampsia
                             </td>
                             <td>
                               <?php
                                 if($info['confirm_status']==1){
                                   if($ecl){
                                     ?>
                                     <span class="label label-success" style="font-size: 0.8em;">Yes</span>
                                     <div class="" style="display:none;">
                                       <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                         <input type="radio" name="radio-eclm" id="radio-eclm1" value="0"  checked /><span></span> No
                                       </label>&nbsp;&nbsp;
                                       <label class="css-input css-radio css-radio-lg css-radio-success">
                                         <input type="radio" name="radio-eclm" id="radio-eclm2" value="1"  <?php if($ecl){ print "checked"; } ?> /><span></span> Yes
                                       </label>
                                     </div>
                                     <?php
                                   }else{
                                     ?>
                                     <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                       <input type="radio" name="radio-eclm" id="radio-eclm1" value="0"  checked /><span></span> No
                                     </label>&nbsp;&nbsp;
                                     <label class="css-input css-radio css-radio-lg css-radio-success">
                                       <input type="radio" name="radio-eclm" id="radio-eclm2" value="1"  <?php if($ecl){ print "checked"; } ?> /><span></span> Yes
                                     </label>
                                     <?php
                                   }
                                 }else{
                                   ?>
                                   <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                     <input type="radio" name="radio-eclm" id="radio-eclm1" value="0"  checked /><span></span> No
                                   </label>&nbsp;&nbsp;
                                   <label class="css-input css-radio css-radio-lg css-radio-success">
                                     <input type="radio" name="radio-eclm" id="radio-eclm2" value="1"  <?php if($ecl){ print "checked"; } ?> /><span></span> Yes
                                   </label>
                                   <?php
                                 }
                               ?>


                             </td>
                             <td>
                               -
                             </td>
                           </tr>
                           <tr>
                             <td>
                               Prolonged rupture of membranes
                             </td>
                             <td>
                               <?php
                                 if($info['confirm_status']==1){
                                   if($prm){
                                     ?>
                                     <span class="label label-success" style="font-size: 0.8em;">Yes</span>
                                     <div class="" style="display:none;">
                                       <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                         <input type="radio" name="radio-prm" id="radio-prm1" value="0"  checked /><span></span> No
                                       </label>&nbsp;&nbsp;
                                       <label class="css-input css-radio css-radio-lg css-radio-success">
                                         <input type="radio" name="radio-prm" id="radio-prm2" value="1"  <?php if($prm){ print "checked"; } ?> /><span></span> Yes
                                       </label>
                                     </div>
                                     <?php
                                   }else{
                                     ?>
                                     <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                       <input type="radio" name="radio-prm" id="radio-prm1" value="0"  checked /><span></span> No
                                     </label>&nbsp;&nbsp;
                                     <label class="css-input css-radio css-radio-lg css-radio-success">
                                       <input type="radio" name="radio-prm" id="radio-prm2" value="1"  <?php if($prm){ print "checked"; } ?> /><span></span> Yes
                                     </label>
                                     <?php
                                   }
                                 }else{
                                   ?>
                                   <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                     <input type="radio" name="radio-prm" id="radio-prm1" value="0"  checked /><span></span> No
                                   </label>&nbsp;&nbsp;
                                   <label class="css-input css-radio css-radio-lg css-radio-success">
                                     <input type="radio" name="radio-prm" id="radio-prm2" value="1"  <?php if($prm){ print "checked"; } ?> /><span></span> Yes
                                   </label>
                                   <?php
                                 }
                               ?>


                             </td>
                             <td>
                               -
                             </td>
                           </tr>
                           <tr>
                             <td>
                               Ruptured uterus
                             </td>
                             <td>
                               <?php
                                 if($info['confirm_status']==1){
                                   if($rup){
                                     ?>
                                     <span class="label label-success" style="font-size: 0.8em;">Yes</span>
                                     <div class="" style="display:none;">
                                       <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                         <input type="radio" name="radio-rup" id="radio-rup1" value="0"  checked /><span></span> No
                                       </label>&nbsp;&nbsp;
                                       <label class="css-input css-radio css-radio-lg css-radio-success">
                                         <input type="radio" name="radio-rup" id="radio-rup2" value="1"  <?php if($rup){ print "checked"; } ?> /><span></span> Yes
                                       </label>
                                     </div>
                                     <?php
                                   }else{
                                     ?>
                                     <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                       <input type="radio" name="radio-rup" id="radio-rup1" value="0"  checked /><span></span> No
                                     </label>&nbsp;&nbsp;
                                     <label class="css-input css-radio css-radio-lg css-radio-success">
                                       <input type="radio" name="radio-rup" id="radio-rup2" value="1"  <?php if($rup){ print "checked"; } ?> /><span></span> Yes
                                     </label>
                                     <?php
                                   }
                                 }else{
                                   ?>
                                   <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                     <input type="radio" name="radio-rup" id="radio-rup1" value="0"  checked /><span></span> No
                                   </label>&nbsp;&nbsp;
                                   <label class="css-input css-radio css-radio-lg css-radio-success">
                                     <input type="radio" name="radio-rup" id="radio-rup2" value="1"  <?php if($rup){ print "checked"; } ?> /><span></span> Yes
                                   </label>
                                   <?php
                                 }
                               ?>

                             </td>
                             <td>
                               -
                             </td>
                           </tr>
                           <tr>
                             <td>
                               Sepsis
                             </td>
                             <td>
                               <?php
                                 if($info['confirm_status']==1){
                                   if($sep){
                                     ?>
                                     <span class="label label-success" style="font-size: 0.8em;">Yes</span>
                                     <div class="" style="display:none;">
                                       <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                         <input type="radio" name="radio-sep" id="radio-sep1" value="0"  checked /><span></span> No
                                       </label>&nbsp;&nbsp;
                                       <label class="css-input css-radio css-radio-lg css-radio-success">
                                         <input type="radio" name="radio-sep" id="radio-sep2" value="1"  <?php if($sep){ print "checked"; } ?> /><span></span> Yes
                                       </label>
                                     </div>
                                     <?php
                                   }else{
                                     ?>
                                     <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                       <input type="radio" name="radio-sep" id="radio-sep1" value="0"  checked /><span></span> No
                                     </label>&nbsp;&nbsp;
                                     <label class="css-input css-radio css-radio-lg css-radio-success">
                                       <input type="radio" name="radio-sep" id="radio-sep2" value="1"  <?php if($sep){ print "checked"; } ?> /><span></span> Yes
                                     </label>
                                     <?php
                                   }
                                 }else{
                                   ?>
                                   <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                     <input type="radio" name="radio-sep" id="radio-sep1" value="0"  checked /><span></span> No
                                   </label>&nbsp;&nbsp;
                                   <label class="css-input css-radio css-radio-lg css-radio-success">
                                     <input type="radio" name="radio-sep" id="radio-sep2" value="1"  <?php if($sep){ print "checked"; } ?> /><span></span> Yes
                                   </label>
                                   <?php
                                 }
                               ?>

                             </td>
                             <td>
                               -
                             </td>
                           </tr>
                           <tr>
                             <td>
                               Obstructed or prolonged labour
                             </td>
                             <td>
                               <?php
                                 if($info['confirm_status']==1){
                                   if($opl){
                                     ?>
                                     <span class="label label-success" style="font-size: 0.8em;">Yes</span>
                                     <div class="" style="display:none;">
                                       <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                         <input type="radio" name="radio-opl" id="radio-opl1" value="0"  checked /><span></span> No
                                       </label>&nbsp;&nbsp;
                                       <label class="css-input css-radio css-radio-lg css-radio-success">
                                         <input type="radio" name="radio-opl" id="radio-opl2" value="1"  <?php if($opl){ print "checked"; } ?> /><span></span> Yes
                                       </label>
                                     </div>
                                     <?php
                                   }else{
                                     ?>
                                     <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                       <input type="radio" name="radio-opl" id="radio-opl1" value="0"  checked /><span></span> No
                                     </label>&nbsp;&nbsp;
                                     <label class="css-input css-radio css-radio-lg css-radio-success">
                                       <input type="radio" name="radio-opl" id="radio-opl2" value="1"  <?php if($opl){ print "checked"; } ?> /><span></span> Yes
                                     </label>
                                     <?php
                                   }
                                 }else{
                                   ?>
                                   <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                     <input type="radio" name="radio-opl" id="radio-opl1" value="0"  checked /><span></span> No
                                   </label>&nbsp;&nbsp;
                                   <label class="css-input css-radio css-radio-lg css-radio-success">
                                     <input type="radio" name="radio-opl" id="radio-opl2" value="1"  <?php if($opl){ print "checked"; } ?> /><span></span> Yes
                                   </label>
                                   <?php
                                 }
                               ?>

                             </td>
                             <td>
                               -
                             </td>
                           </tr>
                           <tr>
                             <td>
                               Retained placenta
                             </td>
                             <td>
                               <?php
                                 if($info['confirm_status']==1){
                                   if($ret){
                                     ?>
                                     <span class="label label-success" style="font-size: 0.8em;">Yes</span>
                                     <div class="" style="display:none;">
                                       <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                         <input type="radio" name="radio-rp" id="radio-rp1" value="0"  checked /><span></span> No
                                       </label>&nbsp;&nbsp;
                                       <label class="css-input css-radio css-radio-lg css-radio-success">
                                         <input type="radio" name="radio-rp" id="radio-rp2" value="1"  <?php if($ret){ print "checked"; } ?> /><span></span> Yes
                                       </label>
                                     </div>
                                     <?php
                                   }else{
                                     ?>
                                     <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                       <input type="radio" name="radio-rp" id="radio-rp1" value="0"  checked /><span></span> No
                                     </label>&nbsp;&nbsp;
                                     <label class="css-input css-radio css-radio-lg css-radio-success">
                                       <input type="radio" name="radio-rp" id="radio-rp2" value="1"  <?php if($ret){ print "checked"; } ?> /><span></span> Yes
                                     </label>
                                     <?php
                                   }
                                 }else{
                                   ?>
                                   <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                     <input type="radio" name="radio-rp" id="radio-rp1" value="0"  checked /><span></span> No
                                   </label>&nbsp;&nbsp;
                                   <label class="css-input css-radio css-radio-lg css-radio-success">
                                     <input type="radio" name="radio-rp" id="radio-rp2" value="1"  <?php if($ret){ print "checked"; } ?> /><span></span> Yes
                                   </label>
                                   <?php
                                 }
                               ?>

                             </td>
                             <td>
                               -
                             </td>
                           </tr>
                           <tr>
                             <td>
                               Manual removal of placenta
                             </td>
                             <td>
                               <?php
                                 if($info['confirm_status']==1){
                                   if($mrp){
                                     ?>
                                     <span class="label label-success" style="font-size: 0.8em;">Yes</span>
                                     <div class="" style="display:none;">
                                       <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                         <input type="radio" name="radio-mrp" id="radio-mrp1" value="0"  checked /><span></span> No
                                       </label>&nbsp;&nbsp;
                                       <label class="css-input css-radio css-radio-lg css-radio-success">
                                         <input type="radio" name="radio-mrp" id="radio-mrp2" value="1"  <?php if($mrp){ print "checked"; } ?> /><span></span> Yes
                                       </label>
                                     </div>
                                     <?php
                                   }else{
                                     ?>
                                     <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                       <input type="radio" name="radio-mrp" id="radio-mrp1" value="0"  checked /><span></span> No
                                     </label>&nbsp;&nbsp;
                                     <label class="css-input css-radio css-radio-lg css-radio-success">
                                       <input type="radio" name="radio-mrp" id="radio-mrp2" value="1"  <?php if($mrp){ print "checked"; } ?> /><span></span> Yes
                                     </label>
                                     <?php
                                   }
                                 }else{
                                   ?>
                                   <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                     <input type="radio" name="radio-mrp" id="radio-mrp1" value="0"  checked /><span></span> No
                                   </label>&nbsp;&nbsp;
                                   <label class="css-input css-radio css-radio-lg css-radio-success">
                                     <input type="radio" name="radio-mrp" id="radio-mrp2" value="1"  <?php if($mrp){ print "checked"; } ?> /><span></span> Yes
                                   </label>
                                   <?php
                                 }
                               ?>

                             </td>
                             <td>
                               -
                             </td>
                           </tr>
                           <tr>
                             <td>
                               Maternal death
                             </td>
                             <td>
                               <?php
                                 if($info['confirm_status']==1){
                                   if($md){
                                     ?>
                                     <span class="label label-success" style="font-size: 0.8em;">Yes</span>
                                     <div class="" style="display:none;">
                                       <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                         <input type="radio" name="radio-mater" id="radio-mater1" value="0"  checked /><span></span> No
                                       </label>&nbsp;&nbsp;
                                       <label class="css-input css-radio css-radio-lg css-radio-success">
                                         <input type="radio" name="radio-mater" id="radio-mater2" value="1"  <?php if($md){ print "checked"; } ?> /><span></span> Yes
                                       </label>
                                     </div>
                                     <?php
                                   }else{
                                     ?>
                                     <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                       <input type="radio" name="radio-mater" id="radio-mater1" value="0"  checked /><span></span> No
                                     </label>&nbsp;&nbsp;
                                     <label class="css-input css-radio css-radio-lg css-radio-success">
                                       <input type="radio" name="radio-mater" id="radio-mater2" value="1"  <?php if($md){ print "checked"; } ?> /><span></span> Yes
                                     </label>
                                     <?php
                                   }
                                 }else{
                                   ?>
                                   <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                     <input type="radio" name="radio-mater" id="radio-mater1" value="0"  checked /><span></span> No
                                   </label>&nbsp;&nbsp;
                                   <label class="css-input css-radio css-radio-lg css-radio-success">
                                     <input type="radio" name="radio-mater" id="radio-mater2" value="1"  <?php if($md){ print "checked"; } ?> /><span></span> Yes
                                   </label>
                                   <?php
                                 }
                               ?>

                             </td>
                             <td>
                               -
                             </td>
                           </tr>
                           <tr>
                             <td>
                               Stillbirth
                             </td>
                             <td>
                               <?php
                                 if($info['confirm_status']==1){
                                   if($still){
                                     ?>
                                     <span class="label label-success" style="font-size: 0.8em;">Yes</span>
                                     <div class="" style="display:none;">
                                       <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                         <input type="radio" name="radio-still" id="radio-still1" value="0"  checked /><span></span> No
                                       </label>&nbsp;&nbsp;
                                       <label class="css-input css-radio css-radio-lg css-radio-success">
                                         <input type="radio" name="radio-still" id="radio-still2" value="1" <?php if($still){ print "checked"; } ?>  /><span></span> Yes
                                       </label>
                                     </div>
                                     <?php
                                   }else{
                                     ?>
                                     <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                       <input type="radio" name="radio-still" id="radio-still1" value="0"  checked /><span></span> No
                                     </label>&nbsp;&nbsp;
                                     <label class="css-input css-radio css-radio-lg css-radio-success">
                                       <input type="radio" name="radio-still" id="radio-still2" value="1" <?php if($still){ print "checked"; } ?>  /><span></span> Yes
                                     </label>
                                     <?php
                                   }
                                 }else{
                                   ?>
                                   <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                     <input type="radio" name="radio-still" id="radio-still1" value="0"  checked /><span></span> No
                                   </label>&nbsp;&nbsp;
                                   <label class="css-input css-radio css-radio-lg css-radio-success">
                                     <input type="radio" name="radio-still" id="radio-still2" value="1" <?php if($still){ print "checked"; } ?>  /><span></span> Yes
                                   </label>
                                   <?php
                                 }
                               ?>

                             </td>
                             <td>
                               -
                             </td>
                           </tr>
                           <tr>
                             <td>
                               Neonatal death
                             </td>
                             <td>
                               <?php
                                 if($info['confirm_status']==1){
                                   if($neo){
                                     ?>
                                     <span class="label label-success" style="font-size: 0.8em;">Yes</span>
                                     <div class="" style="display:none;">
                                       <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                         <input type="radio" name="radio-neo" id="radio-neo1" value="0"  checked /><span></span> No
                                       </label>&nbsp;&nbsp;
                                       <label class="css-input css-radio css-radio-lg css-radio-success">
                                         <input type="radio" name="radio-neo" id="radio-neo2" value="1" <?php if($neo){ print "checked"; } ?> /><span></span> Yes
                                       </label>
                                     </div>
                                     <?php
                                   }else{
                                     ?>
                                     <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                       <input type="radio" name="radio-neo" id="radio-neo1" value="0"  checked /><span></span> No
                                     </label>&nbsp;&nbsp;
                                     <label class="css-input css-radio css-radio-lg css-radio-success">
                                       <input type="radio" name="radio-neo" id="radio-neo2" value="1" <?php if($neo){ print "checked"; } ?> /><span></span> Yes
                                     </label>
                                     <?php
                                   }
                                 }else{
                                   ?>
                                   <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                     <input type="radio" name="radio-neo" id="radio-neo1" value="0"  checked /><span></span> No
                                   </label>&nbsp;&nbsp;
                                   <label class="css-input css-radio css-radio-lg css-radio-success">
                                     <input type="radio" name="radio-neo" id="radio-neo2" value="1" <?php if($neo){ print "checked"; } ?> /><span></span> Yes
                                   </label>
                                   <?php
                                 }
                               ?>

                             </td>
                             <td>
                               <?php
                                  if($resultOutcome_neo){
                                    foreach($resultOutcome_neo as $l){
                                      if($l['nb_neonatal']==1){
                                        print "<strong>ID : </strong>".$l['nb_no']." -> Neonatal death < 7 days<br>";
                                      }

                                      if($l['nb_neonatal7']==1){
                                        print "<strong>ID : </strong>".$l['nb_no']." -> Neonatal death 7-26 days<br>";
                                      }

                                    }
                                  }else{
                                    print '-';
                                  }
                                ?>
                             </td>
                           </tr>
                           <tr>
                             <td>
                               Preterm birth
                             </td>
                             <td>
                               <?php
                                 if($info['confirm_status']==1){
                                   if($pt){
                                     ?>
                                     <span class="label label-success" style="font-size: 0.8em;">Yes</span>
                                     <div class="" style="display:none;">
                                       <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                         <input type="radio" name="radio-pt" id="radio-pt1" value="0"  checked /><span></span> No
                                       </label>&nbsp;&nbsp;
                                       <label class="css-input css-radio css-radio-lg css-radio-success">
                                         <input type="radio" name="radio-pt" id="radio-pt2" value="1" <?php if($pt){ print "checked"; } ?> /><span></span> Yes
                                       </label>
                                     </div>
                                     <?php
                                   }else{
                                     ?>
                                     <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                       <input type="radio" name="radio-pt" id="radio-pt1" value="0"  checked /><span></span> No
                                     </label>&nbsp;&nbsp;
                                     <label class="css-input css-radio css-radio-lg css-radio-success">
                                       <input type="radio" name="radio-pt" id="radio-pt2" value="1" <?php if($pt){ print "checked"; } ?> /><span></span> Yes
                                     </label>
                                     <?php
                                   }
                                 }else{
                                   ?>
                                   <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                     <input type="radio" name="radio-pt" id="radio-pt1" value="0"  checked /><span></span> No
                                   </label>&nbsp;&nbsp;
                                   <label class="css-input css-radio css-radio-lg css-radio-success">
                                     <input type="radio" name="radio-pt" id="radio-pt2" value="1" <?php if($pt){ print "checked"; } ?> /><span></span> Yes
                                   </label>
                                   <?php
                                 }
                               ?>

                             </td>
                             <td>
                               <?php
                                if($resultOutcome_pt){
                                  print "<strong>GA at delivery</strong> -> ".$resultOutcome_pt[0]['ga_del']." weeks";
                                }else{
                                  print "-";
                                }
                                ?>
                             </td>
                           </tr>
                           <tr>
                             <td>
                               Low birth weight
                             </td>
                             <td>
                               <?php
                                 if($info['confirm_status']==1){
                                   if($lwb){
                                     ?>
                                     <span class="label label-success" style="font-size: 0.8em;">Yes</span>
                                     <div class="" style="display:none;">

                                       <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                         <input type="radio" name="radio-lbw" id="radio-lbw1" value="0"  checked /><span></span> No
                                       </label>&nbsp;&nbsp;
                                       <label class="css-input css-radio css-radio-lg css-radio-success">
                                         <input type="radio" name="radio-lbw" id="radio-lbw2" value="1" <?php if($lwb){ print "checked"; } ?> /><span></span> Yes
                                       </label>
                                     </div>
                                     <?php
                                   }else{
                                     ?>

                                     <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                       <input type="radio" name="radio-lbw" id="radio-lbw1" value="0"  checked /><span></span> No
                                     </label>&nbsp;&nbsp;
                                     <label class="css-input css-radio css-radio-lg css-radio-success">
                                       <input type="radio" name="radio-lbw" id="radio-lbw2" value="1" <?php if($lwb){ print "checked"; } ?> /><span></span> Yes
                                     </label>
                                     <?php
                                   }
                                 }else{
                                   ?>

                                   <label class="css-input css-radio css-radio-lg css-radio-danger m-r-sm">
                                     <input type="radio" name="radio-lbw" id="radio-lbw1" value="0"  checked /><span></span> No
                                   </label>&nbsp;&nbsp;
                                   <label class="css-input css-radio css-radio-lg css-radio-success">
                                     <input type="radio" name="radio-lbw" id="radio-lbw2" value="1" <?php if($lwb){ print "checked"; } ?> /><span></span> Yes
                                   </label>
                                   <?php
                                 }
                               ?>
                             </td>
                             <td>
                               <?php
                               if(($resultOutcome_lbw) || ($resultOutcome_lbw2)){
                                 foreach($resultOutcome_lbw as $l){
                                   print "<strong>ID : </strong>".$l['nb_no']." -> ".$l['birth_wieght']."g. <br>";
                                 }
                               }else{
                                 print "-";
                               }

                               ?>
                             </td>
                           </tr>
                         </tbody>
                       </table>
                       <!-- End table -->
                     </div>
                     <!-- End table responsive div -->
                  </div>
                  <!-- End col-sm-12 -->
                  <div class="col-sm-12 text-right">
                    <button type="reset" name="button" class="btn btn-app-light">Reset</button>
                    <button type="submit" name="button" class="btn btn-app-teal">Save</button>
                  </div>
                  <!-- End col-sm-12 -->
                </div>
                <!-- End row -->
              </div>
              <!-- End card-block -->
            </div>
            <!-- End card -->
          </div>
          <!-- End col-xs-12 -->
        </form>
        <!-- End form -->
      </div>
      <!-- End row -->
  </div>
  <!-- End container-fluid -->
</main>
