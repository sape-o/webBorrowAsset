<?php
if(!file_exists("../../database/core_db_pass.php") ) {
  header("HTTP/1.0 404 Not Found");
  echo '
  <html><head>
  <title>404 Not Found</title>
  </head><body>
  <h1>Not Found</h1>
  <p>The requested URL /b5813872/controllers/database/guest/api/check_login.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';
  exit();
}
include("../../database/core_db_pass.php");


// for find username password when login
function query_user_login($username,$password){
   global $db_ip,$db_user,$db_pwd,$dbname;
   $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
   $handle->set_charset('utf8');
   if(!$handle){
     die('Could not connect: ' . mysql_error());
     exit();
	 }else{
     $username = $handle->real_escape_string($username);
     $password = $handle->real_escape_string($password);
     $pass = $password;
     $password = md5(md5(md5($password)));
     $password = hash('sha512',$password);
     $find_user_login = "SELECT * FROM user WHERE user.username='$username' AND user.password='$password' LIMIT 1 ;";
     if($result = $handle->query($find_user_login)){
       $row = $result->fetch_assoc();
       if($row['username']==$username && $row['password']==$password){
         $handle->close();
         return "true";
       }else{
         $date = new DateTime();
         $date = $date->format('Y-m-d H:i:s');
         $ip = $_SERVER["REMOTE_ADDR"];

         $sql = "INSERT INTO log_login (log_login_date,log_login_ip,log_login_username)
                 VALUES ('$date','$ip','$username')";
         $handle->query($sql);
         $handle->close();
         return "false";
       }
     }else{
       $handle->close();
       return "error";
     }

   }
}


?>
