function toggle_value(valField, value){
  if(valField=='radio-lbHiv'){
    if(value==0){
      $('#radio-pmtct1').trigger('click');
      $('#radio-azt1').trigger('click');
      $('#radio-nevirapine1').trigger('click');
      $('#radio-nevirapine721').trigger('click');
      $('#radio-nevirapine61').trigger('click');
      $('#radio-inftest1').trigger('click');
      $('#radio-inftest_result1').trigger('click');
      $('.hivCondition').hide();
    }else{
      $('.hivCondition').show();
    }
  }

  if(valField=='radio-refer'){
    if(value==0){
      $('#txt-refer_to_facility').val('');
      $('.transOption').hide();
    }else{
      $('.transOption').show();
    }
  }
}

function autofill_unknown(element_id){
  $('#' + element_id).val('Unknown');
}
