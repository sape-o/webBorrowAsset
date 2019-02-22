function commit_book(id) {
  $.ajax({
      data: 'commit_book=' + id,
      url: 'controllers/admin/api/update_book.php',
      method: 'POST', // or GET
      success: function(msg) {
          if(msg == 'finish'){
            //  alert("อนุมัติเสร็จสิ้น");
              location.reload();
          }else{
              alert("Error!!!");
          }

      }
  });
}
function delete_book(id) {
  $.ajax({
      data: 'del_lis_book=' + id,
      url: 'controllers/admin/api/update_book.php',
      method: 'POST', // or GET
      success: function(msg) {
          if(msg == 'finish'){
            //  alert("ลบรายการเสร็จสิ้น");
              location.reload();
          }else{
              alert("Error!!!");
          }

      }
  });
}
function commit_borrowing(id) {
  $.ajax({
      data: 'commit_borrowing=' + id,
      url: 'controllers/admin/api/update_borrowing.php',
      method: 'POST', // or GET
      success: function(msg) {
          if(msg == 'finish'){
            //  alert("คืนทั้งหมดเสร็จสิ้น");
              location.reload();
          }else{
              alert("Error!!!");
          }

      }
  });

}
function commit_each_borrowing(id) {
  $.ajax({
      data: 'commit_each_borrowing=' + id,
      url: 'controllers/admin/api/update_borrowing.php',
      method: 'POST', // or GET
      success: function(msg) {
          if(msg == 'finish'){
              alert("คืนบางรายการเสร็จสิ้น");
              location.reload();
          }else{
              alert("Error!!!");
          }

      }
  });

}
