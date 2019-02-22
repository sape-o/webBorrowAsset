<?php

if(!file_exists("../../database/core_db_pass.php") ){
  header("HTTP/1.0 404 Not Found");
  echo '
  <html><head>
  <title>404 Not Found</title>
  </head><body>
  <h1>Not Found</h1>
  <p>The requested URL /b5813872/controllers/database/admin/api/insert/insert_status.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';
  exit();
}
include("../../database/core_db_pass.php");

function insert_status_asset($id) {
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $id = trim($id);
    $state_status="";
    $update="";
    $query_asset_id = "SELECT asset.status FROM asset WHERE asset.asset_id='$id' ";
    if ($result = $handle->query($query_asset_id)){
      $row = $result->fetch_assoc();
      $state_status = $row['status'];
    }else{
      $handle->close();
      return "error";
    }
    if($state_status=="ใช้งานได้") {
      $update = "UPDATE asset SET status = 'ใช้งานไม่ได้' WHERE asset.asset_id ='$id' ";
    }else {
      $update = "UPDATE asset SET status = 'ใช้งานได้' WHERE asset.asset_id ='$id' ";
    }
    if ($handle->query($update) === TRUE){
      $handle->close();
      return "finish";
    }else{
      $handle->close();
      return "error";
    }
  }
}


 ?>
