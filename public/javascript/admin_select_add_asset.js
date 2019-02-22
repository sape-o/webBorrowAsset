
function brand_se(id){
  $.ajax({
      data: 'generation_select=' + id,
      url: 'controllers/admin/api/query_asset.php',
      method: 'POST',
      success: function(data) {
          max = $(this).find('#option_gen').length+100;
          for(var i=0;i<=max;i++){
            $('#option_gen').remove();
          }
          if(data!="null"){
            var $generation_select = $('#generation_select');
            var data = JSON.parse(data);
            for(var i=0;i<data.length;i++){
              $generation_select.append('<option id="option_gen" value=' + data[i].generation_id + '>' + data[i].generation_name + '</option>');
            }
          }else{
            alert("ยังไม่มีรุ่น กรุณาป้อนรุ่นก่อน");
          }

      }
  });


}
function type_se(id){
  $.ajax({
      data: 'nature_select=' + id,
      url: 'controllers/admin/api/query_asset.php',
      method: 'POST',
      success: function(data) {
        max = $(this).find('#option_nature').length+100;
        for(var i=0;i<=max;i++){
          $('#option_nature').remove();
        }
        if(data!="null"){
          var $nature_select = $('#nature_select');
          var data = JSON.parse(data);
          for(var i=0;i<data.length;i++){
            $nature_select.append('<option id="option_nature" value=' + data[i].nature_id + '>' + data[i].nature_name + '</option>');
          }
        }else{
          alert("ยังไม่มีลักษณะ กรุณาป้อนลักษณะก่อน");
        }

      }
  });


}
