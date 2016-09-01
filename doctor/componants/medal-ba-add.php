<div class="modal fade" id="modal-ba-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top">
        <div class="modal-content">
            <div class="card-header bg-blue bg-inverse">
                <h4>Add new birth attendant</h4>
                <ul class="card-actions">
                    <li>
                        <button data-dismiss="modal" type="button" id="brmModalClose-ba-add"><i class="ion-close"></i></button>
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

              <!-- <div class="form-group">
                <div class="col-sm-2 text-right" style="padding-top: 7px;">
                  <strong>Search</strong>
                </div>
                <div class="col-sm-8" style="">
                    <input class="form-control" type="text" id="txt-noanc" name="txt-noanc" placeholder="Enter search key" />
                </div>
              </div> -->

              <!-- <div class="row">
                <div class="col-sm-7">
                  <div class="form-group">
                    <div class="col-sm-12" style="padding: 0px; margin: 0px; width: 100%;">
                        <input class="form-control" type="text" id="txt-searchkey" name="txt-searchkey" placeholder="Enter search key" />
                    </div>
                  </div>
                </div>
                <div class="col-sm-5">
                  <button type="button" class="btn btn-app" name="btn-seach-ti" id="btn-seach-ti">Search</button>
                  <button type="button" class="btn btn-app-blue" name="btn-add-ba" id="btn-add-ba"><i class="fa fa-plus"></i> Add new</button>
                </div>
              </div> -->

              <form class="form-horizontal m-t-sm" id="add-ba-form" method="post" action="" onsubmit="return false;">
                <div class="form-group">
                  <div class="col-sm-12" id="txt-id-ba-req">
                    <label for="material-text">ID <span style="color: red;">**</span></label>
                    <input class="form-control" type="text" id="txt-id-ba" name="txt-id-ba" placeholder="Please enter ID of birth attendant" value="" />
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12" id="txt-fname-ba-req">
                    <label for="material-text">Name of Birth Attendant <span style="color: red;">**</span></label>
                    <input class="form-control" type="text" id="txt-fname-ba" name="txt-fname-ba" placeholder="Please enter full name of birth attendant" value="" />

                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">
                    <label for="material-text">E-mail address</label>
                    <input class="form-control" type="text" id="txt-email-ba" name="txt-email-ba" placeholder="Please enter e-mail address" value="" />

                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12 text-center">
                    <button type="submit" name="button" class="btn btn-app-blue">SAVE</button>
                    <button type="reset" name="button" class="btn btn-app-light">RESET</button>
                  </div>
                </div>
              </form>
              <!-- End row -->


            </div>
        </div>
    </div>
</div>
<!-- End Top Modal -->
