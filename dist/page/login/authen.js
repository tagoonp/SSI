$(function(){
  $('#loginForm').submit(function(){
    if(($('#txtUsername').val()!='') && ($('#txtPassword').val()!='')){
      var jqxhr = $.post( "controller/authen.php", { username : $('#txtUsername').val(), password : $('#txtPassword').val()},function() {});

      jqxhr.always(function(result) {
        if(result=='Y'){
          console.log('Login success!');
          window.location = 'controller/authentype.php';
        }else{
          // window.location = 'index-authen-error.html';
          console.log(result);
          console.log('Login failed!');
        }
      });
    }
  });
});
