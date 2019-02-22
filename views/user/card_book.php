<?php
  if($index_check!='user_type2') {
    header("HTTP/1.0 404 Not Found");
    echo '
    <html><head>
    <title>404 Not Found</title>
    </head><body>
    <h1>Not Found</h1>
    <p>The requested URL /b5813872/views/user/card_book.php was not found on this server.</p>
    <hr>
    <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
    </body></html>
    <!-- Do not try hack this web site-->
    ';
    exit();
  }

?>
<?php
  // ดึงข้อมูล การจอง
  include("controllers/database/user/core/query/query_all_show_page.php");
  $json_book = query_book_user();

  $book = json_decode($json_book);
  $state_book=0;
  $print_head_card=0;
    if($book>0){
      echo '<div">
             <div>
              <div> <table ><tbody>';
      foreach($book as $key=>$book) {
        if($state_book!=$book->borrow_id) {
          $state_book=$book->borrow_id;
          $print_head_card=0; // ถ้าแสดง card ใหม่ กำหนด = 0
          echo '</tbody></table>';
          echo '</div></div></div>';
          echo '<div class="box "  style="margin:20px;">
                 <div class="card-content">';
         echo '<div class="content">';

        }
        if($state_book==$book->borrow_id) {
          if($print_head_card==0) {
            echo "<strong>ชื่อ : &nbsp;</strong>".$book->firstname."&nbsp;&nbsp;&nbsp;".$book->lastname."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "<strong> อาชีพ : &nbsp;</strong>".$book->status."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; //ปริ้นออกตัว หัว Card
            echo "<strong>เบอร์โทรศัพท์ : &nbsp;</strong>".$book->tel."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "<strong>E-mail : &nbsp;</strong>".$book->email."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            echo "&nbsp;&nbsp;&nbsp;
                 <button class='button is-outlined is-danger' style='width:150px;' onclick='delete_book(".$book->borrow_id.")' >
                 <span>ยกเลิกทั้งหมด</span>
                 <span class='icon is-small'>
                   <i class='fas fa-times'></i>
                 </span></button>";
            echo "<br><hr>";
           $print_head_card=1;
           echo' <table class="table is-striped " >
                   <thead>
                     <tr>
                       <th>รหัสครุภัณฑ์</th>
                       <th>Location</th>
                       <th>ยี่ห้อ</th>
                       <th>รุ่น</th>
                       <th>ประเภท</th>
                       <th>ลักษณะ</th>
                       <th></th><tr> </thead>' ;
         }
           echo '<tbody><tr>
             <td>'.$book->serial.'</td>
             <td>'.$book->location.'</td>
             <td>'.$book->brand_name.'</td>
             <td>'.$book->generation_name.'</td>
             <td>'.$book->type_name.'</td>
             <td>'.$book->nature_name.'</td>
             <td><button  class="button is-outlined is-danger" style="width:120px;" onclick="delete_each_book('.$book->transection_id.')">
             <span>ลบรายการ</span>
             <span class="icon is-small">
               <i class="fas fa-times"></i>
             </span></button></td><tr>';

        }
     }
     echo '<tr></tr>';
     echo '</tbody></table>';
     echo '</div></div></div>';
   }else {
     echo '<br><br>
     <div class="notification is-link">
       <center><h1><strong>ไม่มีรายการจองในขณะนี้</strong></h1></center>
     </div>';
   }
 ?>
 <!-- //card loop จอง-->
