<?php

if(!file_exists("controllers/database/core_db_pass.php") || $index_check!='user_type1'){
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
function query_log($id) {
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }else{

    $query_log = "SELECT * FROM log_login WHERE log_login.log_login_username='$id' ";

    if($result = $handle->query($query_log)) {
      //echo "Database is connect<br>";
      while($row = $result->fetch_assoc()){
        $data[] = $row;
      }
      $handle->close();
      return json_encode($data);
    }else {
      $handle->close();
      return "NO";
    }
  }

}

 ?>
