function fillFacility(value) {
  $fieldname = $('#txt-fieldname').val();
  $('#' + $fieldname).val(value);
  $('#brmModalClose').trigger('click');
  $('button').blur();
}

function fillBA(value, fname) {
  $fieldname = $('#txt-fieldname-ba').val();
  $('#' + $fieldname ).val(fname);
  $('#' + $fieldname + '-id').val(value);
  $('#brmModalClose-ba').trigger('click');
  $('button').blur();
}

function fillMedalData(divField){
  $('#txt-fieldname').val(divField);
}

function fillMedalData2(divField){
  $('#txt-fieldname-ba').val(divField);
}
