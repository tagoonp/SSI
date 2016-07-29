function toggle_value(valField, value){
  if(valField=='radio-ante'){
    if(value==0){
      $('#radio-ap1').trigger('click');
      $('#radio-pp1').trigger('click');
      $('.anteOption').hide();
    }else{
      $('.anteOption').show();
    }
  }
}

function autofill_unknown(element_id){
  $('#' + element_id).val('Unknown');
}
