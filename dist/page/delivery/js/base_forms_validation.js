// Initialize when page loads
jQuery( function() {
	BaseFormValidation.init();
});

var BaseFormValidation = function() {
    // Init Bootstrap Forms Validation: https://github.com/jzaefferer/jquery-validation
    var initValidation_delivery = function() {
        jQuery( '.js-validation-delivery' ).validate({
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
                'txt-datedel': {
                  required: true
                },
                'txt-timedel': {
                  required: true
                },
                'txt-gadel': {
                  required: true
                }
            },
            messages: {
                'txt-datedel': {
                    required: 'Please enter dete of delivery!'
                },
                'txt-timedel': {
                  required: 'Please enter time of delivery!'
                },
                'txt-gadel': {
                  required: 'Please enter gestational age at delivery!'
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
