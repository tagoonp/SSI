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

              <div class="row">
                <div class="col-sm-7">
                  <div class="form-group">
                    <div class="col-sm-12" style="padding: 0px; margin: 0px; width: 100%;">
                        <input class="form-control" type="text" id="txt-searchkey-ba" name="txt-searchkey-ba" placeholder="Enter search key" />
                    </div>
                  </div>
                </div>
                <div class="col-sm-5">
                  <button type="button" class="btn btn-app" name="btn-seach-ba" id="btn-seach-ba">Search</button>
                  <button type="button" class="btn btn-app-blue" name="btn-add-ba" id="btn-add-ba" data-toggle="modal" data-target="#modal-ba-add"><i class="fa fa-plus"></i> Add new</button>
                </div>
              </div>
              <!-- End row -->

              <div class="row" style="padding-top: 30px;">
                <div class="col-xs-12" >
                  <span id="spnResultBA"></span>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<!-- End Top Modal -->
