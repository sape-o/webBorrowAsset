<?php
session_start();
if(isset($_SESSION['user_type']) and $_SESSION['user_type']==1 and
   isset($_SESSION['user_id'])   and isset($_SESSION['firstname']) and
   isset($_SESSION['lastname'])  and isset($_SESSION['username'])
) {
  include("../../database/admin/api/insert/insert_status.php");

  // function return "true" or "false" for insert data
  if(isset($_POST['asset_id']) AND trim(isset($_POST['asset_id']))!='') {  // change status of asset
      $status = insert_status_asset($_POST['asset_id']);
      echo $status;
      exit();
  }

}else{
  header("HTTP/1.0 404 Not Found");
  echo '
  <html><head>
  <title>404 Not Found</title>
  </head><body>
  <h1>Not Found</h1>
  <p>The requested URL /b5813872/controllers/admin/api/insert_status.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';

}


 ?>
