// Initialize when page loads
jQuery( function() {
	BaseFormValidation.init();
});


var BaseFormValidation = function() {
    // Init Bootstrap Forms Validation: https://github.com/jzaefferer/jquery-validation
    var initValidation_register = function() {
        jQuery( '.js-validation-register' ).validate({
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
                'txt-dateadm': {
                    required: true
                },
								'txt-timeadm': {
                    required: true
                },
								'txt-pid': {
                    required: true
                },
								'txt-fname': {
                    required: true
                },
								'txt-age': {
                    required: true,
										number: true,
										range: [1, 100]
                }
            },
            messages: {
								'txt-dateadm': {
										required: 'Please select date of admission'
								},
								'txt-timeadm': {
										required: 'Please select time of admission'
								},
								'txt-pid': {
										required: 'Please enter patient\'s ID'
								},
								'txt-fname': {
										required: 'Please enter patient\'s first name '
								},
								'txt-age': {
										required: 'Please enter patient\'s age',
										number: 'Please enter only number',
										range: 'Please enter a number between 1 and 100!'
								}
            }
        });
    };


    return {
        init: function () {
            // Init Forms Validation for register page
            initValidation_register();
        }
    };
}();

$(function(){

	$('#cb-refer').click(function(){
		if($('#cb-refer').is(':checked')){
			$('.referCondition').fadeIn( "fast", function() {});
		}else{
			$('.referCondition').fadeOut( "fast", function() {});
			$('#txt-referfacility').val();
			$('#radio-referstage1').trigger('click');
		}
	});

	$('#txt-dob').change(function(){
		var jqxhr = $.post( "../dist/function/calculation-age.php", { ageinput : $('#txt-dob').val() },function() {});

		jqxhr.always(function(result) {
			if(result=='N'){
				// window.location = 'add-new-record-form.php';

			}else{
				$('#txt-age').val(result);
			}
		});
	});

});
