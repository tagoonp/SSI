$(function(){
  $('#txtLbstage').change(function(){
    if($('#txtLbstage').val()==0){
      $('.stageinfo').fadeOut('fast', function(){});
      $('#txt-Datelbs').val('');
      $('#txt-Timelbs').val('');
      $('#txt-Daterm').val('');
      $('#txt-Timerm').val('');
      $('#txt-Date34').val('');
      $('#txt-Time34').val('');
      $('#txt-Datefd').val('');
      $('#txt-Timefd').val('');
    }else{
      $('.stageinfo').fadeIn('fast', function(){});
    }
  });

});



function toggle_value(valField, value){
  if(valField=='txtHivreg'){
    if(value=='Unknown'){
      $('.hivCondition1').show();
      $('.hivCondition2').hide();
      $('.hivCondition3').hide();

      $('#radio-hiv12test1').trigger('click');
      $('#radio-onart1').trigger('click');
    }else if(value=='Neg'){
      $('.hivCondition1').hide();
      $('.hivCondition2').show();
      $('.hivCondition3').hide();

      $('#radio-hiv1test1').trigger('click');
      $('#radio-onart1').trigger('click');
    }else if(value=='Pos'){
      $('.hivCondition1').hide();
      $('.hivCondition2').hide();
      $('.hivCondition3').show();

      $('#radio-hiv1test1').trigger('click');
      $('#radio-hiv12test1').trigger('click');
    }
  }

  if((valField=='txtHiv1st') || (valField=='txtHivre')){
    if(value=='3'){
      $('.hivCondition1-1').show();
    }else{
      $('.hivCondition1-1').hide();
      $('#radio-cd41').trigger('click');
      $('#radio-artdel1').trigger('click');
    }
  }

  if(valField=='txtCd4lb'){
    if(value==0){
      $('#txt-cd4count').val('');
      $('.hivCondition1-1-1').hide();
    }else{
      $('.hivCondition1-1-1').show();
    }
  }

  if(valField=='txtRh'){
    if(value=='Unknown'){
      $('#radio-antid1').trigger('click');
      $('.rhCondition').hide();
    }else{
      $('.rhCondition').show();
    }
  }
}

function autofill_unknown(element_id){
  $('#' + element_id).val('Unknown');
  $('button').blur();
}

function autofill_na(element_id, btn){
  $('#' + element_id).val('Not applicable');
  $('button').blur();
}

function autofill_custom(element_id, fillstring, btn){
  $('#' + element_id).val(fillstring);
  $('button').blur();
}
