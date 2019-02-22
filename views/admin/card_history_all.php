<?php
  if($index_check!='user_type1') {
    header("HTTP/1.0 404 Not Found");
    echo '
    <html><head>
    <title>404 Not Found</title>
    </head><body>
    <h1>Not Found</h1>
    <p>The requested URL /b5813872/views/admin/card_history_all.php was not found on this server.</p>
    <hr>
    <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
    </body></html>
    <!-- Do not try hack this web site-->
    ';
    exit();
  }

?>
 <!-- cardloop ประวัติทั้งหมด-->

       <?php
         // ดึงข้อมูล ประวัติทั้งหมด
         include("controllers/database/admin/core/query/query_all_show_page.php");
         $json_book = query_history_all_admin();
         $book = json_decode($json_book);
         $state_book=0;
         $print_head_card=0;
           if($book>0){
             echo '<div">
                    <div>
                     <div> <table><tbody>';
             foreach($book as $key=>$book) {
               if($state_book!=$book->borrow_id) {
                 $state_book=$book->borrow_id;
                 $print_head_card=0; // ถ้าแสดง card ใหม่ กำหนด = 0
                 echo '</tbody></table>';
                 echo '</div></div></div>';
                 echo '<div class="box"  style="margin:20px;">
                        <div class="card-content">';
                echo '<div class="content">';

               }
               if($state_book==$book->borrow_id) {
                 if($print_head_card==0) {
                   echo "<strong>ชื่อ : &nbsp;</strong>".$book->firstname."&nbsp;&nbsp;&nbsp;".$book->lastname."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                   echo "<strong> อาชีพ : &nbsp;</strong>".$book->status."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; //ปริ้นออกตัว หัว Card
                   echo "<strong>เบอร์โทรศัพท์ : &nbsp;</strong>".$book->tel."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                   echo "<strong>E-mail : &nbsp;</strong>".$book->email;
                   echo "<br><hr>";
                  $print_head_card=1;
                  echo' <table class="table is-striped is-fullwidth is-bordered">
                          <tbody>
                            <tr>
                              <th>รหัสครุภัณฑ์</th>
                              <th>Location</th>
                              <th>รุ่น</th>
                              <th>ประเภท</th>
                              <th>ลักษณะ</th>
                              <th>วันยืม</th>
                              <th>วันกำหนดคืน</th>
                              <th>วันที่คืน</th>
                            <tr>';
                }
                  echo '<tr>
                          <td>'.$book->serial.'</td>
                          <td>'.$book->location.'</td>
                          <td>'.$book->generation_name.'</td>
                          <td>'.$book->type_name.'</td>
                          <td>'.$book->nature_name.'</td>
                          <td>'.$book->transection_checkout_date.'</td>
                          <td>'.$book->transection_due_date.'</td>';
                          if($book->transection_checkin_date > $book->transection_due_date) {
                            echo '<td style="color:red;">'.$book->transection_checkin_date.'</td>';
                          }else {
                            echo '<td style="color:blue;">'.$book->transection_checkin_date.'</td>';
                          }
                          echo '</tr>';
              }
            }
            echo '</tbody></table>';
            echo '</div></div></div>';
          }else {
            echo '<br><br>
            <div class="notification is-link">
              <center><h1><strong>ไม่มีรายการคืนในขณะนี้</strong></h1></center>
            </div>';
          }

       ?>
 <!-- //card loop จอง-->
