function changepage(url){
  window.location = url;
}

function changepage_confirm(url){
  swal({
    title: "Are you sure?",
     text: "You will not be able to recover this imaginary file!",
     type: "warning",
     showCancelButton: true,
     confirmButtonColor: "#DD6B55",
     confirmButtonText: "Yes, delete it!",
     closeOnConfirm: false
   }, function(){
     window.location = url;
   });
}

function changepage_confirm2(url){
  swal({
    title: "Are you sure?",
     text: "You will not be able to recover this imaginary file!",
     type: "warning",
     showCancelButton: true,
     confirmButtonColor: "#DD6B55",
     confirmButtonText: "Yes, do it!",
     closeOnConfirm: false
   }, function(){
     window.location = url;
   });
}

$(document).ready(function(){
  var path = window.location.pathname;
  var page = path.split("/").pop();
  // console.log( page );
  if((page != 'index.php') &&  (page != '')){
    $.post('controller/fillTI.php',{ keyword : ""}, function(data){
      $('#spnResultTI').html(data);
    });
  }

  if(page == 'add-delivery.php'){
    $.post('controller/fillBA.php',{ keyword : ""}, function(data){
      $('#spnResultBA').html(data);
    });
  }

});

$(function(){
  $('#btn-seach-ti').click(function(){
    $.post('controller/fillTI.php',{ keyword : $('#txt-searchkey').val() }, function(data){
      $('#spnResultTI').html(data);
    });
  });

  $('#btn-seach-ba').click(function(){
    $.post('controller/fillBA.php',{ keyword : $('#txt-searchkey-ba').val() }, function(data){
      $('#spnResultBA').html(data);
    });
  });

  $('#btn-add-ba').click(function(){
    // $('#modal-ba').fadeToggle();
    $('#brmModalClose-ba').trigger('click');
  });

  $('#add-ba-form').submit(function(){
    $check = 0;


    if($('#txt-id-ba').val()==''){
      $('#txt-id-ba-req').addClass('has-error');
      $check++;
    }else{
      $('#txt-id-ba-req').removeClass('has-error');
    }

    if($('#txt-fname-ba').val()==''){
      $('#txt-fname-ba-req').addClass('has-error');
      $check++;
    }else{
      $('#txt-fname-ba-req').removeClass('has-error');
    }

    if($check==0){
      $.post('controller/insert-ba.php', {baid: $('#txt-id-ba').val() , baname: $('#txt-fname-ba').val(), baemail: $('#txt-email-ba').val() } ,function(result){
        if(result=='Y'){
          $.post('controller/fillBA.php',{ keyword : ""}, function(data){
            $('#spnResultBA').html(data);
          });
          $('#brmModalClose-ba-add').trigger('click');
          $('#btnChooseBA').trigger('click');
        }else if(result=='SD'){
          swal('Session denine!');
        }else if(result=='D'){
          swal('Duplcate doctor ID');
        }else{
          // console.log(result);
          swal('Can not add birth attendant information!');
        }
      });
    }

    return false;
  });
});

function createsession(pid){
	var jqxhr = $.post( "controller/createsession.php", { keyword : pid },function() {});
	jqxhr.always(function(result) {
		if(result=='Y'){
			window.location = 'add-obstetric.php';
		}
	});
}
