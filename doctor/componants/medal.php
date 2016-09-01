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

              <div class="row">
                <div class="col-sm-10">
                  <div class="form-group">
                    <div class="col-sm-12" style="padding: 0px; margin: 0px; width: 100%;">
                        <input class="form-control" type="text" id="txt-searchkey" name="txt-searchkey" placeholder="Enter search key" />
                    </div>
                  </div>
                </div>
                <div class="col-sm-2">
                  <button type="button" class="btn btn-app" name="btn-seach-ti" id="btn-seach-ti">Search</button>
                </div>
              </div>


              <!-- End row -->

              <div class="row" style="padding-top: 30px;">
                <div class="col-xs-12" >
                  <span id="spnResultTI"></span>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<!-- End Top Modal -->
