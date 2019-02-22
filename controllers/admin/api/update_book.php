<?php
session_start();
if(isset($_SESSION['user_type']) and $_SESSION['user_type']==1 and
   isset($_SESSION['user_id'])   and isset($_SESSION['firstname']) and
   isset($_SESSION['lastname'])  and isset($_SESSION['username'])
) {

  // api for change จอง เป็นยืม
  if(isset($_POST['commit_book']) AND trim($_POST['commit_book'])!='') {
    // call function  update in translate
    include("../../database/admin/api/update/update_transection.php");
    $status = update_book($_POST['commit_book']);
    echo $status;
    exit();
  }
  // api for delete list book in translate
  if(isset($_POST['del_lis_book']) AND trim($_POST['del_lis_book'])!='') {
    // call function delete in translate  by id in tran
    include("../../database/admin/api/delete/delete_transection.php");
    $status = delete_book($_POST['del_lis_book']);
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
  <p>The requested URL /b5813872/controllers/admin/api/update_book.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';

}




 ?>
