<?php
  /* เอาไว้ดัก ถ้าเกิดว่า มีคนเข้าผ่านลิ้งนี้โดยตรงเช่น  server.com/addition/head_admin.php มันจะแสดงว่าไม่มีไฟลนี้ (ทั้งๆที่มี)
   * จะสามารถ รันไฟล นี้ได้ก็ต่อเมื่อ เข้าผ่าน index.php และ และ index.php เรียกใช้ไฟล นี้เท่านั้น
   */
  if($index_check!='user_type1') {
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
    exit();
  }
  // นำไฟล์ api ที่เอาไว้รับ POST ของ admin
  include("controllers/admin/core_api/insert.php");

  //$_SESSION['state_nav'] เอาไว้ให้มันกลับเข้าหน้าเดิม เช่น เราอยู่หน้า add asset แล้ว เรากด submit มันจะต้องรีเฟรชกลับไปหน้า add asset เหมือนเดิม
  if($_GET['add']==$_SESSION['username']) {
    $_SESSION['state_nav']="add";
  }else if($_GET['asset']==$_SESSION['username']) {
    $_SESSION['state_nav']="asset";
  }else if($_GET['booking']==$_SESSION['username']) {
    $_SESSION['state_nav']="booking";
  }else if($_GET['borrowing']==$_SESSION['username']) {
    $_SESSION['state_nav']="borrowing";
  }else if($_GET['history']==$_SESSION['username']) {
    $_SESSION['state_nav']="history";
  }else if($_GET['user']==$_SESSION['username']) {
    $_SESSION['state_nav']="user";
  }else if($_GET['log']==$_SESSION['username']) {
    $_SESSION['state_nav']="log";
  }

  if(!(isset($_SESSION['state_asset_tab']))){
    $_SESSION['state_asset_tab']="0";
  }
  if(isset($_POST['sessionTab'])) {
    $_SESSION['state_asset_tab']=$_POST['sessionTab'];
    echo "IS= ".$_POST['sessionTab'];

  }

  if($_SESSION['state_nav']=="add") {
    include("views/addition/nav_admin.php");
    include("views/admin/card_add_asset.php");
  }else if($_SESSION['state_nav']=="asset") {
    include("views/addition/nav_admin.php");
    include("views/admin/card_asset_all.php");
  }else if($_SESSION['state_nav']=="booking") {
    include("views/addition/nav_admin.php");
    include("views/admin/card_booking.php");
  }else if($_SESSION['state_nav']=="borrowing") {
    include("views/addition/nav_admin.php");
    include("views/admin/card_borrowing.php");
  }else if($_SESSION['state_nav']=="history") {
    include("views/addition/nav_admin.php");
    include("views/admin/card_history_all.php");
  }else if($_SESSION['state_nav']=="user") {
    include("views/addition/nav_admin.php");
    include("views/admin/card_user_all.php");
  }else if(  $_SESSION['state_nav']=="log"){
    include("views/addition/nav_admin.php");
    include("views/admin/nav_right_drop/card_show_log_admin.php");
  }else{
    $_SESSION['state_nav']="booking";
    include("views/addition/nav_admin.php");
    include("views/admin/card_booking.php");
  }
?>
