<?php
session_start();
if(isset($_SESSION['user_type']) and $_SESSION['user_type']==2 and
   isset($_SESSION['user_id'])   and isset($_SESSION['firstname']) and
   isset($_SESSION['lastname'])  and isset($_SESSION['username'])
) {

  if(isset($_POST['book_temp']) AND trim(isset($_POST['book_temp']))!='') {
      if(!isset($_SESSION['book_temp'])){
        $_SESSION['book_temp'] = array();
      }
      for($i=0;$i<sizeof($_SESSION['book_temp']);$i++) {
        if($_POST['book_temp'] == $_SESSION['book_temp'][$i]) {
          echo "คุณเลือกแล้ว";
          exit();
        }
      }
      array_push($_SESSION['book_temp'],$_POST['book_temp']);
      echo "finish";
      exit();
  }else if(isset($_POST['delete_book_temp']) AND trim(isset($_POST['delete_book_temp']))!='') {
    global $state;
    for($i=0;$i<sizeof($_SESSION['book_temp']);$i++) {
      if($_POST['delete_book_temp'] == $_SESSION['book_temp'][$i]) {
        $state=$i;
        break;
      }
    }
    for($i=$state;$i<sizeof($_SESSION['book_temp'])-1;$i++) {
      $_SESSION['book_temp'][$i]=$_SESSION['book_temp'][($i+1)];
      if($_SESSION['book_temp'][$i]==NULL || $_SESSION['book_temp'][$i]=='')
        unset($_SESSION['book_temp'][$i]);
    }
    unset($_SESSION['book_temp'][sizeof($_SESSION['book_temp'])-1]);
    echo "finish";
    exit();
  }else if(isset($_POST['commit_book_temp']) AND trim(isset($_POST['commit_book_temp']))!='') {
    include("../../database/user/api/insert/insert_book.php");
    $result = insert_book_user();
    if($result=='finish')
      echo $result;
    unset($_SESSION['book_temp']);
  }


}else{
  header("HTTP/1.0 404 Not Found");
  echo '
  <html><head>
  <title>404 Not Found</title>
  </head><body>
  <h1>Not Found</h1>
  <p>The requested URL /b5813872/controllers/admin/admin.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';

}




 ?>
