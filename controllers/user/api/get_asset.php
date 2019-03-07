<?php
session_start();

if(isset($_SESSION['user_type']) and $_SESSION['user_type']==2 and
   isset($_SESSION['user_id'])   and isset($_SESSION['firstname']) and
   isset($_SESSION['lastname'])  and isset($_SESSION['username'])
) {
  if($_GET['q']=="query") {
    include("../../database/user/api/query/get_asset.php");
    $status = query_asset_all_user();
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
  <p>The requested URL /b5813872/controllers/user/api/get_asset.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';

}

 ?>
