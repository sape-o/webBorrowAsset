<?php

/* เอาไว้ดัก ถ้าเกิดว่า มีคนเข้าผ่านลิ้งนี้โดยตรงเช่น  server.com/addition/head_admin.php มันจะแสดงว่าไม่มีไฟลนี้ (ทั้งๆที่มี)
 * จะสามารถ รันไฟล นี้ได้ก็ต่อเมื่อ เข้าผ่าน index.php และ และ index.php เรียกใช้ไฟล นี้เท่านั้น
 */

  if(!file_exists("controllers/database/config/core_db_pass.php") || $index_check!='user_type2'){
    header("HTTP/1.0 404 Not Found");
    echo '
    <html><head>
    <title>404 Not Found</title>
    </head><body>
    <h1>Not Found</h1>
    <p>The requested URL /b5813872/controllers/database/user/core/query/query_book_temp.php was not found on this server.</p>
    <hr>
    <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
    </body></html>
    <!-- Do not try hack this web site-->
    ';
    exit();
  }

  include("controllers/database/config/core_db_pass.php");
// query all asset ที่ ใช้งานได้ และไม่มีคนกำลังจอง
function query_book_temp_user($id) {
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{

    $query_asset = "SELECT asset.asset_id,asset.serial,asset.keeper,asset.status,asset.sn,asset.location,
                           asset.comment,asset.acquired_date,asset.purchase_price,brand.brand_name,
                           generation.generation_name,type.type_name,nature.nature_name
                           FROM asset
                           INNER JOIN generation ON asset.generation_id=generation.generation_id
                           INNER JOIN brand ON generation.brand_id=brand.brand_id
                           INNER JOIN nature ON asset.nature_id=nature.nature_id
                           INNER JOIN type ON nature.nature_id=type.type_id
                           WHERE asset.asset_id='$id'
                           LIMIT 1 ";

    if($result = $handle->query($query_asset)) {
      //echo "Database is connect<br>";
      $row = $result->fetch_assoc();
      $handle->close();
      return json_encode($row);
    }else {
      $handle->close();
      return "NO";
    }
  }

}


 ?>
