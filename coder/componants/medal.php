<div class="modal fade" id="modal-top" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top">
        <div class="modal-content">
            <div class="card-header bg-blue bg-inverse">
                <h4>Choose facility name</h4>
                <ul class="card-actions">
                    <li>
                        <button data-dismiss="modal" type="button" id="brmModalClose"><i class="ion-close"></i></button>
                    </li>
                </ul>
            </div>
            <div class="card-block">
              <div class="form-group" style="padding-top: 15px; display:none;">
                <div class="col-sm-12">
                    <div class="form-material">
                        <input class="form-control" type="text" id="txt-fieldname" name="txt-fieldname"  />
                    </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12" style="padding: 0px; margin: 0px; width: 100%;">
                    <input class="form-control" type="text" id="txt-noanc" name="txt-noanc" placeholder="Enter search key" />
                </div>
              </div>
              <!-- End row -->

              <div class="row" style="padding-top: 30px;">
                <div class="col-xs-12" >
                  <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th class="text-center" style="width: 10%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $strSQL = "SELECT anc_attend FROM fmn1_obstetric WHERE 1 GROUP BY anc_attend ORDER BY anc_attend";
                      $result = $db->select($strSQL,false,true);
                      if($result){
                        $c = 1;
                        foreach ($result as $value) {
                          ?>
                          <tr>
                              <td class="text-center"><?php print $c; $c++; ?></td>
                              <td class="font-500"><?php print $value['anc_attend']; ?></td>
                              <td class="text-center">
                                  <button type="button" name="button" class="btn btn-primary" onclick="fillFacility('<?php print $value['anc_attend']; ?>')"><i class="fa fa-check"></i></button>
                              </td>
                          </tr>
                          <?php
                        }
                      }else{
                        ?>
                        <tr>
                          <td colspan="3">
                            No value
                          </td>
                        </tr>
                        <?php
                      }
                      ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<!-- End Top Modal -->
