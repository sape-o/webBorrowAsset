<?php
  // core_db_query_guest  มี 1 fanction  // index.php เท่านั้นที่เรียกได้

  /* function register  ** function return **
   * เอาไวัสำหรับ register  โดย จะ insert ข้อมูลเข้าไปก่อน จากนั้น ค่อย query ข้อมูลออกมา เช็กอีกรอบ
   * ถ้าเกิดว่า เช็กอีกรอบแล้ว มันไม่มีอยู่ในระบบ มันจะไม่ set session ให้ ถ้ามี ก็จะ set session ให้ แล้วทำการเด้งไปหน้า user
   */

if(!file_exists("controllers/database/core_db_pass.php") || $index_check!='regis'){
  header("HTTP/1.0 404 Not Found");
  echo '
  <html><head>
  <title>404 Not Found</title>
  </head><body>
  <h1>Not Found</h1>
  <p>The requested URL /b5813872/controllers/database/guest/core/insert/register.php was not found on this server.</p>
  <hr>
  <address>Apache/2.2.15 (CentOS) Server at student.sut.ac.th Port 80</address>
  </body></html>
  <!-- Do not try hack this web site-->
  ';
  exit();
}

include("controllers/database/core_db_pass.php");

function register($firstname,$lastname,$age,$gender,$username,$password,$email,$tel,$status,$token){ // function return
  global $db_ip,$db_user,$db_pwd,$dbname,$handle;
  $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
  $handle->set_charset('utf8');
  if(!$handle){
    die('Could not connect: ' . mysql_error());
  }

  //mysql_real_escape_string() SQL injection
  $password = $handle->real_escape_string($password);
  // ทำการเข้ารหัสข้อมูลก่อน  ** md5 สามารถ ถอดออกมาได้ วิธีนี้ไม่ปลอดภัย ถ้าเกิดว่ารู้ว่าเข้ารหัสแบบไหน
  $password = md5(md5(md5($password)));
  $password = hash('sha512',$password);
  $firstname = trim($firstname);
  $lastname = trim($lastname);
  $age = trim($age);
  $gender = trim($gender);
  $username = trim($username);
  $email = trim($email);
  $tel = trim($tel);
  $status = trim($status);
  $token = trim($token);
  $sql_insert_register ="INSERT INTO user (firstname, lastname, age, gender, username, password, email, tel,status, token )
    VALUES ('$firstname', '$lastname', '$age', '$gender', '$username', '$password', '$email', '$tel','$status', '$token')";

    if ($handle->query($sql_insert_register) === FALSE){
        echo "Error: " . $sql_insert_register . "<br>" . $handle->error;
    }
    $handle->close();
    $handle=new mysqli($db_ip, $db_user, $db_pwd,$dbname);
    $handle->set_charset('utf8');
    if(!$handle){
      die('Could not connect: ' . mysql_error());
    }
    //ตอน select  password ก็ต้อง เข้ารหัสก่อน แล้วค่อยเอาไปเปรียบเทียบ
    $sql_select_user_for_session = "SELECT * FROM user WHERE user.username='$username' and user.password='$password' LIMIT 1 ";
    if($result = $handle->query($sql_select_user_for_session)){
      $row = $result->fetch_assoc();
      $_SESSION['user_id']=$row['user_id'];
      $_SESSION['user_type']=$row['user_type'];
      $_SESSION['firstname']=$row['firstname'];
      $_SESSION['lastname']=$row['lastname'];
      $_SESSION['username']=$row['username'];
      $_SESSION['token']=$row['token'];
      $handle->close();
      return "ok";
    }else{
      echo "Error: " . $sql_select_user_for_session . "<br>" . $handle->error;
      $handle->close();
      return "0";
    }

}

?>
