<?php
  if($index_check!='user_type1') {
    header("HTTP/1.0 404 Not Found");
    echo '
    <html><head>
    <title>404 Not Found</title>
    </head><body>
    <h1>Not Found</h1>
    <p>The requested URL /b5813872/views/admin/card_user_all.php was not found on this server.</p>
    <hr>
    <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
    </body></html>
    <!-- Do not try hack this web site-->
    ';
    exit();
  }

?>
<!-- cardloop user-->
<div class="box" id="card_user_all" style="margin:20px;">
  <div class="card-content">
    <div class="content">
      <?php
        include("controllers/database/admin/core/query/query_all_show_page.php");
        $user = query_user_admin();
        $user = json_decode($user);
        if($user>0){ // ถ้ามีข้อมูลใน DB ให้ แสดงออกมา
          echo'
          <table class="table is-striped is-fullwidth is-bordered">
            <thead>
              <tr>
                <th>ที่</th> <th>ชื่อ</th> <th>นามสกุล</th> <th>อายุ</th> <th>email</th> <th>เบอร์</th>
              </tr>
            </thead>
            <tbody>';
                foreach($user as $key=>$user){
                  echo '<tr>';
                  echo '<td>'.($key+1).'</td>';
                  echo '<td>'.$user->firstname.'</td>';
                  echo '<td>'.$user->lastname.'</td>';
                  echo '<td>'.$user->age.'</td>';
                  echo '<td>'.$user->email.'</td>';
                  echo '<td>'.$user->tel.'</td>';
                  echo '</tr>';
                }
          echo '
            </tbody>
            </table>';
        }else{
          echo'
          <div class="notification is-danger">
            <strong>ไม่มีข้อมูล user</strong>
          </div>';
        }

       ?>
    </div>
  </div>
</div>
<!-- //card loop user-->
