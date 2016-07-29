// Initialize when page loads
jQuery( function() {
	BaseFormValidation.init();
});

var BaseFormValidation = function() {

    // Init Material Forms Validation: https://github.com/jzaefferer/jquery-validation
    var initValidationMaterial = function() {
        jQuery( '.js-validation-material' ).validate({
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
                'txt-fname': {
                    required: true
                },
                'txt-institute': {
                    required: true
                },
                'txt-username': {
                    required: true
                },
                'txt-password1': {
                    required: true
                },
                'txt-password2': {
                    required: true,
										equalTo: '#txt-password1'
                },
                'txt-email': {
                    email: true
                },
								'txt-usertype': {
									required: true
								}
            },
            messages: {
								'txt-fname': {
										required: 'Please enter firstname..'
								},
								'txt-institute': {
										required: 'Please select institute..'
								},
								'txt-username': {
										required: 'Please enter username..'
								},
								'txt-password1': {
										required: 'Please enter password..'
								},
                'txt-password2': {
                    required: 'Please re-enter password..',
										equalTo: 'Password not match!'
                },
                'txt-email': {
                    email: 'Please enter a valid email address..'
                },
								'txt-usertype': {
									required: 'Please choose type of user account..'
								}
            }
        });
    };

    return {
        init: function () {
            // Init Meterial Forms Validation
            initValidationMaterial();
        }
    };
}();
