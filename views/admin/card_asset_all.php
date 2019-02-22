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
  <div class="box"  style="margin:20px;">
    <div class="media-content">
      <div class="content">
        <?php
          include("controllers/database/admin/core/query/query_all_show_page.php");
          $asset = query_asset_all_admin();
          $asset = json_decode($asset);

          if($asset>0){ // ถ้ามีข้อมูลใน DB ให้ แสดงออกมา
            echo'
            <table class="table is-striped is-fullwidth is-bordered">
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
                  <th></th>
                </tr>
              </thead>
              <tbody>';
                  foreach($asset as $key=>$asset){
                    echo '<tr>';
                    echo '<td>'.($key+1).'</td>';
                    echo '<td>'.$asset->serial.'</td>';
                    echo '<td>'.$asset->type_name.'</td>';
                    echo '<td>'.$asset->nature_name.'</td>';
                    echo '<td>'.$asset->brand_name.'</td>';
                    echo '<td>'.$asset->generation_name.'</td>';
                    echo '<td>'.$asset->sn.'</td>';
                    if($asset->status=="ใช้งานไม่ได้")
                      echo '<td style="color:red;">'.$asset->status.'</td>';
                    else
                      echo '<td style="color:blue;">'.$asset->status.'</td>';
                      if($asset->status=='ใช้งานได้')
                        echo '<td><button class="button is-danger" onclick="send('.$asset->asset_id.')" id="change">ใช้งานไม่ได้</button></td>';
                      else
                        echo '<td><button class="button is-info" onclick="send('.$asset->asset_id.')" id="change">ใช้งานได้</button></td>';
                        echo '<td><button class="button is-warning" disable><i class="far fa-edit"></i>Edit</button></td>';
                        echo '</tr>';
                  }


            echo '
              </tbody>
              </table>';
          }else {
            echo '<br><br>
            <div class="notification is-link">
              <center><h1><strong>ไม่มีรายการครุภัณฑ์ในขณะนี้</strong></h1></center>
            </div>';
          }

         ?>
      </div>
    </div>
  </div>
