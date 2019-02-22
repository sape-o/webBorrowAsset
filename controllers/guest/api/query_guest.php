<?php



// write check username  and check email by sent 1,2 (if 1 username ) (if 2 email)
// jquery will post to this
if(isset($_POST['search']) and isset($_POST['type'])){
  include("../../database/guest/api/check_register.php");
  $status = query_email_username($_POST['search'],$_POST['type']);
  echo $status;
  exit();
}


// jquery will post to this , check username and password
if(isset($_POST['username']) && isset($_POST['password'])){
  include("../../database/guest/api/check_login.php");
  $status = query_user_login($_POST['username'],$_POST['password']);
  echo $status;
  exit();
}


 ?>
