$(document).ready(function() {
  $('#submit_add_brand').click(function() {
    var brand = $('#add_brand').val();
    $('#add_brand_alert').css({'color': ''});
    if(brand.length==0){
      $("#add_brand").addClass('is-danger');
      $('#add_brand_alert').css('color', 'red');
      $('#add_brand_alert').show().text("*กรุณากรอกชื่อยี่ห้อ*");
      preventDefault();
    }else{
      $.post("controllers/admin/api/query_asset.php",{api_brand:brand},function(brand_result){
        if(brand_result=="true"){
          $("#add_brand").removeClass('is-danger');
          $('#add_brand_alert').hide();
          $('#brand_a_ass').submit();
        }else if(brand_result=="false"){
          $("#add_brand").addClass('is-danger');
          $('#add_brand_alert').css('color', 'red');
          $('#add_brand_alert').show().text("*ชื่อยี่ห้อนี้มีอยู่แล้ว*");
          preventDefault();
        }
      });
    }
  });
  // input brand check
  $('#add_brand').keyup(function() {
    var brand = $('#add_brand').val();
    $('#add_brand_alert').css({'color': ''});
    if(brand.length==0){
      $("#add_brand").removeClass('is-danger');
      $('#add_brand_alert').css({'color': ''});
      $('#add_brand_alert').hide();

    }else{
      $.post("controllers/admin/api/query_asset.php",{api_brand:brand},function(brand_result){
        if(brand_result=="true"){
          $("#add_brand").removeClass('is-danger');
          $('#add_brand_alert').css('color', 'blue');
          $('#add_brand_alert').show().text("*ชื่อนี้ใช้ได้*");
        }else if(brand_result=="false"){
          $("#add_brand").addClass('is-danger');
          $('#add_brand_alert').css('color', 'red');
          $('#add_brand_alert').show().text("*ชื่อยี่ห้อนี้มีอยู่แล้ว*");
        }
      });
    }
  });

  //submit generation
  $('#submit_add_gen').click(function() {
    var genneration = $('#add_gen').val();
    var brand_relect = $('#brand_select_for_gen').val();
    $('#add_gen_alert').css({'color': ''});
    if(brand_relect=="NO"){
        $('#add_gen_alert').css('color', 'red');
        $('#add_gen_alert').show().text("*กรุณาเลือกยี่ห้อ*");
        preventDefault();
    }else{
      if(genneration.length==0){
        $("#add_gen").addClass('is-danger');
        $('#add_gen_alert').css('color', 'red');
        $('#add_gen_alert').show().text("*กรุณากรอกชื่อรุ่น*");
        preventDefault();
      }else{
        $.post("controllers/admin/api/query_asset.php",{api_brand:brand_relect,api_generation:genneration},function(gen_result){
          if(gen_result=="true"){
            $("#add_gen").removeClass('is-danger');
            $('#add_gen_alert').css('color', 'blue');
            $('#add_gen_alert').show().text("*ชื่อนี้ใช้ได้*");
            $('#generation_a_ass').submit();
          }else if(gen_result=="false"){
            $("#add_gen").addClass('is-danger');
            $('#add_gen_alert').css('color', 'red');
            $('#add_gen_alert').show().text("*ชื่อรุ่นนี้มีอยู่แล้ว*");
            preventDefault();
          }
        });
      }
    }

  });

  // input check generation
  $('#add_gen').keyup(function() {
    var genneration = $('#add_gen').val();
    var brand_relect = $('#brand_select_for_gen').val();
    $('#add_gen_alert').css({'color': ''});
    if(brand_relect=="NO"){
        $('#add_gen_alert').css('color', 'red');
        $('#add_gen_alert').show().text("*กรุณาเลือกยี่ห้อ*");
    }else{
      if(genneration.length==0){
        $("#add_gen").removeClass('is-danger');
        $('#add_gen_alert').hide();
      }else{
        $.post("controllers/admin/api/query_asset.php",{api_brand:brand_relect,api_generation:genneration},function(gen_result){
          if(gen_result=="true"){
            $("#add_gen").removeClass('is-danger');
            $('#add_gen_alert').css('color', 'blue');
            $('#add_gen_alert').show().text("*ชื่อนี้ใช้ได้*");
          }else if(gen_result=="false"){
            $("#add_gen").addClass('is-danger');
            $('#add_gen_alert').css('color', 'red');
            $('#add_gen_alert').show().text("*ชื่อรุ่นนี้มีอยู่แล้ว*");
          }
        });
      }
    }
  });

  // submit add type
  $('#submit_add_type').click(function() {
    var type = $('#add_type').val();
    $('#add_type_alert').css({'color': ''});
    if(type.length==0){
      $("#add_type").addClass('is-danger');
      $('#add_type_alert').css('color', 'red');
      $('#add_type_alert').show().text("*กรุณากรอกชนิด*");
      preventDefault();
    }else{
      $.post("controllers/admin/api/query_asset.php",{api_type:type},function(type_result){
        if(type_result=="true"){
          $("#add_brand").removeClass('is-danger');
          $('#add_type_alert').hide();
          $('#type_a_ass').submit();
        }else if(type_result=="false"){
          $("#add_brand").addClass('is-danger');
          $('#add_type_alert').css('color', 'red');
          $('#add_type_alert').show().text("*ชื่อชนิดนี้มีอยู่แล้ว*");
          preventDefault();
        }
      });
    }
  });
  // input brand check
  $('#add_type').keyup(function() {
    var type = $('#add_type').val();
    $('#add_type_alert').css({'color': ''});
    if(type.length==0){
      $("#add_type").removeClass('is-danger');
      $('#add_type_alert').hide();
    }else{
      $.post("controllers/admin/api/query_asset.php",{api_type:type},function(type_result){
        if(type_result=="true"){
          $("#add_type").removeClass('is-danger');
          $('#add_type_alert').css('color', 'blue');
          $('#add_type_alert').show().text("*ชื่อนี้ใช้ได้*");
        }else if(type_result=="false"){
          $("#add_type").addClass('is-danger');
          $('#add_type_alert').css('color', 'red');
          $('#add_type_alert').show().text("*ชื่อยี่ห้อนี้มีอยู่แล้ว*");

        }
      });
    }
  });

  //submit nature
  $('#submit_add_nature').click(function() {
    var nature = $('#add_nature').val();
    var type_relect = $('#type_select_for_nature').val();
    $('#add_nature_alert').css({'color': ''});
    if(type_relect=="NO"){
        $('#add_nature_alert').css('color', 'red');
        $('#add_nature_alert').show().text("*กรุณาเลือกชนิด*");
        preventDefault();
    }else{
      if(nature.length==0){
        $("#add_nature").addClass('is-danger');
        $('#add_nature_alert').css('color', 'red');
        $('#add_nature_alert').show().text("*กรุณากรอกชื่อรุ่น*");
        preventDefault();
      }else{
        $('#add_nature_alert').css({'color': ''});
        $.post("controllers/admin/api/query_asset.php",{api_type:type_relect,api_nature:nature},function(nature_result){
          if(nature_result=="true"){
            $("#add_nature").removeClass('is-danger');
            $('#add_nature_alert').css('color', 'blue');
            $('#add_nature_alert').show().text("*ชื่อนี้ใช้ได้*");
            $('#nature_a_ass').submit();
          }else if(nature_result=="false"){

            $("#add_nature").addClass('is-danger');
            $('#add_nature_alert').css('color', 'red');
            $('#add_nature_alert').show().text("*ชื่อลักษณะนี้มีอยู่แล้ว*");
            preventDefault();
          }
        });
      }
    }

  });

  // input check nature
  $('#add_nature').keyup(function() {
    var nature = $('#add_nature').val();
    var type_relect = $('#type_select_for_nature').val();
    $('#add_gen_alert').css({'color': ''});
    if(type_relect=="NO"){
        $('#add_gen_alert').css('color', 'red');
        $('#add_nature_alert').show().text("*กรุณาเลือกชนิด*");
    }else{
      if(nature.length==0){
        $("#add_nature").removeClass('is-danger');
        $('#add_nature_alert').hide();
      }else{
        $.post("controllers/admin/api/query_asset.php",{api_type:type_relect,api_nature:nature},function(nature_result){
          if(nature_result=="true"){
            $("#add_nature").removeClass('is-danger');
            $('#add_nature_alert').css('color', 'blue');
            $('#add_nature_alert').show().text("*ชื่อนี้ใช้ได้*");
          }else if(nature_result=="false"){
            $("#add_nature").addClass('is-danger');
            $('#add_nature_alert').css('color', 'red');
            $('#add_nature_alert').show().text("*ชื่อลักษณะนี้มีอยู่แล้ว*");
          }
        });
      }
    }
  });

});
