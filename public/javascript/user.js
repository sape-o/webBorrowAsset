function book_temp(id) {
  $.ajax({
      data: 'book_temp=' + id,
      url: 'controllers/user/api/insert_book_temp.php',
      method: 'POST', // or GET
      success: function(msg) {
          if(msg == 'finish'){
          //    alert("จองเสร็จสิ้น");
              location.reload();
          }else{
              alert(msg);
          }
      }
  });
}
function cancel_book_temp(id) {
  $.ajax({
      data: 'delete_book_temp=' + id,
      url: 'controllers/user/api/insert_book_temp.php',
      method: 'POST', // or GET
      success: function(msg) {
          if(msg == 'finish'){
          //    alert("ลบเสร็จสิ้น");
              location.reload();
          }else{
              alert(msg);
          }

      }
  });
}
function commit_book_temp(v) {
  $.ajax({
      data: 'commit_book_temp=' + v,
      url: 'controllers/user/api/insert_book_temp.php',
      method: 'POST', // or GET
      success: function(msg) {
          if(msg == 'finish'){
          //    alert("ยืนยันการจอง เสร็จสิ้น");
              location.reload();
          }else{
              alert(msg);
          }

      }
  });
}
function delete_book(id) {
  $.ajax({
      data: 'delete_book=' + id,
      url: 'controllers/user/api/delete_book.php',
      method: 'POST', // or GET
      success: function(msg) {
          if(msg == 'finish'){
          //    alert("ลบทั้งหมด เสร็จสิ้น");
              location.reload();
          }else{
              alert(msg);
          }

      }
  });

}
function delete_each_book(id) {
  $.ajax({
      data: 'delete_each_book=' + id,
      url: 'controllers/user/api/delete_book.php',
      method: 'POST', // or GET
      success: function(msg) {
          if(msg == 'finish'){
          //    alert("ลบ เสร็จสิ้น");
              location.reload();
          }else{
              alert(msg);
          }

      }
  });
}
