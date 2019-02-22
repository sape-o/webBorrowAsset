<?php
session_start();
if(isset($_SESSION['user_type']) and $_SESSION['user_type']==1 and
   isset($_SESSION['user_id'])   and isset($_SESSION['firstname']) and
   isset($_SESSION['lastname'])  and isset($_SESSION['username'])
) {

  // function return "true" or "false" for check is have data
  if(isset($_POST['api_brand']) AND trim(isset($_POST['api_brand']))!='' AND
     isset($_POST['api_generation']) and trim(isset($_POST['api_generation']))!='') {
      include("../../database/admin/api/query/check_asset.php");
      $status = query_check_generation($_POST['api_brand'],$_POST['api_generation']);
      echo $status;
      exit();
  }else if(isset($_POST['api_brand']) AND trim(isset($_POST['api_brand']))!='' ) {
      include("../../database/admin/api/query/check_asset.php");
      $status = query_check_brand($_POST['api_brand']);
      echo $status;
      exit();
  }else if(isset($_POST['api_type']) AND trim(isset($_POST['api_type']))!='' AND
           isset($_POST['api_nature']) AND trim(isset($_POST['api_nature']))!='') {
      include("../../database/admin/api/query/check_asset.php");
      $status = query_check_nature($_POST['api_type'],$_POST['api_nature']);
      echo $status;
      exit();
  }else if(isset($_POST['api_type']) AND trim(isset($_POST['api_type']))!='' ) {
      include("../../database/admin/api/query/check_asset.php");
      $status = query_check_type($_POST['api_type']);
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
  <p>The requested URL /b5813872/controllers/admin/api/query_asset.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';

}


 ?>
