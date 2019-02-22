<?php
  if($index_check!='user_type2') {
    header("HTTP/1.0 404 Not Found");
    echo '
    <html><head>
    <title>404 Not Found</title>
    </head><body>
    <h1>Not Found</h1>
    <p>The requested URL /b5813872/views/user/card_search_all.php was not found on this server.</p>
    <hr>
    <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
    </body></html>
    <!-- Do not try hack this web site-->
    ';
    exit();
  }


?>

<!-- cardloop ค้นหาทั้งหมด-->
<div class="box" style="margin:20px;">
  <div class="card-content">
    <div class="content">
      <?php
        include("controllers/database/user/core/query/query_all_show_page.php");
        $asset_all = query_asset_all_user();
        $asset_all = json_decode($asset_all);
        //เอามาคิวรี แสดงผลข้อมูล
        if($asset_all>0){ // ถ้ามีข้อมูลใน DB ให้ แสดงออกมา
          echo'
          <table boder=1 class="table is-striped">
            <thead>
              <tr>
                <th>ที่</th>
                <th>รหัสครุภัณฑ์</th>
                <th>ชนิด</th>
                <th>ลักษณะ</th>
                <th>ยี่ห้อ</th>
                <th>รุ่น</th>
                <th>s/n</th>
                <th>สถานะ</th>
                <th></th>
              </tr>
            </thead>
            <tbody>';
                foreach($asset_all as $key=>$asset_all){
                  echo '<tr>';
                    echo '<td>'.($key+1).'</td>';
                    echo '<td>'.$asset_all->serial.'</td>';
                    echo '<td>'.$asset_all->type_name.'</td>';
                    echo '<td>'.$asset_all->nature_name.'</td>';
                    echo '<td>'.$asset_all->brand_name.'</td>';
                    echo '<td>'.$asset_all->generation_name.'</td>';
                    echo '<td>'.$asset_all->sn.'</td>';
                    if($asset_all->status=="ใช้งานไม่ได้"){
                      echo '<td style="color:red;">'.$asset_all->status.'</td>';
                    }else{
                      echo '<td style="color:blue;">'.$asset_all->status.'</td>';
                    }
                      $result_ass_tran = query_asset_transection_user($asset_all->asset_id);
                      if($result_ass_tran=='false'){
                        echo '<td><button class="button is-danger" style="width:80%;" disabled>ถูกยืมแล้ว</button></td>';
                      }else{
                        echo '<td><button class="button is-info" style="width:80%" onclick="book_temp('.$asset_all->asset_id.')" id="change">จอง</button></td>';
                      }
                  echo '</tr>';
                }
          echo '<tr></tr>';
          echo '</tbody>
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
<!-- //card loop ค้นหาทั้งหมด-->
