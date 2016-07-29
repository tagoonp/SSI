// Initialize when page loads
jQuery( function() {
	BaseFormValidation.init();
});


var BaseFormValidation = function() {
    // Init Bootstrap Forms Validation: https://github.com/jzaefferer/jquery-validation
    var initValidation_beforeaddnew = function() {
        jQuery( '.js-validation-before' ).validate({
            errorClass: 'help-block text-right animated fadeInDown',
            errorElement: 'div',
            errorPlacement: function(error, e) {
                jQuery(e).parents( '.form-group .form-material' ).append( error );
            },
            highlight: function(e) {
                jQuery(e).closest( '.form-group' ).removeClass( 'has-error' ).addClass( 'has-error' );
                jQuery(e).closest( '.help-block' ).remove();
            },
            success: function(e) {
                jQuery(e).closest( '.form-group' ).removeClass( 'has-error' );
                jQuery(e).closest( '.help-block' ).remove();
            },
            rules: {
                'text-patient-id': {
                    required: true
                }
            },
            messages: {
                'text-patient-id': {
                    required: 'Please enter patient\'s ID before search or add new record!'
                }
            }
        });
    };


    return {
        init: function () {
            // Init Bootstrap Forms Validation for change password page
            initValidation_beforeaddnew();
        }
    };
}();

$(function(){
  $('#add-new-record1').submit(function(){
    if($('#text-patient-id').val()!=''){
      var jqxhr = $.post( "controller/searchrecord.php", { keyword : $('#text-patient-id').val() },function() {});

      jqxhr.always(function(result) {
        $('#historyResult').html(result);
      });
    }
  });

  $('#btnAddnew1').click(function(){
    if($('#text-patient-id').val()!=''){
      swal({
        title: "Are you sure?",
        text: "To create new record of this patient's ID!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "teal",
        confirmButtonText: "Yes!",
        closeOnConfirm: false
      }, function(){



        // var jqxhr = $.post( "controller/createsession.php", { keyword : $('#text-patient-id').val() },function() {});
				//
        // jqxhr.always(function(result) {
        //   if(result=='Y'){
        //     window.location = 'add-new-record-form.php?pid=' + $('#text-patient-id').val();
        //   }
        // });
				window.location = 'add-new-record-form.php?pid=' + $('#text-patient-id').val();
      });
    }else{
      $('#btnSearch1').trigger('click');
    }
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

function createsession2(pid){
	var jqxhr = $.post( "controller/createsession-by-record-id.php", { keyword : pid },function() {});

	jqxhr.always(function(result) {
		if(result=='Y'){
			window.location = 'add-obstetric.php';
		}
	});
}
