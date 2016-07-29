var indication1 = ["Obstructed labour",
                  "Major APH and Grade 3 or 6 placenta previa",
                  "Malpresentation (Transverse, oblique, brow)",
                  "Uterine rupture",
                  "Failure to progress in labour (prolonged labour failed induction)",
                  "Previous C/S",
                  "APH (abruption placenta)",
                  "Maternal medical diseases",
                  "Severe pre-eclampsia/eclamsia",
                  "Psyhosocial inductions (maternal request, precious, pregnancy)",
                  "Foetal compromise (foetal distress, cord prolapse, severe IUGR)",
                  "Breech",
                  "Previous Fistula/3rd degree tear repair",
                  "Twins",
                  "Macrosomic baby",
                  "Failed induction of labour",
                  "Previous uterine scar"
                ];
var indication1_key = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,22,23];
var indication2 = ["Foetal compromise",
                  "Poor maternal effect",
                  "Maternal medical consitions",
                  "After-coming head in breech presentation",
                  "Fetal malpresention",
                  "Failure ro pregress in the second stage"]
                ;

var indication2_key = [16,17,18,19,20,21];

$(document).ready(function(){
    // loadInditation();
});

$(function(){
  $('#txt_moddel').change(function(){
      if(($(this).val()==1) || ($(this).val()==5)){
        $('.modeCondition').hide();
        $('#inditation').val('');
      }else{
        $('.modeCondition').show();
        // var options = $("#txt_moddel");

        if(($('#txt_moddel').val()==2) || ($('#txt_moddel').val()==3)){
          $('#inditation')
            .find('option')
            .remove()
            .end()
            .append($("<option></option>")
          			  .attr("value",'')
          			  .text("-- Please select inditation --"))
          ;
          for (var i = 0; i < indication2.length; i++) {
            $('#inditation')
              // .find('option')
              .append($("<option></option>")
            		  .attr("value",indication2_key[i])
            		  .text(indication2[i]))
          }
        }else if($('#txt_moddel').val()==4){
          $('#inditation')
            .find('option')
            .remove()
            .end()
            .append($("<option></option>")
          			  .attr("value",'')
          			  .text("-- Please select inditation --"))
          ;
          for (var i = 0; i < indication1.length; i++) {
            $('#inditation')
              // .find('option')
              .append($("<option></option>")
            		  .attr("value",indication1_key[i])
            		  .text(indication1[i]))
          }
        }
      }
  });
});
