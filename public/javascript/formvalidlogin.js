$(document).ready(function() {
  $("#submit_login").click(function(){
      var username = $('#username_login').val();
      var password = $('#password_login').val();
      if(username.length==0 || password.length==0){
        $("#password_login").addClass('is-danger');
        $("#username_login").addClass('is-danger');
        $('#alert_login_fail').show().text("*กรุณากรอกข้อมูลให้ครบ*");
      }else{
        $.post("controllers/guest/api/query_guest.php",{username:username,password:password},function(resultlogin){
          if(resultlogin=="true"){
            $("#password_login").removeClass('is-danger');
            $("#username_login").removeClass('is-danger');
            $('#from_login').submit();
          }else if(resultlogin=="false"){
            $("#password_login").addClass('is-danger');
            $("#username_login").addClass('is-danger');
            $('#alert_login_fail').show().text("*username หรือ password ไม่ถูกต้อง*");
            preventDefault();
          }
        });
      }


    //alert("KK");
  });
});
