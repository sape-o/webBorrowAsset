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
    <p>The requested URL /b5813872/controllers/database/user/core/query/query_all_show_page.php was not found on this server.</p>
    <hr>
    <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
    </body></html>
    <!-- Do not try hack this web site-->
    ';
    exit();
  }

  include("controllers/database/config/core_db_pass.php");
// query all asset ที่ ใช้งานได้ และไม่มีคนกำลังจอง
function query_asset_all_user() { //ไม่ได้ใช้แล้ว ไปใช้ Get_asset.php แทน
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
                           INNER JOIN type ON nature.type_id=type.type_id
                           WHERE asset.status='ใช้งานได้' ";

    if($result = $handle->query($query_asset)) {
      //echo "Database is connect<br>";
      while($row = $result->fetch_assoc()) {
        $json[] = $row;

      }
      $handle->close();
      $json_asset = json_encode($json);
      return $json_asset;
    }else {
      $handle->close();
      return "NO";
    }
  }

}
function query_asset_transection_user($asset_id) {
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{

    $query_asset = "SELECT transections.transection_id
                    FROM transections
                    WHERE transections.asset_id='$asset_id'
                    AND (transections.transection_status='จอง'
                    OR transections.transection_status='ยืม') ";

    if($result = $handle->query($query_asset)) {
      //echo "Database is connect<br>";
      $row = $result->fetch_assoc();
      if($row['transection_id']>0) {
        $handle->close();
        return "false";
      }else {
        $handle->close();
        return "true";
      }
    }
  }

}
function query_book_user() {
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $id = $_SESSION['user_id'];
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
                          JOIN type ON type.type_id=nature.type_id
                          JOIN brand ON brand.brand_id=generation.brand_id
                          WHERE transections.transection_status='จอง' AND user.user_id='$id'";

    if($result = $handle->query($query_book)) {
      while($row = $result->fetch_assoc()) {
        $book_user[] = $row;
      }
      $book_user = json_encode($book_user);
      $handle->close();
      return $book_user;

    }else {
        $handle->close();
        return "false";
    }

  }

}

function query_borrowing_user() { //กำลังยืม
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $id = $_SESSION['user_id'];
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
                          JOIN type ON type.type_id=nature.type_id
                          JOIN brand ON brand.brand_id=generation.brand_id
                          WHERE transections.transection_status='ยืม' AND user.user_id='$id'";
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
function query_history_user() { //ประวัติการยืม
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $id = $_SESSION['user_id'];
    $query_history_all = "SELECT transections.transection_id,transections.transection_status,
                          transections.transection_checkout_date,transections.transection_due_date,
                          transections.transection_checkin_date,
                          borrow.borrow_id,
                          user.user_id,user.firstname,user.lastname,user.tel,user.department,user.status,
                          user.email,
                          asset.asset_id,asset.serial,asset.sn,asset.purchase_price,
                          type.type_name,nature.nature_name,brand.brand_name,generation.generation_name
                          FROM transections
                          JOIN borrow ON borrow.borrow_id=transections.borrow_id
                          JOIN user ON user.user_id=borrow.user_id
                          JOIN asset ON asset.asset_id=transections.asset_id
                          JOIN nature ON nature.nature_id=asset.nature_id
                          JOIN generation ON generation.generation_id=asset.generation_id
                          JOIN type ON type.type_id=nature.type_id
                          JOIN brand ON brand.brand_id=generation.brand_id
                          WHERE transections.transection_status='คืน' AND user.user_id='$id'";
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




 ?>
