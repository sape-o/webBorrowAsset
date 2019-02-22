$(document).ready(function(){
  var name_regex = /^[a-zA-Zก-ฮ\u0E00-\u0E7Fa]+$/;
  var username_regex = /^[a-zA-Z][a-zA-Z0-9]+$/;
  // email_regex is not work all case
  var email_regex = /^[a-zA-Z0-9.]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
  // tel_regex is not work all case
  var tel_regex = /^[0][0-9]{9}$/;


  $( "#resis_submit" ).click(function() {
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var username = $('#username').val();
    var email = $('#email').val();
    var tel = $('#tel').val();

    if( (firstname.length == 0 || !(firstname.match(name_regex))) ||
        (lastname.length == 0  || !(lastname.match(name_regex))) ||
        (username.length == 0  || !(username.match(username_regex))) ||
        (email.length == 0     || !(email.match(email_regex))) ||
        (tel.length == 0       || !(tel.match(tel_regex)))
    ){
        if (firstname.length == 0 || !(firstname.match(name_regex))) {
          $("#firstname").addClass('is-danger');
          $('#firstname_jqry').show().text("*a-z,A-Z,ก-ฮ*");
          $("#firstname").focus();
          //return false;
        }else{
            $('#firstname_jqry').hide();
            $("#firstname").removeClass('is-danger');
        }
        if (lastname.length == 0 || !(lastname.match(name_regex))) {
          $("#lastname").addClass('is-danger');
          $('#lasttname_jqry').show().text("*a-z,A-Z,ก-ฮ*");
          $("#lastname").focus();
          //return false;
        }else{
            $('#lasttname_jqry').hide();
            $("#lastname").removeClass('is-danger');
        }
        if (username.length == 0 || !(username.match(username_regex))) {
          $('#username_jqry').css({'color': ''});
          $('#username_jqry').css('color', 'red');
          $("#username").addClass('is-danger');
          $('#username_jqry').show().text("*a-zA-Z0-9*");
          $("#username").focus();
          //return false;
        }else{
          $('#username_jqry').css({'color': ''});
          $.post("controllers/guest/api/query_guest.php",{search:username,type:'1'},function(result3){
            if(result3=="true"){
              $('#username_jqry').css('color', 'blue');
              $('#username_jqry').show().text("*ใช้งานได้*");
              $("#username").removeClass('is-danger');
            }else if(result3=="false"){
              $('#username_jqry').css('color', 'red');
              $("#username").addClass('is-danger');
              $('#username_jqry').show().text("*มีผู้ใช้นี้แล้ว*");
              $("#username").focus();
            }
          });

        }

        if (email.length == 0 || !(email.match(email_regex))) {
          $('#email_jqry').css({'color': ''});
          $('#email_jqry').css('color', 'red');
          $("#email").addClass('is-danger');
          $('#email_jqry').show().text("*example@email.com*");
          $("#email").focus();
          //return false;
        }else{
          $('#email_jqry').css({'color': ''});
          $.post("controllers/guest/api/query_guest.php",{search:email,type:'2'},function(result4){
            if(result4=="true"){
              $('#email_jqry').css('color', 'blue');
              $('#email_jqry').show().text("*ใช้งานได้*");
              $("#email").removeClass('is-danger');
            }else if(result4=="false"){
              $('#email_jqry').css('color', 'red');
              $("#email").addClass('is-danger');
              $('#email_jqry').show().text("*อีเมลนี้มีผู้ใช้งานแล้ว*");
              $("#email").focus();
            }
          });
        }
        if (tel.length == 0 || !(tel.match(tel_regex))) {
          $("#tel").addClass('is-danger');
          $('#tel_jqry').show().text("*0123456789*");
          $("#tel").focus();
          //return false;
        }else{
            $('#tel_jqry').hide();
            $("#tel").removeClass('is-danger');
        }
    }else{
      $.post("controllers/guest/api/query_guest.php",{search:username,type:'1'},function(result){
        if(result=="true"){
          $('#username_jqry').hide();
          $("#username").removeClass('is-danger');
          $.post("controllers/guest/api/query_guest.php",{search:email,type:'2'},function(result2){
            if(result2=="true"){
              $('#email_jqry').hide();
              $("#email").removeClass('is-danger');
              $( "#form_re" ).submit();
            }else if(result2=="false")
              $("#email").addClass('is-danger');
              $('#email_jqry').show().text("*example@email.com*");
              $("#email").focus();
              preventDefault();
          });
          $( "#form_re" ).submit();
        }else if(result=="false"){
          $("#username").addClass('is-danger');
          $('#username_jqry').show().text("*มีผู้ใช้นี้แล้ว*");
          $("#username").focus();
          preventDefault();
        }
      });
    }
  });

// ตอนแรก สั่ง hide ปุ่มไว้ก่อน ถ้าเกิดว่ากรอกข้อมูลครบแล้ว ถึงจะโชว์ปุ่มได้ $("input[type=submit]").attr("disabled", "disabled");
//    $("input[type=submit]").removeAttr("disabled");
  $("#firstname").keyup( function() {
    var firstname = $('#firstname').val();
    if (firstname.length == 0 || !(firstname.match(name_regex))) {
      $("#firstname").addClass('is-danger');
      $('#firstname_jqry').show().text("*a-z,A-Z,ก-ฮ*");
      $("#firstname").focus();
      //return false;
    }else{
        $('#firstname_jqry').hide();
        $("#firstname").removeClass('is-danger');
    }
  });
  $("#lastname").keyup( function() {
    var lastname = $('#lastname').val();
    if (lastname.length == 0 || !(lastname.match(name_regex))) {
      $("#lastname").addClass('is-danger');
      $('#lasttname_jqry').show().text("*a-z,A-Z,ก-ฮ*");
      $("#lastname").focus();
      //return false;
    }else{
        $('#lasttname_jqry').hide();
        $("#lastname").removeClass('is-danger');
    }
  });
  $("#username").keyup( function() {
    var username = $('#username').val();
    $('#username_jqry').css({'color': ''});
    if (username.length == 0 || !(username.match(username_regex))) {
      $('#username_jqry').css('color', 'red');
      $("#username").addClass('is-danger');
      $('#username_jqry').show().text("*a-zA-Z0-9*");
      $("#username").focus();
      //return false;
    }else{
        $.post("controllers/guest/api/query_guest.php",{search:username,type:'1'},function(result3){
          if(result3=="true"){
            $('#username_jqry').css('color', 'blue');
            $('#username_jqry').show().text("*ใช้งานได้*");
            $("#username").removeClass('is-danger');
          }else if(result3=="false"){
            $('#username_jqry').css('color', 'red');
            $("#username").addClass('is-danger');
            $('#username_jqry').show().text("*มีผู้ใช้นี้แล้ว*");
            $("#username").focus();
          }
        });
    }
  });
  $("#email").keyup( function() {
    var email = $('#email').val();
    $('#email_jqry').css({'color': ''});
    if (email.length == 0 || !(email.match(email_regex))) {
      $('#email_jqry').css('color', 'red');
      $("#email").addClass('is-danger');
      $('#email_jqry').show().text("*example@email.com*");
      $("#email").focus();
      //return false;
    }else{
      $.post("controllers/guest/api/query_guest.php",{search:email,type:'2'},function(result4){
        if(result4=="true"){
          $('#email_jqry').css('color', 'blue');
          $('#email_jqry').show().text("*ใช้งานได้*");
          $("#email").removeClass('is-danger');
        }else if(result4=="false"){

          $('#email_jqry').css('color', 'red');
          $("#email").addClass('is-danger');
          $('#email_jqry').show().text("*อีเมลนี้มีผู้ใช้งานแล้ว*");
          $("#email").focus();
        }
      });
    }
  });
  $("#tel").keyup( function() {
    var tel = $('#tel').val();
    if (tel.length == 0 || !(tel.match(tel_regex))) {
      $("#tel").addClass('is-danger');
      $('#tel_jqry').show().text("*0123456789*");
      $("#tel").focus();
      //return false;
    }else{
        $('#tel_jqry').hide();
        $("#tel").removeClass('is-danger');
    }
  });


});
