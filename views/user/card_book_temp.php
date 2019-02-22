<?php
if($index_check!='user_type2') {
  header("HTTP/1.0 404 Not Found");
  echo '
  <html><head>
  <title>404 Not Found</title>
  </head><body>
  <h1>Not Found</h1>
  <p>The requested URL /b5813872/views/user/card_book_temp.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';
  exit();
}


 ?>
 <div class="box"  style="margin:20px;">
   <div class="card-content">
     <div class="content">
       <?php
       if(sizeof($_SESSION['book_temp'])>0) {
          include("controllers/database/user/core/query/query_book_temp.php");

          echo '<table class="table is-striped">
                <thead>
                  <tr>
                    <th>ที่</th>
                    <th>รหัสครุภัณฑ์</th>
                    <th>ชนิด</th>
                    <th>ลักษณะ</th>
                    <th>ยี่ห้อ</th>
                    <th>รุ่น</th>
                    <th>S/N</th>
                    <th>สถานะ</th>
                    <th></th>
                  </tr>
                </thead> ';
          echo '<tbody>';

         for($i=0;$i<sizeof($_SESSION['book_temp']);$i++) {

           $result = query_book_temp_user($_SESSION['book_temp'][$i]);
           $result = json_decode($result);
           echo '<tr>
                    <td>'.($i+1).'</td>
                    <td>'.$result->serial.'</td>
                    <td>'.$result->type_name.'</td>
                    <td>'.$result->nature_name.'</td>
                    <td>'.$result->brand_name.'</td>
                    <td>'.$result->generation_name.'</td>
                    <td>'.$result->sn.'</td>
                    <td>'.$result->status.'</td>
                    <td><button class="button is-danger is-outlined" onclick="cancel_book_temp('.$result->asset_id.')">
                          <span>ลบ</span>
                          <span class="icon is-small">
                            <i class="fas fa-times"></i>
                          </span>
                        </button>
                    </td>
                 </tr>';
         }
         echo '<tr></tr>';
         echo '</tbody></table>';
         echo "<br>";
         echo '<center><button class="button is-info is-large is-fullwidth" onclick="commit_book_temp(111)">ยืนยันการจอง</button></center>';
       }else {
         echo '<br><br>
         <div class="notification is-link">
           <center><h1><strong>ไม่มีรายการยืมในตระกร้า</strong></h1></center>
         </div>';
       }

       ?>
       </div>
     </div>
 </div>
