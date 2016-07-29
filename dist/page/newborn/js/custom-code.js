function toggle_value(valField, value){
  if(valField=='radio-sep'){
    if(value==0){
      $('#txt-tranfac').val('');
      $('.transOption').hide();
    }else{
      $('.transOption').show();
    }
  }

  if(valField=='radio-bdf'){
    if(value==0){
      $('#txt-bdfindentift').val('');
      $('#radio-bdn1').trigger('click');
      $('.bdfCondition1').hide();
    }else{
      $('.bdfCondition1').show();
    }
  }

  if(valField=='radio-alive'){
    if(value==1){
      $('#radio-alivecon0').trigger('click');
      $('.aliveCondition1').hide();
    }else{
      $('.aliveCondition1').show();
    }
  }
}

function autofill_unknown(element_id){
  $('#' + element_id).val('Unknown');
}

$(document).ready(function(){

  if($('#txt-nbid').val()!=''){
    $('#tab2').trigger('click');
  }

  $("#form1").submit(function(){
    $('.radioDiv .req-lable').removeClass( 'has-error-label' );
    $('.radioDiv').removeClass( 'has-radio-error' );
    $('.radioDiv').next().remove();
    $check = 0;
      var selected = $('input[name=radio-gender]:checked').val();
      if(selected==0){
        $('#req-lable1').addClass( 'has-error-label' );
        $('#gender').addClass( 'has-radio-error' );
        $('#gender').after( '<div class="text-right" style="color: red; font-size: 13px;"><i>This radio button is required..</i></div>' );
        $check++;
      }

      var selectedAlive = $('input[name=radio-alive]:checked').val();
      if(selectedAlive==0){
        var selectedAlivecon = $('input[name=radio-alivecon]:checked').val();
        if(selectedAlivecon==0){
          $('#req-lable2').addClass( 'has-error-label' );
          $('#alivecon').addClass( 'has-radio-error' );
          $('#alivecon').after( '<div class="text-right" style="color: red; font-size: 13px;"><i>This radio button is required..</i></div>' );
          $check++;
        }

      }

    if($check!=0){
      return false;
    }
  });

  $('.class-gender').click(function(){
    $('#req-lable1').removeClass( 'has-error-label' );
    $('.radioDiv').removeClass( 'has-radio-error' );
    $('.radioDiv').next().remove();
  });

  $('input[name=radio-alivecon]').click(function(){
    $('#req-lable2').removeClass( 'has-error-label' );
    $('.radioDiv').removeClass( 'has-radio-error' );
    $('.radioDiv').next().remove();
  });
});
