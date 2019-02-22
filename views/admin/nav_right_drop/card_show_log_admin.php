<?php
if($index_check!='user_type1') {
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
           include("controllers/database/admin/core/query/query_log_admin.php");
           $result = query_log($_SESSION['username']);
           $result = json_decode($result);
           if($result>0){
           echo '<table class="table is-striped">

                 <thead>
                   <tr>
                     <th>ที่</th>
                     <th>วันที่</th>
                     <th>IP Address</th>
                   </tr>
                 </thead> ';

           echo '<tbody>';
           foreach ($result as $key => $result) {
             echo '<tr>
                      <td>'.($key+1).'</td>
                      <td>'.$result->log_login_date.'</td>
                      <td>'.$result->log_login_ip.'</td>
                   </tr>';
           }
           echo '<tr></tr>';
           echo '</tbody>
                </table>';


       }else {
         echo '<br><br>
         <div class="notification is-link">
           <center><h1><strong>ไม่มี Log การ login ผิดพลาด</strong></h1></center>
         </div>';
       }

       ?>
       </div>
     </div>
 </div>
