<?php

if(!file_exists("../../database/config/core_db_pass.php") ){
  header("HTTP/1.0 404 Not Found");
  echo '
  <html><head>
  <title>404 Not Found</title>
  </head><body>
  <h1>Not Found</h1>
  <p>The requested URL /b5813872/controllers/database/admin/api/update/update_transection.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';
  exit();
}

include("../../database/config/core_db_pass.php");
// function change จอง เป็นยืม
function update_book($id) {
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $id = trim($id);
    $date = new DateTime();
    $due_date = $date;
    $date = $date->format('Y-m-d');

    $due_date->modify('+4 week');
    $due_date = $due_date->format('Y-m-d');


    $update_book = "UPDATE transections
                    SET transection_status='ยืม',
                    transection_checkout_date='$date',
                    transection_due_date='$due_date'
                    WHERE borrow_id='$id' ";
    if ($handle->query($update_book) === TRUE) {
        $handle->close();
        return "finish";
    } else {
        echo $handle->error;
        $handle->close();
        return "false";
    }
  }
}
// function change borrowing each
function return_each_borrowing($id) {
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $id = trim($id);
    $date = new DateTime();
    $date = $date->format('Y-m-d');


    $each_borrowing = " UPDATE transections
                        SET transection_status='คืน', transection_checkin_date='$date'
                        WHERE transection_id=$id ";
    if ($handle->query($each_borrowing) === TRUE) {
        $handle->close();
        return "finish";
    } else {
        echo $handle->error;
        $handle->close();
        return "false";
    }
  }
}
// function change borrowing all
function return_all_borrowing($id) {
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $id = trim($id);
    $date = new DateTime();
    $due_date = $date;
    $date = $date->format('Y-m-d');

    $due_date->modify('+4 week');
    $due_date = $due_date->format('Y-m-d');


    $all_borrowing = "  UPDATE transections
                      SET transection_status='คืน', transection_checkin_date='$date'
                      WHERE borrow_id=$id ";
    if ($handle->query($all_borrowing) === TRUE) {
        $handle->close();
        return "finish";
    } else {
        echo $handle->error;
        $handle->close();
        return "false";
    }
  }
}

?>
