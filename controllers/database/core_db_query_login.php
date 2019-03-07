<?php
  // ไฟล์ core_db_query_login.php  นี้มี 2 function // index.php เท่านั้นที่เรียกได้

  /* function connect_db_check_login  ** function return **
   * เอาไว้เช็กตอน กด login แล้วไป query DB ถ้ามี ให้ set session
   */
  /* function connect_db_check_stay_login ** function return **
   * เอาไวัเช็ก ตอนที่ รีเฟรช ว่ามันยังมี session อยู่ไหม ถ้าไม่มี ให้ ออกจากระบบเลย
   * ยกตัวอย่างเช่น userล็อกอินค้าง แต่ user โดนลบ พอกด refresh หรือทำรายการใดๆ มันจะout ออกทันที
   */


   /* เอาไว้ดัก ถ้าเกิดว่า มีคนเข้าผ่านลิ้งนี้โดยตรงเช่น  server.com/addition/head_admin.php มันจะแสดงว่าไม่มีไฟลนี้ (ทั้งๆที่มี)
    * จะสามารถ รันไฟล นี้ได้ก็ต่อเมื่อ เข้าผ่าน index.php และ และ index.php เรียกใช้ไฟล นี้เท่านั้น
    */
if(!file_exists("controllers/database/config/core_db_pass.php") ){
  header("HTTP/1.0 404 Not Found");
  echo '
  <html><head>
  <title>404 Not Found</title>
  </head><body>
  <h1>Not Found</h1>
  <p>The requested URL /b5813872/controllers/database/core_db_query_login.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';
  exit();
}
include("controllers/database/config/core_db_pass.php");

// use for login
function connect_db_check_login($username,$password) {// รับข้อมูลจากหน้าแรก user กรอก
   global $db_ip,$db_user,$db_pwd,$dbname;
   $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
   $handle->set_charset('utf8');
   if(!$handle){
     die('Could not connect: ' . mysql_error());
	 }else{
     $username = trim($username);
     // mysql_real_escape_string() SQL injection
     $username = $handle->real_escape_string($username);
     $password = $handle->real_escape_string($password);
     $password = md5(md5(md5($password)));
     $password = hash('sha512',$password);
     $sql_select = "SELECT * FROM user WHERE user.username='$username' and user.password='$password' LIMIT 1 ";

     if($result = $handle->query($sql_select)) {
       //echo "Database is connect<br>";
       $row = $result->fetch_assoc();
        $_SESSION['user_id']=$row['user_id'];
        $_SESSION['user_type']=$row['user_permission_id'];
        $_SESSION['firstname']=$row['firstname'];
        $_SESSION['lastname']=$row['lastname'];
        $_SESSION['username']=$row['username'];
        $_SESSION['token']=$row['token'];

     }
     $handle->close();
     return "NO";
   }

   if (mysqli_connect_errno()) {
     echo "<br/>";
     printf("\nConnect failed: %s\n", mysqli_connect_error());
	   exit();
   }
   $handle->close();

}
// check stay login
function connect_db_check_stay_login($username,$token) { //รับข้อมูลจาก session
   global $db_ip,$db_user,$db_pwd,$dbname;
   $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
   $handle->set_charset('utf8');
   if(!$handle) {
     die('Could not connect: ' . mysql_error());
	 }else{
     $sql_select = "SELECT * FROM user WHERE user.username='$username' and user.token='$token' LIMIT 1 ";

     if($result = $handle->query($sql_select)) {
       //echo "Database is connect<br>";

       $row = $result->fetch_assoc();
        if($row['username']== $username && $row['token']==$token) {
          $_SESSION['user_id']=$row['user_id'];
          $_SESSION['user_type']=$row['user_permission_id'];
          $_SESSION['firstname']=$row['firstname'];
          $_SESSION['lastname']=$row['lastname'];
          $_SESSION['username']=$row['username'];
          $_SESSION['token']=$row['token'];
          $handle->close();
          return "1";
        }else {
          $handle->close();
          return "0";
        }
     }

     $handle->close();
     return "NO";
   }

   if (mysqli_connect_errno()) {
     echo "<br/>";
     printf("\nConnect failed: %s\n", mysqli_connect_error());
	   exit();
   }

}

?>
