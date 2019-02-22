<?php
  if($index_check!='user_type2') {
    header("HTTP/1.0 404 Not Found");
    echo '

    <html><head>
    <title>404 Not Found</title>
    </head><body>
    <h1>Not Found</h1>
    <p>The requested URL /b5813872/controllers/user/user.php was not found on this server.</p>
    <hr>
    <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
    </body></html>
    <!-- Do not try hack this web site-->
    ';
    exit();
  }

 // Nav
 $_SESSION['state_nav']="borrowing";
  if($_GET['search']==$_SESSION['username']) {
    $_SESSION['state_nav']="search";
  }else if($_GET['reserved']==$_SESSION['username']) {
    $_SESSION['state_nav']="reserved";
  }else if($_GET['borrowing']==$_SESSION['username']) {
    $_SESSION['state_nav']="borrowing";
  }else if($_GET['history']==$_SESSION['username']) {
    $_SESSION['state_nav']="history";
  }else if($_GET['book_temp']==$_SESSION['username']) {
    $_SESSION['state_nav']="book_temp";
  }else if($_GET['log']==$_SESSION['username']) {
    $_SESSION['state_nav']="log";
  }

  if($_SESSION['state_nav']=="search"){
    include("views/addition/nav_user.php");
    include("views/user/card_search_all.php");
  }else if($_SESSION['state_nav']=="reserved"){
    include("views/addition/nav_user.php");
    include("views/user/card_book.php");
  }else if($_SESSION['state_nav']=="history"){
    include("views/addition/nav_user.php");
    include("views/user/card_history_all.php");
  }else if($_SESSION['state_nav']=="book_temp"){
    include("views/addition/nav_user.php");
    include("views/user/card_book_temp.php");
  }else if(  $_SESSION['state_nav']=="log"){
    include("views/addition/nav_user.php");
    include("views/user/nav_right_drop/card_show_log_user.php");
  }else{
    include("views/addition/nav_user.php");
    include("views/user/card_borrowing.php");
  }

?>
