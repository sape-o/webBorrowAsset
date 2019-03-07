<?php
session_start();
if(isset($_SESSION['user_type']) and $_SESSION['user_type']==2 and
   isset($_SESSION['user_id'])   and isset($_SESSION['firstname']) and
   isset($_SESSION['lastname'])  and isset($_SESSION['username'])
) {

  if(isset($_POST['delete_book']) AND trim(isset($_POST['delete_book']))!='') {
    include("../../database/user/api/delete/delete_transection.php");
    $status = delete_book_all($_POST['delete_book']);
    echo $status;
    exit();
  }else if(isset($_POST['delete_each_book']) AND trim(isset($_POST['delete_each_book']))!=''){
    include("../../database/user/api/delete/delete_transection.php");
    $status = delete_book($_POST['delete_each_book']);
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
  <p>The requested URL /b5813872/controllers/user/api/delete_book.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';

}

 ?>
