<div class="modal fade" id="modal-ba" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top">
        <div class="modal-content">
            <div class="card-header bg-blue bg-inverse">
                <h4>Choose birth attendant</h4>
                <ul class="card-actions">
                    <li>
                        <button data-dismiss="modal" type="button" id="brmModalClose-ba"><i class="ion-close"></i></button>
                    </li>
                </ul>
            </div>
            <div class="card-block">
              <div class="form-group" style="padding-top: 15px; display:none;">
                <div class="col-sm-12">
                    <div class="form-material">
                        <input class="form-control" type="text" id="txt-fieldname-ba" name="txt-fieldname-ba"  />
                    </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-2 text-right" style="padding-top: 7px;">
                  <strong>Search</strong>
                </div>
                <div class="col-sm-8" style="">
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
                            <th>
                              ID
                            </th>
                            <th>Name</th>
                            <th class="text-center" style="width: 10%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $strSQL = "SELECT * FROM fmn1_useraccount a inner join fmn1_userdescription b on a.username=b.username WHERE a.user_type_id = '5' and a.status = '1' and b.institute_id = '".$valueUserinfo['institute_id']."' ORDER BY b.fname";
                      $result = $db->select($strSQL,false,true);
                      if($result){
                        $c = 1;
                        foreach ($result as $value) {
                          ?>
                          <tr>
                              <td class="text-center"><?php print $c; $c++; ?></td>
                              <td>
                                <?php print $value['username']; ?>
                              </td>
                              <td class="font-500"><?php print $value['fname']." ".$value['lname']; ?></td>
                              <td class="text-center">
                                  <button type="button" name="button" class="btn btn-primary" onclick="fillBA('<?php print $value['username']; ?>', '<?php print $value['fname']." ".$value['lname']; ?>')"><i class="fa fa-check"></i></button>
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
