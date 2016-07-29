// Initialize when page loads
jQuery( function() {
	BaseFormValidation.init();
});

var BaseFormValidation = function() {
    // Init Bootstrap Forms Validation: https://github.com/jzaefferer/jquery-validation
    var initValidation_delivery = function() {
        jQuery( '.js-validation-newborn' ).validate({
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
                'txt-bw': {
                  required: true,
									number: true
                }
            },
            messages: {
                'txt-bw': {
                    required: 'Please enter dete of delivery!',
										number: 'Please enter only number'
                }
            }
        });
    };


    return {
        init: function () {
            // Init Bootstrap Forms Validation for change password page
            initValidation_delivery();
        }
    };
}();
