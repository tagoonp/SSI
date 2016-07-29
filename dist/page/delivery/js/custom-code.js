function toggle_value(valField, value){
  if(valField=='txtMatrans'){
    if(value==0){
      $('#txt-mt-facility').val('');
      $('.matersepinfo').hide();
    }else{
      $('.matersepinfo').show();
    }
  }
}

function autofill_unknown(element_id){
  $('#' + element_id).val('Unknown');
}
