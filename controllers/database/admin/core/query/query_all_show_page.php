<?php
  // core_db_query_admin.php  // index.php เท่านั้นที่เรียกได้

  /* function query_user_admin   ** function return json **
   * ดึงข้อมูลจาก db แล้ว return ไปให้เป็น json_encode
   * เพื่อให้ card_user_all.php ใช้สำหรับ แสดงข้อมูล
   */

if($index_check!='user_type1'){
  header("HTTP/1.0 404 Not Found");
  echo '
  <html><head>
  <title>404 Not Found</title>
  </head><body>
  <h1>Not Found</h1>
  <p>The requested URL /b5813872/controllers/database/admin/core/query/query_all_show_page.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';
  exit();
}


function query_asset_all_admin() {
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{

    $query_asset="SELECT asset.asset_id,asset.serial,asset.keeper,asset.status,asset.sn,asset.location,
                         asset.comment,asset.acquired_date,asset.purchase_price,brand.brand_name,
                         generation.generation_name,type.type_name,nature.nature_name
                  FROM asset
                  INNER JOIN generation ON asset.generation_id=generation.generation_id
                  INNER JOIN brand ON generation.brand_id=brand.brand_id
                  INNER JOIN nature ON asset.nature_id=nature.nature_id
                  INNER JOIN type ON nature.type_id=type.type_id";

    if($result = $handle->query($query_asset)) {
      //echo "Database is connect<br>";

      while($row = $result->fetch_assoc()) {
        $asset_all[] = $row;
      }
      $handle->close();
      return json_encode($asset_all);
    }else {
      $handle->close();
      return "NO";
    }
  }

}
function query_book_all_admin() { // กำลังจอง
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $query_book = "SELECT transections.transection_id,transections.transection_status,
                          borrow.borrow_id,
                          user.user_id,user.firstname,user.lastname,user.tel,user.department,user.status,
                          user.email,
                          asset.asset_id,asset.serial,asset.sn,asset.purchase_price,asset.location,
                          type.type_name,nature.nature_name,brand.brand_name,generation.generation_name
                          FROM transections
                          JOIN borrow ON borrow.borrow_id=transections.borrow_id
                          JOIN user ON user.user_id=borrow.user_id
                          JOIN asset ON asset.asset_id=transections.asset_id
                          JOIN nature ON nature.nature_id=asset.nature_id
                          JOIN generation ON generation.generation_id=asset.generation_id
                          JOIN type ON type.type_id=nature.nature_id
                          JOIN brand ON brand.brand_id=generation.brand_id
                          WHERE transections.transection_status='จอง'";
    if($result = $handle->query($query_book)) {
      //echo "Database is connect<br>";
      while($row = $result->fetch_assoc()) {
        $book[] = $row;
      }
      $handle->close();
      return json_encode($book);
    }else {
      $handle->close();
      return "NO";
    }
  }

}

function query_borrowing_admin() { //กำลังยืม
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $query_borrowing = "SELECT transections.transection_id,transections.transection_status,
                          transections.transection_checkout_date,transections.transection_due_date,
                          borrow.borrow_id,
                          user.user_id,user.firstname,user.lastname,user.tel,user.department,user.status,
                          user.email,
                          asset.asset_id,asset.serial,asset.sn,asset.purchase_price,asset.location,
                          type.type_name,nature.nature_name,brand.brand_name,generation.generation_name
                          FROM transections
                          JOIN borrow ON borrow.borrow_id=transections.borrow_id
                          JOIN user ON user.user_id=borrow.user_id
                          JOIN asset ON asset.asset_id=transections.asset_id
                          JOIN nature ON nature.nature_id=asset.nature_id
                          JOIN generation ON generation.generation_id=asset.generation_id
                          JOIN type ON type.type_id=nature.nature_id
                          JOIN brand ON brand.brand_id=generation.brand_id
                          WHERE transections.transection_status='ยืม'";
    if($result = $handle->query($query_borrowing)) {
      //echo "Database is connect<br>";
      while($row = $result->fetch_assoc()) {
        $borrowing[] = $row;
      }
      $handle->close();
      return json_encode($borrowing);
    }else {
      $handle->close();
      return "NO";
    }
  }
}

function query_history_all_admin() { //ประวัติการยืม
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $query_history_all = "SELECT transections.transection_id,transections.transection_status,
                          transections.transection_checkout_date,transections.transection_due_date,
                          transections.transection_checkin_date,
                          borrow.borrow_id,
                          user.user_id,user.firstname,user.lastname,user.tel,user.department,user.status,
                          user.email,
                          asset.asset_id,asset.serial,asset.sn,asset.purchase_price,asset.location,
                          type.type_name,nature.nature_name,brand.brand_name,generation.generation_name
                          FROM transections
                          JOIN borrow ON borrow.borrow_id=transections.borrow_id
                          JOIN user ON user.user_id=borrow.user_id
                          JOIN asset ON asset.asset_id=transections.asset_id
                          JOIN nature ON nature.nature_id=asset.nature_id
                          JOIN generation ON generation.generation_id=asset.generation_id
                          JOIN type ON type.type_id=nature.nature_id
                          JOIN brand ON brand.brand_id=generation.brand_id
                          WHERE transections.transection_status='คืน'";
    if($result = $handle->query($query_history_all)) {
      //echo "Database is connect<br>";
      while($row = $result->fetch_assoc()) {
        $history[] = $row;
      }
      $handle->close();
      return json_encode($history);
    }else {
      $handle->close();
      return "NO";
    }

  }
}

//query_user_admin
//query_asset_all_admin
function query_user_admin(){
  global $db_ip,$db_user,$db_pwd,$dbname;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $sql_select = "SELECT user.firstname,user.lastname,user.age,user.email,user.tel
                   FROM user INNER JOIN user_permission
                   ON user.user_permission_id=user_permission.user_permission_id WHERE user.user_permission_id=2 ";

    if($result = $handle->query($sql_select)) {
      //echo "Database is connect<br>";
      while($row = $result->fetch_assoc()) {
        $user[] = $row;
      }
      $handle->close();
      return json_encode($user);
    }else {
      $handle->close();
      return "NO";
    }
  }

}



 ?>
