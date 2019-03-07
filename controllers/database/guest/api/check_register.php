<?php

if(!file_exists("../../database/config/core_db_pass.php") ) {
  header("HTTP/1.0 404 Not Found");
  echo '
  <html><head>
  <title>404 Not Found</title>
  </head><body>
  <h1>Not Found</h1>
  <p>The requested URL /b5813872/controllers/database/guest/api/check_register.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';
  exit();
}
include("../../database/config/core_db_pass.php");

// find username and email for Register
function query_email_username($key_search,$type){
   global $db_ip,$db_user,$db_pwd,$dbname,$result,$find_user;
   $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
   $handle->set_charset('utf8');
   if(!$handle){
     die('Could not connect: ' . mysql_error());
	 }else{
     $find = $handle->real_escape_string($key_search);
     $type_select = $handle->real_escape_string($type);
     if($type_select=='1')
        $find_user = "SELECT * FROM user WHERE user.username='$find' LIMIT 1 ";
     else if ($type_select=='2')
        $find_user = "SELECT * FROM user WHERE user.email='$find' LIMIT 1 ";
     //$find=mysql_real_escape_string($key_search);
     if($result = $handle->query($find_user)){
       $row = $result->fetch_assoc();
        if($row[user_id]>=1){
          $handle->close();
          return "false";
        }else{
          $handle->close();
          return "true";
        }
     }else{
       $handle->close();
       return "error";
     }

   }
   if (mysqli_connect_errno()) {
     echo "<br/>";
     printf("\nConnect failed: %s\n", mysqli_connect_error());
	   exit();
   }

}



?>
