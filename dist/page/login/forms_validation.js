// Initialize when page loads
jQuery( function() {
	BaseFormValidation.init();
});

var BaseFormValidation = function() {

  var initValidation_login = function(){
    jQuery('.js-validation-login').validate({
        errorClass: 'help-block animated fadeInDown',
        errorElement: 'div',
        errorPlacement: function( error, e ) {
            jQuery(e).parents( '.form-group > div' ).append( error );
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
            'txtUsername': {
                required: true
            },
            'txtPassword': {
                required: true
            }
        },
        messages: {
          'txtUsername': {
              required: 'Please enter your username or email address!'
          },
          'txtPassword': {
              required: 'Please enter your password!'
          }
        }
    });
  };


  return {
        init: function () {
            // Init Bootstrap Forms Validation for form log in
            initValidation_login();
        }
    };
}();
