<h3 style="font-weight: 400; color: teal;">Newborn information and Infant separation</h3>

<div class="form-group" style="display:none;">
  <div class="col-sm-12">
      <div class="form-material">
          <input class="form-control" type="text" id="txt-nbid-view" name="txt-nbid-view" value="<?php if(isset($_GET['nbid'])){ print $_GET['nbid']; } ?>" />
          <label for="material-text">ID </label></label>
      </div>
  </div>
</div>

<div class="table-responsive">
  <table class="table table-striped">
    <tr>
      <td class="col-sm-6 font-bold-500">
        ID
      </td>
      <td>
        <?php if(isset($_GET['nbid'])){ print $_GET['nbid'];} ?>
      </td>
    </tr>

    <tr>
      <td class="col-sm-6 font-bold-500">
        Gender
      </td>
      <td>
        <?php if($resultNB){ print $resultNB[0]['gender'];} ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Mode of delivery
      </td>
      <td>
        <?php
        if($resultNB){
          switch($resultNB[0]['mob']){
            case 1: print "Normal delivery"; break;
            case 2: print "V/E"; break;
            case 3: print "F/E"; break;
            case 4: print "Caesarean section"; break;
            case 5: print "Vaginal breach"; break;
            default: print "Normal delivery";
          }
        }
        ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Alive
      </td>
      <td>
        <?php
        if($resultNB){
          switch($resultNB[0]['alive']){
            case 0: print "No"; break;
            default: print "Yes";
          }
        }
        ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Stillbirth type
      </td>
      <td>
        <?php
        if($resultNB){
          switch($resultNB[0]['stillbirth']){
            case 1: print "Fresh"; break;
            case 2: print "Macerated"; break;
            default: print "-";
          }
        }
        ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Apgar score 5 min / 10 min
      </td>
      <td>
        <?php if($resultNB){ print $resultNB[0]['ag5']." / ".$resultNB[0]['ag10'];} ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Resuscitate bag & mask
      </td>
      <td>
        <?php
        if($resultNB){
          switch($resultNB[0]['rbm']){
            case 0: print "No"; break;
            default: print "Yes";
          }
        }
        ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Birth weight
      </td>
      <td>
        <?php if($resultNB){ print $resultNB[0]['birth_wieght'];} ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Head circumference (cm)
      </td>
      <td>
        <?php if($resultNB){ print $resultNB[0]['hc'];} ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Fetal length (cm)
      </td>
      <td>
        <?php if($resultNB){ print $resultNB[0]['fetal_length'];} ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Birth defects found
      </td>
      <td>
        <?php
        if($resultNB){
          switch($resultNB[0]['bdf']){
            case 0: print "No"; break;
            default: print "Yes";
          }
        }
        ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Identify
      </td>
      <td>
        <?php if($resultNB){ print $resultNB[0]['bdf_identify'];} ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Birth defects notified
      </td>
      <td>
        <?php
        if($resultNB){
          switch($resultNB[0]['bdn']){
            case 0: print "No"; break;
            default: print "Yes";
          }
        }
        ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Live birth to HIV positive woman
      </td>
      <td>
        <?php
        if($resultNB){
          switch($resultNB[0]['pmctv_lb']){
            case 0: print "No"; break;
            default: print "Yes";
          }
        }
        ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Exclusive breast feeding within 1 hour
      </td>
      <td>
        <?php
        if($resultNB){
          switch($resultNB[0]['ebf']){
            case 0: print "No"; break;
            default: print "Yes";
          }
        }
        ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Breast feeding
      </td>
      <td>
        <?php
        if($resultNB){
          switch($resultNB[0]['bf']){
            case 0: print "No"; break;
            default: print "Yes";
          }
        }
        ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Formular feeding
      </td>
      <td>
        <?php
        if($resultNB){
          switch($resultNB[0]['ff']){
            case 0: print "No"; break;
            default: print "Yes";
          }
        }
        ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Skin to Skin contact
      </td>
      <td>
        <?php
        if($resultNB){
          switch($resultNB[0]['skin2skin']){
            case 0: print "No"; break;
            default: print "Yes";
          }
        }
        ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Newborn admitted
      </td>
      <td>
        <?php
        if($resultNB){
          switch($resultNB[0]['nb_adm']){
            case 0: print "No"; break;
            default: print "Yes";
          }
        }
        ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Date - Time of separation
      </td>
      <td>
        <?php
        if($resultNB){
          print $resultNB[0]['nb_date_sep']." ".$resultNB[0]['nb_time_sep'];
        }
        ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Separated by early neonatal death < 7days
      </td>
      <td>
        <?php
        if($resultNB){
          switch($resultNB[0]['nb_neonatal']){
            case 0: print "No"; break;
            default: print "Yes";
          }
        }
        ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Separated by late neonatal death 7 - 28 days
      </td>
      <td>
        <?php
        if($resultNB){
          switch($resultNB[0]['nb_neonatal7']){
            case 0: print "No"; break;
            default: print "Yes";
          }
        }
        ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Separated by transfer out
      </td>
      <td>
        <?php
        if($resultNB){
          switch($resultNB[0]['nb_refer']){
            case 0: print "No"; break;
            default: print "Yes";
          }
        }
        ?>
      </td>
    </tr>

    <tr>
      <td class="font-bold-500">
        Transfer facility
      </td>
      <td>
        <?php
        if($resultNB){
          print $resultNB[0]['nb_refer_facility'];
        }
        ?>
      </td>
    </tr>


  </table>
</div>
<!-- End table-responsive -->
