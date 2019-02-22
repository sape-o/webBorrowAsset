<?php


if(!file_exists("../../database/core_db_pass.php") ) {
  header("HTTP/1.0 404 Not Found");
  echo '
  <html><head>
  <title>404 Not Found</title>
  </head><body>
  <h1>Not Found</h1>
  <p>The requested URL /b5813872/controllers/database/admin/api/delete/delete_transection.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';
  exit();
}
include("../../database/core_db_pass.php");
// function update status in transection
function delete_book($id) {
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{
    $id = trim($id);
    $state_status="";
    $update="";
    $delete_book = "DELETE FROM transections WHERE transections.transection_id='$id' ";
    if ($handle->query($delete_book) === TRUE) {
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
