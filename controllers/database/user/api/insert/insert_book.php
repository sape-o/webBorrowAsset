<?php

if(!file_exists("../../database/config/core_db_pass.php") ) {
  header("HTTP/1.0 404 Not Found");
  echo '
  <html><head>
  <title>404 Not Found</title>
  </head><body>
  <h1>Not Found</h1>
  <p>The requested URL /b5813872/controllers/database/user/api/insert/insert_book.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';
  exit();
}
include("../../database/config/core_db_pass.php");

// admin insert brand in add asset page
function insert_book_user() {
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $v = $_SESSION['user_id'];
    $sql = "INSERT INTO borrow (user_id) VALUES ('$v')";
    if ($handle->query($sql) === FALSE){
      echo "Error: " . $sql . "<br>" . $handle->error;
    }
    $max_borrow=0;
    $sql = "SELECT borrow.borrow_id FROM borrow WHERE borrow.user_id=$v ORDER BY user_id DESC";
    if($result = $handle->query($sql)) {
      while($row = $result->fetch_assoc()) {
        $max_borrow = $row['borrow_id'];
      }
    }
    $check_point_fail=0;
    for($i=0;$i<sizeof($_SESSION['book_temp']);$i++) {
      $va = $_SESSION['book_temp'][$i];
      $query_check = "SELECT transections.transection_id,transections.transection_status
                      FROM transections
                      WHERE asset_id='$va' AND
                      (transections.transection_status='จอง' OR transections.transection_status='ยืม') ";

      if($result = $handle->query($query_check)) {
        if($row = $result->fetch_assoc()) {
          if($row['transection_id']>0){
            $check_point_fail=$va;
            return "รายการที่ \"".($i+1)."\" ถูกยืมไปแล้ว กรุณาลบ";
            exit();

          }else {
            $check_point_fail=0;
            continue;
          }
        }
      }
    }

    if($check_point_fail==0) {
        for($i=0;$i<sizeof($_SESSION['book_temp']);$i++) {
          $va = $_SESSION['book_temp'][$i];
          $insert_book = "INSERT INTO transections (asset_id,borrow_id) VALUES ('$va', '$max_borrow')";
          if ($handle->query($insert_book) === FALSE){
            echo "Error: " . $insert_brand . "<br>" . $handle->error;
          }
        }
        $handle->close();
        return "finish";
    }

  }

}
?>
