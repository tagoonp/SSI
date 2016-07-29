function toggle_value(valField, value){
  if(valField=='radio-sepbytrans'){
    if(value==0){
      $('#txt-transtfacility').val('');
      $('.separateOption').hide();
    }else{
      $('.separateOption').show();
    }
  }
}

function autofill_unknown(element_id){
  $('#' + element_id).val('Unknown');
}
