<?php
  if($index_check!='user_type2') {
    header("HTTP/1.0 404 Not Found");
    echo '
    <html><head>
    <title>404 Not Found</title>
    </head><body>
    <h1>Not Found</h1>
    <p>The requested URL /b5813872/views/user/card_borrowing.php was not found on this server.</p>
    <hr>
    <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
    </body></html>
    <!-- Do not try hack this web site-->
    ';
    exit();
  }

?>
<?php

    include("controllers/database/user/core/query/query_all_show_page.php");
    $json_borrowing = query_borrowing_user();
    $borrowin = json_decode($json_borrowing);
    $state_book=0;
    $print_head_card=0;
      if($borrowin>0){
        echo '<div">
               <div>
                <div> <table><tbody>';
        foreach($borrowin as $key=>$borrowin) {
          if($state_book!=$borrowin->borrow_id) {
            $state_book=$borrowin->borrow_id;
            $print_head_card=0; // ถ้าแสดง card ใหม่ กำหนด = 0
            echo '</tbody></table>';
            echo '</div></div></div>';
            echo '<div class="box"  style="margin:20px;">
                   <div class="card-content">';
           echo '<div class="content">';

          }
          if($state_book==$borrowin->borrow_id) {
            if($print_head_card==0) {
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

                       <tr>';
           }
             echo '<tr>
                     <td>'.$borrowin->serial.'</td>
                     <td>'.$borrowin->location.'</td>
                     <td>'.$borrowin->generation_name.'</td>
                     <td>'.$borrowin->type_name.'</td>
                     <td>'.$borrowin->nature_name.'</td>
                     <td>'.$borrowin->transection_checkout_date.'</td>
                     <td>'.$borrowin->transection_due_date.'</td>';
             echo '</tr>';
         }
       }
       echo '<tr></tr>';
       echo '</tbody></table>';
       echo '</div></div></div>';
     }else {
       echo '<br><br>
       <div class="notification is-link">
         <center><h1><strong>ไม่มีรายการยืมในขณะนี้</strong></h1></center>
       </div>';
     }




 ?>
