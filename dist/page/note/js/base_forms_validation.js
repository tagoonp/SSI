// Initialize when page loads
jQuery( function() {
	BaseFormValidation.init();
});


var BaseFormValidation = function() {
    // Init Bootstrap Forms Validation: https://github.com/jzaefferer/jquery-validation
    var initValidation_note = function() {
        jQuery( '.js-validation-note' ).validate({
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
                'txt-note': {
                    required: true
                }
            },
            messages: {
								'txt-note': {
										required: 'Please enter messages..'
								}
            }
        });
    };


    return {
        init: function () {
            // Init Forms Validation for register page
            initValidation_note();
        }
    };
}();
